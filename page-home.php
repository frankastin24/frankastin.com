<?php

get_header();
?>
<section id="home-hero">
    <div class="overlay">
        
        <div class="container relative">

            <h1>FRANK<br>ASTIN</h1>

            <h2>Full Stack Developer <br>Graphic Designer <br>Music Producer</h2>
            
            <h2>Cumbria, UK</h2>
            <img src="<?= IMG_URL; ?>/frank-astin-stance.png" />
            <a id="home-github" href="https://github.com/frankastin24"><img src="<?= IMG_URL;?>/github.svg"/></a>
            <a id="home-facebook" href="https://www.facebook.com/profile.php?id=61550778795381"><img src="<?= IMG_URL;?>/facebook.svg"/></a>
        </div>

        <canvas id="skills"></canvas>

    </div>
</section>

<?php
get_footer();
