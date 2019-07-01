<?php
require_once 'head.php';
require_once 'assets/php/classUsuario.php';

session_start();
if (isset($_SESSION['id'])) {
    header("Location: calculadora.php");
}

$login = new Usuario();

if(isset($_POST["action"])){

    $email = $_POST["email"];
    $senha = $_POST["senha"];    

    $login = new Usuario();
    $login->setEmail($email);
    $login->setSenha($senha);

    if($id = $login->existeConta()){
      session_start();
      $_SESSION['id'] = $id;
      header("Location: calculadora.php");
    }else{
      $flag = -1;
    }

  }

?>

<body class="body-home">
  <h3 class="text-center">Mais controle.<br>
    Menos preocupação.</h3>
  <main class="landing-page">

    <div class="container">
      <form method="post" action="login.php" class="login" id='login'>
        <div class="form-group">
          <label for="exampleInputEmail1">Seu e-mail</label>
          <input type="email" id="email" name="email" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="Digite o ">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Senha</label>
          <input type="password" id="senha" name="senha" class="form-control" id="exampleInputPassword1"
            placeholder="Password">
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