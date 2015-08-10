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
<ul>
	<?php while(have_posts()): the_post(); ?>
		<li><?php the_title(); ?></li>
	<?php endwhile; ?>
</ul>
<?php endif; ?>	



```