<?php
    require_once 'head.php';
    require_once 'assets/php/classUsuario.php';
    $esc_ali = new Usuario();
    $esc_ali->selecionar(1,1);
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
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
                    <a class="nav-link navbar-is-selected" href="diario.php">
                        <li class="nav-item d-flex flex-column mx-3">
                            <i class="fas fa-book fa-lg pb-3"></i>
                            Meu Diário
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

        <section class="diario">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5 text-left">
                        <h1 class="w-50">Alimentos consumidos</h1>
                    </div>
                </div>
            </div>

            <!-- Fim da section diario -->
        </section>
        <!-- Fim da main sistema -->
    </main>
    <?php
require_once 'footer.php';
?>