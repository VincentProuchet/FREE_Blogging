
FREE BLOGGING

est un back-end en REST pour un blog.
compatible avec l'hébergement des pages perso de l'opérateur français FREE

qui en plus de n'offrir que du php en 5.6 ( c'est gratuit donc on peux pas vraiment se plaindre)
bloque les fonction php suivantes : 
<div class="left-block" style="display:flex;flex-direction:column;justify-content:center;margin-right:1rem;width:50%"><ul><li>chown</li><li>chmod</li><li>get_current_user</li><li>php_uname</li><li>putenv</li><li>set_time_limit</li><li>getmyuid</li><li>getmypid</li><li>dl</li><li>ini_alter</li><li>ini_restore</li><li>realpath</li><li>tmpfile</li><li>link</li><li>shell_exec</li><li>proc_open</li><li>chroot</li><li>sleep</li><li>usleep</li><li>umask</li><li>set_include_path</li><li>restore_include_path</li></ul></div>
<div class="right-block" style="display:flex;flex-direction:column;justify-content:center;margin-left:1rem;width:50%"><ul><li>ini_set</li><li>exec</li><li>passthru</li><li>system</li><li>popen</li><li>pclose</li><li>leak</li><li>mysql_list_dbs</li><li>listen</li><li>chgrp</li><li>disk_total_space</li><li>disk_free_space</li><li>rmdir</li><li>openlog</li><li>closelog</li><li>syslog</li><li>flock</li><li>socket_create_listen</li><li>socket_accept</li><li>socket_listen</li><li>symlink</li><li>setlocale</li><li>imagerotate</li></ul></div>

ce serait moins drôle si on ne devait pas le faire avec une mains attachée dans le dos.

pour compenser l'environement nous offre nombres de variables prédéfinies par le serveur.

il utilise le framework fast free framework que vous pouvez trouver ici :
 https://github.com/f3-factory/fatfree-core
le site du framework est ici :
https://fatfreeframework.com/3.8/home 
la chaine youtube de n0nag0n est une resource d'information formidable :
https://www.youtube.com/@n0nag0n80
avec quelques modification pour qu'il ne tente pas d'utiliser les fonction prohibées par l'hébergeur