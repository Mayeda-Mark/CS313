<?php  
//Team select

function selectTeam() {
	$db = get_db();
	//
	$query1 = "SELECT * FROM Team ORDER BY name;";
	foreach ($db->query($query1) as $row) {
		echo "<option value=" . $row['id'] . ">" . $row['name'] . " </option>";
	}
}
?>