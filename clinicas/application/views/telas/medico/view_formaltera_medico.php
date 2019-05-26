<div class="content-wrapper">
      <section class="content-header">
            <h1>Alterção de Informações do Médico</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li>Médico</li>
                  <li class="active">Alterção de Informações do Médico</li>
            </ol>
      </section>

      <section class="content">
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="box box-primary">
<!--                              <div class="box-header with-border">
                                    <h3 class="box-title">Altere as informações do usu&aacute;rio aqui!</h3>
                              </div>-->
                              
                              <?php
                              if (isset($msg)) {
                                    echo '<div class="box-header with-border">' . $msg . '</div>';
                              }
                              ?>
                              <div class="box-body">
                                    <form role="form" action="atualiza_medico" method="post"
                                          class="form-horizontal">
                                          <div class="box-body">
                                                <?php
                                                $nome = '';
                                                $crm = '';
                                                $email = '';
                                                $especialidade = '';
                                                if (isset($resultado_medico_especifico)) {
                                                      foreach ($resultado_medico_especifico as $med) {
                                                            $id = $med->cod_medico;
                                                            $nome = $med->nome;
                                                            $crm = $med->crm;
                                                            $email = $med->email;
                                                            $especialidade = $med->especialidade;
                                                      }
                                                }
                                                ?>
                                                <div class="form-group">
                                                      <label for="nome" class="col-sm-2 control-label">Nome</label>
                                                      <input type="hidden" name="id" id="id" value="<?php echo set_value('id', $id); ?>" readonly="readonly">
                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="nome" name="nome"
                                                                   placeholder="Informe o nome completo do usu�rio" value="<?php echo set_value('nome', $nome); ?>">
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <label for="login" class="col-sm-2 control-label">CRM</label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="crm"
                                                                   name="crm" placeholder="Informe o nome do crm" value="<?php echo set_value('crm', $crm); ?>">
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <label for="email" class="col-sm-2 control-label">E-mail</label>

                                                      <div class="col-sm-10">
                                                            <input type="email" class="form-control" id="email"
                                                                   name="email" placeholder="Informe o e-mail de contato" value="<?php echo set_value('email', $email); ?>">
                                                      </div>
                                                </div>
                                                <div class="form-group">
                                                      <label for="especialidade" class="col-sm-2 control-label">Especialidade</label>

                                                      <div class="col-sm-10">
                                                            <input type="especialidade" class="form-control" id="especialidade"
                                                                   name="especialidade" placeholder="Informe a especialidade" value="<?php echo set_value('especialidade', $especialidade); ?>">
                                                      </div>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                                <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                                <div class="col-xs-12 col-sm-3 col-lg-3">
                                                      <button type="submit" class="btn btn-primary"
                                                              style="width: 100%">Atualizar Médico</button>
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

































