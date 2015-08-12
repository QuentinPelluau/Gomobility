# Gomobility

## installation

- créer une base de données gomobility (un fichier install.sh, pas forcément dans le dossier du site lui-même)
- WP source https://fr.wordpress.org/
- sur le serveur local créer un dossier gomobility dans le dossier des sites (www,htdocs)
- Mettre les sources de WP dans le dossier que vous venez de créer
- connecter à ce site pour lancer l'installe.

## Création d'un thème

- créer un dossier "gomobility" dans le dossier des thèmes de WP (wp-content/themes)

- créer deux fichiers dans le dossier "gomobility" index.php et style.css

- mettez les tags suivants dans le fichier style.css, ces commentaires déclarent le thème "gomobility" à WP (fichier de conf)

/*
Theme Name: gomobility  
Theme URI: http://gomobility.local  
Author: Antoine  
Author URI:http://gomobility.local/contact  
Description: Website for teaching  
Version: 1.0  
License: GNU General Public License v2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  
Tags: custom post type  
  
*/

## vhost

/windows/system32/drivers/etc/hosts

Activer sous windows pour Apache2 l'option vhosts

- Virtual hosts dans le fichier httpd.conf du serveur
on décommmente la ligne suivante dans ce fichier:

Include conf/extra/httpd-vhosts.conf

- Mettre ces deux blocs dans le fichier httpd-vhosts.conf

```code
<VirtualHost *:80>  
    ServerAdmin webmaster@localhost  
    DocumentRoot "c:/wamp/www"  
    ServerName localhost  
    #ErrorLog "logs/localhost-error.log"  
    #CustomLog "logs/localhost-access.log" common  
</VirtualHost>  
  
<VirtualHost *:80>  
    DocumentRoot "c:/wamp/www/gomobility"  
    ServerName gomobility.local 
    <directory "c:/wamp/www/gomobility">  
        Options Indexes FollowSymLinks  
        AllowOverride all  
        Require all granted  
    </directory>  
</VirtualHost>  

```

### Codex la documentation officiel

https://codex.wordpress.org/Function_Reference/[NameFunction]


### the_loop

Elle affiche les posts (les 10 derniers max configuration CMS) de manière contextuelle.

http://gomobility.local/?p=1   le contexte p pour post et 1 l'ID du post  
Le contexte est passé à la boucle, la boucle fait une requête sur les posts 
La boucle affichera par exemple pour le contexte ci-dessus, le post dont l'ID est 1

Le contexte de la page d'accueil: "/" 

Plaçons dans le fichier index.php la boucle suivante:

```php

<?php if(have_posts()): ?>
<div class="post">
    <?php while(have_posts()): the_post(); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php the_excerpt(); ?></p>
        <?php the_category(); ?>
    <?php endwhile; ?>
</div>
<?php else: ?>
    <p>Désolé pas d'article pour l'instant...</p>
<?php endif; ?>

```

### template hierarchy

Wp regarde si vous avez créer un template qui rentre dans sa template hierarchy et sinon, si il n'existe pas de template spécifique à votre contenu au final il utilise index.php 

- exemple
what page ?
par exemple  ?cat=X 
 ---> category-[ID or slug].php  ? --> category.php ? --> archive.php ? --> index.php


 ### template 

 - découpage des templates on utilise classiquement:

```php
 get_header();
 get_footer();
 get_sidebar();

```
### Templates

Exercice

1/ publier des articles pour l'admin et l'éditeur (utilisateurs)

2/ créer le template pour les auteurs et afficher ses articles

Dans la boucle le lien vers la page des auteurs est

<?php the_author_posts_link() ?>

3/ Mots clefs

<?php the_tags() ; ?>

### functions et hook action/filter

Un hook permet de modifier ou étendre les fonctionnalités de WP.
WP possède un nombre important de hooks dans son code, ce qui signifie que l'on peut
modifier ou étendre beaucoup d'actions dans le CMS.

Il existe des hooks d'action et de filter

### Hook filter read more example

```php
add_filter('excerpt_more', 'al_read_more');

function al_read_more($more)
{
    global $post; // le post dans la boucle objet

//    var_dump($post);  // objet dans la boucle de WP

    return '<p><a href="' . get_permalink($post->ID) . '" >lire la suite</a></p>';
}

```

### Menu API

On passe par le fichier functions.php pour activer l'option API menu dans le CMS.
Un fichier pour configurer des options = CMS plus léger.

Il faudra une fois le menu définit dans l'admin ajouter du code dans le template pour faire
le lien avec ce menu.

### API des Widgets
Voir le fichier functions.php widgets_init et dans les fichiers siderbar.php et footer.php

### Thumbnail voir le code source loop-excerpt et fichier functions.php hook after_setup_theme

### Modele de page

On peut avoir besoin du modèle de page pour avoir un template spécifique pour une ou des pages données.
Ou pour mettre du code PHP dans une page.

Pour créer un modèle de page on crée un fichier, le nom vous êtes libre, dans le thème, par exemple mentions.php

```php

/*
 * Template Name: mentions
 */

 ```