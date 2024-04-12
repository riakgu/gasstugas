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
    // Menambahkan event listener ke setiap tombol hapus tugas
    const deleteButtons = document.querySelectorAll('.delete-task-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Mencegah tindakan default (penghapusan langsung)
            const taskForm = button.parentElement; // Form yang berisi tombol yang ditekan

            Swal2.fire({
                icon: 'question',
                title: 'Confirmation',
                text: 'Are you sure you want to delete this task?',
                showCancelButton: true,
                confirmButtonColor: '#5a0e1d',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    taskForm.submit(); // Melanjutkan penghapusan jika dikonfirmasi
                }
            });
        });
    });
</script>
