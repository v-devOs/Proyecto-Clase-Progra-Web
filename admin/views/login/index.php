<?php require('./views/header.php') ?> 
<div class="form-signin w-100 m-auto mt-5">

  <dov class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <form method="post" action="login.php?accion=login">
        <h1 class="h3 mb-3 fw-normal">Inicia Sesión</h1>
        <div class="form-floating">
          <input type="email" class="form-control" name="data[correo]" id="floatingInput" required placeholder="name@example.com">
          <label for="floatingInput">Correo Electronico</label>
        </div>
        <div class="form-floating mt-2">
          <input type="password" class="form-control" name="data[contrasena]" id="floatingPassword" required placeholder="Password">
          <label for="floatingPassword">Contraseña</label>
        </div>
    
        <div class="form-check text-start my-3">
          <a href="login.php?accion=forgot">Recuperar Contraseña</a>
        </div>
        <input class="btn btn-primary w-100 py-2" type="submit" value="Entrar al sistema" name="enviar"/>
      </form>
    </div>
    <div class="col-md-4"></div>
  </dov>
</div>
<?php require('./views/footer.php'); ?>