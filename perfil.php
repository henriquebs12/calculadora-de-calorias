<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
require_once 'head.php';
require_once 'assets/php/classUsuario.php';

$usuario = $_SESSION['id'];

$user = new Usuario();

$info = $user->view($usuario);

if(isset($_POST['edit'])){
    $user->setNome($_POST['nome']);
    $user->setAltura(floatval(str_replace(',', '.', $_POST['altura'])));
    $user->setPeso($_POST['peso']);
    $user->setData($_POST['data']);  
    $user->setEmail($_POST['email']);
    $user->setSenha($_POST['senha']);
    $user->setGenero($_POST['genero']);
    $user->setIs_admin($_POST['is_admin']);
  if($user->edit() == 1){
    
    echo "Editado com sucesso!";
  }else{
    
    echo "Erro ao editar, tente novamente!";
  }
}


?>

<body>
    <main class="sistema">


        <!--Começa navbar -->
        <nav class="navbar nav-nutristable navbar-expand-md justify-content-md-center justify-content-start my-5">
            <button class="navbar-toggler ml-3" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="nav-link" title="Página inicial" href="index.php"><i
                    class="fas fa-angle-left nav-opaco mr-1 fa-2x"></i></a>
            <div class="navbar-collapse collapse justify-content-between align-items-center w-100"
                id="collapsingNavbar2">
                <ul class="navbar-nav mx-auto text-md-center text-left">
                    <a class="nav-link" href="biblioteca.php">
                        <li class="nav-item d-flex flex-column mx-3">
                            <i class="fas fa-list-ul fa-lg pb-3"></i>
                            Biblioteca
                        </li>
                    </a>
                    <a class="nav-link" href="calculadora.php">
                        <li class="nav-item d-flex flex-column mx-3">
                            <i class="fas fa-calculator fa-lg pb-3"></i>
                            Calcular IMC
                        </li>
                    </a>
                    <a class="nav-link" href="diario.php">
                        <li class="nav-item d-flex flex-column mx-3">
                            <i class="fas fa-book fa-lg pb-3"></i>
                            Meu Diário
                        </li>
                    </a>
                    <a class="nav-link  navbar-is-selected" href="perfil.php">
                        <li class="nav-item d-flex flex-column mx-3">
                            <i class="fas fa-user-circle fa-lg pb-3"></i></i>
                            Perfil
                        </li>
                    </a>

                </ul>
                <ul class="nav flex-row justify-content-md-center justify-content-start flex-nowrap">
                    <li class="nav-item">
                        <a href="sair.php" title="Sair" class="nav-link nav-opaco">
                            <i class="fas fa-sign-out-alt mr-3 fa-lg"></i>
                        </a>

                    </li>

                </ul>
            </div>
        </nav>
        <!--Termina navbar -->


        <section class="calculadora">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-left mt-5">

                        <h1>Minhas informações</h1>

                    </div>
                </div>
            </div>
            <form method="post" action="perfil.php" class="login" id='login'>
                <div class="container px-5 px-md-0">
                    <div class="row mt-5" id="content-calc">



                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="imc-row">
                                    <div class="number d-flex align-items-center justify-content-center">
                                        <span>1</span>
                                    </div>
                                    <h2 class="subtitulo">Meu e-mail:</h2>
                                    <div class="input-group">
                                        <input value="<?php echo $info->email; ?>"id="nome" name="email" type="email" class="form-control" aria-label="Qual é o seu nome?" min="1" required>
                                        
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
                                    <h2 class="subtitulo">Meu nome:</h2>
                                    <div class="input-group">
                                        <input value="<?php echo $info->nome; ?>" id="nome" type="text" name="nome" class="form-control"
                                            aria-label="Qual é o seu nome?" min="1" required>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="number d-flex align-items-center justify-content-center">
                                    <span>3</span>
                                </div>

                                <h2 class="subtitulo">Me identifico como:</h2>

                                <div class="gender-box d-flex flex-row justify-content-center">
                                    <input class="form-check-input gender-input female" type="radio" name="genero"
                                        id="female" value="f" <?php if($info->genero == 'f'){ echo 'checked';} ?>>
                                    <label class="form-check-label gender-label" for="female" data-html="true"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="Mocinha <i>cis</i> ou<br/>Mocinha <i>trans</i>">
                                        <i class="fas fa-female mr-2"></i>
                                    </label>

                                    <input class="form-check-input gender-input male" type="radio" name="genero"
                                        id="male" value="m" <?php if($info->genero == 'm'){ echo 'checked';} ?>>
                                    <label class="form-check-label gender-label" for="male" data-html="true"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="Mocinho <i>cis</i> ou<br/>Mocinho <i>trans</i>">
                                        <i class="fas fa-male mr-2"></i>
                                    </label>

                                    <input class="form-check-input gender-input bin" type="radio" name="genero"
                                        id="bin" value="n" <?php if($info->genero == 'n'){ echo 'checked';} ?>>
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
                                        <span>4</span>
                                    </div>
                                    <h2 class="subtitulo">Quer alterar sua senha?</h2>
                                    <div class="input-group">
                                        <input id="nome" name="senha" type="password" class="form-control"
                                            aria-label="Qual é o seu nome?" placeholder="Digite a nova senha." min="1" required>
                                        
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
                                    <h2 class="subtitulo">Dia em que nasci:</h2>
                                    <div class="input-group">
                                        <input name="data" value="<?php echo $info->data_nasc; ?>" type="date" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="imc-card-white d-flex justify-content-center flex-column">
                                <div class="imc-row">
                                    <div class="number d-flex align-items-center justify-content-center">
                                        <span>6</span>
                                    </div>
                                    <h2 class="subtitulo">Minha altura:</h2>
                                    <div class="input-group">
                                        <input id="altura" value="<?php echo $info->altura; ?>" type="number" class="form-control"
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
                                        <span>7</span>
                                    </div>
                                    <h2 class="subtitulo">Meu peso:</h2>
                                    <div class="input-group">
                                        <input name="peso" id="peso" value="<?php echo $info->peso; ?>" type="number" class="form-control"
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
                                <input required="required" type="hidden" name="edit" value="insert">
                                <button id="btn-calcula" type="submit" class="btn btn-secundario btn-cta">Salvar informações
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