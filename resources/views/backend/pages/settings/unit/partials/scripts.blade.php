<script>
    window.addEventListener('close-Modal', event => {
        $('#addModal').modal('hide');
        $('#editModal').modal('hide');
    })
</script>

<script type="text/javascript">
    window.addEventListener('deleteConfirmation', event => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            color: '#F0F2F5',
            imageUrl: '/media/gifs/warning.gif',
            background: '#232323',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#primary',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteConfirmed');
            }
        })
    })
    window.addEventListener('deleteConfirmed', event => {
        Swal.fire({
            title: 'Success',
            text: 'Delete Was Successfull',
            imageUrl: '/media/gifs/trash.gif',
            background: '#232323',
        })
    });
</script>
