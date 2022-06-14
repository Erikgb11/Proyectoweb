$(document).ready(()=>{
    $("form#formProt").validetta({
        onValid:(e)=>{
            e.preventDefault();
            $.ajax({
                method:"post",
                url:"registroprotocolo_AX.php",
                data:$("form#formProt").serialize(),
                cache:false,
                success:(respAX)=>{
                    let AX = JSON.parse(respAX);
                    if(AX.cod==1 ){
                        $("form")[0].reset();
                        Swal.fire({
                            title: 'TWEB 20222',
                            html: AX.msj,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            didDestroy:()=>{
                                window.location.href = "./inicio_alumno.php";
                            }
                        });
                    }else{
                    Swal.fire({
                        title: 'TWEB 20222',
                        html: AX.msj,
                        icon: 'error',
                        confirmButtonText: 'OK',
                        footer:"ESCOM",
                        })
                    }
                }
            });
        }
    });
});