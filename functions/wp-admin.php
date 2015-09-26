<?php

/* Mudar Icone dos Menus do WP */
/* ----------------------------------------- */
  // Pegar o unicode na url -> http://fontawesome.bootstrapcheatsheets.com/
  // add_action('admin_head', 'fontawesome_icon_dashboard');
  function fontawesome_icon_dashboard() {
     echo "<style type='text/css' media='screen'>
        #adminmenu #menu-posts-produto div.wp-menu-image:before { font-family:'FontAwesome' !important; content:'\\f0a4'; }  
     </style>";
  }

/* ----------------------------------------- Mudar Icone do CPT */    