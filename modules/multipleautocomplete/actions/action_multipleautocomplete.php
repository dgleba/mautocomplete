<?php
require_once "configphp.dbc";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_select_db($dbname);
$return_arr = array();
$field = parse_ini_file("field.ini");
$field_name = $field[1];

if ($conn) {
    $fetch = mysql_query("SELECT * FROM contacts_tags WHERE ". $field_name ." like '%" . mysql_real_escape_string($_GET['term']) . "%'");

    while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
        $row_array['id'] = $row['id'];
		
		$row_array['value'] = $row[$field_name];

        array_push($return_arr, $row_array);
    }
}

echo json_encode($return_arr);
?>