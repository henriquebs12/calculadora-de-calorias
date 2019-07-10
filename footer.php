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
<script src="assets/js/jquery-3.4.1.min.js"></script>
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

<script>
    


        $('#pesquisa').on('keyup', function(){
            $('#conteudo').html('');
            if(($('#pesquisa').val()).length >= 2){
                $.getJSON('filtros.php?item='+$('#pesquisa').val(), function(data){
                    console.log(data);
                    if(data!=null)
                    data.forEach(function(element){
                        $('#conteudo').append(`
                                <tr>
                                    <th> `+element.nome+` </th>
                                    <th> `+element.porcao +`</th>
                                    <th> `+element.valor_cal +`</th>
                                    <th> `+element.quantidade_proteina +`</th>
                                    <th> `+element.quantidade_carboidrato +`</th>
                                    <th> `+element.teor_limpidico +`</th>
                                    <th> `+element.teor_fibroso +`</th>
                                    <?php if($isAdmin){ ?>
                                    <th><button class="btn btn-primary" value="`+element.idAlimento+`">Editar</button><button class="btn btn-danger" style="margin-left:10px;" value="`+element.idAlimento+`">Apagar</button></th>
                                <?php }?>
                                </tr>
                            `);
                    });
                });
            }else{
                $.getJSON('getAlimentos.php', function(data){
                    console.log(data);
                    if(data!=null)
                    data.forEach(function(element){
                        $('#conteudo').append(`
                                <tr>
                                    <th> `+element.nome+` </th>
                                    <th> `+element.porcao +`</th>
                                    <th> `+element.valor_cal +`</th>
                                    <th> `+element.quantidade_proteina +`</th>
                                    <th> `+element.quantidade_carboidrato +`</th>
                                    <th> `+element.teor_limpidico +`</th>
                                    <th> `+element.teor_fibroso +`</th>
                                    <?php if($isAdmin){ ?>
                                    <th><button class="btn btn-primary" value="`+element.idAlimento+`">Editar</button><button class="btn btn-danger" style="margin-left:10px;" value="`+element.idAlimento+`">Apagar</button></th>
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