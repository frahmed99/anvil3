<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#checkall").click(function() {
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
        implementAllChecked();
    }
</script>
