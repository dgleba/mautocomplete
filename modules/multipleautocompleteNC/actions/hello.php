<?php
class actions_hello {
    function handle($params){
	
	    /*//file gets generated in app root, uncomment to see if function is running correctly
	    $handle = fopen("tmp.txt", 'w');
		fwrite($handle, "hello");
		fclose($handle);
	    */
		
        $hello = array("Hello World");
		header('Content-type: application/json; charset="'.Dataface_Application::getInstance()->_conf['oe'].'"');
        echo json_encode($hello);
    }
}
