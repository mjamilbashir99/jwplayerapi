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

      //list videos
      $videosData = $objJwpalyer->call('v2/playlists/WXu7kuaW',array('format'=>'json'));
      $list_videos_data = json_decode(json_encode($videosData), True);
      $playlists = $list_videos_data['playlist'];
      
      for ($i=0;$i<count($playlists);$i++) {
        $videos_title = $playlists[$i]['title'];
        $videos_description = $playlists[$i]['description'];
        $videos_image = $playlists[$i]['image'];
        $videos_thumbnaile = $playlists[$i]['tracks'][0]['file'];
        $videos_duration = $playlists[$i]['duration'];
         
      }
       

?>
