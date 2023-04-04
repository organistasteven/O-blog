<?php 
// On préfixe nos fonctions avec le nom du thème pour éviter
// les conflits de nommage avec le code de Wordpress ou des plugins
// (PHP n'autorise pas à définir 2 fonctions avec le même nom)
// Et pour être sûr de ne pas avoir de souci, on teste que la fonction
// n'a pas déjà été déclarée
if (!function_exists('onews_scripts')) { // Si la fonction 'onews-scripts' n'existe pas ?
    function onews_scripts()
    {
        // 1er argument : 'onews-style' est un identifiant
        // 2ème argument : chemin relatif vers le fichier de style
        // 3ème argument : dépendances avec les autres fichiers de styles
        // => le fichier style.css dépend du fichier reset.css qui doit 
        // être inclus avant le fichier style.css
        // Il faut préciser dans un array, la liste des identifiants de fichier style dont on dépend, ici on dépend de 'onews-reset'
        // 4ème argument : la version du fichier de style (cela rajoute
        // dans l'url un paramètre contenant la version du fichier et évite
        // les problèmes de cache navigateur chez nos utilisateurs)
        // la version du fichier est donc à changer impérativement
        // à chaque modification du fichier de style
        wp_enqueue_style('onews-style', get_template_directory_uri() . '/assets/css/style.css', ['onews-reset'], '1.2');

        wp_enqueue_style('onews-reset', get_template_directory_uri() . '/assets/css/reset.css', [], '2.0');
    }

    // Au moment où Wordpress ajoute les scripts/fichiers CSS, on veut
    // qu'il exécute notre fonction onews_scripts pour ajouter les nôtres
    // Equivalent JS : addEventListener()
    add_action( 'wp_enqueue_scripts', 'onews_scripts' );
}

