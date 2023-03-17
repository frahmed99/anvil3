@vite(['resources/js/pages/be_ui_animations.js'])

@if ((count($errors) > 0 && $errors->has('subcategoryName')) || $errors->has('category_id'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addModal').modal('show');
        });
    </script>
@endif
<script>
    $('#addModal').on('hidden.bs.modal', function() {
        $('#subcategoryForm').find('.is-invalid').removeClass('is-invalid');
        $('#subcategoryForm')[0].reset();
    });
</script>

<script>
    function fetchSubCategory($id) {
        $.ajax({
            url: "{{ route('subcategory.fetch') }}",
            method: "POST",
            dataType: "json",
            data: {
                id: $id,
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function(response) {
                $("#subcategoryNameEdit").val(response.name);
                $("#category_idEdit").val(response.category_id);
                $("#idSubCategory").val(response.id);
                $("#editModalSubCategories").modal("show");
            }
        });
    }
</script>

<script>
    $("#editSubCategoryForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{ route('subcategory.update') }}",
            method: "POST",
            dataType: "json",
            data: $(this).serialize(),
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function(response) {
                console.log(response);
                $("editModalSubCategories").modal("hide");
                window.location.reload();
            },
            error: function(response) {
                // Handle error response
                // Display validation errors
                if (response.status === 422) {
                    var errors = response.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        var input = $('[name="' + key + '"]');
                        var parentDiv = input.parent();
                        // Append the error messages to a new div
                        var errorDiv = $('<div>').addClass('invalid-feedback').text(value[
                            0]);
                        parentDiv.append(errorDiv);
                        // Add the "is-invalid" class to the input field
                        input.addClass('is-invalid');
                    });
                }
            }
        });
    });
</script>

<script>
    $('#editModalSubCategories').on('hidden.bs.modal', function() {
        $('#editSubCategoryForm').find('.is-invalid').removeClass('is-invalid');
        $('#editSubCategoryForm')[0].reset();
    });
</script>
