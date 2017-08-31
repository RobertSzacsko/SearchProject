<?php


function fileExist($filename)
{
    $file = file_exists("$filename");

    if ($file == false) {
        exit("File doest exist!!". PHP_EOL);
    }

    return true;
}

function fileOpen($filename)
{
    $handle = 0;

    if (fileExist($filename) == true) {
        $handle = fopen($filename, "r");

        if ($handle == false) {
            exit("File doesn't open!!" . PHP_EOL);
        }
    }

    return $handle;
}