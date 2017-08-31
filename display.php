<?php

function display($matches)
{
    foreach($matches as $array)
    {
        $positions = determinatePosition($array["line"], $array["beginPosQuery"], $array["finalPosQuery"]);
        echo "Linia pe care sa facut match este " . $array["numberOfLine"] . " si testul este: ";

        for ($index = $positions["begin"]; $index <= $positions["final"]; $index++) {
            echo $array["line"][$index][0];

            if ($index < $positions["final"]) {
                echo " ";
            }
        }
        echo PHP_EOL;
    }
}

function determinatePosition($line, $beginPos, $finalPos)
{
    $arrayPos = array();

    $lenghtLine = count($line);
    $arrayPos["begin"] = $beginPos - 3;
    if (0 >= $beginPos - 3) {
        $arrayPos["begin"] = 0;
    }

    $arrayPos["final"] = $finalPos + 3;
    if (($lenghtLine - $finalPos) <= 3) {
        $arrayPos["final"] = $lenghtLine - 1;
    }

    return $arrayPos;
}