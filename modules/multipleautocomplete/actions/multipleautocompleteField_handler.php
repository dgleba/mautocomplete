<?php
$field_name = $_POST['fname'];
$table_name = $_POST['tname'];

$file = 'multipleautocompleteField.tmp';

$handle = fopen($file, "w");
fwrite($handle, '1 = '. $table_name . '_tags');
fwrite($handle, PHP_EOL);
fwrite($handle, '2 = '. $field_name);
fclose($handle);
?>