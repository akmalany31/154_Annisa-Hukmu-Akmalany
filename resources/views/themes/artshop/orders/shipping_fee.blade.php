<script type="text/javascript">
    function setShippingFee(deliveryPackage, courier, addressID) {
        $.ajax({
            url: "/orders/choose-package",
            method: "POST",
            data: {
                delivery_package: deliveryPackage,
                courier: courier,
                address_id: addressID,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (result) {
                $('#shipping-fee').html("IDR " + result.shipping_fee);
                $('#grand-total').html("IDR " + result.grand_total);
            },
            error: function (e) {
                console.log(e);
            }
        })
    }
</script>