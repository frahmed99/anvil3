<script>
    $(document).ready(function() {
        $("#name").autocomplete({
            source: "{{ route('currency.autocomplete') }}",
            minLength: 2,
            select: function(event, ui) {
                $('#code').val(ui.item.code);
                $('#symbol').val(ui.item.symbol);
            }
        });
    });
</script>
