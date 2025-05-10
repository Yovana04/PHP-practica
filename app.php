<?php
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Catálogo de Alumnos</h1>
            </div>
        </div>
        <div class="row">
            <form id="frmBuscar" name="frmBuscar">
                <div class="mb-3">
                    <label for="nombres-buscar" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombre-buscar" name="nombre-buscar" placeholder="Buscar por nombre">
                </div>

                <div class="mb-3">
                    <button type="button" class="btn btn-success" id="btnBuscar" name="btnBuscar"><i class="fa-brands fa-searchengin"></i>Buscar</button>
                    <button type="button" class="btn btn-warning" id="btnNuevo" name="btnNuevo"><i class="fa-solid fa-plus"></i>Nuevo</button>
                </div>



            </form>
        </div>
        <div class="row">
            <div class="col-12" id="tablita" name="tablita">
                <!-- Aquí se mostrará la tabla con los resultados -->
            </div>
        </div>
    </div>

<!---Modal-->

<div class="modal" role="dialog" tabindex="-1" id="form-add-alumno">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear un Alumno</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                <form id="myForm">
                    <div class="col-12 mb-3">
                        <label for="nombre" class="control-label">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <!---Apellido Paterno-->
                    <div class="col-12 mb-3">
                        <label for="apellido_paterno" class="control-label">Apellido Paterno</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <!---Apellido Materno-->
                    <div class="col-12 mb-3">
                        <label for="apellido_materno" class="control-label">Apellido Materno</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                </form>
                </div>
            <div class="modal-footer">
                
        <button type="button" class="btn btn-primary" onClick= "crearAlumno()"><i class="fa-solid fa-floppy-disk"></i>Crear</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i>Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
<!---Fin Modal-->



    <script type="text/javascript">
        //es el useEffect o el onload de react
        $(function(){
            //Escuchar el evento click del botón
            $("#btnBuscar").on("click", function(event){
                buscar()
                
            })
            $("#btnNuevo").on("click", function(event){
                $("#form-add-alumno").modal("show");
                
            })
        })

        
        function buscar(){
            //Realizar la petición AJAX
            $.ajax({
                url: "operaciones.php",
                type: "POST",
                data: "accion=buscar&"+$("#frmBuscar").serialize(),
                cache:false,
                beforeSend:function(){},
               success:function(resultado){
                   $("#tablita").html(resultado);
               },
               error:function(xhr, ajaxOptions, thrownError){alert (xhr.status); alert(thrownError);}   
            })
        }

        function crearAlumno(){
            //Agregar el nuevo alumno a la base de datos
            $.ajax({
                type:"POST",
                datatype:"json",
                url: "operaciones.php",
                data: "accion=insertar&"+$("#myForm").serialize(),
                cache:false,
                beforeSend:function(){
                    $("#form-add-alumno").modal("hide");
                },
                success:function(resultado){
                    if(resultado.status=="ok"){
                        buscar();
                    }
                },
                error:function(xhr, ajaxOptions, thrownError){alert (xhr.status); alert(thrownError);}

            })
        }
    </script>
</body>
</html>