
var phone = jQuery('.kopokopo_phone');

phone.closest('form').on('submit', function () {

    phone_value = phone.val();

    if (phone_value.match(/\d/g).length !== 12) {
        alert('Enter your Mpesa Phone Number as per instructions provide before the field.');
        return false;
    }
})
