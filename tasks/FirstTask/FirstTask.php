<?php

function correctingLine($exampleLine) 
{           
    $piecesExampleLine = preg_split('/[-_]/', $exampleLine);

    foreach ($piecesExampleLine as $key => &$value) {  
        if($key === 0) continue;
        $value = ucfirst($value);
    }
    
    $answerLine = implode("", $piecesExampleLine);

    return $answerLine;
}

$exampleLine = readline("Напишите вашу строку = ");

echo correctingLine($exampleLine);

?>