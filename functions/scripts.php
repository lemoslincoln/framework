<?php
/* Substituir palavra 'nome'. */
// add_action( 'init', 'register_cpt_nome' );

// function register_cpt_nome() {

//     $labels = array( 
//         'name' => _x( 'Nomes', 'nome' ),
//         'singular_name' => _x( 'Nome', 'nome' ),
//         'add_new' => _x( 'Adicionar Novo', 'nome' ),
//         'add_new_item' => _x( 'Adicionar Novo Item', 'nome' ),
//         'edit_item' => _x( 'Editar', 'nome' ),
//         'new_item' => _x( 'Novo', 'nome' ),
//         'view_item' => _x( 'Ver', 'nome' ),
//         'search_items' => _x( 'Buscar', 'nome' ),
//         'not_found' => _x( 'Nada encontrado', 'nome' ),
//         'not_found_in_trash' => _x( 'Nenhum item na lixeira', 'nome' ),
//         'parent_item_colon' => _x( 'Parent Nome:', 'nome' ),
//         'menu_name' => _x( 'Nomes', 'nome' ),
//     );

//     $args = array( 
//         'labels' => $labels,
//         'hierarchical' => true,
//         'description' => 'Registro completo de custom post, substituir palavra \'nome\'.',
//         'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
//         'taxonomies' => array( 'category', 'post_tag', 'page-category', 'taxnome' ),
//         'public' => true,
//         'show_ui' => true,
//         'show_in_menu' => true,
//         'menu_position' => 5,
//         'menu_icon' => 'dashicons-heart',
//         'show_in_nav_menus' => true,
//         'publicly_queryable' => true,
//         'exclude_from_search' => false,
//         'has_archive' => true,
//         'query_var' => true,
//         'can_export' => true,
//         'rewrite' => true,
//         'capability_type' => 'post'
//     );

//     register_post_type( 'nome', $args );
// }