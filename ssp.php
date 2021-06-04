<html>
<head>
	<title>Stupid Simple Proxy</title>
</head>
<body>
<div style="display:block;width:100%;position:relative;">
	<form action="" method="GET">
	<select name="protocol">
		<option>https://</option>
		<option>http://</option>
	</select>
	Website: <input type="text" name="website" />
	<input type="submit" value="Load" />
	</form>
<?php 
echo "Displaying page: ";
if (substr( $_GET['website'], 0, 4 ) === "http") {
	$url = $_GET['website'];
} else {
	$url = $_GET['protocol'].$_GET['website'];
}
	
if ( $url ) {
	echo $url;
} else {
	echo "None";
}
?>
</div>
<div style="position:relative;">
<?php
if ( $_GET["website"] && $_GET['protocol'] ) {
	
	if (substr( $url, 0, 4 ) === "http") 
	{

		$ch=curl_init();
		$timeout=5;

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

		$lines_string=curl_exec($ch);
		curl_close($ch);
		echo $lines_string;
	}
}
?>
</div>
</body>
</html>
