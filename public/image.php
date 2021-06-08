<?php

include_once '../src/Helper/Image.php';

use function Tasks\Helper\Image\makePngBanner;

$fileName = makePngBanner('img/image.png');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Banner maker</title>
  </head>
  <body>
    <img style="border: 1px solid black;" src="<?=$fileName?>">
  </body>
</html>
