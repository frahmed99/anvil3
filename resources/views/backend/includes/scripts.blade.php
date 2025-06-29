<x:notify-messages />
@notifyJs
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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
                imageUrl: '/media/gifs/warning.gif',
                background: '#232323',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#primary',
                confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire({
                        title: 'Success',
                        text: 'Delete Was Successfull',
                        imageUrl: '/media/gifs/trash.gif',
                        background: '#232323',
                    })
                }
            })
        });
    });
</script>

@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
@component('livewire-notification::components.toast')
@endcomponent
@include('vendor.lara-izitoast.toast')
@yield('js')
