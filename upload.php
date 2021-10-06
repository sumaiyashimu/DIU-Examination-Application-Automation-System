<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["data_file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$files = glob('uploads/*');
if (count($files) > 0) {
    foreach ($files as $file) { // iterate files
        unlink($file);
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["data_file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "pdf" && $imageFileType != "xlsx" && $imageFileType != "xls" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only PDF, XLSX, XLS, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["data_file"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["data_file"]["name"]) . " has been uploaded. <a href=\"admin_dash.php\">Back to Home</a>";
    } else {
        echo "Sorry, there was an error uploading your file. <a href=\"admin_dash.php\">Back to Home</a>";
    }
}
