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
                        <h1 class="w-50">Total consumido</h1>

                        <div class="card horario total-consumido my-5">
                            <div class="card-header text-center">
                                <h2 class="py-4 m-0">Total consumido</h2>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            Total de calorias
                                        </div>
                                        <div class="col">
                                            Total de proteínas
                                        </div>
                                        <div class="col">
                                            Total de lipídios
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="card horario my-5">
                    <div class="card-header">
                        <button type="button" title="Adicionar alimento" class="add-alimento" data-toggle="modal"
                            data-target="#modal-add-alimento" data-add-alimento="Café da manhã">
                            <i class="fas fa-plus" alt="Adicionar alimento consumido"></i>
                        </button>
                        <h2 class="py-4 m-0">Café da manhã</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Alimento</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Calorias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Granola</td>
                                    <td>1 colher</td>
                                    <td>300 Kcal</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Leite</td>
                                    <td>1 copo</td>
                                    <td>100 kcal</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-muted small">
                        Nenhum alimento foi adicionado ainda
                    </div>
                </div>



                <div class="card horario my-5">
                    <div class="card-header">
                        <button type="button" title="Adicionar alimento" class="add-alimento" data-toggle="modal"
                            data-target="#modal-add-alimento" data-add-alimento="Almoço">
                            <i class="fas fa-plus" alt="Adicionar alimento consumido"></i>
                        </button>
                        <h2 class="py-4 m-0">Almoço</h2>
                    </div>
                    <div class="card-body">
                        Arroz
                    </div>
                    <div class="card-footer text-muted small">
                        Nenhum alimento foi adicionado ainda
                    </div>
                </div>



                <div class="card horario my-5">
                    <div class="card-header">
                        <button type="button" title="Adicionar alimento" class="add-alimento" data-toggle="modal"
                            data-target="#modal-add-alimento" data-add-alimento="Jantar">
                            <i class="fas fa-plus" alt="Adicionar alimento consumido"></i>
                        </button>
                        <h2 class="py-4 m-0">Jantar</h2>
                    </div>
                    <div class="card-body">
                        Ovos mexidos
                    </div>
                    <div class="card-footer text-muted small">
                        Nenhum alimento foi adicionado ainda
                    </div>
                </div>



                <div class="card horario my-5">
                    <div class="card-header">
                        <button type="button" title="Adicionar alimento" class="add-alimento" data-toggle="modal"
                            data-target="#modal-add-alimento" data-add-alimento="Lanche/Outro">
                            <i class="fas fa-plus" alt="Adicionar alimento consumido"></i>
                        </button>
                        <h2 class="py-4 m-0">Lanches/Outros</h2>
                    </div>
                    <div class="card-body">
                        Chocolate
                    </div>
                    <div class="card-footer text-muted small">
                        Nenhum alimento foi adicionado ainda
                    </div>
                </div>



                <!-- Modal para add alimentos -->
                <div class="modal fade" id="modal-add-alimento" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header px-3">
                                <h3 class="modal-title" id="exampleModalLabel">Horário do consumo</h3>
                            </div>
                            <div class="modal-body p-5">
                                <form>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Horário do consumo:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Qual alimento</label>
                                        <small>Inserir pesquisa de alimento aqui</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Qual a quantidade</label>
                                        <small>Inserir o select de quantidade aqui</small>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primario btn-cancelar mr-3"
                                    data-dismiss="modal">Fechar</button>
                                <button type="button" class="btn btn-secundario">Adicionar</button>
                            </div>
                        </div>
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