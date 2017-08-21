<?php

namespace Kopokopo\Payments\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payments
 *
 * @ORM\Table(name="kopokopo_payments")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Payments extends \Kazist\Table\BaseTable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="service_name", type="string", length=255, nullable=false)
     */
    protected $service_name;

    /**
     * @var string
     *
     * @ORM\Column(name="business_name", type="string", length=255, nullable=false)
     */
    protected $business_name;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_reference", type="string", length=255, nullable=false)
     */
    protected $transaction_reference;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_transaction_id", type="string", length=255, nullable=false)
     */
    protected $internal_transaction_id;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_timestamp", type="string", length=255, nullable=false)
     */
    protected $transaction_timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_type", type="string", length=255, nullable=false)
     */
    protected $transaction_type;

    /**
     * @var string
     *
     * @ORM\Column(name="account_number", type="string", length=255, nullable=false)
     */
    protected $account_number;

    /**
     * @var string
     *
     * @ORM\Column(name="sender_phone", type="string", length=255, nullable=false)
     */
    protected $sender_phone;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     */
    protected $first_name;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_name", type="string", length=255, nullable=false)
     */
    protected $middle_name;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     */
    protected $last_name;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="string", length=255, nullable=false)
     */
    protected $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=255)
     */
    protected $currency;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=false)
     */
    protected $created_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    protected $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="modified_by", type="integer", length=11, nullable=false)
     */
    protected $modified_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    protected $date_modified;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set serviceName
     *
     * @param string $serviceName
     *
     * @return Payments
     */
    public function setServiceName($serviceName)
    {
        $this->service_name = $serviceName;

        return $this;
    }

    /**
     * Get serviceName
     *
     * @return string
     */
    public function getServiceName()
    {
        return $this->service_name;
    }

    /**
     * Set businessName
     *
     * @param string $businessName
     *
     * @return Payments
     */
    public function setBusinessName($businessName)
    {
        $this->business_name = $businessName;

        return $this;
    }

    /**
     * Get businessName
     *
     * @return string
     */
    public function getBusinessName()
    {
        return $this->business_name;
    }

    /**
     * Set transactionReference
     *
     * @param string $transactionReference
     *
     * @return Payments
     */
    public function setTransactionReference($transactionReference)
    {
        $this->transaction_reference = $transactionReference;

        return $this;
    }

    /**
     * Get transactionReference
     *
     * @return string
     */
    public function getTransactionReference()
    {
        return $this->transaction_reference;
    }

    /**
     * Set internalTransactionId
     *
     * @param string $internalTransactionId
     *
     * @return Payments
     */
    public function setInternalTransactionId($internalTransactionId)
    {
        $this->internal_transaction_id = $internalTransactionId;

        return $this;
    }

    /**
     * Get internalTransactionId
     *
     * @return string
     */
    public function getInternalTransactionId()
    {
        return $this->internal_transaction_id;
    }

    /**
     * Set transactionTimestamp
     *
     * @param string $transactionTimestamp
     *
     * @return Payments
     */
    public function setTransactionTimestamp($transactionTimestamp)
    {
        $this->transaction_timestamp = $transactionTimestamp;

        return $this;
    }

    /**
     * Get transactionTimestamp
     *
     * @return string
     */
    public function getTransactionTimestamp()
    {
        return $this->transaction_timestamp;
    }

    /**
     * Set transactionType
     *
     * @param string $transactionType
     *
     * @return Payments
     */
    public function setTransactionType($transactionType)
    {
        $this->transaction_type = $transactionType;

        return $this;
    }

    /**
     * Get transactionType
     *
     * @return string
     */
    public function getTransactionType()
    {
        return $this->transaction_type;
    }

    /**
     * Set accountNumber
     *
     * @param string $accountNumber
     *
     * @return Payments
     */
    public function setAccountNumber($accountNumber)
    {
        $this->account_number = $accountNumber;

        return $this;
    }

    /**
     * Get accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * Set senderPhone
     *
     * @param string $senderPhone
     *
     * @return Payments
     */
    public function setSenderPhone($senderPhone)
    {
        $this->sender_phone = $senderPhone;

        return $this;
    }

    /**
     * Get senderPhone
     *
     * @return string
     */
    public function getSenderPhone()
    {
        return $this->sender_phone;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Payments
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     *
     * @return Payments
     */
    public function setMiddleName($middleName)
    {
        $this->middle_name = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Payments
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set amount
     *
     * @param string $amount
     *
     * @return Payments
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Payments
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Get createdBy
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Get modifiedBy
     *
     * @return integer
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        // Add your code here
    }
}

