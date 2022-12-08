# FREE BLOGGING
est un back-end en REST pour un blog.
compatible avec l'hébergement des pages perso de l'opérateur français [FREE](https://www.free.fr)



### Contraintes
* l'environement server n'est pas modifiable
* php 5.6 
<details>
 <summary> les fonctions php suivantes sont bloquées : </summary>
 
| -                | -                    | -                | -                     |
| :---:            | :---:                | :---:            | :---:                 |
| chown            | chmod                | get_current_user | php_uname             |
| putenv           | set_time_limit       | getmyuid         | getmypid              |
| dl               | ini_alter            | ini_restore      | realpath              |
| tmpfile          | link                 | shell_exec       | proc_open             |
| chroot           | sleep                | usleep           | umask                 |
| set_include_path | restore_include_path | ini_set          | exec                  |
| passthru         | system               | popen            | pclose                |
| leak             | mysql_list_dbs       | listen           | chgrp                 |
| disk_total_space | disk_free_space      | rmdir            | openlog               |
| closelog         | syslog               | flock            | socket_create_listen  |
| socket_accept    | socket_listen        | symlink          | setlocale             |
| imagerotate      | -                    | -                | -                     |

[Source](https://assistance.free.fr/articles/pages-perso-php-et-fonctions-desactivees-chez-free-653)
</details>
<details><summary>  problème de POST </summary>
    Il est impossible d'utiliser les requêtes POST en RAW.
Car celà provoque l'affichage d'une erreur serveur lié à la deprecation de la fonctionnalité d'auto-remplissage des post raw avec un body vides, erreur qui apparait même quand la requête à un body non vide.
les autre requêtes GET, PUT, PATCH, DELETE ne sont pas affectées par ce problème n'est qu'une erreur de configuration du serveur, erreur pardonnable, les API REST n'étaient pas à la mode lors de la mise en ligne des serveurs.

celà pourrait être corrigé en ajoutant la ligne 
always_populate_raw_post_data = -1
dans le php.ini du serveur et un redémarrage.
Mais le esrvice de gestion des pages persos de FREE ne répond pas au demandes des utilisateurs on vas devoir se passer de cette solution.
</details>



### L'environement 
- le service de FREE nous offre nombres de variables prédéfinies par le serveur, que je n'ai pas encore réussit à configurer dans mon serveur de test.
- une configuration proche est disponible dans le fichier free_blogging.ini.
- composer n'est pas utilisé, car il demande une version de php plus récente que celle disponible pour ce projet.


ce serait moins amusant si il n'y avait pas un peu de challenge.
### Outils intégrés
Notre petit outil de blogging utiliseras le framework fast free framework que vous pouvez trouver ici :<br />
 https://github.com/f3-factory/fatfree-core <br />
le site du framework est ici :
https://fatfreeframework.com/3.8/home <br />

la chaine youtube de n0nag0n est une resource d'information formidable sur le Fat-Free :
https://www.youtube.com/@n0nag0n80 <br />

J'ai dû faire quelques modifications au base.php pour qu'il n'utilise pas les fonctions prohibées par l'hébergeur.<br />

### Plugins 

Les plugins ajoutés au fatfree sont :

* Cortex disponible ici :https://github.com/ikkez/f3-cortex
* Schema disponible ici :https://github.com/ikkez/f3-schema-builder/tree/master

Merci a anvarazizov pour son aide indirecte sur les headers
https://gist.github.com/anvarazizov/769f11871a9312e8cea8 
