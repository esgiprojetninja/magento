<?php
return array (
  'backend' => 
  array (
    'frontName' => 'admin',
  ),
  'crypt' => 
  array (
    'key' => '3428fcbd0759d0cefebc0928099a4417',
  ),
  'db' => 
  array (
    'table_prefix' => '',
    'connection' => 
    array (
      'default' => 
      array (
        'host' => 'db-host',
        'dbname' => 'demomagento',
        'username' => 'magento',
        'password' => 'sigipsr',
        'model' => 'mysql4',
        'engine' => 'innodb',
        'initStatements' => 'SET NAMES utf8;',
        'active' => '1',
      ),
    ),
  ),
  'resource' => 
  array (
    'default_setup' => 
    array (
      'connection' => 'default',
    ),
  ),
  'x-frame-options' => 'SAMEORIGIN',
  'MAGE_MODE' => 'developer',
  'http_cache_hosts' => 
  array (
    0 => 
    array (
      'host' => 'varnish',
      'port' => '80',
    ),
  ),
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
  'cache_types' => 
  array (
    'config' => 0,
    'layout' => 0,
    'block_html' => 0,
    'collections' => 0,
    'reflection' => 0,
    'db_ddl' => 0,
    'eav' => 0,
    'customer_notification' => 0,
    'config_integration' => 0,
    'config_integration_api' => 0,
    'full_page' => 0,
    'translate' => 0,
    'config_webservice' => 0,
  ),
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
  'install' => 
  array (
    'date' => 'Mon, 26 Mar 2018 13:11:55 +0000',
  ),
);
