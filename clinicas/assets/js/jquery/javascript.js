 $(function(){
  var base_url = "<?php echo base_url() ?> ";
  $("#pesquisa").keyup(function()){
    var pesquisa = $(this).val();

    if(pesquisa != ''){
      var dados = {
      palavra : pesquisa
    }
    $.post(base_url + "Principal/retorna_pacientes", dados, function(retorna){
        $(".resultado").html(retorna);
    });
  }else{
    $(".resultado").html('');
  }
 });
});




 