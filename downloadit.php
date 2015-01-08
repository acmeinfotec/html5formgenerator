<?php ob_start();

$yourfile = $_COOKIE['fname'];

$file_name = basename($yourfile);

header("Content-Type: application/zip");
header("Content-Disposition: attachment; filename=$file_name");
header("Content-Length: " . filesize($yourfile));

readfile($yourfile);
//file_get_contents($yourfile);
exit;
?>

<?php ob_flush(); ?>