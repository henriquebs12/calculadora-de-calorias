<?php

require_once 'assets/php/classAlimento.php';
require_once 'assets/php/classTipoAlimento.php';

$ali = new Alimento();
$tipo = new TipoAlimento();


if (isset($_POST['action'])){
  $ali->setNome($_POST['nome']);
  $ali->setValorCal($_POST['valorCal']);
  $ali->setQuantProt($_POST['quantProt']);
  $ali->setQuantCarb($_POST['quantCarb']);
  $ali->setPorcao($_POST['procao']);
  $ali->setTeorLip($_POST['teorLip']);
  $ali->setTeorFib($_POST['teorFib']);
  $ali->insert();
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
      <form method="post" action="insertUser.php" class="login" id='login'>
        <div class="form-group">
          <label for="exampleInputEmail1">Nome</label>
          <input type="name" id="nome" name="nome" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter nome">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">valorCal</label>
          <input type="number" id="valorCal" name="valorCal" class="form-control" id="exampleInputPassword1" placeholder="valorCal">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">quantProt</label>
          <input type="number" id="quantProt" name="quantProt" class="form-control" id="exampleInputPassword1" placeholder="quantProt">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">quantCarb</label>
          <input type="date" id="quantCarb" name="quantCarb" class="form-control" id="exampleInputPassword1" placeholder="quantCarb">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">porcao</label>
          <input type="date" id="porcao" name="porcao" class="form-control" id="exampleInputPassword1" placeholder="porcao">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">teorLip</label>
          <input type="date" id="teorLip" name="teorLip" class="form-control" id="exampleInputPassword1" placeholder="teorLip">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">teorFib</label>
          <input type="date" id="teorFib" name="teorFib" class="form-control" id="exampleInputPassword1" placeholder="teorFib">
        </div>
        <div class="form-group">
          <select name="cars" size="4" multiple>
            <?php
              $stmt = $tipo->indexNaoVetor();
              while ($row = $stmt->fetch(PDO::FETCH_OBJ)):
                echo '<option value="' . $row->idTipo . '">' . ucfirst($row->categoria) . '</option>';
              endwhile;
            ?>
          </select>
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