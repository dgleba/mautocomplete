<?php
class modules_autocomplete {

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

    $jt = Dataface_JavascriptTool::getInstance();
    $app->addHeadContent('<script src="'.htmlspecialchars($this->getBaseURL().'/js/tagTest.js').'"></script>');

    $jt->addPath(dirname(__FILE__).$s.'js', $this->getBaseURL().'/js');
  }
}