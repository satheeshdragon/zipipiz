<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Picz</title>
  <meta name="author" content="Jake Rocheleau">

  <link rel="stylesheet" type="text/css" media="all" href="css/style.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/responsive.css">
</head>

<body>

	<section id="container">
		<h2>Zip-i-piZ</h2>
		<form name="hongkiat" id="hongkiat-form" method="post" action="#">
		<div id="wrapping" class="clearfix">
			
      <section id="aligned">

            <section id="buttons">

			<form action="index.php" method="post">

<input type="text" id="name" placeholder="" autocomplete="off" tabindex="1" class="txtinput" value="<?php $var ?>" name="var">
      <input type="submit" name="submit" id="submitbtn" class="submitbtn" tabindex="7" value="Search">
      <br style="clear:both;">
            </section>
      </form>
<?php

$var = $_POST['var'];
//echo $var;
//die();

$urlContent = file_get_contents('https://www.bing.com/images/search?q=+'.$var.'+&first=01&count=28&FORM=HDRSC2');

$dom = new DOMDocument();
@$dom->loadHTML($urlContent);
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body//a");

for($i = 0; $i < $hrefs->length; $i++){
    $href = $hrefs->item($i);
    $url = $href->getAttribute('href');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    if(!filter_var($url, FILTER_VALIDATE_URL) === false){
        echo '<a href="'.$url.'">'.$url.'</a><br />';
    }
}
?>
</body>
</html>