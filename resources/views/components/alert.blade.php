<script>
    @if (session('success'))
    Toast.fire({
        icon: 'success',
        title: '{{ session('success') }}',
    })
    @endif
    @if (session('error'))
    Toast.fire({
        icon: 'error',
        title: '{{ session('error') }}',
    })
    @endif
</script>

<script>
    const deleteButtons = document.querySelectorAll('.delete-task-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const taskForm = button.parentElement;

            Swal2.fire({
                icon: 'question',
                title: 'Confirmation',
                text: 'Are you sure you want to delete?',
                showCancelButton: true,
                confirmButtonColor: '#5a0e1d',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    taskForm.submit();
                }
            });
        });
    });
</script>
