<?php
$session = $this->session->userdata('logged_in');
$nomeUsuario = $session['nomeUsuario'];

$emailUsuario = $session['emailUsuario'];
$datacadastro = $session['dataCadastro'];
?>
<header class="main-header">
<style>
    a,  {
        color: white;
    }
</style>
    <!-- Logo -->
    <a href="dashboard" class="logo" style="background-color: #367fa9;">
       
        <span class="logo-mini"><img src="<?php echo base_url('assets/img/logo_planejamento.png')?>" style="width: 48px; height: 48px"></span>


        <span class="logo-lg" ><b>Sistema de </b>Clinícas</span>
    </a>

    <nav class="navbar navbar-static-top" style="background-color: #3c8dbc; color: white;">
      
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu"  >
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/img/01avatar.png')?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $nomeUsuario; ?></span>
                    </a>
                    <ul class="dropdown-menu" style="background-color: #3c8dbc;">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url('assets/img/01avatar.png')?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $nomeUsuario; ?>
                                <small>Membro desde <?php echo $datacadastro; ?><br> <?php echo $emailUsuario; ?></small>
                            </p>
                        </li>
                      
                        <!-- Menu Footer-->
                        <li class="user-footer">
                          <!--  <div class="pull-left">
                                <a href="profile" class="btn btn-default btn-flat">perfil</a>
                            </div>-->
                            <div class="pull-right">
                                <a href="logout" class="btn btn-default btn-flat">Sair do Sistema</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>

    </nav>
</header>