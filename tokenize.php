<?php

function tokenize($string, $type)
{
    $func = getTokenizer($type);

    return $func($string);
}

function getTokenizer($type)
{
    $functionName = 'tokenizer' . $type;

    if (function_exists($functionName)) {
        return (function ($string) use ($functionName)
        {
            return $functionName($string);
        });
    }

    exit("Doesn't exist that functionality!");
}

function tokenizerWhitespace($text)
{
    if (is_string($text) === true) {
        $newArray = preg_split("/\s/", $text);
        $newArray = array_filter($newArray);

        return $newArray;
    }

    $newArray = constructArray($text, "/\s/");

    return $newArray;
}

function tokenizerStandard($text)
{
    if (is_string($text) === true) {
        $newArray = preg_split("/[\s,.?!;:]/", $text);
        $newArray = array_filter($newArray);

        return $newArray;
    }

    $newArray = constructArray($text, "/[\s,.?!;:]/");

    return $newArray;
}

function constructArray($text, $pattern)
{
    $finalArray = array();

    foreach ($text as &$string) {
        $matches = preg_split($pattern, $string);
        $matches = array_filter($matches);

        $newArray = array();

        foreach ($matches as $someString) {
            $tempArray = array();

            array_push($tempArray, $someString);
            array_push($newArray, $tempArray);
        }

        array_push($finalArray, $newArray);
    }

    return $finalArray;
}