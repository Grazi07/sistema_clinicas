<div class="content-wrapper">
      <section class="content-header">
            <h1>Consulta de Manutenção</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li>Usu&aacute;rios</li>
                  <li class="active">Consulta de Manutenção</li>
            </ol>
      </section>

      <section class="content">
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="box box-primary">
                              <div class="box-header with-border">
                                    <h3 class="box-title">Informe os dados da manutenção</h3>
                              </div>
                              <?php
                              if (isset($msg)) {
                                    echo '<div class="box-header with-border">' . $msg . '</div>';
                              }
                              ?>
                              <div class="box-body">
                                    <form role="form" action="consultamanutencao" method="post"
                                          class="form-horizontal">
                                          <div class="box-body">
                                                <div class="form-group">
                                                      <label for="codManutencao" class="col-sm-2 control-label">Código Manutenção</label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="codManutencao" name="codManutencao"
                                                                   placeholder="Informe o código da manutenção" value="<?php echo set_value('codManutencao'); ?>">
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <label for="codEquipamento" class="col-sm-2 control-label">Código Equipamento</label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="codEquipamento"
                                                                   name="codEquipamento" placeholder="Informe o código do equipamento" value="<?php echo set_value('codEquipamento'); ?>">
                                                      </div>
                                                </div>
                                               
                                          </div>
                                          <div class="form-group">
                                                <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                                <div class="col-xs-12 col-sm-3 col-lg-3">
                                                      <button type="submit" class="btn btn-primary"
                                                              style="width: 100%">Consultar Manutenção</button>
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
            var url = base_url + "Principal/buscausuarioperfil";
            $.post(url, {
                  perfil: perfil
            }, function (data) {
                  $('#resultado').html(data);
            });
      }
</script>

































