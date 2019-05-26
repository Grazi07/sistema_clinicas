<!DOCTYPE html>
<html>
    
 <?php $this->load->view('header'); ?>

    <body>
      
     <center> <?php $this->load->view('menu_superior'); ?>

      <?php 

            if($formerror):
                  echo '<p>'.$formerror.'</p>';
            endif;

      	    echo form_open('Principal/cadastrar');
      		echo form_label('Equipamento', 'nome');
      		echo form_input('nome');

      		echo form_label('Usuário', 'nomeUsuario');
      		echo form_input('nomeUsuario');

      		echo form_label('Setor', 'setor');
      		echo form_input('setor');

      		echo form_label('MAC Ether', 'macEther');
      		echo form_input('macEther');

      		echo form_label('MAC Wlan', 'macWlan');
      		echo form_input('macWlan');

      		echo form_label('IP Ether', 'ipEther');
      		echo form_input('ipEther');

      		echo form_label('IP Wlan', 'ipWlan');
      		echo form_input('ipWlan');

      		echo form_label('Marca', 'marca');
      		echo form_input('marca');
      	
			echo form_label('Modelo', 'modelo');
      		echo form_input('modelo');	

      		echo form_label('Cor', 'cor');
      		echo form_input('cor');

      		echo form_label('Polegadas da tela', 'polegadas');
      		echo form_input('polegadas');

      		echo form_label('Sistema Operacional', 'sistema');
      		echo form_input('sistema');

      		echo form_label('Processador', 'processador');
      		echo form_input('processador');

      		echo form_label('Modelo do Processador', 'modeloProcessador');
      		echo form_input('modeloProcessador');

      		echo form_label('Cache', 'cache');
      		echo form_input('cache');

      		echo form_label('Chipset', 'chipset');
      		echo form_input('chipset');

      		echo form_label('Memória RAM', 'memoriaRam');
      		echo form_input('memoriaRam');

      		echo form_label('SSD', 'ssd');
      		echo form_input('ssd');

      		echo form_label('HDD', 'HDD');
      		echo form_input('hdd');

      		echo form_label('Placa de Som', 'placaSom');
      		echo form_input('placaSom');

      		echo form_label('Placa de Vídeo', 'placaVideo');
      		echo form_input('placaVideo');

      		echo form_label('Placa de Rede', 'placaRede');
      		echo form_input('placaRede');

      		echo form_label('Drives', 'drives');
      		echo form_input('drives');

      		echo form_label('Conexões', 'conexoes');
      		echo form_input('conexoes');*/

      		echo form_submit('enviar', 'Cadastrar', array('class' =>'botao'));

      		echo form_close();
      ?></center>

    </body>

</html>