<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT  *FROM locataire WHERE nom like '%" . $_POST["keyword"] . "%' ORDER BY numero LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
	<table style=" width:300px; text-align: center;font-size: 15px;">
	<tr>
	<th>Nom</th>
	</tr>
<?php
foreach($result as $country) {
?>
	<tr>
		<td><li onClick="selectCountry('<?php echo $country["nom"]; ?>');"><?php echo $country["nom"]; ?></li>
</td>
	</tr>


<?php } ?>
</table>
</ul>
<?php } } ?>