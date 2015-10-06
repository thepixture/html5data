<?php 
 
//Anzeige im Backend
foreach( $GLOBALS['TL_DCA']['tl_content']['palettes'] as $strField => $strPalette )
{
	 if (in_array($strField, array('__selector__')))
		continue; 
		
	$GLOBALS['TL_DCA']['tl_content']['palettes'][$strField] = preg_replace('@([;|,]space)([;|,])@', '$1,html5data$2', $strPalette);
} 

//Beschreibung des Feldes
//Setzt auf die Erweiterung multitextWizard
$GLOBALS['TL_DCA']['tl_content']['fields']['html5data'] = array
(
		'label'           => &$GLOBALS['TL_LANG']['tl_content']['html5data'],
		'inputType'       => 'multitextWizard',
		'eval'					  => array
										(
											'style'=>'width:100%;',
											'columns' => array
												(
												array
													(
													  'name' => 'attribute', // optional
													  'label' => &$GLOBALS['TL_LANG']['tl_content']['html5data_attribute_name'],
													  'width' => '300px' // optional, z.B. '150px' oder '20%'
													),
													array
													(
													  'name' => 'value',  // optional
													  'label' => &$GLOBALS['TL_LANG']['tl_content']['html5data_attribute_value'],
													)												
												),
											'tl_class'=>'long clr',
											'doNotSaveEmpty'=>true
										),
		'sql'              => "blob NULL"
);