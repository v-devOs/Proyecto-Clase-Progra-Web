<?php require('views/header.php'); ?>


<div class="row m-5">
  <div class="col-lg-3"></div>
  <div class="col-lg-6">
    <h1>Nuevo Invernadero</h1>

    <form method="post" action="invernadero.php?accion=nuevo" >
      <div class="mb-3">
        <label for="" class="form-label">Nombre del invernadero</label>
        <input type="text" name="data[invernadero]" placeholder="Escribe aqui el nombre" class="form-control"/>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="" class="form-label">Latitud del invernadero</label>
          <input type="text" name="data[latitud]" placeholder="Escribe aqui la latitud" class="form-control"/>
        </div>
        <div class="col-md-6 mb-3">
          <label for="" class="form-label">Longitud del invernadero</label>
          <input type="text" name="data[longitud]" placeholder="Escribe aqui la longitud" class="form-control"/>
        </div>
      </div>
      

      

      <div class="mb-3">
        <label for="" class="form-label">Area del invernadero (m<sup>2</sup>)</label>
        <input type="number" name="data[area]" placeholder="Escribe aqui el area" class="form-control"/>
      </div>

      <div class="mb-3">
        <label for="" class="form-label">Fecha de creación</label>
        <input type="date" name="data[fecha_creacion]" placeholder="Escribe aqui el nombre" class=""/>
      </div>

      <div class="mb-3">
        <input type="submit" name="data[enviar]" value="Guardar" class="btn btn-primary">
      </div>

    </form>
  </div>
  <div class="col-lg-3"></div>
</div>



<?php require('views/footer.php'); ?>