<?php
require_once 'head.php';

require_once 'assets/php/classUsuario.php';

$user = new Usuario();

if (isset($_POST['action'])){
  $user->setNome($_POST['nome']);
  $user->setAltura($_POST['altura']);
  $user->setPeso($_POST['peso']);
  $user->setData($_POST['data']);  
  $user->setEmail($_POST['email']);
  $user->setSenha($_POST['senha']);
  $user->setGenero($_POST['genero']);
  $user->setIs_admin($_POST['isadmin']);
  if($user->insert() == 1){
      $result = "Vamos a calculadora!";
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
            <form method="get" action="insertUser.php" class="login" id='login'>
                <div class="container px-5 px-md-0">
                    <div class="row mt-5" id="content-calc">
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
                                        title="Mocinha ou<br/>Mocinha <i>trans</i>">
                                        <i class="fas fa-female mr-2"></i>
                                    </label>

                                    <input class="form-check-input gender-input male" type="radio" name="genero"
                                        id="male" value="m" required>
                                    <label class="form-check-label gender-label" for="male" data-html="true"
                                        data-toggle="tooltip" data-placement="bottom"
                                        title="Mocinho ou<br/>Mocinho <i>trans</i>">
                                        <i class="fas fa-male mr-2"></i>
                                    </label>
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
                                        <input type="date" class="form-control" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">anos</span>
                                        </div>
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
                                            aria-label="Qual a sua altura?" step="1" min="1" max="300" required>
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
                                        <input id="peso" type="number" class="form-control"
                                            aria-label="Qual o seu peso?" min="1" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fim da row -->
                    </div>
                    <div class="row">
                        <div class="col-12 text-center my-5">
                            <button id="btn-calcula" href="#" class="btn btn-secundario btn-cta">Calcular
                                <i class="fas fa-angle-right ml-2"></i>
                            </button>
                        </div>
                    </div>

            </form>

            <!-- Fim do container -->
            </div>
            <!--Termina section calculadora -->
        </section>

        <section class="mais-info my-5">
            <div class="container text-left">
                <h1 class="my-5">Mais informações</h1>
                <div class="row">

                    <div class="col-12 col-md-4">

                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="o-que-e-list"
                                data-toggle="list" href="#o-que-e" role="tab" aria-controls="home">O que é IMC?</a>
                            <a class="list-group-item list-group-item-action" id="como-calcular-list" data-toggle="list"
                                href="#como-calcular" role="tab" aria-controls="profile">Como calcular o IMC</a>
                            <a class="list-group-item list-group-item-action" id="fatores-list" data-toggle="list"
                                href="#fatores" role="tab" aria-controls="messages">Fatores que influenciam o IMC</a>
                            <a class="list-group-item list-group-item-action" id="criticas-list" data-toggle="list"
                                href="#criticas" role="tab" aria-controls="settings">Críticas ao IMC</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 mt-5 mt-md-0">
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="o-que-e" role="tabpanel"
                                aria-labelledby="o-que-e-list">
                                IMC, ou Índice de Massa Corporal, é uma medida que leva em consideração o peso corporal
                                em
                                relação à altura. A medida
                                pode ser adotada como referência em qualquer idade, portanto, é possível calcular tanto
                                o
                                IMC
                                masculino e feminino para
                                adultos, quanto realizar o cálculo de IMC infantil. Esta medida classifica as pessoas em
                                abaixo
                                do peso, peso normal ou
                                sobrepeso e assim determina se o indivíduo está com peso inadequado ou não saudável para
                                sua
                                altura.
                                <br><br>
                                Calcular o IMC para
                                mulheres e homens também é útil para estabelecer objetivos de atividades físicas. O
                                cálculo
                                de
                                IMC tem um papel
                                importante no acompanhamento do peso e é hoje em dia o método preferido dentre outros
                                indicadores de saúde.
                            </div>
                            <div class="tab-pane fade" id="como-calcular" role="tabpanel"
                                aria-labelledby="como-calcular-list">
                                Para calcular o IMC feminino ou masculino, a forma mais prática é utilizar uma
                                calculadora
                                de
                                IMC. Nossa Calculadora de
                                IMC grátis utiliza uma fórmula cientificamente reconhecida para fornecer resultados
                                fáceis de interpretar que lhe
                                ajudam a entender melhor o seu IMC atual e seu peso ideal. A fórmula que utilizamos para
                                como
                                calcular o IMC é m/l². Em
                                outras palavras, nós tomamos seu peso atual em quilos e dividimos por sua altura em
                                metros
                                ao
                                quadrado.
                                <br><br>
                                Além disto,
                                nossa calculadora de IMC leva em consideração sua idade e seu gênero. Assim, a
                                ferramenta
                                ideal
                                para calcular o IMC
                                infantil, de adolescentes, homens e mulheres. A partir destas variáveis, nós fazemos o
                                cálculo
                                do seu IMC e apresentamos
                                os resultados através de uma análise gráfica.</div>
                            <div class="tab-pane fade" id="fatores" role="tabpanel" aria-labelledby="fatores-list">
                                Os fatores mencionados que incluímos na nosso cálculo de IMC são essenciais para
                                determinar
                                o
                                índice de massa corporal.
                                Idade e gênero, por exemplo, são cruciais para calcular valores confiáveis. Visto que os
                                homens
                                tendem a ter uma
                                porcentagem muscular maior que as mulheres, o resultado do cálculo de IMC masculino é
                                geralmente
                                maior do que o do IMC
                                feminino. Os valores de IMC saudável também são consideravelmente maiores para adultos
                                do
                                que o
                                IMC infantil ou de
                                adolescentes.
                                <br><br>
                                Outros fatores que influenciam na hora de calcular o IMC compreendem atividade
                                diária, tipo de corpo e até
                                amputações. Há, de fato, uma significativa diferença se alguém tem uma porcentagem alta
                                de
                                gordura ou de músculo no
                                corpo, já que a gordura é geralmente a principal causa de obesidade. Esta distinção,
                                dentre
                                outras, pode ser considerada
                                ao calcular o IMC. No entanto, para garantir que nossa calculadora de IMC seja o mais
                                simples
                                possível de usar, nós
                                optamos por deixar esta variável fora de nosso cálculo.</div>

                            <div class="tab-pane fade" id="criticas" role="tabpanel" aria-labelledby="criticas-list">
                                Existem críticas quanto ao cálculo de IMC. Um dos questionamentos comuns é se um valor
                                de
                                IMC
                                acima de 24 indica
                                automaticamente risco de problemas de saúde. Em virtude disto, alguns preferem focar na
                                completa
                                composição do peso
                                corporal. Isto se aplica especialmente a atletas, os quais normalmente possuem massa
                                muscular
                                elevada, e
                                consequentemente um IMC mais alto, neste caso não indicando problemas de saúde. Mesmo a
                                classificação de indivíduos que
                                possuem porcentagem elevada de gordura corporal pode variar, dependendo do caso.
                                <br><br>
                                Um estudo
                                da
                                Clínica Médica da
                                Universidade Ludwig Maximilian em Munique, por exemplo, diferencia entre gordura
                                abdominal e
                                gordura nos quadris e
                                coxas. A gordura concentrada no abdômen pode aumentar o risco de doenças
                                cardiovasculares e
                                derrame. Para simplificar o
                                uso da nossa calculadora, nós não consideramos estes fatores ao calcular o seu IMC.
                            </div>



                        </div>
                    </div>
                </div>
                <!-- Fim da section mais-info -->
            </div>
            <!-- Fim da section mais-info -->
        </section>


        <!-- Fim da main sistema -->
    </main>
    <?php
require_once 'footer.php';
?>