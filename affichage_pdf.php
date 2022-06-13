<?php
    require('FPDF/fpdf.php');
    require("export_pdf.php");


    class PDF extends FPDF
    {
        // En-tête
        function Header(){
            // Logo
            $this->Image('image/blinisgaming.png',55,12,100);
            // Saut de ligne
            $this->Ln(30);
        }

        // Pied de page
        function Footer(){
            // Positionnement à 1,5 cm du bas
            $this->SetY(-35);
            // Police Arial italique 10
            $this->SetFont('Times','I',10);
            // Numéro de page
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    // Instanciation du PDF
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    // Saut de lignes
    $pdf->Ln(65);

    // Bloc 1
    $pdf->SetFont('Times','',12);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(32,32,32);
    $txt1 = "bliniz .";
    $txt1 = utf8_decode($txt1);
    $pdf->Multicell(190,10,$txt1,0,'L', TRUE);

    // Saut de lignes
    $pdf->Ln(10);
    
    // Bloc 2
    $pdf->SetFont('Arial','',11);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(32,32,32);
    $txt2 = "salut variable contenant les infos.";
    $txt2 = utf8_decode($txt2);
    $pdf->Multicell(190,10,$txt2,0,'L', TRUE);


    // Saut de lignes
    $pdf->Ln(10);

    // Bloc 3
    $pdf->SetFont('Times','',12);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(32,32,32);
    $txt2 = "Texte 3 en Times 12 centré.";
    $txt2 = utf8_decode($txt2);
    $pdf->Multicell(190,10,$txt2,0,'L', TRUE);

    // Création du PDF
    $fichier ="fichier1.pdf";
    $pdf->Output($fichier,'F');

    // Redirection vers le PDF
    header('location: fichier1.pdf');
 
?>