


<?php

$dir = "img/"; // directory path where images and caption files are stored

if (is_dir($dir)) { // check if the directory exists
    if ($dh = opendir($dir)) { // open the directory
        echo '<div class="gallery">'; // add a container div for the gallery items
        while (($file = readdir($dh)) !== false) { // loop through each file in the directory
            if (!in_array($file, array(".", ".."))) { // ignore the current and parent directories
                $imageFileType = pathinfo($dir . $file, PATHINFO_EXTENSION); // get the file extension
                if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) { // check if it's an image file
                    $caption_file = $dir . basename($file, "." . $imageFileType) . ".txt"; // get the caption file name
                    $caption = ""; // initialize the caption variable
                    $description = ""; // initialize the description variable
                    $price = ""; // initialize the price variable

                    if (file_exists($caption_file)) { // check if the caption file exists
                        $lines = file($caption_file); // read the contents of the file into an array
                        if (count($lines) >= 3) { // check if there are at least three lines in the file (for caption, price and description)
                            $caption = trim($lines[0]); // get the caption from the first line of the file
                            $price = trim($lines[1]); // get the price from the second line of the file
                            $description = trim($lines[2]); // get the description from the third line of the file
                        }
                    } else {
                        $caption = basename($file, "." . $imageFileType); // use the filename as the caption
                    }

                    echo '<div class="gallery-item">';
                    echo '<img src="' . $dir . $file . '" alt="' . $caption . '" width="410" height="310" style="margin: 50px">';
                    echo '<div class="caption">' . $caption . '</div>'; // display the caption
                    echo '<div class="price">' . $price . '</div>'; // display the price
                    echo '<div class="description">' . $description . '</div>'; // display the description
                    echo '</div>';
                }
            }
        }
        echo '</div>'; // close the container div for the gallery items
        closedir($dh); // close the directory
    }
}


