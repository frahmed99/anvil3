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

{{-- <script>
    let select = document.getElementById("account_type");

    select.addEventListener("change", function() {
        let selectedOption = this.options[this.selectedIndex];
        let selectedValue = selectedOption.value;
        console.log("Selected subtype ID: " + selectedValue);
    });
</script> --}}

{{-- <script>
    < script >
        $(document).ready(function() {
            $("#account_type").change(function() {
                var selectedOption = $("#account_type option:selected");
                var selectedTypeId = selectedOption.parent().attr("label");
                $("#selected_type_id").val(selectedTypeId);
            });
        }); <
    />
</script> --}}

{{-- <script>
    $(document).ready(function() {
        $('#addChartOfAccounts').on('submit', function(event) {
            event.preventDefault();
            var form = $(this);

            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(data) {
                    $('#addChartOfAccounts').modal('hide');
                    location.reload();
                },
                error: function(xhr) {
                    var errors = xhr.responseJSON.errors;
                    console.log(errors);
                    $('.form-floating').removeClass('is-invalid');
                    $('.invalid-feedback').remove();

                    $.each(errors, function(field, error) {
                        $('#' + field).addClass('is-invalid');
                        $('#' + field).after('<div class="invalid-feedback">' +
                            error[0] + '</div>');
                    });
                }
            });
        });
    });
</script> --}}

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".btn-submit").click(function(e) {
        e.preventDefault();

        var name = $("#addChartOfAccounts #name").val();
        var code = $("#addChartOfAccounts #code").val();
        var chart_of_accounts_subtypes_id = $("#addChartOfAccounts #chart_of_accounts_subtypes_id").val();
        var description = $("#addChartOfAccounts #description").val();

        $.ajax({
            type: 'POST',
            url: "{{ route('chartofaccounts.store') }}",
            data: {
                name: name,
                code: code,
                chart_of_accounts_subtypes_id: chart_of_accounts_subtypes_id,
                description: description
            },
            success: function(data) {
                if ($.isEmptyObject(data.error)) {
                    location.reload();
                } else {
                    printErrorMsg(data.error);
                }
            }
        });
    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            var element = $("#addChartOfAccounts #" + key);
            element.siblings(".invalid-feedback").html(value);
            element.addClass("is-invalid");
        });
    }
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
    var originalValues = {};

    // Store original values when the form is loaded
    $(document).ready(function() {
        $("#formEditChartOfAccounts input").each(function() {
            originalValues[$(this).attr("name")] = $(this).val();
        });
    });

    $("#formEditChartOfAccounts").submit(function(e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);
        formData.append("name", $("#name").val());
        formData.append("code", $("#code").val());
        formData.append("description", $("#description").val());
        formData.append("chart_of_accounts_subtypes_id", $("#chart_of_accounts_subtypes_id").val());

        var updateRequired = false;

        // Check if any changes have been made
        $("#formEditChartOfAccounts input").each(function() {
            if ($(this).val() != originalValues[$(this).attr("name")]) {
                updateRequired = true;
                return false;
            }
        });

        if (!updateRequired) {
            $("#editModalChartOfAccounts").modal("hide");
            return;
        }

        $.ajax({
            url: "{{ route('chartofaccounts.update') }}",
            method: "POST",
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function(response) {
                $("#msgEditChartOfAccounts").html("");
                if (response.status == 0)
                    $("#msgEditChartOfAccounts").html(response.msg);
                else {
                    location.reload();
                    $("#editModalChartOfAccounts").modal("hide");
                }
            },
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            error: function(error) {
                console.log(error)
                var response = JSON.parse(error.responseText);
                var errorString = "<ul>";
                $.each(response.errors, function(key, value) {
                    errorString += "<li>" + value + "</li>";
                });
                errorString += "</ul>";
                $("#msgEditChartOfAccounts").html(errorString);
                $("#msgEditChartOfAccounts").removeClass("d-none").addClass(
                    "p-3 rounded bg-danger");
            }
        });
    });
</script>


<script>
    $('#editModalChartOfAccounts').on('hidden.bs.modal', function(e) {
        $("#msgEditChartOfAccounts").html("");
        $(this)
            .find("input,textarea,select")
            .val('')
            .end()
            .find("input[type=checkbox], input[type=radio]")
            .prop("checked", "")
            .end();
    });
</script>
