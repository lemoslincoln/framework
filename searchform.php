<form id="search-box" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="sr-only">Buscar no site</span>
		<input type="search" class="search-field" placeholder="Buscar no site..." value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<button type="submit" class="btn btn-success">
     <i class="fa fa-search"></i> 
 </button>
</form>