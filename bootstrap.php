<?php
// bootstrap.php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$config = require_once "app/config.php";

$paths = $config["entityDir"];
$isDevMode = false;

// the connection configuration
$dbParams = $config["db"];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
