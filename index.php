<?php
require_once 'head.php';
?>


<body class="home">

  <div class="bg-formas">
    <div class="bg-formas__1">
    </div>
    <div class="bg-formas__2">
    </div>
    <div class="bg-formas__3 d-none d-lg-block">
    </div>
  </div>


  <section class="hero d-flex flex-column h-100 ">
    <!--Começa navbar -->
    <nav class="navbar nav-nutristable mt-5">
      <a class="navbar-brand" title="Página Inicial" href="#">
        <svg class="logo logo-dark" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
          style="enable-background:new 0 0 512 512;" xml:space="preserve">
          <g>
            <g>
              <path class="st0" d="M506.1,222l-87.2-98.7c-1.9-2.1-4.6-3.4-7.5-3.4H100.6c-2.9,0-5.6,1.2-7.5,3.4L5.9,222
            			c-2.6,2.9-3.2,7.1-1.6,10.7c0.6,1.4,1.5,2.5,2.6,3.5c0,0,0,0,0.1,0.1l241.6,272.4c1.9,2.1,4.6,3.4,7.5,3.4c2.9,0,5.6-1.2,7.5-3.4
            			l241.6-272.4c0,0,0,0,0.1-0.1c1.1-0.9,2-2.1,2.6-3.5C509.4,229.1,508.7,224.9,506.1,222z M393.7,139.9l-44.4,71.6l-71.2-71.6
            			H393.7z M328.1,218.6H183.9l72.1-72.5L328.1,218.6z M233.9,139.9l-71.2,71.6l-44.4-71.6H233.9z M99,146.8l44.5,71.8h-108L99,146.8
            			z M35.7,238.6h118.2l81.6,225.3L35.7,238.6z M276.8,463.4l57-154.4c1.9-5.2-0.7-10.9-5.9-12.8c-5.2-1.9-10.9,0.7-12.8,5.9
            			l-59,159.8l-80.9-223.3h301.1L276.8,463.4z M368.5,218.6l44.5-71.8l63.5,71.8L368.5,218.6L368.5,218.6z" />
            </g>
          </g>
          <g>
            <g>
              <path class="st0"
                d="M256,0c-5.5,0-10,4.5-10,10v51.5c0,5.5,4.5,10,10,10s10-4.5,10-10V10C266,4.5,261.5,0,256,0z" />
            </g>
          </g>
          <g>
            <g>
              <path class="st0" d="M347.1,39.5c-3.9-3.9-10.2-3.9-14.1,0l-36.4,36.4c-3.9,3.9-3.9,10.2,0,14.1c2,2,4.5,2.9,7.1,2.9
            			s5.1-1,7.1-2.9l36.4-36.4C351,49.8,351,43.4,347.1,39.5z" />
            </g>
          </g>
          <g>
            <g>
              <path class="st0" d="M213.6,75.9l-36.4-36.4c-3.9-3.9-10.2-3.9-14.1,0c-3.9,3.9-3.9,10.2,0,14.1l36.4,36.4c2,2,4.5,2.9,7.1,2.9
            			s5.1-1,7.1-2.9C217.5,86.2,217.5,79.9,213.6,75.9z" />
            </g>
          </g>
          <g>
            <g>
              <circle class="st0" cx="337.4" cy="268.4" r="10" />
            </g>
          </g>
        </svg>
      </a>

      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link active" href="#">Contato</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre nós</a>
        </li>

      </ul>
    </nav>
    <!-- Termina navbar -->
    <div class="container my-auto">

      <div class="row">
        <div class="col-12 col-md-7  ">
          <div class="hero-texto mt-5">


            <h1 class="mt-5">Nem toda calculadora<br>
              foi feita para contar dinheiro.</h1>
            <p class="w-80">Nossa calculadora de calorias tem um gigantesco banco de dados que vai
              lhe auxiliar no controle dos alimentos consumidos durante o dia!</p>

            <div class="hero-acoes mt-5">
              <a href="login.php" class="btn btn-primario" data-target="#Login-Modal" data-toggle="modal">Fazer
                login</a>
              <a href="InsertUser.php" class="btn btn-secundario ml-3">Criar uma conta</a>
            </div>
          </div>
        </div>
        <div class="col-5 d-none d-md-flex mt-md-5 align-items-center">
          <img src="assets/images/hero-img.svg" class="w-100">
        </div>
      </div>
    </div>


    <!-- Modal do login -->
    <div class="modal fade" id="Login-Modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="TituloModalCentralizado">Título do modal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary">Salvar mudanças</button>
          </div>
        </div>
      </div>
    </div>


  </section>





  <?php
require_once 'footer.php';
?>