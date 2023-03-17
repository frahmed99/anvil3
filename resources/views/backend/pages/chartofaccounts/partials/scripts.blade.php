@vite(['resources/js/pages/tablesections.js'])

<script>
    $(document).ready(function() {
        $('.nav-tabs a').click(function() {
            $(this).tab('show');
        });
        $('.nav-tabs li a').click(function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $(this).tab('show');
        });
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(
            popoverTriggerEl))
    });
</script>

@if ((count($errors) > 0 && $errors->has('chart_of_accounts_subtypes_id')) || $errors->has('chartOfAccountsName'))
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addChartOfAccounts').modal('show');
        });
    </script>
@endif

<script>
    $('#addChartOfAccounts').on('hidden.bs.modal', function() {
        $('#chartOfAccountsForm').find('.is-invalid').removeClass('is-invalid');
        $('#chartOfAccountsForm')[0].reset();
    });
</script>



<script>
    function fetchChartOfAccounts($id) {
        $.ajax({
            url: "{{ route('chartofaccounts.fetch') }}",
            method: "POST",
            dataType: "json",
            data: {
                id: $id,
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function(response) {
                $("#idChartOfAccounts").val(response.id);
                $("#editName").val(response.name);
                $("#editCode").val(response.code);
                $("#editSubtypeId").val(response.chart_of_accounts_subtypes_id);
                $("#editDescription").val(response.description);
                $("#editModalChartOfAccounts").modal("show");
            }
        });
    }
</script>

<script>
    $('#editModalChartOfAccounts').on('hidden.bs.modal', function() {
        $('#editChartOfAccountsForm').find('.is-invalid').removeClass('is-invalid');
        $('#editChartOfAccountsForm')[0].reset();
    });
</script>

<script>
    $('#editChartOfAccountsForm').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{ route('chartofaccounts.update') }}",
            method: "POST",
            dataType: "json",
            data: $(this).serialize(),
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function(response) {
                // Handle success response
                console.log(response);
                // Close the modal
                $('#editModalChartOfAccounts').modal('hide');
                // Refresh the chart of accounts index page
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
