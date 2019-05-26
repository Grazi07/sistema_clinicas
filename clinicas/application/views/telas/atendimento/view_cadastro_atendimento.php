<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery/javascript.js')?>"></script>
<link rel = "stylesheet" href = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<div class="content-wrapper">
      <section class="content-header">
            <h1>Agenda</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li>Atendimento</li>s
                  <li class="active">Atendimento</li>
            </ol>
      </section>
      

      <section class="content">
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="box box-primary">
                              <div class="box-header with-border">
                                    <h3 class="box-title">Informe dados do atendimento</h3>
                              </div>
                              <?php
                              if (isset($msg)) {
                                    echo '<div class="box-header with-border">' . $msg . '</div>';
                              }
                              ?>
                              <div class="box-body">
                                    <form role="form" action="" method="post"
                                          class="form-horizontal">
                                          <div class="box-body">
                                                <div class="form-group">
  
                                                      <form method="POST" action="">
                                                        <label for="paciente" class="col-sm-2 control-label">Paciente</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"  name="pesquisa" id="pesquisa" 
                                                                   placeholder="Informe o paciente" value="">
                                                                  <input type="submit" name="enviar" value="Pesquisar">
                                                      </div>
                                                     
                                                      </form>

                                                      <ul class="resultado">
                                                        
                                                      </ul>

                                                </div>
                                                
                                                <div class="form-group">
                                                      <label for="custo" class="col-sm-2 control-label">Status</label>

                                                      <div class="col-sm-10">
                                                            <select class="form-control" id="medicos" name="medicos" onchange='busca_medicos($(this).val())'>
                                                              
                                                                <option>Realizado</option>
                                                                <option>Cancelado</option>
                                                                <option>Em andamento</option>
                                                            </select>
                                                      </div>
                                                </div>
                                               

                                               <div class="form-group">
                                                      <label for="medicos" class="col-sm-2 control-label">Médico</label>
                                                       <div class="col-sm-10">
                                                            <select class="form-control" id="medicos" name="medicos" onchange='busca_medicos($(this).val())'>
                                                                
                                                            </select>
                                                      </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                <label for="datainicio" class="col-sm-2 control-label">Data do Atendimento</label>

                                                      <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="datainicio"
                                                                   name="datainicio" placeholder="Informe a data inicio" value="<?php echo set_value('datainicio'); ?>">
                                                      </div>
                                                </div>
                                                                                          </div>
                                          <div class="form-group">
                                                <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                                <div class="col-xs-12 col-sm-3 col-lg-3">
                                                      <button type="submit" class="btn btn-primary"
                                                              style="width: 100%">Salvar Atendimento</button>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"> </script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


       <!-- <script>
          var base_url = "<?php //echo base_url() ?> ";
            $(function(){
                $("#pesquisa").autocomplete({
                    source: 'index.php/Principal/retorna_pacientes'
                });
            });
        </script> -->
<script src = "//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
     
    var base_url = "<?php echo base_url() ?> ";
      
      $(function(){
        $('#medicos').change(function()){
        $.post(base_url + "index.php/Principal/retorna_medicos", {
          
        }, function(data){
          $('#medicos').html(data);
          $('#medicos').removeAttr('disabled');
        });
      });
      });
    

































