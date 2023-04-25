<?php

$dir = "img/"; // directory path where images are stored

if (is_dir($dir)) { // check if the directory exists
    if ($dh = opendir($dir)) { // open the directory
        while (($file = readdir($dh)) !== false) { // loop through each file in the directory
            if (!in_array($file, array(".", ".."))) { // ignore the current and parent directories
                $imageFileType = pathinfo($dir . $file, PATHINFO_EXTENSION); // get the file extension
                if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) { // check if it's an image file
                    echo '<img src="' . $dir . $file . '" alt="' . basename($file, "." . $imageFileType) . '" width="410" height="310" style="margin: 50px ">'; // display the image with a width and height of 500 pixels and a margin of 20 pixels
                }
            }
        }
        closedir($dh); // close the directory
    }
}