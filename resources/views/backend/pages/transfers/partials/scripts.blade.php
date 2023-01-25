<script src="{{ asset('js/plugins/flatpickr/flatpickr.min.js') }}"></script>
@vite(['resources/js/pages/flatpicker.js'])

<script>
    $(document).ready(function() {
        function getExchangeRate(fromCurrency, toCurrency, callback) {
            // Use jQuery's $.ajax function to retrieve the exchange rate
            $.ajax({
                url: "https://api.exchangerate-api.com/v4/latest/" + fromCurrency,
                success: function(data) {
                    let rate = data.rates[toCurrency];
                    callback(rate);
                }
            });
        }
        $('#fromAccount').change(function() {
            let fromCurrency = $('#fromAccount').find(':selected').data('currency-code');
            let toCurrency = $('#toAccount').find(':selected').data('currency-code');
            getExchangeRate(fromCurrency, toCurrency, function(rate) {
                $('#rate').val(rate);
            });
        });
        $('#toAccount').change(function() {
            let toCurrency = $('#toAccount').find(':selected').data('currency-code');
            let fromCurrency = $('#fromAccount').find(':selected').data('currency-code');
            getExchangeRate(fromCurrency, toCurrency, function(rate) {
                $('#rate').val(rate);
            });
        });
        $('#fromAmount').keyup(function() {
            let fromAmount = Number.parseFloat($(this).val());
            let rate = Number.parseFloat($('#rate').val());
            if (!isNaN(fromAmount) && !isNaN(rate)) {
                let toAmount = (fromAmount * rate).toFixed(2);
                $('#toAmount').val(toAmount);
            }
        });
    });
</script>
