<?php
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
 	// inclui o autoloader 
	require_once  ' ../dompdf / autoload.inc.php ' ;
	
	//criando instância
	$dompdf = new DOMPDF();

	$dompdf->load_html('
		<h1>Meu título</h1>	
	');

	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream(
	  "relatorio.pdf",
	   array(
		"Attachment" => false //Para realizar o download automático apenas mudar para true
		)
	);	

?>