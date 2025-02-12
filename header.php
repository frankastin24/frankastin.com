<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<link rel="preload" href="<?= get_template_directory_uri(  );?>/fonts/Roobert.woff2" as="font" type="font/woff2" crossorigin>
<?php wp_body_open(); ?>

<header id="main-header">
<div class="container flex space-between">
<a id="om" class="flex center-both" href="/"><img  src="<?= IMG_URL;?>/om-circle.svg"/></a>
<nav>
     <ul class="flex">
        <li><a href="/work">WORK</a>
        <ul>
            <li><a href="/work/development">WEB DEVELOPMENT</a></li>
            <li><a href="/work/design">GRAPHIC DESIGN</a></li>
        </ul>
        </li>
        <li><a href="/about">ABOUT</a></li>
        <li><a href="/contact">CONTACT</a></li>
     </ul>
</nav>
</div>
</header>
