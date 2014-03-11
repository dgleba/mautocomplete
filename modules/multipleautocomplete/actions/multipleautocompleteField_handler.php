<?php
$field_name = $_POST['fname'];
$table_name = $_POST['tname'];
$table_exist = false;

$given = parse_ini_file('../../../tables/'. $table_name .'/multipleautocomplete.txt');

foreach ($given as $key => $value)
{
  if ($key == $field_name)
  {
    $table_name = $value;
    $table_exist = true;
  }
}

$file = 'multipleautocompleteField.tmp';

$handle = fopen($file, "w");
fwrite($handle, '1 = '. $table_name);
if(!$table_exist)
  fwrite($handle, '_tags');
fwrite($handle, PHP_EOL);
fwrite($handle, '2 = '. $field_name);
fclose($handle);
?>