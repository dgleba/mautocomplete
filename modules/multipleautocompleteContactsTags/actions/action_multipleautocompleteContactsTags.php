<?php
require_once "configphp.dbc";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_select_db($dbname);
$return_arr = array();

if ($conn) {
    $fetch = mysql_query("SELECT * FROM contacts_tags where tags like '%" . mysql_real_escape_string($_GET['term']) . "%'");

    while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
        $row_array['id'] = $row['id'];
		
		if (1==1)
		{
		  $row_array['value'] = $row['tags'];
		}
		else if (1==2)
		{
		  $row_array['name'] = $row['name'];
		}
		else
		{
		  $row_array['phone'] = $row['phone'];
        }

        array_push($return_arr, $row_array);
    }
}

echo json_encode($return_arr);
?>