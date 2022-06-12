$(document).ready(()=>{
    $("form#formRegistro").validetta({
        bubbleGapTop:10,
        bubbleGapLeft:-5,
        onValid:(e)=>{
            e.preventDefault();
            $.ajax({
                method:"post",
                url:"registrorepresentante_AX.php",
                data:$("form#formRegistro").serialize(),
                cache:false,
                success:(respAX)=>{
                    let AX = JSON.parse(respAX);
                    //alert(AX.msj);
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