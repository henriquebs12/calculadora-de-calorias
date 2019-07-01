<?php
require_once 'assets/php/classAlimento.php';
require_once 'assets/php/classUsuario.php';
session_start();
$id = (isset($_SESSION['id'])) ? $_SESSION['id'] : false;
if ($id) {
   $isAdmin = (new Usuario())->isAdmin($id);
}
$alimentos = (new Alimento())->select();

require_once 'head.php';
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
                    <a class="nav-link navbar-is-selected" href="biblioteca.php">
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

                </ul>
                <ul class="nav flex-row justify-content-md-center justify-content-start flex-nowrap">
                    <li class="nav-item"><a class="nav-link nav-opaco" target="_blank"
                            href="https://www.facebook.com/pleasecometobr"><i
                                class="fab fa-facebook-f mr-3 fa-lg"></i></a>
                    </li>
                    <li class="nav-item"><a class="nav-link nav-opaco" target="_blank"
                            href="https://www.facebook.com/pleasecometobr"><i class="fab fa-twitter fa-lg mr-3"></i></a>
                    </li>
                </ul>
            </div>
        </nav>

        <section class="biblioteca">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-5 text-left">
                        <h1 class="w-50 mb-5">Todos os alimentos cadastrados</h1>

                        <table id="tabela-alimentos" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Alimento</th>
                                    <th>Porção</th>
                                    <th>Calorias</th>
                                    <th>Proteinas</th>
                                    <!-- Acima vai o botão de editar e excluir, visível apenas para o admin -->
                                    <th>Carboidratos</th>
                                    <th>Teor Limpidico</th>
                                    <th>Teor Fibroso</th>
                                </tr>
                            </thead>
                            <tfoot>                                
                                <?php 
                                if($alimentos != null){
                                foreach ($alimentos as $alimento) : 
                                    $unidade = (strtolower($alimento['Categoria']) == 'solido') ? ' gr': ' ml' ;
                                ?>
                                <tr>
                                    <th><?= $alimento['nome'] ?></th>
                                    <th><?= $alimento['porcao'] . $unidade;?></th>
                                    <th><?= $alimento['valor_cal'] ?></th>
                                    <th><?= $alimento['quantidade_proteina'] ?></th>
                                    <th><?= $alimento['quantidade_carboidrato'] ?></th>
                                    <th><?= $alimento['teor_limpidico'] ?></th>
                                    <th><?= $alimento['teor_fibroso'] ?></th>
                                </tr>
                            <?php endforeach; 
                                }
                            ?>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>

            <!-- Fim da section biblioteca -->
        </section>
        <!-- Fim da main sistema -->
    </main>

    <?php
require_once 'footer.php';
?>