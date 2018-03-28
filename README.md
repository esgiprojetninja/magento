DISKO Starters - Magento 2.x
===

Docker 
------

### Installation du projet

On démarre le Docker
```
docker-compose up -d
```

Une fois que le docker est lancé il faut penser à ajouter la ligne suivante à votre /etc/hosts pour pouvoir accéder au site via http://yves-salomon.local
```
127.0.0.1 <projet>.local # si vous utiliez Docker For Mac
192.168.99.100 <projet>.local # si vous utiliez Docker Toolbox récupérer l'ip de la docker-machine grâce à la commande "docker-machine ip"
```


Dans le dossier du Magento, on copie `magento/app/etc/env.php.dev` vers `magento/app/etc/env.php` :
```
cd /var/www/project/magento/app/etc/
cp env.php.dev env.php

```

Enfin on importe la bdd : `mysql -uroot -proot -h127.0.0.1 <database> < docker/dumps/dump-*.sql`

Pour les MagentoBoyz, pensez à passer en mode développeur :
```
docker-compose exec php /bin/bash
sudo -u www-data php bin/magento deploy:mode:set developer
```

Après l'installation, modifier le fichier env.php pour brancher le redis:

*session :*
```
  'session' =>
        array (
            'save' => 'redis',
            'redis' =>
                array (
                    'host' => 'redis',
                    'port' => '6379',
                    'password' => '',
                    'timeout' => '2.5',
                    'persistent_identifier' => '',
                    'database' => '1',
                    'compression_threshold' => '2048',
                    'compression_library' => 'gzip',
                    'log_level' => '1',
                    'max_concurrency' => '6',
                    'break_after_frontend' => '5',
                    'break_after_adminhtml' => '30',
                    'first_lifetime' => '600',
                    'bot_first_lifetime' => '60',
                    'bot_lifetime' => '7200',
                    'disable_locking' => '0',
                    'min_lifetime' => '60',
                    'max_lifetime' => '2592000',
                ),
        ),
```

*cache : *
```
'cache' => 
  array (
    'frontend' => 
    array (
      'default' => 
      array (
        'backend' => 'Cm_Cache_Backend_Redis',
        'backend_options' => 
        array (
          'server' => 'redis',
          'port' => '6379',
        ),
      ),
      'page_cache' => 
      array (
        'backend' => 'Cm_Cache_Backend_Redis',
        'backend_options' => 
        array (
          'server' => 'redis',
          'port' => '6379',
          'database' => '0',
          'compress_data' => '0',
        ),
      ),
    ),
  ),
```

### Erreurs possibles

#### Failure EADDRINUSE
En cas d'erreur lors du lancement du Docker, il se peut que certains ports soient utilisés (par un autre container Docker ou un daemon sur la machine).
Exemple :

```
ERROR: for varnish  Cannot start service varnish: driver failed programming external connectivity on endpoint yves-salomon_varnish_1 (b70821b718ab8c2c21418ac02207dd2144cc2d98c72c0be307b902814c35eab7): Error starting userland proxy: Bind for 0.0.0.0:80: unexpected error (Failure EADDRINUSE)
Encountered errors while bringing up the project.
```

Il faut alors fermer les applis tournant sur votre machine et utilisant les ports en question.

Pour les lister c'est pas compliqué :
```
sudo lsof -n -i4TCP:<num_port> | grep LISTEN
```

#### Fatal error PHP lors du chargement du BO après un setup:upgrade
Il se peut que le owner/group sur le dossier var/generation soit root/root si vous avez lancé la commande en tant que root au lieu de :
```
sudo -u www-data php bin/magento setup:upgrade
```

Il suffit alors de mettre à jour le proprio et le groupe du dossier :
```
chown -R www-data:www-data var/generation
```

### Infos utiles

#### Lister les containers. 
```
docker-compose ps
```

#### Se connecter à un container. 
```
docker-compose exec php /bin/bash
docker-compose exec nginx /bin/bash
docker-compose exec db /bin/bash
docker-compose exec redis /bin/bash
docker-compose exec varnish /bin/bash
...
```

#### Relancer un container en le forçant à se reconstruire avant
```
docker-compose up --build -d nginx
```

#### Recréer le container totalement
```
docker-compose build --no-cache nginx
```

#### Flush Varnish
Flush le Varnish Magento du front
```
sudo -u www-data php bin/magento cache:clean full_page
```

ou en utilisant varnishadm depuis le container varnish
```
varnishadm ban req.http.host == <project>.local
varnishadm ban req.http.host == <project>.local '&&' req.url '~' '\\.png$'
```

#### Xdebug
Par défaut Xdebug écoute sur le port 9000 mais nous le faisons écouter sur 9009 afin qu'il n'entre pas en conflit avec le PHP-FPM.  
A noter qu'il faut mettre à jour le remote_host avec l'IP de la machine hôte du docker.  
Nous n'utilisons pas remote_connect_back car il ne permet pas le debug en CLI et les variables $SERVER ne sont pas disponibles.

Magento
------

### Magento Frontend 

Frontend Developer Guide :
* http://devdocs.magento.com/guides/v2.1/frontend-dev-guide/bk-frontend-dev-guide.html
* http://devdocs.magento.com/guides/v2.1/frontend-dev-guide/css-guide/css_quick_guide_approach.html


### Infos

#### Accès admin LOCAL

admin / Magent0

#### Gestion des mails

Tous les mails sont envoyés à Mailhog et sont accessible via l'url:
```
http://<project>.local:8025
```

### Les commandes utiles 

Vider les caches ou tous les caches
```
sudo -u www-data php bin/magento cache:clean config layout block_html full_page

sudo -u www-data php bin/magento cache:clean
```

Activer un module
```
sudo -u www-data php bin/magento module:enable Disko_Export
```

Lancer les setup magento après l'ajout d'un module 
```
sudo -u www-data php bin/magento setup:upgrade --keep-generated
```

Clean the cache and compiled code directories
```
cd <your Magento install dir>
rm -rf var/cache/* var/page_cache/* di/* var/generation/* 
```

### N98-magerun2

The swiss army knife for Magento developers, sysadmins and devops.
https://github.com/netz98/n98-magerun2


### Creating Module
- Créer l'arborescence app/code/Esgi/Helloworld
  - registration.php
  - etc
    - module.xml
```sh
# Sur la machine php
alias mg='sudo -u www-data php bin/magento'
# liste les modules par status dé.activés
mg module:status
# autoloading & enabling module
mg module:enable Esgi_Helloworld
# persiste la data en base
mg setup:up
mg c:f
```
#### Premier controller
