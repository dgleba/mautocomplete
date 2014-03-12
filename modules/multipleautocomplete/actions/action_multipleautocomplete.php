<?php
session_start();
$multipleautocomplete_field_name = $_SESSION['field_name'];
$multipleautocomplete_table_name = $_SESSION['table_name'];

require_once "../../../configphp.dbc";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_select_db($dbname);
$return_arr = array();

if ($conn) {
    $fetch = mysql_query("SELECT * FROM ". $multipleautocomplete_table_name ." WHERE ". $multipleautocomplete_field_name ." like '%" . mysql_real_escape_string($_GET['term']) . "%'");

    while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
        $row_array['id'] = $row['id'];
		
		$row_array['value'] = $row[$multipleautocomplete_field_name];

        array_push($return_arr, $row_array);
    }
}

echo json_encode($return_arr);
?>