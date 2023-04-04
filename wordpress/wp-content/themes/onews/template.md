# Templating : Synthèse et TODO

WP utilise un système de templating qui lui est propre.  
Par défaut, si aucun template ne correpsond à la page demandée, alors WP utilisera index.php

Doc : https://wpshout.com/wordpress-template-hierarchy/

En suivant le schéma de la logique de templating, on découvre que :

- le fichier page.php est utilisé pour les pages statiques (ex : about us)
- le fichier single.php pour les pages article
- le fichier home.php sera utilisé pour la home page

## Comment ajout d'une miniature sur un article ?

### Etape 1 : Activer la fonctionnalité des miniatures

Dans le fichier functions.php du thème, ajouter cette ligne :

```
add_theme_support('post-thumbnails');
```

Doc : https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/

### Etape 2 : Utiliser la fonction WP get_the_post_thumbnail_url()

Exemple : si on doit récupérer l'image de l'auteur

```
<img class="post__author-icon" src="<?= get_the_post_thumbnail_url() ?>" alt="">