<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envio Mensajes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
</head>
<body>


<div class="container p-5">


        <div class="card">
            <div class="card-header text-center">
                <h3>Envio Mensajes</h3>
            </div>

            <div class="card-body">
                <form action="" class="row" id="frmMensaje">

                    <div class="col-xl-6 form-group">
                        <label for="">Cod. Registro</label>
                        
                        <div class="input-group mb-3">
                             <!-- <input type="text" class="form-control" id="txtCodigoRegistro" autofocus="on" > -->
                            
                            <select name="" id="cboRegion" class="custom-select">
                                <option value="GENERAL">[SELECCIONE]</option>
                                <option value="GENERAL">GENERAL</option>
                                <option value="LIMA">LIMA</option>
                                <option value="CENTRO">CENTRO</option>
                                <option value="SUR">SUR</option>
                                <option value="NORTE">NORTE</option>
                            </select>
                            <div class="input-group-append">
                                <span class="input-group-text" id="btnBuscar" style="cursor:pointer">Buscar</span>
                            </div> 
                        </div>
                    </div>

                    <div class="col-xl-6 form-group">
                        <label for="">Destinatarios</label>
                        <input type="text" class="form-control" readonly id="txtDestinatarios" >
                    </div>

                   
                    <!-- <div class="col-xl-6 form-group pl-5">
                        <label for="">Alta</label>
                        <input type="text" class="form-control" id="txtalta">
                    </div>

                    <div class="col-xl-6 form-group pr-5">
                        <label for="">% Early Alta</label>
                        <input type="text" class="form-control" id="txtearlyalta" >
                    </div>

                    
                    <div class="col-xl-6 form-group pl-5">
                        <label for="">Porta</label>
                        <input type="text" class="form-control" id="txtporta" >
                    </div>

                    <div class="col-xl-6 form-group pr-5">
                        <label for="">% Early Porta</label>
                        <input type="text" class="form-control" id="txtearlyporta">
                    </div>

                  
                    <div class="col-xl-6 form-group pl-5">
                        <label for="">Reno</label>
                        <input type="text" class="form-control" id="txtreno">
                    </div>

                    <div class="col-xl-6 form-group pr-5">
                        <label for="">%Early Reno</label>
                        <input type="text" class="form-control" id="txtearlyreno">
                    </div> -->

                </form>
            </div>

            <div class="card-footer">
                <button class="btn btn-success float-right d-none" type="button" id="btnEnviarSms"> Enviar</button>
            </div>

        </div>


</div>



<!--
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

-->

<script src="https://code.jquery.com/jquery-3.4.1.min.js"  ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  ></script>

<script>

    $(document).ready(function(){
        /*
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
        */

        $("#btnEnviarSms").click(function(){
            $.ajax({
                url:'controllers/consolidado_early.controller.php',
                type:'get',
                data:'operacion=enviar',
                success:function(e){
                    if(e != "error"){
                        alert("Mensaje enviado al servidor correctamente, el mensaje llegara en breve");
                        $("#frmMensaje")[0].reset();
                        $("#txtCodigoRegistro").focus();
                        //OCULTANDO BOTON
                        $("#btnEnviarSms").addClass("d-none");

                    }else{
                        alert("Ocurrio un error :(");
                    }
                    //console.log(e);
                }
            })
        });

        $("#btnBuscar").click(function(){
            BuscarDatos();
        })

        $("#txtCodigoRegistro").keypress(function(e){
            if(e.keyCode == 13){
                BuscarDatos();
            }
        })

    });


    //FUNCIONES
    function BuscarDatos(){

        var codRegistro = $("#cboRegion").val();

        if(codRegistro != ""){

            $.ajax({

                url:'controllers/consolidado_early.controller.php',
                type:'get',
                data:'operacion=getdatos&region='+codRegistro,
                success:function(e){
                    var js = JSON.parse(e);
                    console.log(js);
                    if(js.length > 0){

                        var destinatarios = "";
                        js.forEach((obj)=>{
                            destinatarios += obj.destinatario  + " - " ;
                        });

                        $("#txtDestinatarios").val(destinatarios);
                        //MOSTRANDO BOTON
                        $("#btnEnviarSms").removeClass("d-none");
                    }else{
                        alert("No se encontraron datos con el Código seleccionado");
                    }
                }
            });



        }else{
            alert("Por favor seleccione una región");
            //$("#txtCodigoRegistro").focus();
        }

    }


</script>

</body>
</html>