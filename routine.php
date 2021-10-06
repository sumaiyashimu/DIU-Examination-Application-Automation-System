<?php
$files = glob('uploads/*');
if (count($files) <= 0) {
    foreach ($files as $file) { // iterate files
        unlink($file);
    }
} else {
    $filename = "Routine";
    header('Content-type:application/pdf');
    header('Content-disposition: inline; filename="' . $filename . '"');
    header('content-Transfer-Encoding:binary');
    header('Accept-Ranges:bytes');
    @readfile($files[0]);
}
