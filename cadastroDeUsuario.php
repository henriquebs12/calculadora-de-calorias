<?php
require_once 'head.php';
require_once 'assets/php/classUsuario.php';

$user = new Usuario();

if (isset($_POST['action'])){
  $user->setNome($_POST['nome']);
  $user->setAltura(floatval(str_replace(',', '.', $_POST['altura'])));
  $user->setPeso($_POST['peso']);
  $user->setData($_POST['data']);  
  $user->setEmail($_POST['email']);
  $user->setSenha($_POST['senha']);
  $user->setGenero($_POST['genero']);
  $user->setIs_admin($_POST['is_admin']);
  if($id = $user->insert()){
      $result = "Vamos a calculadora!";
      session_start();
      $_SESSION['id'] = $id;
      header("Location: calculadora.php");
    }else{
      $error = "Ops, algo deu errado!";
      }
}

?>

<body>
    <main class="sistema">


        <section class="calculadora">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-left mt-5">

                        <h1>Cadastro</h1>

                    </div>
                </div>
            </div>
            <form method="post" action="cadastroDeUsuario.php" class="login" id='login'>
                <div class="container px-5 px-md-0">
                    <div class="row mt-5" id="content-calc">



                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="imc-row">
                                    <div class="number d-flex align-items-center justify-content-center">
                                        <span>5</span>
                                    </div>
                                    <h2 class="subtitulo">Qual é o seu E-mail?</h2>
                                    <div class="input-group">
                                        <input id="nome" name="email" type="email" class="form-control"
                                            aria-label="Qual é o seu nome?" min="1" required>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="imc-row">
                                    <div class="number d-flex align-items-center justify-content-center">
                                        <span>5</span>
                                    </div>
                                    <h2 class="subtitulo">Qual é o seu nome?</h2>
                                    <div class="input-group">
                                        <input id="nome" type="text" name="nome" class="form-control"
                                            aria-label="Qual é o seu nome?" min="1" required>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="number d-flex align-items-center justify-content-center">
                                    <span>1</span>
                                </div>

                                <h2 class="subtitulo">Como você se identifica:</h2>

                                <div class="gender-box d-flex flex-row justify-content-center">
                                    <input class="form-check-input gender-input female" type="radio" name="genero"
                                        id="female" value="f">
                                    <label class="form-check-label gender-label" for="female" data-html="true"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="Mocinha <i>cis</i> ou<br/>Mocinha <i>trans</i>">
                                        <i class="fas fa-female mr-2"></i>
                                    </label>

                                    <input class="form-check-input gender-input male" type="radio" name="genero"
                                        id="male" value="m" required>
                                    <label class="form-check-label gender-label" for="male" data-html="true"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="Mocinho <i>cis</i> ou<br/>Mocinho <i>trans</i>">
                                        <i class="fas fa-male mr-2"></i>
                                    </label>

                                    <input class="form-check-input gender-input bin" type="radio" name="genero"
                                        id="bin" value="n">
                                    <label class="form-check-label gender-label" for="bin" data-html="true"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="Me considero genero <i>Não Binário</i>">
                                        <i class="fas fa-mercury mr-2"></i>
                                    </label>
                                </div>
                            </div>
                        </div>

                         <div class="col-12 col-md-6 col-lg-3">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="imc-row">
                                    <div class="number d-flex align-items-center justify-content-center">
                                        <span>5</span>
                                    </div>
                                    <h2 class="subtitulo">Defina uma senha:</h2>
                                    <div class="input-group">
                                        <input id="nome" name="senha" type="password" class="form-control"
                                            aria-label="Qual é o seu nome?" min="1" required>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="imc-row">
                                    <div class="number d-flex align-items-center justify-content-center">
                                        <span>2</span>
                                    </div>
                                    <h2 class="subtitulo">Data de nascimento:</h2>
                                    <div class="input-group">
                                        <input name="data" type="date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="imc-row">
                                    <div class="number d-flex align-items-center justify-content-center">
                                        <span>3</span>
                                    </div>
                                    <h2 class="subtitulo">Altura:</h2>
                                    <div class="input-group">
                                        <input id="altura" type="number" class="form-control"
                                            aria-label="Qual a sua altura?" step="1" min="1" max="300" name="altura" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="imc-row">
                                    <div class="number d-flex align-items-center justify-content-center">
                                        <span>4</span>
                                    </div>
                                    <h2 class="subtitulo">Peso:</h2>
                                    <div class="input-group">
                                        <input name="peso" id="peso" type="number" class="form-control"
                                            aria-label="Qual o seu peso?" min="1" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>

                       <div class="row">
                            <div class="col-12 text-center my-5">
                                <input required="required" type="hidden" name="is_admin" value=0>
                                <input required="required" type="hidden" name="action" value="insert">
                                <button id="btn-calcula" type="submit" class="btn btn-secundario btn-cta">Cadastrar
                                    <i class="fas fa-angle-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Fim da row -->
                   

            </form>
            <!-- Fim do container -->
            </div>
            <!--Termina section calculadora -->
        </section>
        <!-- Fim da main sistema -->
    </main>
    <?php
require_once 'footer.php';
?>