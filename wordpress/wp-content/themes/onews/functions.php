<?php
// On va déclarer et implémenter nos fonctions ici
// On pourrait avoir des fonctions ayant un même nom dans le theme => cela génèrerait un bug (conflit PHP car on aurait 2 fonctions de même nom)
// Pour être sûr de ne pas avoir de souci, on va tester l'existance de la fonction avant de l'implémenter
if (!function_exists('onews_scripts')) {
    // On va déclaree nos fichiers de style
    // Bonne pratique WP : préfixer le nom des fonctions par le nom du thème (onews)
    function onews_scripts()
    {
        // On déclare nos fichiers de style
        // Pour cela, on va utiliser une fonction WP native wp_enqueue_style() : cette fonction met sur liste d'attente des fichiers de style à charger
        // https://developer.wordpress.org/reference/functions/wp_enqueue_style/
        // 1er argument : identifiant du style à charger (string unique qu'on choisit arbitrairement)
        // 2ème argument : chemin du fichier css
        // 3ème argument (facultatif) : dépendances avec les autres fichiers de style
        // 4ème argument (facultatif) : la version du fichier de style

        // On demande le chargement de style.css
        // get_template_directory_uri() : récupère le répertoire courant (équivalent à __DIR__)
        wp_enqueue_style('onews-style', get_template_directory_uri() . '/assets/css/style.css', ['onews-reset'], '1.0');

        // On demande le chargement de reset.css
        wp_enqueue_style('onews-reset', get_template_directory_uri() . '/assets/css/reset.css', [], '1.0');        
    }

    // On doit dire à WP d'exécuter notre fonction onews_scripts
    // On utilise la fonction WP add_action() pour cela
    // https://developer.wordpress.org/reference/functions/add_action/
    // 1er argument : le nom du hook chargé d'exécuter les scripts/CSS (string)
    // 2nd argument : le nom de la fonction de callback à exécuter (string)
    add_action('wp_enqueue_scripts', 'onews_scripts');

}

// On ajoute la fonctionnalité "thumbnails" (miniatures) dans notre thème
// => Miantenant, on peut ajouter une miniature sur nos articles 
add_theme_support('post-thumbnail');

// On ajoute la fonctionnalité "thumbnails" (miniatures) dans notre thème
// => Miantenant, on peut ajouter une miniature sur nos articles 
add_theme_support('post-thumbnails');

// TODO : gérer le menu du site avec WP
// On va créé une fonction pour cela

// Pour être sûr de ne pas avoir de souci, on va tester l'existance de la fonction avant de l'implémenter
if (!function_exists('onews_setup')) {
    function onews_setup()
    {
        // On demande à WP de gérer pour nous le menu du site
        add_theme_support('menus');

        // On indique l'emplacement où le menu doit s'afficher
        // Ex : ici, on veut pouvoir ajouter le menu dans le main (contenu principal de la page) et dans le footer
        // NB : pour afficher le menu à un seul endroit : register_nav_menu
        // On utilise un array associatif pour indiquer l'emplacement du menu en clé et un commentaire en valeur
        register_nav_menus([
            'main' => 'menu principal',
            'footer' => 'menu de bas de page'
        ]);
    }

    // On doit dire à WP d'exécuter notre fonction onews_setup
    // On utilise la fonction WP add_action() pour cela
    // https://developer.wordpress.org/reference/functions/add_action/
    // 1er argument : le nom du hook chargé d'exécuter les setup du site (string)
    // 2nd argument : le nom de la fonction de callback à exécuter (string), cad notre fonction onews_setup
    add_action('after_setup_theme', 'onews_setup');

}