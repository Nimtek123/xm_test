<?php

//include connection file 
include_once("../model/database.php ");
include_once('./fpdf17/fpdf.php');

class PDF extends FPDF {

// Page header
    function Header() {
        // Logo
        $this->SetFont('Arial', 'B',15);
        // Move to the right
        $this->Cell(75);
        // Title
        $this->Cell(40, 20, 'Tickets List', 0, 0, 'C');
        // Line break
        $this->Ln(20);
    }

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

$db = new database();
$connString = $db->connect();
$display_heading = array('ticket' => 'ID', 'decoder' => 'dec_id', 'descriptiom' => 'description', ' date_issued' => 'date-issued',);

$result = $db->getQuery("SELECT id,dec_id, description, status,date_issued "
        . "FROM tbl_tickets");
$header = $db->getQuery("SHOW columns FROM tbl_tickets");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'BU', 10);
$pdf->Cell(3, 0, '', 0, 0, 'center');

$pdf->Cell(35, 12, "Ticket ID", 0);

$pdf->Cell(35, 12, "Decoder_ID", 0);

$pdf->Cell(50, 12, "Ticket Description", 0);
$pdf->Cell(20, 12, "Status", 0);
$pdf->Cell(35, 12, "Date Issued", 0);


$pdf->SetFont('Arial', '', 9);

while ($row = mysql_fetch_row($result)) {
    $pdf->Ln();
    $pdf->Cell(3, 0, '', 0, 0, '');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(35, 12, $row[0], 0);
    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(35, 12, $row[1], 0);
    $pdf->Cell(50, 12, $row[2], 0);
    $pdf->Cell(20, 12, $row[3], 0);
    $pdf->Cell(25, 12, $row[4], 0);
}

$pdf->Output();
?>