<script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
@vite(['resources/js/pages/flatpicker.js'])

<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
@vite(['resources/js/pages/select2.js'])

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


<script>
    $(document).ready(function() {
        // Clear quantity field on page load
        $('.quantity').val('');

        // Add Button Script
        var i = 1;
        $("#add_row").click(function(event) {
            event.preventDefault();
            b = i - 1;
            $('#addr' + i).html($('#addr' + b).html()).find('td:first-child').html(i + 1);
            $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');

            i++;
        });

        // Delete Button Script
        $("#delete_row").click(function(event) { // add event parameter here
            event.preventDefault(); // prevent default behavior
            if (i > 1) {
                $("#addr" + (i - 1)).html('');
                i--;
            }
            calc();
        });

        // Listen for changes to the table
        $('#tab_logic tbody').on('keyup change', function() {
            calc();
        });

    });

    $(document).on('change', '.product', function() {
        var taxInput = $(this).closest('tr').find('.tax');
        var priceInput = $(this).closest('tr').find('.price');
        var descriptionParagraph = $(this).closest('tr').find('#product-service-description');
        var quantityInput = $(this).closest('tr').find('.quantity');

        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{ route('product.getdetails') }}',
            data: {
                productId: id,
                _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            success: function(response) {
                console.log(response); // Add this line for debugging
                var salePrice = response.salePrice;
                var taxNames = response.taxNames;
                var description = response.description;

                priceInput.val(salePrice.toFixed(2));
                taxInput.val(taxNames);
                descriptionParagraph.text(description);

                // Set default quantity to 1
                quantityInput.val('1');
                calc();
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log(xhr.responseText);
            }
        });
    });

    function calc() {
        $('#tab_logic tbody tr').each(function(i, element) {
            var html = $(this).html();
            if (html != '') {
                var quantity = $(this).find('.quantity').val();
                var price = $(this).find('.price').val();
                var amount = quantity * price;
                $(this).find('.amount').val(amount.toFixed(2));
            }
        });
    }
</script>
