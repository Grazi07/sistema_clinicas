<!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                        
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sistema de Clinícas
        <small>Versão 1.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Início</a></li>
        <li class="active">Painel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Atendimentos</span>
              <span class="info-box-number"><?php if(isset($resultadosoma)){ ?>
              <span class="info-box-number">R$ <?php
                foreach ($resultadosoma as $soma) {
                  $variavel = $soma->custo;
                }
                $valor_float = floatval ($variavel);
                echo $valor_float; // mostra 122.34343
                ?></span>
                <?php }?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
       

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-android-desktop"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Médicos</span>
              <?php if(isset($resultado_num_medico)){ ?>
              <span class="info-box-number"><?php echo $resultado_num_medico ?></span>
            <?php } ?>

            

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pacientes</span>
              <?php if(isset($resultado_num_paciente)){ ?>
              <span class="info-box-number"><?php echo $resultado_num_paciente ?></span>
            <?php } ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     <!-- /.col -->
     

      

   

          
        </section>
      </div>


            <!-- /.footer -->
          </div>
          <!-- /.box -->

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->