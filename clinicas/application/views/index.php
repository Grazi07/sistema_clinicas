<?php
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
 	// inclui o autoloader 
	require_once  ' ../dompdf / autoload.inc.php ' ;
	
	//criando inst�ncia
	$dompdf = new DOMPDF();

	$dompdf->load_html('
		<h1>Meu t�tulo</h1>	
	');

	//Renderizar o html
	$dompdf->render();

	//Exibir a p�gina
	$dompdf->stream(
	  "relatorio.pdf",
	   array(
		"Attachment" => false //Para realizar o download autom�tico apenas mudar para true
		)
	);	

?>