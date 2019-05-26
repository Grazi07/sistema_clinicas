<div class="content-wrapper">
      <section class="content-header">
            <h1>Alterção de Informações de Manutenção</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li>Manutenção</li>
                  <li class="active">Alterção de Informações de Manutenção</li>
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
                                    <form role="form" action="atualizamanutencao" method="post"
                                          class="form-horizontal">
                                          <div class="box-body">
                                                <?php
                                                $fornecedor = '';
                                                $custo = '';
                                                $garantia = '';
                                                foreach ($resultadoEquipamento as $equi) {
                                                       $descricao = $equi->descricao;
                                                }
                                                if (isset($resultadomanutencao)) {
                                                      foreach ($resultadomanutencao as $manu) {
                                                            $id = $manu->codManutencao;
                                                            $fornecedor = $manu->fornecedor;
                                                            $custo = $manu->custo;
                                                          
                                                            $garantia = $manu->garantiaFornecedor;
                                                            $datainicio = $manu->dataInicio;
                                                            $datafinal = $manu->dataFinal;
                                                      }
                                                }
                                                ?>
                                                        <div class="form-group">
                                                      <label for="codManutencao" class="col-sm-2 control-label">Código Fornecedor</label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="codManutencao" name="codManutencao"
                                                                   placeholder="Informe o fornecedor" value="<?php echo set_value('codManutencao', $id); ?>" readonly="readonly">
                                                      </div>

                                                </div>

                                                  <div class="form-group">
                                                      <label for="fornecedor" class="col-sm-2 control-label">Fornecedor</label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="fornecedor" name="fornecedor"
                                                                   placeholder="Informe o fornecedor" value="<?php echo set_value('fornecedor', $fornecedor); ?>">
                                                      </div>

                                                </div>
                                                <div class="form-group">
                                                      <label for="custo" class="col-sm-2 control-label">Custo (R$)</label>

                                                      <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="custo"
                                                                   name="custo" placeholder="Informe o custo " value="<?php echo set_value('custo', $custo); ?>">
                                                      </div>
                                                </div>
                                                   <div class="form-group">
                                                      <label for="descricao" class="col-sm-2 control-label">Descrição</label>

                                                      <div class="col-sm-10">
                                                        <textarea class="form-control"  id="descricao" name="descricao" rows="4" placeholder="Informe a Descrição" value="<?php echo set_value('descricao'); ?>"></textarea>
                                                            
                                                      </div>

                                                </div>
                                                <div class="form-group">
                                                      <label for="garantia" class="col-sm-2 control-label">Garantia do fornecedor</label>

                                                     <div class="col-sm-1 control-label">
                                                        
                                                        <input type="checkbox" class="form-check-input" id="garantia" name="garantia">
                                                    </div>
                                                </div>


                                               <div class="form-group">
                                                      <label for="codEquipamento" class="col-sm-2 control-label">Equipamento</label>
                                                       <div class="col-sm-10">
                                                            <select class="form-control" id="codEquipamento" name="codEquipamento">
                                                                  <option value="" ><?php echo $descricao; ?></option>
                                                                  <?php
                                                                    if (isset($resultadoEquipamento)) {
                                                                          
                                                                          foreach ($resultadoEquipamento as $equipamento) {
                                                                                echo '<option value="' .$equipamento->codEquipamento. '">' . $equipamento->descricao . '</option>';
                                                                          }
                                                                    }
                                                                  ?>
                                                            </select>
                                                      </div>
                                                </div>
                                               
                                                <div class="form-group">
                                                <label for="datainicio" class="col-sm-2 control-label">Data Inicial</label>

                                                      <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="datainicio"
                                                                   name="datainicio" placeholder="Informe a data inicio" value="<?php echo set_value('datainicio', $datainicio); ?>">
                                                      </div>
                                                </div>
                                                 <div class="form-group">
                                                      <label for="datafinal" class="col-sm-2 control-label">Data Entrega</label>

                                                      <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="datafinal"
                                                                   name="datafinal" placeholder="Informe a data entrega" value="<?php echo set_value('datafinal', $datafinal); ?>">
                                                      </div>
                                                </div>
                                          <div class="form-group">
                                                <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                                <div class="col-xs-12 col-sm-3 col-lg-3">
                                                      <button type="submit" class="btn btn-primary"
                                                              style="width: 100%">Atualizar Manutenção</button>
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

































