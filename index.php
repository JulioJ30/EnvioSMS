<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
</head>
<body>


<div class="section">

    <div class="row justify-content-center">

            <div class="col-md-8">
                <h3>Enviar Mensaje</h3>
                <form action="" id="formulario">
                    <div class="form-group">
                        <label for="">Numero</label>
                        <input type="text" id="numero" class="form-control" autofocus="on">
                    </div>
                    <div class="form-group">
                        <label for="">Mensaje</label>
                        <input type="text" id="mensaje" class="form-control" autofocus="on">
                    </div>
                    <div class="form-group">
                        
                        <button class="btn btn-success" id="enviar" type="button">Enviar Mensaje</button>
                    </div>
                </form>

                <div class="alert alert-warning" style="display:none" id="aviso">
                    <span>Enviado</span>
                </div>  

            </div>

    </div>


</div>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"  ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  ></script>

<script>

    $(document).ready(function(){

        function EnviarMensaje(){
            let numero = $("#numero").val();
            let mensaje = $("#mensaje").val();

            let datosEnvio ={
                'operacion' :   'enviarSMS',
                'numero'    :   numero,
                'mensaje'   :   mensaje
            }


            $.ajax({
                url:'controllers/sms.controller.php',
                type:'GET',
                data:datosEnvio,
                success:function(e){
                        var rpta = JSON.parse(e);

                        console.log(e);

                }

            });

        }


        $("#enviar").click(function(){
            EnviarMensaje();
        });


    });


</script>

</body>
</html>