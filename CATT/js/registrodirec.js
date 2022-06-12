$(document).ready(()=>{
    $("form#formDirec").validetta({
        onValid:(e)=>{
            e.preventDefault();
            $.ajax({
                method:"post",
                url:"registrodirec_AX.php",
                data:$("form#formDirec").serialize(),
                cache:false,
                success:(respAX)=>{
                    let AX = JSON.parse(respAX);
                    if(AX.cod==1){
                        $("form")[0].reset();
                        Swal.fire({
                            title: 'TWEB 20222',
                            html: AX.msj,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            didDestroy:()=>{
                                window.location.href = "./../login.html";
                            }
                        });
                    }else{
                    //$("input#correo").val("");
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