<div class="content-wrapper">
      <section class="content-header">
            <h1>Alteração de Paciente</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li>Paciente</li>
                  <li class="active">Alteração de Paciente</li>
            </ol>
      </section>

      <section class="content">
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="box box-primary">
<!--                              <div class="box-header with-border">
                                    <h3 class="box-title">Informe os dados do equipamentos</h3>
                              </div>-->
                              <?php
                              if (isset($msg)) {
                                    echo '<div class="box-header with-border">' . $msg . '</div>';
                              }
                              if((isset($resultado_paciente)) && (!empty($resultado_paciente))){
                                  foreach($resultado_paciente as $paciente){
                              ?>
                              <div class="box-body">
                                    <form role="form" action="altera_paciente" method="post"
                                          class="form-horizontal">
                                          <div class="box-body">
                                              <div class="form-group">
                                                      <label for="cod_paciente" class="col-sm-2 control-label">Código</label>

                                                      <div class="col-sm-10">
                                                          <input type="text" class="form-control" id="equipamentoid" name="equipamentoid" value="<?php echo $paciente->cod_paciente; ?>" readonly="readonly">
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <label for="nome" class="col-sm-2 control-label">Nome</label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nome" name="nome"
                                                                   placeholder="Informe o nome" value="<?php echo $paciente->nome; ?>">
                                                      </div>
                                                </div>
                                                 <div class="form-group">
                                                <label for="sexo" class="col-sm-2 control-label">

                                                  <span>Sexo: </span>

                                                </label>
                                                  <div class="col-sm-10">
                                                    
                                                    <input type="radio" name="fem" id="fem" <?php 
                                                    if($paciente->sexo == "F"){ ?> value="on" <?php } ?>/><label>&nbsp;&nbsp;Feminino</label>

                                                    <input type="radio" name="masc" id="masc" <?php 
                                                    }elseif ($paciente->sexo == "M") { ?>
                                                      value="on" <?php } ?>
                                                     /><label><label>&nbsp;&nbsp;Masculino&nbsp;</label>
                                                     &nbsp;&nbsp;&nbsp;
                                                     

                                                    <input type="radio" name="sexo" id="nao"  <?php }
                                                     else{ ?>
                                                      value="on"
                                                      <?php } ?> /><label>&nbsp;&nbsp;Não declarar</label>                                                  
                                                    
                                                  </div>
                                                
                                              </div>
                                                
                               <div class="form-group">
                                                      <label for="idade" class="col-sm-2 control-label">Idade</label>

                                                      <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="idade"
                                                                   name="idade" placeholder="Informe a idade" value="<?php echo $paciente->idade; ?>">
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <label for="email" class="col-sm-2 control-label">E-mail </label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="email"
                                                                   name="email" placeholder="Informe o email" value="<?php echo $paciente->email; ?>">
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                                      <div class="col-xs-12 col-sm-3 col-lg-3">
                                                            <button type="submit" class="btn btn-primary"
                                                                    style="width: 100%">Atualizar Paciente</button>
                                                      </div>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                                <?php
                                  }
                              }
                              ?>
                        </div>
                  </div>
            </div>
      </section>
</div>

<script src="../assets/js/jquery/jquery-2.2.3.min.js"></script>
<script>
      $(document).on('click', function(){  
           var employee_id6 = $(this).attr("Id");
           var lis = $("#Estado").val();
           $.ajax({  
                 
                success:function(data){
                  var teste = data.Estado;
                     $('#data6').val(data.data6);
                     $('#Colaborador6').val(data.Colaborador6); 
                     $('#Observacao6').val(data.Observacao6);
                     if(lis == teste){
                     $('#Estado').prop('checked' , true);
                     }else{ 
                     $('#Estado1').prop('checked' ,true);
                     } 
                     $('#Conclusao').val(data.Conclusao);
                     $('#employee_id6').val(data.Id6);
                     $('#insert6').val("Gravar");                    
                     $('#exampleModal6').modal('show'); 

                }  
           });  
      });
</script>

<script src="../assets/js/jquery/jquery-2.2.3.min.js"></script>
<script>
      var base_url = '<?php echo base_url() ?>';
      $(document).ready(function () {

      });
      function buscaInfo(perfil) {
            var perfil = perfil;
            var url = base_url + "home/buscausuarioperfil";
            $.post(url, {
                  perfil: perfil
            }, function (data) {
                  $('#resultado').html(data);
            });
      }
</script>
