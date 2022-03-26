<?php
 if (isset($_POST['Retour'])) 
 {
 	header('location:comptabilite.php');
 }
 function firstcontent()
 {
 	session_start();
	$bdd=new PDO('mysql:host=localhost;dbname=gestion_location','root','');
    $output='';
	$date1=$_SESSION['date1'];
	$date2=$_SESSION['date2'];
	$requete=$bdd->query("select voiture.designation, count(location.numvoiture)as effectif,sum(montant)as total from location,voiture where
 (location.numvoiture=voiture.numero) and (location.dateDepart between'$date1' and '$date2') group by location.numvoiture asc");
	while($list=$requete->fetch())
		{
			$output= "<tr>
    				<td style='width:160px;text-align:center;font-size20px'>".$list['designation']."</td>
    				<td style='width:160px;text-align:center;font-size20px'>".$list['effectif']."</td>
    				<td style='width:160px;text-align:center;font-size20px'>".$list['total']."</td>
    				</tr>";
		}
	//$requete->closeCursor();
	return $output;
 }

 function totalite()
 {
 	$bdd=new PDO('mysql:host=localhost;dbname=gestion_location','root','heriniaina');
 	 $output1='';
	$date1=$_SESSION['date1'];
	$date2=$_SESSION['date2'];
	$somme=$bdd->query(" SELECT sum(montant)as total from location where dateDepart between '$date1' and '$date2' ");
	while ($fin=$somme->fetch()) 
	{
		$output1= "<tr>
 		            <td colspan='2' style='text-align:center;'>TOTAL(ariary)</td>
 		           <td style='text-align:center;'>".$fin['total'].'</td>
 		         </tr>';
	}
	$somme->closeCursor();
	return $output1;
 }
 if(isset($_POST['edit']))
  {
	include('tcpdf/tcpdf.php');
	//include('tcpdf_autoconfig.php');
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
	$content.='<h1 style="text-decoration:underline;">Edition en version pdf de la liste des voitures et sa nombre de location</h1><br>
		<table border="1" cellspacing="0" cellpadding="5">
		   <tr>
		     <th>DESINGATION VOITURE</th>
		     <th>NOMBRE DE LOCATION</th>
		     <th>SOMME</th>
		   </tr>';
    $content.=firstcontent();
	$content.=totalite();
	$content.='</table>';
	$objetPdf->writeHTML($content);
	$objetPdf->Output('file2.pdf','I');
 }
 ?>