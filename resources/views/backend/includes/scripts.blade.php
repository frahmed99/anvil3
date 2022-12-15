<x:notify-messages />
@notifyJs
<script src="{{ asset('js/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                color: '#F0F2F5',
                imageUrl: '/media/gifs/trash3.gif',
                background: '#232323',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#primary',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    });
</script>
