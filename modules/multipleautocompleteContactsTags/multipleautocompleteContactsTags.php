<?php
class modules_multipleautocompleteContactsTags{

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
	
	$app->addHeadContent('<script src="'.htmlspecialchars($this->getBaseURL().'/js/multipleautocompleteContactsTags.js').'"></script>');
	
	if ( !class_exists('Dataface_FormTool')){
      $app->registerEventListener('Dataface_FormTool::init', array($this, '_registerWidget'));
    }else{
      $this->_registerWidget(Dataface_FormTool::getInstance());
    }
  }
  
  public function _registerWidget(Dataface_FormTool $formTool){
    $formTool->registerWidgetHandler('multipleautocompleteContactsTags', dirname(__FILE__).'/multipleautocompletewidgetContactsTags.php', 'Dataface_FormTool_multipleautocompleteContactsTags');
  }
}