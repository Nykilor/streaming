<?php

require __DIR__ . '/vendor/autoload.php';
require_once "bootstrap.php";

$keys = require("app/config.php");

//The base Youtube Entity and Repo are able only to save the "statistic" part

// new Streaming\Infrastructure\Websites\Youtube($api_key)
// ->getChannel() ->getVideo|getVideos()
// -||-Twitch($api_key)
// ->getChannels(["key" => "value"]) ->getStreams(["key" => "value"])
// -||-Smashcast()
// ->getUser($userName)

// Returns Array or null


// new Streaming\Infrastructure\Repository\Twitch|Youtube|Smashcast\ENTITYRepository($entityManager = null)
// ->setEntity($array) ->getEntity()
// ->create() * pass it to the DB
// ->repo->findBy([]) etc.  * all the Doctrine repo stuff

// new Streaming\Application\Service\ExportSpreadsheet\FSpreadsheet()
// ->prepareFrom($arrayOfEntity) * can be used multiple times to group Entity results
// ->autoSetColumns(["A", "B", "C" ...]) * auto sets columns to values (does not work with .ods)
// ->createFile($fileName, $fileExtension = [xls, xlsx, ods]) * creates file


//EXAMPLE

// $api_key = $keys["api_keys"]["youtube"];
//
// $web = new Streaming\Infrastructure\Websites\Youtube("x");
// $data = $web->getVideos(["7xzU9Qqdqww", "oBo0aqau61c", "WSWrepLjTKc", "AHukwv_VX9A", "Fjqs-qmkNug&t=999s"]);
// $repo = new Streaming\Infrastructure\Repository\Youtube\VideoRepository();
// $repo->setEntity($data);
// //Optional $repo->create()
// $ent = $repo->getEntity();
//
// $sheet = new Streaming\Application\Service\ExportSpreadsheet\FSpreadsheet();
// $sheet->prepareFrom($ent);
// $sheet->autoSetColumns();
// $sheet->createFile("test", "xlsx");
