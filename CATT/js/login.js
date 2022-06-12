$(document).ready(()=>{
    $("form#formLogin").validetta({
    bubblePosition: 'bottom',
    onValid:(e)=>{
        e.preventDefault();
        $.ajax({
            method:"post",
            url:"./pages/login_AX.php",
            data:$("form#formLogin").serialize(),
            cache:false,
            success:(respAX)=>{
                let AX = JSON.parse(respAX);
                if(AX.cod ==1){
                    Swal.fire({
                        title: 'CATT',
                        html: AX.msj,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        didDestroy:()=>{
                            window.location.href = "./pages/inicio_alumno.php";
                        }
                    });
                }else
                if(AX.cod ==2){
                    Swal.fire({
                        title: 'CATT',
                        html: AX.msj,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        didDestroy:()=>{
                            window.location.href = "./pages/iniciocatt.php";
                        }
                    })
                }else
                if(AX.cod ==3){
                    Swal.fire({
                        title: 'CATT',
                        html: AX.msj,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        didDestroy:()=>{
                            window.location.href = "./pages/inicio_profe.php";
                        }
                    })
                }
                else{
                    Swal.fire({
                        title: 'CATT',
                        html: AX.msj,
                        icon: 'error',
                        confirmButtonText: 'OK',
                    });
                }
            }
        });
    }
});
});
