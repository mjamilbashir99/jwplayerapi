<?php 
include("jwplayer-api/api.php");

      $objJwpalyer =  new JwplatformAPI('key','sec');
      $mediaAPIData = $objJwpalyer->call('v2/media/rImdhiX9',array('format'=>'json'));
      $mediaData = $objJwpalyer->getMediaInfo($mediaAPIData);
      $objJwpalyer->dd($mediaData);
      echo "video details<br>";
      echo "video title : ".$mediaData['title']."<br>";
      echo "video description : ".$mediaData['description']."<br>";
      echo "video duration : ".$mediaData['duration']."<br>";
      echo "video details : ".$mediaData['image']."<br>";
       

?>
