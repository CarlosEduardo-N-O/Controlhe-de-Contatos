<?php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/vendor/autoload.php';

// Diretório onde estão suas entidades (com atributos PHP 8+)
$config = ORMSetup::createAttributeMetadataConfiguration(
    paths: [__DIR__ . '/src/Entity'],
    isDevMode: true,
);

// Configurações para PostgreSQL
$connection = [
    'driver'   => 'pdo_pgsql',
    'host'     => '127.0.0.1',
    'port'     => 5432,
    'dbname'   => 'contatos',
    'user'     => 'postgres',
    'password' => 'unidavi',
    'charset'  => 'utf8',
];

$entityManager = EntityManager::create($connection, $config);

// Retorna o EntityManager para uso no restante do app
return $entityManager;
