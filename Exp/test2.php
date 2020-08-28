<br/>
<?php

$marks =array(
    "mohammad"=>array(
        "physics"=>35,
        "maths"=>30,
        "chemistry"=>39
        ),
    "qadir"=>array(
        "physics"=>30,
        "maths"=>32,
        "chemistry"=>29
        ),
    "zara"=>array(
        "physics"=>31,
        "maths"=>22,
        "chemistry"=>39
        )
    );

    $keys = array_keys($marks);
    for($i = 0; $i < count($marks); $i++) {
        foreach($marks[$keys[$i]] as $key => $value) {
            echo "$value &nbsp;";
        }
    }

    // echo $marks["mohammad"]["physics"];


?>