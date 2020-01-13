<?php 
session_start();
 $_GET['id'];
$_GET['file'];


if (!isset($_GET['file']) || empty($_GET['file'])) {
 exit();
}
$root = "atomDrive/documentos/".$_GET['id']."/";
$file = basename($_GET['file']);
$path = $root.$file;
$type = '';
 
if (is_file($path)) {
 $size = filesize($path);
 if (function_exists('mime_content_type')) {
 $type = mime_content_type($path);
 } else if (function_exists('finfo_file')) {
 $info = finfo_open(FILEINFO_MIME);
 $type = finfo_file($info, $path);
 finfo_close($info);
 }
 if ($type == '') {
 $type = "application/force-download";
 }
 // Define los headers
 header("Content-Type: $type");
 header("Content-Disposition: attachment; filename=$file");
 header("Content-Transfer-Encoding: binary");
 header("Content-Length: " . $size);
 // Descargar el archivo
 readfile($path);
} else {
 die("El archivo no existe.");
}


?>



