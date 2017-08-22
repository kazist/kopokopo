<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Kopokopo\Payments\Code\Models;

defined('KAZIST') or exit('Not Kazist Framework');

use Kazist\Model\BaseModel;
use Kazist\KazistFactory;
use Payments\Payments\Code\Models\PaymentsModel AS BasePaymentsModel;
use Kazist\Service\Email\Email;

/**
 * Description of MarketplaceModel
 *
 * @author sbc
 */
class PaymentsModel extends BasePaymentsModel {

    public $code = '';

    public function appendSearchQuery($query) {

        $this->ingore_search_query = true;
        return parent:: appendSearchQuery($query);
    }

    public function notificationTransaction($payment_id) {
        $this->processKopokopo($payment_id);
    }

    public function completeTransaction($payment_id) {
        $this->notificationTransaction($payment_id);
    }

    public function cancelTransaction($payment_id) {
        parent::cancelTransaction($payment_id);
    }

    public function getUrlByPaymentId() {

        $factory = new KazistFactory();

        return $this->generateUrl('affiliates.affiliates');
    }

    public function processKopokopo($payment_id) {

        $email = new Email();

        $posted_data = $this->getKopokopoParams($payment_id);
        $payment_method = $posted_data['p1'];

        $payment = $this->getPaymentById($payment_id);
        $gateway = $this->getGatewayByShortName($payment_method);
        $deductions = json_decode($payment->deductions);
        $required_amount = (isset($deductions->amount) && $deductions->amount) ? $deductions->amount : $payment->amount;
        $paid_amount = (isset($posted_data['mc']) && $posted_data['mc']) ? $posted_data['mc'] : 0;

        $paid_amount = $this->getConverterAmount($paid_amount, $gateway, false);
        $required_amount = $this->getConverterAmount($required_amount, $gateway, false);

        $vendor_ref = $this->getGatewayParameter($gateway->id, 'vendor_ref');

        $ipnurl = "https://www.ipayafrica.com/ipn/?vendor=" . $vendor_ref .
                "&id=" . $posted_data['item_id'] .
                "&ivm=" . $posted_data['ivm'] .
                "&qwh=" . $posted_data['qwh'] .
                "&afd=" . $posted_data['afd'] .
                "&poi=" . $posted_data['poi'] .
                "&uyt=" . $posted_data['uyt'] .
                "&ifd=" . $posted_data['ifd'];


        $fp = fopen($ipnurl, "rb");
        $status = stream_get_contents($fp, -1, -1);
        fclose($fp);

        if ($status == '') {

            // Get cURL resource
            $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $ipnurl,
                CURLOPT_USERAGENT => 'SBC call'
            ));
            // Send the request & save response to $resp
            $status = curl_exec($curl);
            // Close request to clear up some resources
            curl_close($curl);
        }

        $payment->type = $payment_method;
        $payment->gateway_id = $gateway->id;
        $payment->code = $posted_data['txncd'];
        $payment->receipt_no = $payment->receipt_no;

        switch ($status) {

            case 'aei7p7yrx4ae34':
            case 'eq3i7p5yt7645e':
            case 'dtfi4p7yty45wq':

                parent::savePaidAmount($payment, $required_amount, $paid_amount);

                if ($paid_amount >= $required_amount) {
                    parent::successfulTransaction($payment_id, $this->code);
                } else {
                    parent::failTransaction($payment_id);
                }

                break;
            case 'fe2707etr5s4wq':
            case 'cr5i3pgy9867e1':
                parent::failTransaction($payment_id);
                break;
            case 'bdi6p2yy76etrs':
                parent::pendingTransaction($payment_id);
                break;
        }
    }

}
