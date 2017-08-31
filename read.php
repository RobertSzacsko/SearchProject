<?php

include_once "validation.php";

function readParams()
{
    $longOptionName = file("optionName.txt", FILE_IGNORE_NEW_LINES);
    $option = getopt("", $longOptionName);

    return $option;
}

function openAndReadFromFile($filename)
{
    fileOpen($filename);
    $allTextToken = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    return $allTextToken;
}

//i do not use it
function readFromFileLineByLine($handle)
{
    $arrayToken = array();

    while (feof($handle) == false) {
        $line = fgets($handle);
        array_push($arrayToken, $line);
    }
    return $arrayToken;
}
