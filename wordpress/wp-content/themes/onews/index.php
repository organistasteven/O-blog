<!-- On récupère le contenu du header via la fonction WP get_header() -->
<?php get_header(); ?>

          <?php if (have_posts()) : ?>
            <div class="posts">
            <?php while (have_posts()) : the_post(); ?>
            <?php //var_dump(get_post()); ?>
            <!-- On doit récupérer la ou les catégories de l'article -->
            <?php $categories = get_the_category(); ?>
              <article class="post">
                <!-- On boucle sur les catégories pour afficher la ou les catégories auxquelles est rattaché l'article -->
                <?php foreach($categories as $category) : ?>
                  <a href="<?php echo get_category_link($category) ?>" class="post__category post__category--color-<?php echo $category->category_nicename ?>"><?= $category->name ?></a>
                <?php endforeach; ?>
              <!-- On doit récupérer le titre de l'article -->
              <h3><?= the_title() ?></h3>
              <div class="post__meta">
                <!-- On doit récupérer l'image de l'auteur -->
                <img class="post__author-icon" src="<?= get_the_post_thumbnail_url() ?>" alt="">                
                <!-- On doit récupérer le nom de l'auteur -->
                <strong class="post__author"><?= get_the_author() ?></strong>
                <!-- On doit récupérer la date de publication -->
                <time datetime="<?= get_the_date('Y-m-d'); ?>">le <?= get_the_date() ?></time>
              </div>
              <!-- On doit récupérer le contenu résumé (extrait) de l'article -->
              <p><?= the_excerpt() ?></p>
              <!-- On doit ajouter le lien de redirect vers l'article -->
              <a href="<?= the_permalink() ?>" class="post__link">Continue reading</a>
            </article>              
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </main>
    </div>
    <!-- On récupère le contenu du footer via la fonction WP get_footer() -->
<?php get_footer(); ?>
