

**new Streaming\Infrastructure\Websites\Youtube($api_key)**
->getChannel( )   
->getVideo|getVideos( )  

**new Streaming\Infrastructure\Websites\Twitch($api_key)**
  
->getChannels(["key" => "value"])  
->getStreams(["key" => "value"])  
->getTopGames(int $limit, int $offset)

**new Streaming\Infrastructure\Websites\Smashcast( )**  
->getUser($userName)  


**new Streaming\Infrastructure\Repository\Twitch|Youtube|Smashcast\VideoRepository|ChannelRepository|etc($entityManager = null)**  
->setEntity(array)   
->getEntity()  
->create() * pass it to the DB  
->repo->findBy([]) etc.  * all the Doctrine repo stuff  

**new Streaming\Application\Service\ExportSpreadsheet\FSpreadsheet()**  
->prepareFrom(arrayOfEntity)  can be used multiple times to group Entity results  
->autoSetColumns([A, B, C ...]) * auto sets columns to values (does not work with .ods)  
->createFile(fileName, fileExtension = [xls, xlsx, ods]) * creates file  
