<script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
@vite(['resources/js/pages/flatpicker.js'])

<script>
    $(document).ready(function() {
        $('#customerName').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var billingAddress = selectedOption.data('billing-address');
            var shippingAddress = selectedOption.data('shipping-address');
            $('#billingAddress').val(billingAddress);
            $('#shippingAddress').val(shippingAddress);
        });
    });
</script>
