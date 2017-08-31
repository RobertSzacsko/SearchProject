<?php

include_once "matches.php";
include_once "read.php";
include_once "tokenize.php";
//include_once "filters.php";
include_once "display.php";

$params = readParams();
$lines = openAndReadFromFile($params["input"]);
$tokenizedLines = tokenize($lines, $params["input-tokenizer"]);
$tokenizedQuery = tokenize($params["query"], $params["query-tokenizer"]);

//var_dump($tokenizedLines);
//var_dump($tokenizedQuery);
//$filterLines = applyFilters($tokenizedLines, $params["input-filters"]);

//var_dump($filterLines);
//$filterQuery = applyFilters($tokenizedQuery, $params["query-filters"]);

$

$matches = match2($tokenizedLines, $tokenizedQuery);
//$matches = match($filterLines, $filterQuery);
display($matches);




//$queryToken = explode(" ", $option["query"]);
