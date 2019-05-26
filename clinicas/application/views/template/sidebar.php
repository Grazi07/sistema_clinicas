<?php
$session = $this->session->userdata('logged_in');
$nomeUsuario = $session['nomeUsuario'];

$menuativo='';
if(isset($telaativa)){
      $menuativo = $telaativa;
}
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$menuativo;
?>
<style>
    {
        color: white;
    }
</style>
<!-- Left side column. contains the logo and sizdebar -->
<aside class="main-sidebar"    style=" background: #1e282c; color: #fff">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                  <div class="pull-left image">
                        <img src="<?php echo base_url('assets/img/01avatar.png')?>" class="img-circle" alt="User Image">
                  </div>
                  <div class="pull-left info">
                        <p><?php echo $nomeUsuario; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                  </div>
            </div>
            <ul class="sidebar-menu">
                  <li class="treeview">
                        <a href="dashboard">
                              <i class="fa fa-dashboard"></i> <span>painel de Controle</span>
                        </a>
                  </li>
                  <li class="<?php if($menuativo === "Médicos"){echo "active";}?> treeview">
                        <a href="#">
                              <i class="fa fa-users"></i>
                              <span>Médicos</span>
                              <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                              </span>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="cadastra_medico"><i class="fa fa-circle-o"></i> Cadastro</a></li>
                              <li><a href="consulta_medico"><i class="fa fa-circle-o"></i> Consulta</a></li>
                              <li><a href="lista_medico"><i class="fa fa-circle-o"></i> Lista</a></li>
<!--                              <li><a href="#"><i class="fa fa-circle-o"></i> Relat&oacute;rio</a></li>-->
                        </ul>
                  </li>
                  
                  
                  <li class="<?php if($menuativo === "Paciente"){echo "active";}?> treeview">
                        <a href="#">
                              <i class="fa fa-cubes"></i>
                            <span>Paciente</span>
                              <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                              </span>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="cadastra_paciente"><i class="fa fa-circle-o"></i> Cadastro</a></li>
                              <li><a href="consulta_paciente"><i class="fa fa-circle-o"></i> Consulta</a></li>
                              <li><a href="lista_paciente"><i class="fa fa-circle-o"></i> Lista</a></li>
                        </ul>
                  </li>
                   
                  <li class="<?php if($menuativo === "agenda"){echo "active";}?> treeview">
                        <a href="#">
                              <i class="fa fa-files-o"></i>
                              <span>Agenda</span>
                              <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                              </span>
                        </a>
                        <ul class="treeview-menu">
                              <li><a href="cadastra_atendimento"><i class="fa fa-circle-o"></i> Novo atendimento</a></li>
                              <li><a href="lista_atendimento"><i class="fa fa-circle-o"></i> Lista atendimentos</a></li>
                              <li><a href="consulta_atendimento"><i class="fa fa-circle-o"></i> Consultar atendimentos</a></li>
                              
                        </ul>
                  </li>
                  
               

            </ul>
      </section>
      <!-- /.sidebar -->
</aside> 