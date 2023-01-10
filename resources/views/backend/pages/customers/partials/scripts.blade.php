<script>
    $("#ShippingBillingSwitch").click(function() {
        if (this.checked) {
            $("#shippingAddress").val($("#billingAddress").val());
        } else {
            $("#shippingAddress").val('');
        }
    });
</script>
