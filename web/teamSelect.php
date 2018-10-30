<?php  
//Team select

function selectTeam() {
	$db = get_db();
	//
	$query1 = "SELECT * FROM Team ORDER BY name;";
	foreach ($db->query($query1) as $row) {
		echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
	}
}

function selectWeek(){
	$db = get_db();

	$query2 = "SELECT * FROM Week ORDER BY id;";
	foreach ($db->query($query2) as $week) {
		echo "<option value=" . $week['week'] . "> Week " . $week['week'] . "</option>"; 
	}
}
?>