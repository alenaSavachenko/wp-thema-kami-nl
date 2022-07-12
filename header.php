<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php wp_head();  ?>

    </head>
<body>

<div id="page-body" >



        <!-- Navigation bar -->
        <header class="header">
            <!-- Logo -->
            <a href="#" class="logo">KM </a>

            <!-- Hamburger icon -->
            <input class="side-menu" type="checkbox" id="side-menu"/>
            <label class="hamb" for="side-menu"><span class="hamb-line"></span></label>

            <!-- Menu -->

            <?php 	wp_nav_menu( [
                'theme_location'  => 'HeaderMenu',
                'menu'            => 'hMenu',
                'container'       => 'nav',
                'container_class' => 'top-nav',
                'menu_class'      => 'kami-menu',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 2,
               // 'walker'          => new My_Walker_Nav_Menu()
            ] );
            ?>

        </header>

        <main>
            <div class="main-content">





