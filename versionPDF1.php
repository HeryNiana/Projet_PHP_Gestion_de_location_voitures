<?php
if (isset($_POST['retour'])) 
{
	header('location:comptabilite.php');
	//session_destroy();
}
function donnes()
{
  session_start();
	$bdd=new PDO('mysql:host=localhost;dbname=gestion_location','root','');
    $numvoiture=$_SESSION['numvoiture'];
    $output='';
	$date1=$_SESSION['date1'];
	$date2=$_SESSION['date2'];
	$reque=$bdd->query("select locataire.nom,location.dateDepart,voiture.loyer_journalier,location.nbjours,location.montant from location,voiture,locataire where(location.numvoiture=voiture.numero and locataire.numero=location.numcli) and(location.dateDepart between'$date1' and '$date2') and voiture.numero='$numvoiture' order by location.numlocation ");
	//$row=$reque->rowCount();
	while ($listFetch=$reque->fetch()) 
    {
    	$output='<tr>
    				<td>'.$listFetch['nom']."</td>
    				<td>".$listFetch['dateDepart']."</td>
    				<td>".$listFetch['loyer_journalier']."</td>
    				<td>".$listFetch['nbjours']."</td>
    				<td>".$listFetch['montant']."</td>
    			</tr>";
    }
   //$reque->closeCursor();
    return $output;	
 }
function totality() 
  {
   //	session_start();

	$bdd=new PDO('mysql:host=localhost;dbname=gestion_location','root','heriniaina');
    $numvoiture=$_SESSION['numvoiture'];
    $output='';
	$date1=$_SESSION['date1'];
	$date2=$_SESSION['date2'];
   	$output1='';
   	$montant=$bdd->query("select sum(location.montant)as total from location,voiture where(location.numvoiture=voiture.numero) and(location.dateDepart between'$date1' and '$date2') and voiture.numero='$numvoiture' ");
 	 while($total=$montant->fetch())
 	 {
 	   $output1="<tr>
 		            <td colspan='4' style='text-align:center;'>TOTAL(en Ariary)</td>
 		           <td style='text-align:center;'>".$total['total']."</td>
 		         </tr>";	
 	 }
 	 $montant->closeCursor();
 	 return $output1;
 		 	 
  } 

if (isset($_POST['pdf']))
 {
	include('tcpdf/tcpdf.php');
	$objetPdf=new TCPDF('P',PDF_UNIT, PDF_PAGE_FORMAT,true,'UTF-8',false);
	$objetPdf->SetCreator(PDF_CREATOR);
	$objetPdf->SetTitle("Edition de la version PDF");
	$objetPdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
	$objetPdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
	$objetPdf->SetFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
	$objetPdf->SetDefaultMonospacedFont('helvetica');
	$objetPdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	$objetPdf->SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
	$objetPdf->SetPrintHeader(false);
	$objetPdf->SetPrintFooter(false);
	$objetPdf->SetAutoPageBreak(TRUE,10);
	$objetPdf->SetFont('helvetica','',12);
	$objetPdf->AddPage();
	$content ='';
	$content.='<h4 style="text-decoration:underline;">Edition de la taleau html en version pdf</h4><br>
		<table border="1" cellspacing="0" cellpadding="5">
		   <tr>
		     <th>LOCATAIRE</th>
		     <th>Date</th>
		     <th>Loyer_journalier</th>
		     <th>Nombre du jours</th>
		     <th>Montant</th>
		   </tr>';
	$content.=donnes();
	//$content.=donnes();
	$content.=totality();
	$content.='</table>';
	$objetPdf->writeHTML($content);
	$objetPdf->Output('file.pdf','I');
}
//session_destroy();
?>