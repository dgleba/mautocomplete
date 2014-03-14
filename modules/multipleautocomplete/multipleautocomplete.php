<?php
session_start();
$sitepath = $ENV.DATAFACE_SITE_PATH;
$_SESSION['site_path'] = $sitepath;

$working_dir = 'modules/multipleautocomplete/actions';
$current_dir = dirname(__FILE__);
$findme = 'xataface';
$pos = strpos($current_dir, $findme);

if ($pos !== false)
{
  $working_dir = '../xataface/modules/multipleautocomplete/actions';
}
?>

<script>
var working_dir = <?php echo json_encode($working_dir); ?>;
</script>

<?php
class modules_multipleautocomplete
{
  private $baseURL = null;
  
  public function getBaseURL()
  {
    if (!isset($this->baseURL))
	{
      $this->baseURL = Dataface_ModuleTool::getInstance()->getModuleURL(__FILE__);
    }
    return $this->baseURL;
  }
  
  public function __construct()
  {
    $s = DIRECTORY_SEPARATOR;
    $app = Dataface_Application::getInstance();
	
	$app->addHeadContent('<script src="'.htmlspecialchars($this->getBaseURL().'/js/multipleautocomplete.js').'"></script>');
	
	if ( !class_exists('Dataface_FormTool'))
	{
      $app->registerEventListener('Dataface_FormTool::init', array($this, '_registerWidget'));
    }
	else
	{
      $this->_registerWidget(Dataface_FormTool::getInstance());
    }
  }
  
  public function _registerWidget(Dataface_FormTool $formTool)
  {
    $formTool->registerWidgetHandler('multipleautocomplete', dirname(__FILE__).'/multipleautocompletewidget.php', 'Dataface_FormTool_multipleautocomplete');
  }
}
?>