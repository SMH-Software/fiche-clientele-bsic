<?php 

require('./fpdf/fpdf.php'); 



class PDF extends FPDF { 

	// Page header 
	function Header() { 
		
		// Add logo to page 
		$this->Image('../assets/img/logo.png',8,8,60); 
		
		// Set font family to Arial bold 
		$this->SetFont('Arial','B',18); 
		
		// Move to the right 
		$this->Cell(10); 
		
		// Header 
		$this->Cell(0,20,"FICHE D'ECOUTE CLIENT",0,1,'C');
		 
		// Line break 
		$this->Ln(10); 
	} 

	// Page footer 
	function Footer() { 
		
		// Position at 1.5 cm from bottom 
		$this->SetY(-25); 
		
		// Arial italic 8 
		$this->SetFont('Arial','I',8); 
		
		// Page number 
		$this->MultiCell(0,2,iconv('UTF-8', 'windows-1252',"BSIC Côte d'Ivoire S.A Société Anonyme avec conseil d'administration au capital de 23.200.000 \n
		Siège Social : Plateau Avenue Noguès - 01 BP 10323 Abidjan 01 République de Côte d'Ivoire - RCCM ABJ-2008-B-71179 \n 
		Compte Contribuable : 0911218H - Aut. N° A 0154 M - Téléphone: 20 30 99 99 - Fax: 20 32 04 06 - E-mail: bsic.cotedivoire@bsicbank.com \n\n Page ". 
			$this->PageNo() . '/{nb}'),0,'C'); 
	} 
} 

if(isset($_GET['id'])){
        
	require_once('./db.php');

	$id = $_GET['id'];

	$sql = "SELECT * FROM teve WHERE ID='$id'";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();

	$result = $stmt->fetch();

	
	require_once('./myFunctions.php');
	

	// Instantiation of FPDF class 
	$pdf = new PDF(); 

	// Define alias for number of pages 
	$pdf->AliasNbPages(); 
	$pdf->AddPage(); 
	

	//Affichage des ligne

	//Evénement
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(0, 10, 'I.     EVENEMENT', 0, 1); 

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0, 3, '', 0, 1); 
	$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', $result['NEVE']), 0, 1);
	$pdf->Cell(0, 5, '', 0, 1); 

	// Identification
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', 'II.     IDENTIFICATION '), 0, 1);
	$pdf->Cell(0, 3, '', 0, 1); 

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'Type : '.$result['TCLI']), 0, 1);
	$pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'Nom et Prénom  : '.$result['NOM_PRENOM']), 0, 1);
	$pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'Numéro de compte (si Client BSIC)  : '.$result['NCP']), 0, 1); 
	$pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'Téléphone : (+225) '.$result['TEL'].'              Adresse E-mail : '.$result['EMAIL']), 0, 1);
	$pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', 'Date : '.dateFormat($result['DCO']).'              Signature :'), 0, 1);
	$pdf->Cell(0, 5, '', 0, 1); 

	
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', "III.     DETAILS DE L'EVENEMENT"), 0, 1);
	$pdf->Cell(0, 3, '', 0, 1); 

	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(0, 7, iconv('UTF-8', 'windows-1252', "Date de l'événement : ".dateFormat($result['DCO'])), 1, 1);

	$pdf->MultiCell(0, 7, iconv('UTF-8', 'windows-1252', "Détail de l'événement : \n".$result['DET']), 1);
	
	//Coupon 
	$reference = 1;
	$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', strval(Barre(160))), 0, 1);
	$pdf->SetFont('Arial', 'B', 9);
	$pdf->Cell(0, 7, iconv('UTF-8', 'windows-1252', "Coupon Accusé de Réception"), 0, 1, 'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', "(A remettre à l'émetteur) "), 0, 1, 'C');
	$pdf->Cell(0, 8, iconv('UTF-8', 'windows-1252', "Cher(e) Client(e), "), 0, 1);
	$pdf->MultiCell(0, 6, iconv('UTF-8', 'windows-1252', 'Votre '. strtolower($result['NEVE']).' du '.dateFormat($result['DCO']).' à été enrégistrée sous la référence BS/CI/DOC/DCC/0'.$reference++.' par nos services. Nous nous engageons à vous en donner suite dans les meilleurs délais.'),0,'C');
	$pdf->Cell(0, 10, iconv('UTF-8', 'windows-1252', "Dans cette attente veuillez agréer, Cher(e) Client(e), L'expression de nos salutations distinguées. "), 0, 1,'C');
	$pdf->SetFont('Arial', 'B', 9);
	$largeurCellule = 80;
	$hauteurCellule = 35; 
	$pdf->Cell(60);
	$pdf->MultiCell($largeurCellule, $hauteurCellule, iconv('UTF-8', 'windows-1252', "Visas et Cachet du Gestionnaire "), 1, 'C',false);

	$pdf->Output(); 

}

?>
