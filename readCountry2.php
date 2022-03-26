<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) 
 {
$query ="SELECT  *FROM voiture WHERE designation like '%" . $_POST["keyword"] . "%' ORDER BY numero LIMIT 1";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
	<table style=" width:400px; text-align: center;font-size: 15px;">
	<tr>
		<td></td>
	<th><strong>Désignation</strong> </th>
	</tr>
<?php
foreach($result as $country) {
?>
	<tr>
		<!--td><li><?php //echo $country['numero'] ?></li></td-->
		<td></td>
		<td><li onClick="selectCountry('<?php echo $country["designation"]; ?>');"><?php echo $country["designation"]; ?></li>
</td>
		<!--td><li><?php //echo $country['loyer_journalier'] ?></li></td>
		<td><li><img src="photos<?php //echo $country['photos'] ?>" width="45" height="30"></li></td>
			<td style="font-size: 13px">
 		 			<a href="modif.php?numero1=<?php// echo $country['numero'] ?>" style="cursor: pointer;text-decoration: none;" id="Modification"><img src="sary/images.png" width="30" height="25"></a>
 		 			<a href="maj.php?numero=<?php //echo $country['numero'] ?>" style="text-decoration: none;"><img src="sary/delete.png" width="30" height="25"></a>
 		 			<a href="detail.php?numero=<?php //echo $country['numero'] ?>" style="text-decoration: none;"><img src="sary/details.png" width="30" height="25"></a>
 		 		</td-->
	</tr>
  <?php 
  } ?>
</table>
</ul>
<?php } }
 ?>