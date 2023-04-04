<!DOCTYPE html>
<!-- <html lang="fr"> -->
<html <?= language_attributes() ?>>
<head>
    <meta charset="UTF-8">
    <title>oNews</title>
    <?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
      <header class="left">
        <?php // On souhaite rendre le logo cliquable uniquement que si l'on est ailleurs que sur la home 
        // On utilise la fonction WP is_home()
        if (is_home()) {
            ?>
            <h1 class="left__title">O'Clock Students News</h1>
            <?php
        } else {
            ?>
            <h1 class="left__title"><a href="<?= home_url() ?>" class="left__title-link">O'Clock Students News</a></h1>
            <?php
        }
        ?>

        <div class="left__paragraph">
          <h2 class="left__subtitle"><strong class="left__subtitle-strong">Latest news</strong> from our students</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque scelerisque suscipit nibh quis porttitor. Integer iaculis mi urna, a pulvinar quam adipiscing ut. Vivamus vel vestibulum mauris.
          </p>
        </div>
        <!-- <nav>
          <ul class="left__nav">
            <li class="left__nav-item"><a href="" class="left__nav-link">Plan du site</a></li>
            <li class="left__nav-item"><a href="" class="left__nav-link">Mentions légales</a></li>
            <li class="left__nav-item"><a href="contact.html" class="left__nav-link">Contact</a></li>
          </ul>
        </nav> -->

        <?php 
            // On reconstruit le menu en PHP en utilisant WP
            wp_nav_menu(
                [
                    'theme_location' => 'main',  // emplacement du menu
                    'menu_class' => 'left__nav', // classe du <ul>
                    'container' => 'nav',        // on indique la balise principale du menu (<nav>)
                    'add_li_class' => 'left__nav-item', // on ajoute une classe sur nos <li>
                    'add_a_class' => 'left__nav-link',  // on ajoute une classe sur nos <a>
                ]
                );
        
        ?>

      </header>
      <main class="right">
        <!-- emmet: h2+article*6>a+h3+div>(img+strong+time)+p+a -->
        <h2 class="right__title">Latest News</h2>