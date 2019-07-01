<!-- Footer -->
<footer>
    <!-- Copyright -->
    <div class="footer-copyright text-center text-md-left py-4 px-5">Desenvolvido com <i class="fas fa-heart"></i> por
        um
        bando de geeks.
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->


<!-- Inlui scripts do Boostrap: jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

<!-- Inicializa tooltips -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<!-- Inicializa datable -->
<script>
    $(document).ready(function () {
        $('#tabela-alimentos').DataTable();
    });
</script>

<script>
    $(document).ready(function () {
        $('#btn-calcula').click(function () {
            var resultado = 0;
            let altura = $('#altura').val();
            altura = altura / 100;
            let peso = $('#peso').val();
            resultado = (peso) / (altura * altura);
            $('#content-calc').hide("slow", function () {
                $('#content-calc').html('');
                $('#content-calc').append('<div class="col-12 col-md-6 col-lg-5 col-lg-offset-6"></div><div class="imc-card-white d-flex justify-content-center flex-column"><div class="number d-flex align-items-center justify-content-center"><span>5</span></div><h2 class="subtitulo">Resultado<br> Seu IMC é: ' + resultado.toFixed(2) + '</h2></div></div>');
                $('#btn-calcula').hide();
                $('#content-calc').show("slow");
            });
        });


        $('#pesquisa').on('keyup', function(){
            $('#conteudo').html('');
            if($('#pesquisa').val() >= 2){
                console.log($('#pesquisa').val());
            }else{
                $.getJSON('getAlimentos.php', function(data){
                    console.log(data);
                    if(data!=null)
                    data.forEach(function(element){
                        $('#conteudo').append(`
                                <tr>
                                    <th><?= $alimento['nome'] ?></th>
                                    <th><?= $alimento['porcao'] . $unidade;?></th>
                                    <th><?= $alimento['valor_cal'] ?></th>
                                    <th><?= $alimento['quantidade_proteina'] ?></th>
                                    <th><?= $alimento['quantidade_carboidrato'] ?></th>
                                    <th><?= $alimento['teor_limpidico'] ?></th>
                                    <th><?= $alimento['teor_fibroso'] ?></th>
                                    <?php if($isAdmin){ ?>
                                    <th><button>Editar</button><button>Apagar</button></th>
                                <?php }?>
                                </tr>
                            `);
                    });
                });
            }
        });
    });
</script>

</body>

</html>