<?php

function match($textFiltered, $queryFiltered)
{
    $finalArray = array();

    for ($i = 0, $lines = count($textFiltered); $i < $lines; $i++) {
        for ($index = 0; $index < count($textFiltered[$i]); $index++) {
            $countQuery = 0;
            $copyIndex = $index;

            for ($indexQ = 0, $lenghtQuery = count($queryFiltered); $indexQ < $lenghtQuery; $indexQ++) {
                if (strcmp($textFiltered[$i][$copyIndex][0], $queryFiltered[$indexQ]) != 0) {
                    break;
                }
                $copyIndex++;
                $countQuery++;
            }
            if ($countQuery == count($queryFiltered)) {
                $tempArray["numberOfLine"] = $i + 1;
                $tempArray["line"] = $textFiltered[$i];
                $tempArray["beginPosQuery"] = $index;
                $tempArray["finalPosQuery"] = $index + $countQuery - 1;
                array_push($finalArray, $tempArray);
            }
        }
    }

    return $finalArray;
}

function match2($textFiltered, $queryFiltered)
{
    $finalArray = array();

    for ($i = 0, $lines = count($textFiltered); $i < $lines; $i++) {
        for ($index = 0; $index < count($textFiltered[$i]); $index++) {
            $countQuery = 0;
            $copyIndex = $index;
            $count = 0;

            for ($indexQ = 0, $lenghtQuery = count($queryFiltered); $indexQ < $lenghtQuery; $indexQ++) {
                foreach ($textFiltered[$i][$copyIndex] as $string) {
                    if (strcmp($string, $queryFiltered[$indexQ]) == 0) {
                        $count++;
                    }
                }

                if ($count !== 0) {
                    $copyIndex++;
                    $countQuery++;
                }
            }
            if ($countQuery == count($queryFiltered)) {
                $tempArray["numberOfLine"] = $i + 1;
                $tempArray["line"] = $textFiltered[$i];
                $tempArray["beginPosQuery"] = $index;
                $tempArray["finalPosQuery"] = $index + $countQuery - 1;
                array_push($finalArray, $tempArray);
            }
        }
    }

    return $finalArray;
}