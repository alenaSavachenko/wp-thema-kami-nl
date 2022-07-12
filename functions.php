<?php


// Register your menus
function my_custom_menus() {
    $locations = array(
        'fomenu'   => __( 'HeaderMenu', 'hMenu' ),
        'kismenu'  => __( 'Footermenu', 'smaragdkerteszet' ),
    );
    register_nav_menus( $locations );
 }

// Hook them into the theme-'init' action
add_action( 'after_setup_theme', 'my_custom_menus' );

function add_customer_style()
{
       
    /* bootstrap   jQuery first, then Popper.js, then Bootstrap JS*/
    wp_register_script('jquery-cdn', 'https://code.jquery.com/jquery-3.2.1.slim.min.js',false, true);
    wp_enqueue_script('jquery-cdn');
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',false,true);
    wp_register_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery-cdn'),false,true);
    
    wp_enqueue_script('popper');
    wp_enqueue_script('bootstrap-js');    
 
    //wp_enqueue_style( 'bootstrap-style',  get_template_directory_uri().'/b.css'); 
    wp_enqueue_style( 'bootstrap-style',  "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"); 
    wp_enqueue_style( 'customer-style',  get_template_directory_uri().'/style.css');
    wp_enqueue_style( 'top-menu-style',  get_template_directory_uri().'/assets/css/top-menu-style.css');
    wp_enqueue_style( 'front-page-style',  get_template_directory_uri().'/assets/css/front-page-style.css');
    wp_enqueue_style( 'footer-style',  get_template_directory_uri().'/assets/css/footer-style.css');
    wp_enqueue_style( 'aboutme-style',  get_template_directory_uri().'/assets/css/aboutme.css');
    wp_enqueue_style( 'face-style',  get_template_directory_uri().'/assets/css/face.css');

    wp_enqueue_style( 'gallery-style',  get_template_directory_uri().'/assets/css/gallery.css');

    wp_enqueue_style( 'products-style',  get_template_directory_uri().'/assets/css/products.css');

    /* jquer version   3.2.1  */



}

function codeheim_dropdown()
{     

}

add_action('wp_enqueue_scripts', 'add_customer_style' );


//sidebar

//sidebar

function rd_wd_init ()
{
    register_sidebar ( array ( 
    'name'=>'sidebar-right',
    'id'=> 'right'
    
    ));
	
	  register_sidebar ( array ( 
    'name'=>'sidebar-footer',
    'id'=> 'footer'
    
    ));
}




add_action ('widgets_init', 'rd_wd_init');
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'size-front-p', 370, 280);
add_image_size( 'news', 260, 170);


 
function my_more_link($more_link, $more_link_text) {
    $more_link = preg_replace( '|#more-[0-9]+|', '', $more_link );
    return $more_link;
}
add_filter('the_content_more_link', 'my_more_link', 10, 2);

//rss


	
