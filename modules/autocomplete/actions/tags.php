<?php
require_once "configphp.dbc";
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
mysql_select_db($dbname);
$return_arr = array();

/* If connection to database, run sql statement. */
if ($conn) {
    $fetch = mysql_query("SELECT * FROM contacts_tags where tags_list like '%" . mysql_real_escape_string($_GET['term']) . "%'");

    /* Retrieve and store in array the results of the query. */
    while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
        $row_array['id'] = $row['tags_id'];
        $row_array['value'] = $row['tags_list'];
        //$row_array['abbrev'] = $row['abbrev'];

        array_push($return_arr, $row_array);
    }
}

/* Free connection resources. */
//mysql_close($conn);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);
