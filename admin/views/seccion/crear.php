<?php require('views/header.php') ?> 

<div class="row mt-2">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h1><?php if($accion == "crear"):echo('Nuevo');else :echo('Modificar');endif; ?> Sección</h1> 
        <form method="post" action="seccion.php?accion=<?php if($accion == "crear"):echo('nuevo');else:echo('modificar&id='.$id);endif; ?>">
            <div class="mb-3">
                <label for="seccion" class="form-label">Nombre del la sección</label>
                <input class="form-control" type="text" name="data[seccion]" placeholder="Escribe aqui el nombre" id="seccion" value="<?php
                if(isset($secciones['seccion'])):echo($secciones['seccion']);endif; ?>" />
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Area de la sección</label>
                <input class="form-control" type="number" name="data[area]" placeholder="Escribe aqui el area de la sección" id="area" value="<?php
                if(isset($secciones['area'])):echo($secciones['area']);endif; ?>" /> 
            </div>
            <div class="mb-3">
                <label for="longitud" class="form-label">Longitud de la sección</label>
                <input class="form-control" type="text" name="data[longitud]" placeholder="Escribe aqui la Longitud" id="longitud" value="<?php
                if(isset($secciones['longitud'])):echo($secciones['longitud']);endif; ?>"/>
            </div>
            <!-- <div class="mb-3">
                <label for="id_invernadero" class="form-label">Id del invernadero</label>
                <input class="form-control" type="number" name="data[id_invernadero]" placeholder="Escribe aqui el id del invernadero" id="id_invernadero" value="<?php
                if(isset($secciones['area'])):echo($secciones['id_invernadero']);endif; ?>"/>
            </div> -->

            <div class="mb-3">
                <label for="" class="form-label">Invernadero</label>
                <select class="form-select" name="data[id_invernadero]" id="">
                    <?php foreach($invernaderos as $invernadero): ?>
                    <?php 
                        $selected = "";
                        
                        if($secciones['id_invernadero'] == $invernadero['id_invernadero'])
                            $selected = "selected";
                    ?>
                        <option value="<?php echo $invernadero['id_invernadero'];?>" <?php echo $selected ?>>
                            <?php echo $invernadero['invernadero'];?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-success" type="submit" name="data[enviar]" value="Guardar"/>
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<?php require('views/footer.php') ?> 