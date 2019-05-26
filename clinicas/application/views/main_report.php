<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Relatório</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <style type="text/css">
            @page{
                margin-top: 1cm;
                margin-left: 3cm;
                margin-bottom: 2cm;
                margin-left: 2cm;
            }
            #titulo{
                 margin-right: 10px;

            }
           body {
  font: 75%/1.6 "Myriad Pro", Frutiger, "Lucida Grande", "Lucida Sans", "Lucida Sans Unicode", Verdana, sans-serif;
}
table {
  border-collapse: collapse;
  width: 50em;
  border: 1px solid #666;
  font-size: 16px;
  margin-left: 80px;
  margin-top: 50px;
}
thead {
  background: #ccc url(https://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;
  border-top: 1px solid #a5a5a5;
  border-bottom: 1px solid #a5a5a5;
}
tr:hover {
  background-color:#3d80df;
  color: #fff;
}
thead tr:hover {
  background-color: transparent;
  color: inherit;
}
tr:nth-child(even) {
    background-color: #edf5ff;
}
th {
  font-weight: normal;
  text-align: left;
}
th, td {
  padding: 0.1em 1em;
}
            #cabecalho{
            	border-style: solid;
            	border-width: 1px;
            	font-size: 16px;
            	height: 13%;
            	border-color: #000;
            	padding: 6px;
            	box-sizing: border-box;



            }
 #div2{
		border-bottom-style: solid;
        border-bottom-width: 1px;
        font-size: 16px;
        height: 8%;
        border-bottom-color: #000;
        padding: 6px;
        box-sizing: border-box;



            }
#total{
	margin-left: 40%;
}
p{
	font-size: 16px;
}

</style>

<body>

	<div id="cabecalho" ><center><h4>SISTEMA DE CONTROLE</h4><br>
		EMITIDO EM: <?php
      	date_default_timezone_set('America/Bahia');
      	echo date('d/m/Y H:i:s');
      ?></center>

	</div><br><br><br><br>
    <?php
      if (isset($resultadomanutencao)) {
          foreach ($resultadomanutencao as $manu) {
            $cod = $manu->codEquipamento; 
          }
        }
    ?>
  <?php
      if (isset($resultadoEquipamento)) {
          foreach ($resultadoEquipamento as $equi) {
            $equip = $equi->descricao; 
          }
        }
    ?>
	<div id="div2">
		<b>Código: </b> <?php echo $cod; ?><br><br>
		<b>Equipamento:</b> <?php echo $equip; ?><br>
	</div><br><br><br><br>
    			
 	<?php $total = 0; ?>
      <!--<div id="cabecalho">
      	
      </div> 	-->      		
       			<center><h3>RELATÓRIO DE MANUTENÇÕES SOLICITADAS</h3></center>


<center><table id="playlistTable">
  
<thead>
    <tr>
 	
     
     <th>Fornecedor</th>
     <th>Custo (R$)</th>
     <th>Descrição</th>
     <th>Garantia do Fornecedor</th>
     <th>Período</th>
    </tr>
</thead>

<tbody>
    <?php
      if (isset($resultadomanutencao)) {
          foreach ($resultadomanutencao as $manutencao) {
    ?>                                                    
    <tr>

    
      <td><?php echo $manutencao->fornecedor; ?></td>
      <td><?php echo $manutencao->custo;?></td>
      <td><?php echo $manutencao->descricao; ?></td>
      <td><?php if($manutencao->garantiaFornecedor == 1){
      echo "Sim";
      }
      else{
        echo "Não";
      }
      ; ?></td>
      <td><?php echo date('d/m/Y',  strtotime($manutencao->dataInicio));
        ?> a <?php echo date('d/m/Y',  strtotime($manutencao->dataInicio)); ?></td>
    </tr>

     <?php
      $total = $total + $manutencao->custo;
      }
    }
      ?>


</tbody>
</table>
<br><br>
	<div id="total"><p><b>Total de gastos:</b> R$ <?php echo $total; ?></p></div>
 </center> 
           		
</body>
</html>