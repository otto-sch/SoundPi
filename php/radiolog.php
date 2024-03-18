<?php
// Take and show the latest file
$path = '../log/';
$maxTsFile = 0;
$nFileName = "";
foreach(glob($path . '*.*') as $fileName) {
  $ts = filemtime($fileName);
  if($ts > $maxTsFile) {
    $maxTsFile = $ts;
    $nFileName = $fileName;
  }
}
$radiolog = file_get_contents($nFileName);
echo $radiolog;
?>
