<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Invernaderos</h1>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Area</th>
        <th scope="col">Latitud</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <?php foreach($invernaderos as $invernadero): ?>
        <th scope="row"><?php echo $invernadero['id_invernadero'] ?></th>
        <td><?php echo $invernadero['invernadero'] ?></td>
        <td><?php echo $invernadero['area'] ?></td>
        <td><?php echo $invernadero['latitud'] ?></td>
        <?php endforeach ?>
      </tr>
    </tbody>
  </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>