<?php
	// include autoloader
	require_once 'dompdf/autoload.inc.php';

	// reference the Dompdf namespace
	use Dompdf\Dompdf;

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();

//	$dompdf->loadHtml(ticket.html);
	$page = file_get_contents("ticket.php");
	$dompdf->loadHtml($page);

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream("ticket", array("Attachment" => 0));

	header("location: my_tickets.php");