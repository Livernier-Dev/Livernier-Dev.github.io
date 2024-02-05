document.addEventListener("DOMContentLoaded", function() {
    const urlParams = new URLSearchParams(window.location.search);
    const errorParam = urlParams.get('error');
    const succeedParam = urlParams.get('succeed');

    if (errorParam) {
        showAlert(errorParam, 'error');
    }

    if (succeedParam) {
        showAlert(succeedParam, 'success');
    }
});

function showAlert(message, type) {
    Swal.fire({
        text: message,
        icon: type,
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });
}