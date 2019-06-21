<!DOCTYPE html>
<html>
<head>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style>
</head>
<body>
<?php 

	include("jwplayer-api/api.php");
	$objJwpalyer =  new JwplatformAPI('key','sec');
	//list videos
	$videosData = $objJwpalyer->call('v2/playlists/EYvIzH6D',array('format'=>'json'));
	$videPlayListData = $objJwpalyer->getVideoListInfo($videosData);    
?>
<table id="t01">
	  <tr>
	    <th>Title</th>
	    <th>description</th> 
	    <th>image</th>
	    <th>thumbnaile</th>
	    <th>duration</th>
	  </tr>
	<?php for($i=0;$i<count($videPlayListData);$i++){?>
	  <tr>
		    <td><?php echo $videPlayListData[$i]['title'];?></td>
		    <td><?php echo $videPlayListData[$i]['description'];?></td>
		    <td><img src="<?php echo $videPlayListData[$i]['image'];?>" width='50' height='50'></td>
		    <td><?php echo $videPlayListData[$i]['thumbnaile'];?></td>
		    <td><?php echo $videPlayListData[$i]['duration'];?></td>
	  </tr>
	<?php } ?>
</table>
</body>
</html>
