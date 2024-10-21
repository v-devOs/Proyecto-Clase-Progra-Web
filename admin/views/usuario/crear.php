<?php require('views/header.php') ?> 

<div class="row mt-2">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h1><?php if($accion == "crear"):echo('Nuevo');else :echo('Modificar');endif; ?> Sección</h1> 
        <form method="post" action="usuario.php?accion=<?php if($accion == "crear"):echo('nuevo');else:echo('modificar&id='.$id);endif; ?>">
            <div class="mb-3">
                <label for="seccion" class="form-label">Nombre del la sección</label>
                <input class="form-control" type="text" name="data[correo]" placeholder="Escribe aqui el nombre" id="correo" value="<?php
                if(isset($usuarios['correo'])):echo($usuarios['correo']);endif; ?>" />
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Area de la sección</label>
                <input class="form-control" type="password" name="data[contrasena]" placeholder="Escribe aqui el area de la sección" id="contrasena" value="<?php
                if(isset($usuarios['contrasena'])):echo($usuarios['contrasena']);endif; ?>" /> 
            </div>
            
            <div class="mb-3">
                <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<?php require('views/footer.php') ?> 