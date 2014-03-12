<?php
session_start();

$multipleautocomplete_field_name = $_POST['fname'];
$multipleautocomplete_table_name = $_POST['tname'];
$table_exist = false;

$file_array = file("../../../tables/contacts/valuelists.ini");
$column_table_php_index = 1;
$valueindex = 1;

foreach ($file_array as $line_num => $line)
{
  if (strpos ($line, "SELECT"))
  {
    $column_table_php = explode("SELECT", $line);
    $column_table_php_list[$column_table_php_index] = $column_table_php[1];
	$column_table_php_index = $column_table_php_index + 1;
  }
}

foreach ($column_table_php_list as $key => $value)
{
  if (strpos ($value, "FROM"))
  {
    $column_table = explode("FROM", $value);
    $columnlist[$valueindex] = trim($column_table[0]);
    $table_roughlist[$valueindex] = $column_table[1];
	$valueindex = $valueindex + 1;
  }
}

foreach ($table_roughlist as $key => $value)
{
    $table_templist = explode('"', $value);
    $tablelist[$key] = trim($table_templist[0]);
}

$valuelist = array_combine($columnlist, $tablelist);

print_r($valuelist);

foreach ($valuelist as $key => $value)
{
  if ($key == $multipleautocomplete_field_name)
  {
    $multipleautocomplete_table_name = $value;
    $table_exist = true;
  }
}

if(!$table_exist)
  $multipleautocomplete_table_name = $multipleautocomplete_table_name.'_tags';
  
$_SESSION['field_name'] = $multipleautocomplete_field_name;
$_SESSION['table_name'] = $multipleautocomplete_table_name;
?>