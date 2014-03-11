<?php
require_once "../../../configphp.dbc";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_select_db($dbname);
$return_arr = array();
$field = parse_ini_file("multipleautocompleteField.tmp");
$table_name = $field[1];
$field_name = $field[2];

if ($conn) {
    $fetch = mysql_query("SELECT * FROM ". $table_name ." WHERE ". $field_name ." like '%" . mysql_real_escape_string($_GET['term']) . "%'");

    while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
        $row_array['id'] = $row['id'];
		
		$row_array['value'] = $row[$field_name];

        array_push($return_arr, $row_array);
    }
}

echo json_encode($return_arr);
?>