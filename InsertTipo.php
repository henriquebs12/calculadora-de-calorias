<?php

require_once 'assets/php/classTipoAlimento.php';

$tipo = new TipoAlimento();

if (isset($_POST['action'])){
  $tipo->setCategoria($_POST['categoria']);
  $tipo->insert();
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap Reboot -->
  <link rel="stylesheet" href="assets/css/bootstrap-reboot.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Main CSS -->
  <link rel="stylesheet" href="assets/css/style.min.css">
  <title>Biblioteca calórica</title>
</head>

<body class="body-home">

  <img class="logo" src="assets/images/diamond.svg" alt="">
  <h3 class="text-center">Mais controle.<br>
    Menos preocupação.</h3>
  <main class="landing-page">

    <div class="container">
      <form method="post" action="insertTipo.php" class="TipoAlimento" id='TipoAlimento'>
        <div class="form-group">
          <label for="exampleInputEmail1">Nome</label>
          <input type="name" id="categoria" name="categoria" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter categoria">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Lembrar senha</label>
        </div>
        <input type="hidden" name="action" value="insert">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </main>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>