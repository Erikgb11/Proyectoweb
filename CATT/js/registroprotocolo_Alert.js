$(document).ready(()=>{
    if(band=='1'){
    Swal.fire({
        title: 'TWEB 20222',
        text: "Recuerda que solo tienes 10 minutos para el registro de tu protocolo",
        icon: 'warning',
        showDenyButton: true,
        confirmButtonColor: '#3085d6',
        denyButtonColor: '#d33',
        confirmButtonText: 'SEGUIR',
        denyButtonText:'CANCELAR',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
        if (result.isDenied) {
            window.location.href = "./inicio_alumno.php";
            }
        })}
    });