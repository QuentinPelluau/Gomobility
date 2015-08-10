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
    </directory>  
</VirtualHost>  