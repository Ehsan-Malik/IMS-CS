<?php
if(isset($_GET['pdf']))
{
    $var_1 = $_GET['pdf'];
$dir = "files/"; // trailing slash is important
$file = $dir . $var_1;
 
if (file_exists($file))
    {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
    }
}
?>
