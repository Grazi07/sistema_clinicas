<!DOCTYPE html>
<html>
  <?php //$this->load->view('header');

 ?>

  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

  <body id="login">
    <br><br><br><br>
   
    <div>
      <center><h2 class="form-signin-heading">Controle de Equipamentos</h2></center>
       <?php
        echo form_open('autentica');
        
       ?>
         <div class="col-md-4" style="margin: 40px 300px 500px 450px;">
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"><br></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group">
                    <?php if(validation_errors() !== NULL)
                    {?>

                      <div style="color: red;">
                          <?php echo validation_errors(); ?>
                    </div>
                    
                    <?php }?>
                    <label for="usuario" class="col-sm-3 control-label">Usuário</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>

                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <!--<div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Lembre-me</label>
                      </div>-->
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Entrar</button>
                  <!--<button type="submit" class="btn btn-default float-right">Cancelar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          <?php
            echo form_close();
        ?>
          </div>

   </body>
</html>
       <!-- </div>
<div class="container">
         <center><h2 class="form-signin-heading">Controle de Equipamentos</h2></center>
        <?php 

         /* echo form_open('autentica', array('class' =>'form-signin'));

           if($formerror):
                  echo '<p style= color:red; >'.$formerror.'</p>';
            endif;

          echo form_label('Usuário', 'usuario');
          echo form_input(array(
              "name" => "usuario",
              "class" => "form_control",
              "id" => "usuario",
              "maxlength" => "255",
              "type" => "text"
          ));

          echo form_label('Senha', 'senha');
          echo form_input(array(
              "name" => "senha",
              "class" => "form_control",
              "id" => "senha",
              "maxlength" => "255",
              "type" => "password"
          )); 

          echo form_checkbox('lembre');
          echo form_label('Permanecer conectado', 'lembre');

          echo form_submit('enviar', 'Entrar', array('class' =>'btn btn-large btn-primary'));

          echo form_close();

          ?>*/
      

    /*</div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass   : 'iradio_square-blue',
          increaseArea : '20%' // optional
    })
  })
</script>-->*/
 