<?php
class Dataface_FormTool_multipleautocomplete
{       
  function buildWidget($record, &$field, $form, $formFieldName, $new=false)
  {
    $factory = Dataface_FormTool::factory();
	$widget =& $field['widget'];
			
	$atts = array(
      'class' => 'xf-multipleautocomplete'
    );

    $el = $factory->addElement('text', $formFieldName, $widget['label'], $atts);
            
    return $el;
  }
}
