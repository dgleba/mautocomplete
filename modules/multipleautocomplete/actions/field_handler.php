<?php
$field_name = $_POST['name'];

$file = 'field.ini';

$handle = fopen($file, "w");
fwrite($handle, '1 = ');
fwrite($handle, $field_name);
fclose($handle);
?>