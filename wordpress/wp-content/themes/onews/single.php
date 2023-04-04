<?php echo 'Page single'; ?>
<?php get_header(); ?>

<?php // On récupère les données nécessaires à l'affichage ?>
<?php //var_dump(get_post()); ?>
<?php $post = get_post(); ?>
<?php $postID = $post->ID; ?>
<?php //var_dump($postID); ?>
<?php $imageUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
<?php //var_dump($imageUrl); ?>

<h2 class="right__title"><?= single_post_title() ?></h2>

          <?php if (have_posts()) : ?>
            <div class="posts">
            <?php while (have_posts()) : the_post(); ?>
            <!-- On doit récupérer la ou les catégories de l'article -->
            <?php $categories = get_the_category(); ?>
            <article class="post post--solo">
                <!-- On boucle sur les catégories pour afficher la ou les catégories auxquelles est rattaché l'article -->
                <?php foreach($categories as $category) : ?>
                  <a href="<?php echo get_category_link($category) ?>" class="post__category post__category--color-<?php echo $category->category_nicename ?>"><?= $category->name ?></a>
                <?php endforeach; ?>
              <!-- On doit récupérer le titre de l'article -->
              <div class="post__meta">
                <!-- On doit récupérer l'image de l'auteur -->
                <img class="post__author-icon" src="<?= get_the_post_thumbnail_url() ?>" alt="">  
                <!-- On doit récupérer le nom de l'auteur -->
                <strong class="post__author"><?= get_the_author() ?></strong>
                <!-- On doit récupérer la date de publication -->
                <time datetime="<?= get_the_date('Y-m-d'); ?>">le <?= get_the_date() ?></time>
              </div>
              <!-- On doit récupérer le contenu de l'article -->
              <p><?= the_content() ?></p>
              <!-- On doit ajouter le lien de redirect vers la home -->
              <a href="<?= home_url() ?>" class="post__link">Retour à l'accueil</a>
            </article>              
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </main>
    </div>
    <!-- On récupère le contenu du footer via la fonction WP get_footer() -->
<?php get_footer(); ?>