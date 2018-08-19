<div id="transportation_table">
	
<table>

<tr>
<th>Name</th>
</tr>

<?php
include 'gettransportation.php';

foreach ($data as $value) {
	echo "<tr>";
	echo "<td>" . $value->name . "</td>";
	echo '<td> <button type="button" name="edit" id="'.$value->trans_id.'"> Edit</button>  <button type="button" name="remove" id="'.$value->trans_id.'" >Remove</button> </td>';
	echo "</tr>";
}

?>
</table>


</div>