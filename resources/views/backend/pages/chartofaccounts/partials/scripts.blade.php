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
