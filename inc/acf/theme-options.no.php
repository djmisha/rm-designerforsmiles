<?php

class rm_theme_options{
	public function __construct(){
		if( function_exists('acf_add_options_sub_page') )
		{
		    //add parent
		    $parent = acf_add_options_page(array(
		        'page_title'	=> 'Theme Settings',
		        'menu_title'	=> 'Theme Settings',
		        'redirect'		=> true,
		        'capability'	=> 'manage_options',
		        'position' => 3
		    ));

				// add sub page
				acf_add_options_sub_page(array(
					'page_title' 	=> 'Contact Info',
					'menu_title' 	=> 'Contact Info',
					'parent_slug' 	=> $parent['menu_slug'],
				));

				// add sub page
				acf_add_options_sub_page(array(
					'page_title' 	=> 'Social Media',
					'menu_title' 	=> 'Social Media',
					'parent_slug' 	=> $parent['menu_slug'],
				));

				// add sub page
				acf_add_options_sub_page(array(
					'page_title' 	=> 'Google Analytics',
					'menu_title' 	=> 'Google Analytics',
					'parent_slug' 	=> $parent['menu_slug'],
				));

		}
	}
}
$rm_theme_options = new rm_theme_options();

function acf_get_theme_option( $val = null ){
	$theme_options_rebuild = array();
	if(!function_exists('get_field')) return;
	$theme_options =  get_field('options', 'option');
	if(empty($theme_options)) return;
	foreach($theme_options as $key => $array):

		/* BUILD options array */
		switch ($array['acf_fc_layout']):
			case 'social':
				$theme_options_rebuild['social'][$array['social_type']] = $array['social_link'];
			break;
			case 'phone':
				$theme_options_rebuild['phone'][$array['unique_key']] = $array['phone'];
			break;
			// case 'address':
			// 	$theme_options_rebuild['address'][$array['unique_key']] = $array['address'];
			// break;
			default:
				$default = $array['acf_fc_layout'];
				$unique_key = $array['unique_key'];
				unset($array['acf_fc_layout']);
				unset($array['unique_key']);
				$theme_options_rebuild[$default][$unique_key] = $array;
			break;
		endswitch;

	endforeach;

	if(!empty($val)):
		$val = preg_replace('/\s+/', '', $val);
		$val = explode('/', $val);
		$val = array_filter($val);

		/*
		* Sort through options
		*/
		foreach($val as $key):
			if(array_key_exists($key, $theme_options_rebuild)):
				$theme_options_rebuild = $theme_options_rebuild[$key];
			else:
				return 'sorry, that option was not available';
			endif;

		endforeach;
			return $theme_options_rebuild;
	endif;
}

function acf__getopt( $atts = null ) {
	extract( shortcode_atts( array( 'opt'=>'' ),$atts ) );
	ob_start();

		if(!empty($opt)):
			echo acf_get_theme_option($opt);
		endif;
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'acf_getopt','acf__getopt' );

function getThemeopt($val = null , $echo = false){
	if($echo == true):
		echo acf_get_theme_option($val);
	else:
		return acf_get_theme_option($val);
	endif;
}



//Setup New ACF Theme Fields
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58fe268279cc6',
	'title' => 'Google Map Site Options',
	'fields' => array (
		array (
			'key' => 'field_590934b2c6d88',
			'label' => 'Always Show Sidebar',
			'name' => 'always_show_sidebar',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array (
			'key' => 'field_58fe2780968b1',
			'label' => 'Map Marker',
			'name' => 'map_marker',
			'type' => 'image',
			'instructions' => 'Should probably be a .png',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_58fe27a3968b3',
			'label' => 'API Key',
			'name' => 'api_key',
			'type' => 'text',
			'instructions' => '<ul><li><a target="_blank" href="https://developers.google.com/maps/documentation/javascript/get-api-key">Click here for Google Map API Key</a></li>
<li>Click "Get a Key"</li>
<li>Create a new project and title it the same as the website title</li>
<li>Copy and Paste API Key</li></ul>',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_58ffba11c8562',
			'label' => 'Map Zoom',
			'name' => 'map_zoom',
			'type' => 'number',
			'instructions' => 'Select zoom level 1-16',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => 1,
			'max' => 16,
			'step' => '',
		),
		array (
			'key' => 'field_58ffc3a7f1c82',
			'label' => 'Scrollable',
			'name' => 'scrollable',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array (
			'key' => 'field_58ffc3bdf1c83',
			'label' => 'Dragable',
			'name' => 'dragable',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array (
			'key' => 'field_58ffba44e248c',
			'label' => 'Zoom in on Click',
			'name' => 'zoom_in_on_click',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array (
			'key' => 'field_58ffba5fe248d',
			'label' => 'Secondary Zoom Level',
			'name' => 'secondary_zoom_level',
			'type' => 'number',
			'instructions' => 'Enter zoom level: 1-16',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_58ffba44e248c',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
		),
		array (
			'key' => 'field_58fe27d4968b5',
			'label' => 'Map Styling',
			'name' => 'map_styling',
			'type' => 'textarea',
			'instructions' => 'Add JSON here to override default styling.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 20,
			'new_lines' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-contact-info',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_570d26d9672d5',
	'title' => 'Options Page - Contact Info Repeater',
	'fields' => array (
		array (
			'key' => 'field_570d26f83bf7e',
			'label' => 'Locations Repeater',
			'name' => 'locations_repeater',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_570d27083bf7f',
			'min' => 0,
			'max' => 0,
			'layout' => 'block',
			'button_label' => 'Add Location',
			'sub_fields' => array (
				array (
					'key' => 'field_58ffc4acfc28d',
					'label' => 'Location Information',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => 'field_570d27083bf7f',
					'label' => 'Location Name',
					'name' => 'location_name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_570d27223bf82',
					'label' => 'Phone Number',
					'name' => 'location_phone_number',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_570d27113bf80',
					'label' => 'Address',
					'name' => 'location_address',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_570d27113sf20',
					'label' => 'Phone Link',
					'name' => 'location_phone_link',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_570d271e3bf20',
					'label' => 'Fax',
					'name' => 'location_fax',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_5s0d27113bf20',
					'label' => 'GMap Link',
					'name' => 'gmap_link',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array (
					'key' => 'field_571011e8f87ad',
					'label' => 'Practice Hours',
					'name' => 'location_hours',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 0,
					'max' => 0,
					'layout' => 'table',
					'button_label' => 'Add Hours',
					'sub_fields' => array (
						array (
							'key' => 'field_57101212f87ae',
							'label' => 'Hours Open',
							'name' => 'hours_open',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
					),
				),
				array (
					'key' => 'field_58fe22bac7092',
					'label' => 'Google Map',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => 'field_58fe2152ec86d',
					'label' => 'Map',
					'name' => 'map',
					'type' => 'google_map',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'center_lat' => '',
					'center_lng' => '',
					'zoom' => 16,
					'height' => 500,
				),
				array (
					'key' => 'field_58fe23567f349',
					'label' => 'Google Map Marker Content',
					'name' => '',
					'type' => 'tab',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'placement' => 'left',
					'endpoint' => 0,
				),
				array (
					'key' => 'field_58fe22d6c7094',
					'label' => 'Map Marker Content',
					'name' => 'map_marker_content',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-contact-info',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_56d724c6df45c',
	'title' => 'Options Page - Google Analtyics',
	'fields' => array (
		array (
			'key' => 'field_56d724d680238',
			'label' => 'Google Analytics',
			'name' => 'google_analytics',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 12,
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-google-analytics',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_570d2d78236e4',
	'title' => 'Options Page - Social Media',
	'fields' => array (
		array (
			'key' => 'field_570d2e2056cda',
			'label' => 'Select Networks',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_570d2e3256cdb',
			'label' => 'Select Social Networks',
			'name' => 'network_select_box',
			'type' => 'checkbox',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array (
				'facebook' => 'Facebook',
				'twitter' => 'Twitter',
				'instagram' => 'Instagram',
				'googleplus' => 'Google Plus',
				'linkedin' => 'Linked In',
				'pinterest' => 'Pinterest',
				'youtube' => 'YouTube',
				'rssfeed' => 'RSS	Feed',
			),
			'default_value' => array (
			),
			'layout' => 'vertical',
			'toggle' => 0,
			'allow_custom' => 0,
			'save_custom' => 0,
			'return_format' => 'value',
		),
		array (
			'key' => 'field_570d2d8156cd3',
			'label' => 'Facebook',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_570d2e3256cdb',
						'operator' => '==',
						'value' => 'facebook',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_570d2dcb56cd6',
			'label' => 'Facebook Icon',
			'name' => 'facebook_icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'id',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_570d2dc056cd5',
			'label' => 'Facebook Link',
			'name' => 'facebook_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_570d2de056cd7',
			'label' => 'Twitter',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_570d2e3256cdb',
						'operator' => '==',
						'value' => 'twitter',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_570d2dee56cd8',
			'label' => 'Twitter Icon',
			'name' => 'twitter_icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_570d2e0256cd9',
			'label' => 'Twitter Link',
			'name' => 'twitter_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_570d2ef359737',
			'label' => 'Instagram',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_570d2e3256cdb',
						'operator' => '==',
						'value' => 'instagram',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_570d2f1759738',
			'label' => 'Instagram Icon',
			'name' => 'instagram_icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_570d2f2559739',
			'label' => 'Instagram Link',
			'name' => 'instagram_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_570d2fbc393bd',
			'label' => 'Google Plus',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_570d2e3256cdb',
						'operator' => '==',
						'value' => 'googleplus',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_570d2fca393be',
			'label' => 'Google Plus Icon',
			'name' => 'google_plus_icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_570d2fd7393bf',
			'label' => 'Google Plus Link',
			'name' => 'google_plus_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_570d2f2e5973a',
			'label' => 'Linked In',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_570d2e3256cdb',
						'operator' => '==',
						'value' => 'linkedin',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_570d2f415973b',
			'label' => 'Linked In Icon',
			'name' => 'linked_in_icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_570d2f4d5973c',
			'label' => 'Linked In Link',
			'name' => 'linked_in_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_570d2f8d393ba',
			'label' => 'Pinterest',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_570d2e3256cdb',
						'operator' => '==',
						'value' => 'pinterest',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_570d2f9d393bb',
			'label' => 'Pinterest Icon',
			'name' => 'pinterest_icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_570d2fb0393bc',
			'label' => 'Pinterest Link',
			'name' => 'pinterest_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_570d328213d7f',
			'label' => 'YouTube',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_570d2e3256cdb',
						'operator' => '==',
						'value' => 'youtube',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_570d329013d80',
			'label' => 'YouTube Icon',
			'name' => 'youtube_icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_570d329b13d81',
			'label' => 'YouTube Link',
			'name' => 'youtube_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_578e478e7d71a',
			'label' => 'RSS Feed',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array (
				array (
					array (
						'field' => 'field_570d2e3256cdb',
						'operator' => '==',
						'value' => 'rssfeed',
					),
				),
			),
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array (
			'key' => 'field_578e47967d71b',
			'label' => 'RSS Feed Icon',
			'name' => 'rss_feed_icon',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_578e479a7d71c',
			'label' => 'RSS Feed Link',
			'name' => 'rss_feed_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-social-media',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;