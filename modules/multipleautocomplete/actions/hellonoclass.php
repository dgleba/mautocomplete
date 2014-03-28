<?php
$hello = array("Hello World");
//header('Content-type: application/json; charset="'.Dataface_Application::getInstance()->_conf['oe'].'"');
echo json_encode($hello);
