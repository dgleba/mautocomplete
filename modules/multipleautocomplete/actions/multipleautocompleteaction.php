<?php
class actions_multipleautocompleteaction
{
  function handle($params)
  {
      $multipleautocomplete_field_name = "[".$_GET['fname']."]";
      $multipleautocomplete_table_name = $_GET['tname'];
	  
      $site_path = DATAFACE_SITE_PATH;
      
      $field_check = false;
      
      $fields_array = file($site_path . "/tables/". $multipleautocomplete_table_name ."/fields.ini");
      
      foreach($fields_array as $line)
      {
        if (trim($line) == $multipleautocomplete_field_name)
          $field_check = true;
        if(stripos($line, "vocabulary") !== false && $field_check)
        {
          $field_check = false;
	      $vocab_line = explode("=", $line);
	      $multipleautocomplete_field_name = "[" . trim($vocab_line[1]) . "]";
	      break;
        }
      }
      
      $file_array = file($site_path . "/tables/" . $multipleautocomplete_table_name . "/valuelists.ini");
      
      //isolate the sql command
      foreach($file_array as $line)
      {
        if (trim($line) == $multipleautocomplete_field_name)
          $field_check = true;
        if(stripos($line, "sql") !== false && $field_check)
        {
          $field_check = false;
	      $vocab_line = explode("=", $line);
	      $column_table_full = trim($vocab_line[1]);
	      break;
        }
      }
      
      //get rid of the quotations
      $rough_column_table_less = explode('"', $column_table_full);
      $column_table_less = trim($rough_column_table_less[1]);
      
      //get rid of where and order since we only want the column and table names
      if (stripos($column_table_less, "where") !== false)
      {
        if (strpos($column_table_less, "WHERE") !== false)
          $rough_where_column_table = explode('WHERE', $column_table_less);
        elseif (strpos($column_table_less, "where") !== false)
          $rough_where_column_table = explode('where', $column_table_less);
        $column_table_less = trim($rough_where_column_table[0]);
      }
      
      if (stripos($column_table_less, "order") !== false)
      {
        if (strpos($column_table_less, "ORDER") !== false)
          $rough_order_column_table = explode('ORDER', $column_table_less);
        if (strpos($column_table_less, "order") !== false)
          $rough_order_column_table = explode('order', $column_table_less);
        $column_table_less = trim($rough_order_column_table[0]);
      }
      
      //get rid of select, now we have 'column FROM table'
      if (strpos($column_table_less, "SELECT") !== false)
        $rough_column_table = explode('SELECT', $column_table_less);
      elseif (strpos($column_table_less, "select") !== false)
        $rough_column_table = explode('select', $column_table_less);
      $column_table = trim($rough_column_table[1]);
      
      //get rid of FROM and retrieve the column and table names
      if (strpos($column_table, "FROM") !== false)
        $rough_column_table_split = explode('FROM', $column_table);
      elseif (strpos($column_table, "from") !== false)
        $rough_column_table_split = explode('from', $column_table);
      
      //save the names to variables
      $multipleautocomplete_field_name = trim($rough_column_table_split[0]);
      $multipleautocomplete_table_name = trim($rough_column_table_split[1]);

      $multipleautocomplete_database = parse_ini_file($site_path."/config.dbc");
      
      foreach ($multipleautocomplete_database as $key => $value)
      {
        if ($key == 'host')
          $dbhost = $value;
        elseif ($key == 'user')
          $dbuser = $value;
        elseif ($key == 'password')
          $dbpass = $value;
        elseif ($key == 'name')
          $dbname = $value;
      }
      
      $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');
      mysql_select_db($dbname);
      $return_arr = array();
      
      if ($conn)
      {
        $fetch = mysql_query("SELECT * FROM ". $multipleautocomplete_table_name ." WHERE ". $multipleautocomplete_field_name ." like '%" . mysql_real_escape_string($_GET['term']) . "%'");
        
        while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC))
        {
          $row_array['value'] = $row[$multipleautocomplete_field_name];
          array_push($return_arr, $row_array);
        }
      }
      
      header('Content-type: application/json; charset="'.Dataface_Application::getInstance()->_conf['oe'].'"');
      echo json_encode($return_arr);
      }
}
