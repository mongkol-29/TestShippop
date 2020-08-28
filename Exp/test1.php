<!DOCTYPE html>
<html>

<head>

    <title>Page Title</title>
</head>

<body>
    <br />

    <?php

        $listErr = $searchErr = "" ;
        $list = $search = $select = "";
        $arr = array();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["list"])) {
                $listErr = "list is required";
            } else {
                $list = $_POST["list"];
                $arr = explode(",",$list);
            }

            if (empty($_POST["search"])) {
                $searchErr = "search is required";
            } else {
                $search = $_POST["search"];
            }

            if (empty($_POST["select"])) {
            } else {
                $select = $_POST["select"];
                
            }
        
        }

        function linearSearch($arr, $search, $list) {
            echo " List : ". $list;
            echo "<br><br>";

            echo " Search : ". $search;
            echo "<br><br>";

            echo "<h4>Result : <br><br></h4>";
            for($i = 0; $i < sizeof($arr); $i++) {
                    $n = $i+1;

                if($arr[$i] == $search) {
                    echo "Round ". $n. " ===> ". $search." == ". $arr[$i]. " Found!!";
                    echo "<br>";
                    break;

                }else {
                    echo "Round ". $n. " ===> ". $search." != ". $arr[$i];
                    echo "<br>";
                    
                }  
            }
        }

        function binarySearch($arr, $search, $list) {  
            $low = $n = 0 ; 
            $high = count($arr) - 1;

            echo " List : ". $list;
            echo "<br><br>";

            sort($arr);
            echo "Sorted array : ";
            for($i = 0;$i < sizeof($arr); $i++){
                echo $arr[$i].", ";
            }

            echo "<br><br>";
            echo " Search : ". $search;


            echo "<br><br><br>";
            echo "<h4>Result : <br><br></h4>";
            while ($low <= $high) { 
                    sort($arr);
                    $mid = floor(($low + $high) / 2);
                    $n +=1; 

                    if($arr[$mid] == $search) { 
                        echo " Round : ". $n. " ===> " .$search." == ". $arr[$mid]. " Found!!";
                        echo "<br>";
                        break;

                    }
                    if ($search < $arr[$mid]) { 
                        $high = $mid -1; 
                    } 
                    else { 
                        $low = $mid + 1; 
                    } 

                    echo " Round : ". $n. " ===> " .$search." != ". $arr[$mid];
                    echo "<br>";

            }
        }


        function bubbleSort($arr){ 

            for($i = 0; $i < sizeof($arr); $i++){
                for ($j = 0; $j < sizeof($arr) - $i - 1; $j++){ 
                    if ($arr[$j] > $arr[$j+1]) 
                    { 
                        $t = $arr[$j]; 
                        $arr[$j] = $arr[$j+1]; 
                        $arr[$j+1] = $t; 
                    } 
                } 
            } 
        }

    ?>

    <div class=center>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

        List: <input type="text" name="list" value="<?php echo $list;?>">
        <span class="error"> <?php echo $listErr;?></span>
        <br><br>

        เลขที่ต้องการค้นหา: <input type="text" name="search" value="<?php echo $search;?>">
        <span class="error"> <?php echo $searchErr;?></span>
        <br><br>

        ประเภทการค้นหา: <select  name="select">
                            <option value="1" selected>1. Linear Search</option>
                            <option value="2">2. Binary Search</option>
                            <option value="3">3. Bubble Sort</option>
                        </select>

        <br><br>
        <input type="submit" name="submit" value="ค้นหา">  
    </form>

    <?php
    echo "<h2>ผลลัพธ์ </h2>";
    ?>

    <table width=500px height= 300px style="border:3px dashed black; text-align:center;"  >
    <tr>
        <td> 

        <?php

        echo "<br>";

        if($select == "1"){
            echo linearSearch($arr, $search , $list);
            echo "<br>";

        }
        if($select == "2"){
            echo binarySearch($arr, $search, $list);
            echo "<br>";

        }
        if($select == "3") { 
  
            $len = sizeof($arr); 
            bubbleSort($arr); 
              
            echo "Sorted array :"; 
              
            for ($i = 0; $i < $len; $i++){
                echo $arr[$i]." ";
            }
            echo "<br><br>";
            echo "BubbleSort => LinearSearch : <br><br>";
            echo linearSearch($arr, $search , $list, $search);
            echo "<br>";

        }

    ?>

        </td>
    </tr>
    </table>


</div>

</body>

</html>