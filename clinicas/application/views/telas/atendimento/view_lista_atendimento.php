<link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../assets/datatables/dataTables.bootstrap.css">

<div class="content-wrapper">
      <section class="content-header">
            <h1>Lista de Manutenções</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li>Manutenções</li>
                  <li class="active">Lista de Manutenções</li>
            </ol>
      </section>

      <section class="content">
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="box box-primary">

                              <?php
                              if (isset($msg)) {
                                    echo '<div class="box-header with-border">' . $msg . '</div>';
                              }
                              ?>
                              <div class="box">
                                    <div class="box-header with-border">
                                          <h3 class="box-title">Lista de Manutenções Localizadas</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                          <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                      <tr>
                                                            <th style="width:24px">&nbsp;</th>
                                                            <th>Fornecedor</th>
                                                            <th>Custo</th>
                                                            <th>Garantia do Fornecedor</th>
                                                            <th>Equipamento</th>
                                                            <th>Período</th>
                                                            <th></th>
                                                            
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php
                                                      if (isset($resultadomanutencao)) {
                                                            foreach ($resultadomanutencao as $manutencao) {
                                                                  ?>
                                                                  <tr> 

                                                                        <td><a href="atualizamanutencao?id=<?php echo $manutencao->codManutencao;?>&cod=<?php echo $manutencao->codEquipamento;?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                                                        <td><?php echo $manutencao->fornecedor; ?></td>
                                                                        <td><?php echo $manutencao->custo; ?></td>
                                                                        <td><?php if($manutencao->descricao !== NULL){
                                                                              echo $manutencao->descricao; 
                                                                        }else{
                                                                              echo "  - "; 
                                                                        }
                                                                        ?></td>
                                                                        <td><?php echo $manutencao->codEquipamento; ?></td>
                                                                        <td><?php echo $manutencao->dataInicio. " a ".           $manutencao->dataFinal; ?></td>
                                                                        
                                                                        <td><a href="deletamanutencao?id=<?php echo $manutencao->codManutencao; ?>"><i class="fa fa-trash"></i></a></td>
                                                                  </tr>
                                                                  <?php
                                                            }
                                                      }
                                                      ?>

                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
</div>

<script src="../assets/js/jquery/jquery-2.2.3.min.js"></script>


<script src="../assets/js/bootstrap/bootstrap.min.js"></script>
<script src="../assets/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/datatables/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<script>
      var base_url = '<?php echo base_url() ?>';
      $(document).ready(function () {

      });
      $(function () {
            $('#example1').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false
            });
      });
</script>