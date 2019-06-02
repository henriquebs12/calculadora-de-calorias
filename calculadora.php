<?php
require_once 'head.php';
?>


<body class="sistema">

    <!--Começa navbar -->
    <nav class="navbar nav-nutristable navbar-expand-md justify-content-md-center justify-content-start my-5">
        <button class="navbar-toggler ml-3" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="nav-link" title="Página inicial" href="index.php"><i
                class="fas fa-angle-left nav-opaco mr-1 fa-2x"></i></a>
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
            <ul class="navbar-nav mx-auto text-md-center text-left">
                <a class="nav-link" href="biblioteca.php">
                    <li class="nav-item d-flex flex-column mx-3">
                        <i class="fas fa-list-ul fa-lg pb-3"></i>
                        Biblioteca
                    </li>
                </a>
                <a class="nav-link navbar-is-selected" href="calculadora.php">
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

            </ul>
            <ul class="nav flex-row justify-content-md-center justify-content-start flex-nowrap">
                <li class="nav-item"><a class="nav-link" target="_blank"
                        href="https://www.facebook.com/pleasecometobr"><i class="fab fa-facebook-f mr-3 fa-lg"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link" target="_blank"
                        href="https://www.facebook.com/pleasecometobr"><i class="fab fa-twitter fa-lg mr-3"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="biblioteca">
        <div class="container">
            <div class="row">
                <div class="col-12 text-left mt-5">

                    <h1>Calcule o seu IMC</h1>

                    <div class="imc-main-card d-flex flex-row">
                        <i class="far fa-question-circle mr-3"></i>
                        <div class="imc-row">
                            <h2 class="subtitulo">O que é o IMC?</h2>
                            <p>IMC significa índice de massa corporal. Com ele você não só verifica
                                se o seu
                                peso
                                se classifica
                                numa faixa
                                saudável, como também pode determinar seu IMC ideal.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-5">

                <div class="col-3">
                    <div class="imc-card-white d-flex justify-content-center flex-column">

                        <div class="number d-flex align-items-center justify-content-center">
                            <span>1</span>
                        </div>
                        <h2 class="subtitulo">Como se identifica:</h2>
                        <div class="gender-box d-flex flex-row justify-content-center">


                            <input class="form-check-input gender-input female" type="radio" name="gender-checkobox"
                                id="female" value="f">
                            <label class="form-check-label gender-label" for="female" data-html="true"
                                data-toggle="tooltip" data-placement="bottom"
                                title="Mocinha ou<br/>Mocinha <i>trans</i>">
                                <i class="fas fa-female mr-2"></i>
                            </label>


                            <input class="form-check-input gender-input male" type="radio" name="gender-checkobox"
                                id="male" value="m" required>
                            <label class="form-check-label gender-label" for="male" data-html="true"
                                data-toggle="tooltip" data-placement="bottom"
                                title="Mocinho ou<br/>Mocinho <i>trans</i>">
                                <i class="fas fa-male mr-2"></i>
                            </label>


                        </div>

                    </div>
                </div>

                <div class="col-3">
                    <div class="imc-card-white d-flex justify-content-center flex-column">
                        <div class="imc-row">
                            <div class="number d-flex align-items-center justify-content-center">
                                <span>2</span>
                            </div>
                            <h2 class="subtitulo">Idade:</h2>
                            <div class="input-group">
                                <input type="number" class="form-control" aria-label="Qual a sua idade?" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">anos</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="imc-card-white d-flex justify-content-center flex-column">
                        <div class="imc-row">
                            <div class="number d-flex align-items-center justify-content-center">
                                <span>3</span>
                            </div>
                            <h2 class="subtitulo">Altura:</h2>
                            <div class="input-group">
                                <input type="number" class="form-control" aria-label="Qual a sua altura?" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">cm</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="imc-card-white d-flex justify-content-center flex-column">
                        <div class="imc-row">
                            <div class="number d-flex align-items-center justify-content-center">
                                <span>4</span>
                            </div>
                            <h2 class="subtitulo">Peso:</h2>
                            <div class="input-group">
                                <input type="number" class="form-control" aria-label="Qual o seu peso?" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">kg</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fim da row -->
            </div>

            <div class="row my-5">
                <div class="col-12 text-center">
                    <button href="#" class="btn btn-secundario btn-cta">Calcular<i
                            class="fas fa-angle-right ml-2"></i></button>
                </div>
            </div>
            <!-- Fim do container -->
        </div>

    </section>

    <?php
require_once 'footer.php';
?>