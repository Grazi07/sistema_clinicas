<div class="content-wrapper">
      <section class="content-header">
            <h1>Cadastro de Paciente</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li>Paciente</li>
                  <li class="active">Cadastro de Paciente</li>
            </ol>
      </section>

      <section class="content">
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="box box-primary">
<!--                              <div class="box-header with-border">
                                    <h3 class="box-title">Informe os dados do Produtos</h3>
                              </div>-->
                              <?php
                              if (isset($msg)) {
                                    echo '<div class="box-header with-border">' . $msg . '</div>';
                              }
                              ?>
                              <div class="box-body">
                                    <form role="form" action="cadastra_paciente" method="post"
                                          class="form-horizontal">
                                          <div class="box-body">
                                               <div class="form-group">
                                                      <label for="nome" class="col-sm-2 control-label">Nome</label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nome" name="nome"
                                                                   placeholder="Informe o nome do paciente" value="<?php echo set_value('nome'); ?>">
                                                      </div>
                                                </div>
                                               
                                              <div class="form-group">
                                                <label for="sexo" class="col-sm-2 control-label">

                                                  <span>Sexo: </span>

                                                </label>
                                                  <div class="col-sm-10">
                                                    <input type="radio" name="sexo" id="sFem" value="2" /><label>&nbsp;&nbsp;Feminino</label>
                                                    &nbsp;&nbsp;&nbsp;
                                                    
                                                    <input type="radio" name="sexo" id="sMasc" value="1" /><label>&nbsp;&nbsp;Masculino&nbsp;</label>
                                                    &nbsp;&nbsp;&nbsp;
                                                    
                                                    <input type="radio" name="sexo" id="nao" value="0" /><label>&nbsp;&nbsp;Não declarar</label>
                                                  </div>

                                                
                                              </div>

                                                <div class="form-group">
                                                      <label for="idade" class="col-sm-2 control-label">Idade</label>

                                                      <div class="col-sm-10">
                                                            <input type="number" class="form-control" id="idade"
                                                                   name="idade"
                                                                   placeholder="Informe a idade" value="<?php echo set_value('idade'); ?>">
                                                      </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                      <label for="email" class="col-sm-2 control-label">Email</label>

                                                      <div class="col-sm-10">
                                                            <input type="email" class="form-control" id="email"
                                                                   name="email"
                                                                   placeholder="Informe o email" value="<?php echo set_value('email'); ?>">
                                                      </div>
                                                </div>
                                              
                                                <div class="form-group">
                                                      <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                                      <div class="col-xs-12 col-sm-3 col-lg-3">
                                                            <button type="submit" class="btn btn-primary"
                                                                    style="width: 100%">Cadastrar Paciente</button>
                                                      </div>
                                                </div>
                                          </div>
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
</div>

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
      function geracodigobarra(){
          var codigoean = $('#codigoean').val();
          var url = base_url + "home/geracodigobarras";
            $.post(url, {
                  codigoean: codigoean
            }, function (data) {
                  $('#codigobarra').html('<img src='+data+'>');
            });
      }
</script>
