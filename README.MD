
<h1>FREE BLOGGING</h1>

est un back-end en REST pour un blog.
compatible avec l'hébergement des pages perso de l'opérateur français [FREE](https://www.free.fr)

qui en plus de n'offrir que du php en 5.6 ( c'est gratuit donc on peux pas vraiment se plaindre)
bloque les fonction php suivantes : 
|:---:|:---:|:---:|:---:|
| chown | chmod | get_current_user | php_uname  |
| putenv | set_time_limit | getmyuid | getmypid |
| dl | ini_alter | ini_restore | realpath |
| tmpfile | link | shell_exec | proc_open |
| chroot | sleep | usleep | umask |
| set_include_path | restore_include_path |ini_set |exec |
|passthru |system |popen |pclose |
|leak |mysql_list_dbs |listen |chgrp |
|disk_total_space |disk_free_space |rmdir |openlog |
|closelog |syslog |flock |socket_create_listen |
|socket_accept |socket_listen |symlink |setlocale |
|imagerotate |-|-|-|

[Source](https://assistance.free.fr/articles/pages-perso-php-et-fonctions-desactivees-chez-free-653)

une autre contraite : il est impossible d'utiliser les requêtes POST en RAW, il provoque l'affichage d'une erreur du serveur lié à une deprecation de la fonctionnalité d'auto- remplissage des post raw vides, erreur qui apparait même quand la requête POST en raw n'est pas vide.
les autre requêtes PUT, PATCH, DELETE ne sont pas affectées par ce problème qui en fait est seulement une erreur de configuration du serveur
erreur qui peux être corrigé que en ajoutant la ligne 

always_populate_raw_post_data = -1

dans le php.ini du serveur et un redémarrage.

 Mais comme les esrvice de gestion des pages persos de FREE ne répond pas au demandes des utilisateurs on vas donc devoir se passer de cette solution.

ce serait moins amussant si il n'y avait pas un peu de challenge.

pour compenser l'environement nous offre nombres de variables prédéfinies par le serveur.


Notre peutit outil de blogging 
Utiliseras le framework fast free framework que vous pouvez trouver ici :
 https://github.com/f3-factory/fatfree-core
le site du framework est ici :
https://fatfreeframework.com/3.8/home.

la chaine youtube de n0nag0n est une resource d'information formidable :
https://www.youtube.com/@n0nag0n80

J'ai dût fire quelques modifications au base.php pour qu'il ne tente pas d'utiliser des fonctions prohibées par l'hébergeur

Merci a anvarazizov pour son aide indirecte sur les headers de l'api
https://gist.github.com/anvarazizov/769f11871a9312e8cea8 