<?php
class Dataface_FormTool_multipleautocompleteContactsTags {
        
        function buildWidget($record, &$field, $form, $formFieldName, $new=false){
                
            $factory = Dataface_FormTool::factory();
			
			$atts = array(
                'class' => 'xf-multipleautocompleteContactsTags'
            );

            $el = $factory->addElement('text', $formFieldName, $widget['label'], $atts);
            
            return $el;
        }
}
?>