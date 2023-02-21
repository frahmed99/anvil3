<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
@vite(['resources/js/pages/select2.js'])

{{-- Handle modal errors --}}
@if (count($errors) > 0 && ($errors->has('taxName') || $errors->has('taxRate')))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addTaxModal').modal('show');
        });
    </script>
@endif

@if (count($errors) > 0 && $errors->has('categoryName'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addCategoryModal').modal('show');
        });
    </script>
@endif

@if ((count($errors) > 0 && $errors->has('subcategoryName')) || $errors->has('subcategoryName'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addSubCategoryModal').modal('show');
        });
    </script>
@endif
{{-- ------------------------------------------------------------- --}}
<script>
    $('#addTaxModal').on('hidden.bs.modal', function() {
        $('#taxForm').find('.is-invalid').removeClass('is-invalid');
        $('#taxForm')[0].reset();
    });
</script>
<script>
    $('#addCategoryModal').on('hidden.bs.modal', function() {
        $('#categoryForm').find('.is-invalid').removeClass('is-invalid');
        $('#categoryForm')[0].reset();
    });
</script>
<script>
    $('#addSubCategoryModal').on('hidden.bs.modal', function() {
        $('#subcategoryForm').find('.is-invalid').removeClass('is-invalid');
        $('#subcategoryForm')[0].reset();
    });
</script>

<script>
    $(document).ready(function() {

        // Filter subcategories based on selected category
        $('#category_id').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $('#subcategory_id option').hide();
                $('#subcategory_id option[data-category="' + category_id + '"]').show();
                $('#subcategory_id').val('');
            } else {
                $('#subcategory_id option').show();
                $('#subcategory_id').val('');
            }
        });
    });
</script>

<script>
    const sellCheckbox = document.getElementById('sellThisCheckbox');
    const sellSelect = document.getElementById('sellThisSelect');
    const buyCheckbox = document.getElementById('buyThisCheckbox');
    const buySelect = document.getElementById('buyThisSelect');

    // Hide the sell and buy select elements on page load
    sellSelect.style.display = 'none';
    buySelect.style.display = 'none';

    // Show the sell select element when the sell checkbox is checked
    sellCheckbox.addEventListener('change', () => {
        if (sellCheckbox.checked) {
            sellSelect.style.display = 'block';
        } else {
            sellSelect.style.display = 'none';
        }
    });

    // Show the buy select element when the buy checkbox is checked
    buyCheckbox.addEventListener('change', () => {
        if (buyCheckbox.checked) {
            buySelect.style.display = 'block';
        } else {
            buySelect.style.display = 'none';
        }
    });
</script>
