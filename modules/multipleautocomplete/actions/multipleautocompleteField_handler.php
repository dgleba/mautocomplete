<?php
$field_name = $_POST['fname'];
$table_name = $_POST['tname'];

$file = 'multipleautocompleteField.tmp';

$handle = fopen($file, "w");
fwrite($handle, '1 = ');
fwrite($handle, $table_name);
fwrite($handle, '_tags'. PHP_EOL);
fwrite($handle, '2 = ');
fwrite($handle, $field_name);
fclose($handle);
?>