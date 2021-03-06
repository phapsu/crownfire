<?php

include("includes/init.php");
include('../includes/JG_Cache.php');

$err = 0;
// Important stuff
$redirect = (isset($_GET['redirect']) && !empty($_GET['redirect']))  ? urldecode($_GET['redirect']) : '';
$user_id = $_POST['user_id'];
$property_id = $_POST['property_id'];

$state_id = $_POST['state_id'];
$deficiency = $_POST['deficiency'];

$document_id = (isset($_REQUEST['id'])) ? $_REQUEST['id'] : null;
$name = (isset($_REQUEST['document_name'])) ? $_REQUEST['document_name'] : null;

$year = (isset($_REQUEST['document_year'])) ? $_REQUEST['document_year'] : null;
//$document_name = $_POST['document_name'];
$document_name = (isset($_REQUEST['document_name']) && !empty($_REQUEST['document_name'])) ? '['.urldecode($_REQUEST['document_name']).']'.$document_name.'_'.$year.'.pdf' : 'Document #'.$document_id.'.pdf';
$required = array();

set_time_limit(0);
ini_set("memory_limit","500M");         

$typeID = $_POST['type_id'];   
$cusInfo=$document_id;
$propertyInfo="";

//$html = blank_document::getDocumentHTML($typeID, $cusInfo, $propertyInfo);
//echo $html;exit;            

$cache = new JG_Cache($cfg['cache_directory']);
$output_pdf = $cache->get('document_'.$document_id, 0);

if ($output_pdf === FALSE)
{

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Crownfire');
$pdf->SetTitle('Test');
$pdf->SetSubject('Subject');

$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');

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
$html = blank_document::getDocumentHTML($typeID, $cusInfo, $propertyInfo);

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$output_pdf = $pdf->Output($document_name, 'S');

//============================================================+
// END OF FILE
//============================================================+
    if ($cfg['mode'] == 'live') {
        $cache->set('document_'.$document_id, $output_pdf);
    }
}
header('Content-Disposition: attachment; filename="'.$document_name.'";');
header('Content-Transfer-Encoding: binary');
echo $output_pdf;

?>