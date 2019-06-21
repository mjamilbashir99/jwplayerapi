<?php include("jwplayer-api/api.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JW Player</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<script src="jwplayer-8.9.0/jwplayer.js"></script>
<script>jwplayer.key="ehgUyD33G60vvaGUYyploTTzwDIQXRBdaUAVK3ppZrQN1Vgl";</script>
       
</head>
<body>
<?php 
      $objJwpalyer =  new JwplatformAPI('key','sec');
      $mediaData = $objJwpalyer->call('v2/media/rImdhiX9',array('format'=>'json'));
      
      $objJwpalyer->dd($mediaData);
die();
?>
<div class="header">
  <h1>My Website</h1>
  <p>A <b>responsive</b> website created by me.</p>
</div>

<div class="navbar">
  <a href="#" class="active">Home</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#" class="right">Link</a>
</div>

<div class="row">
  <div class="side">
    <h2>About Me</h2>
    <h5>Photo of me:</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    <h3>More Text</h3>
    <p>Lorem ipsum dolor sit ame.</p>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    <div class="fakeimg" style="height:60px;">Image</div>
  </div>
  <div class="main">
    <h2>TITLE HEADING</h2>
    <h5>Title description, Dec 7, 2017</h5>
    <div id="div-jwplayer" style="height:200px;"></div>
    <p><a href="#" onclick="nextButton()">Next </a></p>
    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    <br>
    <h2>TITLE HEADING</h2>
    <h5>Title description, Sep 2, 2017</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Some text..</p>
    <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
<script>
    jwplayer("div-jwplayer").setup({
        "playlist": [{
            "file": "assets/v1.mp4",
            "image": "assets/pic1.jpg",
            "title": "Sintel Trailer",
            "mediaid": "Ybmsp7ww"
        }]
    });
    jwplayer().load("https://cdn.jwplayer.com/v2/playlists/EYvIzH6D");
    function nextButton()
    {
        jwplayer().next();
    }
    jwplayer().setCaptions({color:'#000'});
    </script>
</body>
</html>
