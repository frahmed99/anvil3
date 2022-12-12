<script>
    $(document).ready(function() {
        $("#checkPermissionAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    });

    function checkPermissionByGroup(className, checkThis) {
        const groupIdName = $("#" + checkThis.id);
        const classCheckBox = $('.' + className + ' input');
        if (groupIdName.is(':checked')) {
            classCheckBox.prop('checked', true);
        } else {
            classCheckBox.prop('checked', false);
        }
    }
</script>
