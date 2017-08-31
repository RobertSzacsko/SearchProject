<?php

function applyFilters($textTokenized, $filters)
{
    $filters = preg_split("/[,.;: ]/", $filters);

    foreach ($filters as $filter) {
        $textTokenized = filters($textTokenized, $filter);
    }

    return $textTokenized;
}

function filters($textTokenized, $filter)
{
    $function = getFilter($filter);

    return $function($textTokenized);
}

function getFilter($filterName)
{
    $functionName = "filter" . $filterName;

    if (function_exists($functionName)) {
        return (function ($string) use ($functionName)
        {
            return $functionName($string);
        });
    }

    exit("Doesn't exist that functionality!");
}

function filterLowercase($textTokenized)
{
    echo "Lowercase" . PHP_EOL;
    var_dump($textTokenized);
    foreach ($textTokenized as &$array) {
        foreach ($array as &$string) {
            var_dump($string);
            $string = mb_strtolower($string, mb_detect_encoding($string));
        }
    }

    return $textTokenized;
}

/*
function filterStemming($textTokenized)
{
    $listOfSufix = preg_split("/[\s,.]/", readParams()["stemming"]);

    foreach ($textTokenized as &$array) {
        foreach ($array as $string) {
            $number
        }
    }

    return $listOfSufix;


}*/