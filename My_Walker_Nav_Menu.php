<?php
// свой класс построения меню:
class My_Walker_Nav_Menu extends Walker_Nav_Menu {

	// add classes to ul sub-menus
	function start_lvl( &$output, $depth = 0, $args = NULL ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'menu-items',		
			'menu-depth-' . $display_depth
			);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}

	// add main/sub classes to li's and links
	function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0) {		
		//inicializacija massiva classy	
	    
		    
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			
		$depth_classes = array(
        ( $depth == 0 ? 'main-menu-item-customer' : 'sub-menu-item' ),    
        'menu-item-depth-' . $depth,
		($this->has_children?'li-heading':'')
    );    	
	    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );	
		$output .= "<li class='" . $depth_class_names . "  " . $class_names."'>"; 
		
						 // compare strings, if homepage
		 
		 if (strcasecmp($item->title, 'home') == 0)
		 {
			   $output .= '<i class="fa fa-home"></i>';
		 }
		 
		 
		 if ($item->url == '#')
		 {
			 $output .= '<span class="dropdown-heading">';
			 
		 }
		 
		 elseif  (	$item->url)
		 {
			   	$atts = ' class="' . ( $depth == 0&&!$this->has_children ? 'main-links' : '' ) . '"';
			 	$output .= '<a href="' . $item->url .'"' .$atts.'>';
				
		 }
		
		$output .= $item->title;
		
				 if ($item->url == '#')
		 {
			 $output .= '</span>';
			 
		 }
		 
		 elseif  (	$item->url)
		 {
			 $output .= '</a>';
		 }
		

		 
		 
		/*if ($item->url) {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		} 
		
		$output .= $item->title;
 
		if ($item->url) {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}   */





		/* link attributes
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ' class="' . ( $depth == 0&&!$this->has_children ? 'main-links' : 'main-links2' ) . '"';

		$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			$args->before,
			$attributes,
			$args->link_before,
			apply_filters( 'the_title', $item->title, $item->ID ),
			$args->link_after,
			$args->after
		);

		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );  */
		

}

}
