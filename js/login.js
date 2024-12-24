document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);
    try {
        const response = await fetch('login_to_db.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();

        if (result.status === 'success') {
            // Show success toast
            Swal.fire({
                toast: true,
                position: 'top', // Adjust as needed
                icon: 'success',
                title: result.message,
                customClass: {
                    popup: 'modern-toast',
                },
                background: '#e0ffe0',
                color: '#333',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
            }).then(() => {
                window.location.href = result.redirect_url;
            });
        } else {
            // Show error toast
            Swal.fire({
                toast: true,
                position: 'top', // Adjust as needed
                icon: 'error',
                title: result.message,
                customClass: {
                    popup: 'modern-toast',
                },
                background: '#ffe0e0',
                color: '#333',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        }
    } catch (error) {
        console.error('Error:', error);
        Swal.fire({
            toast: true,
            position: 'top', // Adjust as needed
            icon: 'error',
            title: 'Something went wrong! Please try again.',
            customClass: {
                popup: 'modern-toast',
            },
            background: '#ffe0e0',
            color: '#333',
            showConfirmButton: false,
            timer: 3000,
        });
    }
});
