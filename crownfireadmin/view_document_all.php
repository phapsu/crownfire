<?php
include('includes/init.php');
set_time_limit(0);
ini_set("memory_limit","500M");
$document_id = $_REQUEST['id'];
$property_id    = $_REQUEST['property_id'];
$year           = $_REQUEST['year'];

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Crownfire');
$pdf->SetTitle('Test');
$pdf->SetSubject('Subject');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// create some HTML content
//$html = document::getDocumentHTML($document_id);
$document = new document();
$html = $document->getDocumentHTMLAll($property_id, $year);
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$targetPath = $_SERVER['DOCUMENT_ROOT'].'/documents/';
$document_name = 'full_report_'.$_REQUEST['property_id'].'_'.$_REQUEST['year'].'.pdf';
if (file_exists($targetPath."/".$document_name)) {
    @unlink($targetPath."/".$document_name);
}

$pdf->Output($targetPath."/".$document_name, 'F');
$pdf->Output('full_report_'.$_REQUEST['year'].'.pdf', 'I');
//$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+