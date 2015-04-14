<?php

/**
 * Limitar o número de caracteres baseado na $excerpt
 *
 * @since Bigo 2.0
 */
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

/* Cria opções de páginas */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	acf_add_options_sub_page('Geral');
	// acf_add_options_sub_page('Header');
	// acf_add_options_sub_page('Footer');
	
}
/* Cria campo personalizado do logotipo */
add_action('acf/register_fields', 'my_register_fields_function');
function my_register_fields_function() {
  if (function_exists('register_field_group')) {
    // use the field group you export from ACF for $campos_bigo
    $campos_bigo = array(
		'key' => 'group_552c19fc1dd7c',
		'title' => 'Logotipo',
		'fields' => array (
			array (
				'key' => 'field_552c1a01a03f6',
				'label' => 'Opções do site',
				'name' => 'logotipo',
				'prefix' => '',
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
				'preview_size' => 'full',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => '',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));
    register_field_group($campos_bigo);
  }
}
// if( function_exists('register_field_group') ):

// register_field_group(array (
// 	'key' => 'group_552c19fc1dd7c',
// 	'title' => 'Logotipo',
// 	'fields' => array (
// 		array (
// 			'key' => 'field_552c1a01a03f6',
// 			'label' => 'Opções do site',
// 			'name' => 'logotipo',
// 			'prefix' => '',
// 			'type' => 'image',
// 			'instructions' => '',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array (
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'return_format' => 'array',
// 			'preview_size' => 'full',
// 			'library' => 'all',
// 			'min_width' => '',
// 			'min_height' => '',
// 			'min_size' => '',
// 			'max_width' => '',
// 			'max_height' => '',
// 			'max_size' => '',
// 			'mime_types' => '',
// 		),
// 	),
// 	'location' => array (
// 		array (
// 			array (
// 				'param' => 'options_page',
// 				'operator' => '==',
// 				'value' => '',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// ));

// endif;

// /* Cria repeater do banner principal para slider */
// if( function_exists('register_field_group') ):
// register_field_group(array (
// 	'key' => 'group_552c0e6260dfe',
// 	'title' => 'Banner',
// 	'fields' => array (
// 		array (
// 			'key' => 'field_552c0e7603fec',
// 			'label' => 'Slider Principal',
// 			'name' => 'slider_principal',
// 			'prefix' => '',
// 			'type' => 'repeater',
// 			'instructions' => '',
// 			'required' => 0,
// 			'conditional_logic' => 0,
// 			'wrapper' => array (
// 				'width' => '',
// 				'class' => '',
// 				'id' => '',
// 			),
// 			'min' => '',
// 			'max' => '',
// 			'layout' => 'block',
// 			'button_label' => 'Adicionar Novo',
// 			'sub_fields' => array (
// 				array (
// 					'key' => 'field_552c0f8e03fed',
// 					'label' => 'Imagem',
// 					'name' => 'imagem_slider',
// 					'prefix' => '',
// 					'type' => 'image',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array (
// 						'width' => 50,
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'return_format' => 'array',
// 					'preview_size' => 'banner-topo',
// 					'library' => 'all',
// 					'min_width' => '',
// 					'min_height' => '',
// 					'min_size' => '',
// 					'max_width' => '',
// 					'max_height' => '',
// 					'max_size' => '',
// 					'mime_types' => '',
// 				),
// 				array (
// 					'key' => 'field_552c104903fef',
// 					'label' => 'Descrição',
// 					'name' => 'descricao_slider',
// 					'prefix' => '',
// 					'type' => 'textarea',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array (
// 						'width' => 50,
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 					'maxlength' => '',
// 					'rows' => 4,
// 					'new_lines' => '',
// 					'readonly' => 0,
// 					'disabled' => 0,
// 				),
// 				array (
// 					'key' => 'field_552c102a03fee',
// 					'label' => 'Título',
// 					'name' => 'titulo_slider',
// 					'prefix' => '',
// 					'type' => 'text',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array (
// 						'width' => 50,
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 					'prepend' => '',
// 					'append' => '',
// 					'maxlength' => '',
// 					'readonly' => 0,
// 					'disabled' => 0,
// 				),
// 				array (
// 					'key' => 'field_552c106103ff0',
// 					'label' => 'Link',
// 					'name' => 'link_slider',
// 					'prefix' => '',
// 					'type' => 'url',
// 					'instructions' => '',
// 					'required' => 0,
// 					'conditional_logic' => 0,
// 					'wrapper' => array (
// 						'width' => 50,
// 						'class' => '',
// 						'id' => '',
// 					),
// 					'default_value' => '',
// 					'placeholder' => '',
// 				),
// 			),
// 		),
// 	),
// 	'location' => array (
// 		array (
// 			array (
// 				'param' => 'options_page',
// 				'operator' => '==',
// 				'value' => '',
// 			),
// 		),
// 	),
// 	'menu_order' => 0,
// 	'position' => 'normal',
// 	'style' => 'default',
// 	'label_placement' => 'top',
// 	'instruction_placement' => 'label',
// 	'hide_on_screen' => '',
// ));

// endif;