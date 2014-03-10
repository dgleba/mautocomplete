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
	
	$app->addHeadContent('<script src="'.htmlspecialchars($this->getBaseURL().'/js/multipleautocompleteTags.js').'"></script>');
  }
}