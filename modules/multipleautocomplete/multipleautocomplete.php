<?php
class modules_multipleautocomplete {

  private $baseURL = null;

  public function getBaseURL(){
    if ( !isset($this->baseURL) ){
      $this->baseURL = Dataface_ModuleTool::getInstance()->getModuleURL(__FILE__);
    }
    return $this->baseURL;
  }

  public function __construct(){
    $s = DIRECTORY_SEPARATOR;
    $app = Dataface_Application::getInstance();
	
	$mt = Dataface_ModuleTool::getInstance();
		
    $mt->loadModule('modules_XataJax', 'modules/XataJax/XataJax.php');
		
	import('Dataface/FormTool.php');
	$ft = Dataface_FormTool::getInstance();
	$ft->registerWidgetHandler('multipleautocomplete', dirname(__FILE__).$s.'multipleautocompletewidget.php', 'Dataface_FormTool_multipleautocomplete');
  }
}