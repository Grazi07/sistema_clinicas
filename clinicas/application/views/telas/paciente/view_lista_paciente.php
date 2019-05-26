<link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="../assets/datatables/dataTables.bootstrap.css">

<div class="content-wrapper">
      <section class="content-header">
            <h1>Lista de Pacientes</h1>
            <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li>Pacientes</li>
                  <li class="active">Lista </li>
            </ol>
      </section>

      <section class="content">
            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-lg-12">
                        <div class="box box-primary">
                        <?php
                              if (isset($alerta)) {
                                    echo '<div class="box-header with-border">' . $alerta . '</div>';
                        ?> 


                              <div class="form-group">
                                    <div class="col-xs-12 col-sm-9 col-lg-9">&nbsp;</div>
                                    <div class="col-xs-12 col-sm-3 col-lg-3">
                                       <a href="listaequipamento" ><button class="btn btn-primary"
                                                style="width: 100%">Voltar</button></a>
                                    </div>
                              </div>
                        <?php }

                              else{
                        ?> 
                              <?php
                              if (isset($msg)) {
                                    echo '<div class="box-header with-border">' . $msg . '</div>';
                              }
                              ?>
                              <div class="box">
<!--                                    <div class="box-header with-border">
                                          <h3 class="box-title">Lista de pacientes</h3>
                                    </div>-->
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                          <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                      <tr>
                                                            <th style="width:24px">&nbsp;</th>
                                                            <th>Código</th>
                                                            <th>Nome</th>
                                                            <th>Sexo</th>
                                                            <th>Idade</th>
                                                            <th>E-mail</th>
                                                            <th></th>
                                                            <th></th>
                                                            
                                                            
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php
                                                      if (isset($resultado_paciente)) {
                                                            foreach ($resultado_paciente as $pacientes) {
                                                                  ?>
                                                                  <tr>
                                                                        <td><a href="altera_paciente?id=<?php echo $pacientes->cod_paciente; ?>"><i class="fa fa-pencil-square-o"></i></a></td>
                                                                        <td><?php echo $pacientes->cod_paciente; ?></td>
                                                                        <td><?php echo $pacientes->nome; ?></td>
                                                                        <td><?php echo $pacientes->sexo; ?></td>
                                                                        <td><?php echo $pacientes->idade; ?></td>
                                                                        <td><?php echo $pacientes->email; ?></td>
                                                                        
                                                                        <td><a href="pdf_gen?id=<?php echo $pacientes->cod_paciente; ?>"><i class="fa fa-clipboard"></i></a></td>
                                                                        
                                                                        <td><a href="deleta_paciente?id=<?php echo $pacientes->cod_paciente; ?> "><i class="fa fa-trash"></i></a></td>

                                                                        
                                                                  </tr>
                                                                  <?php
                                                            }
                                                      }
                                                      ?>

                                                </tbody>
                                          </table>
                                    </div>

                              <?php } ?>
                              </div>
                        </div>
                  </div>
            </div>
      </section>
</div>
/
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
