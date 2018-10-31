<?php
        function play() {        
        for ($i = 1; $i<4; $i++) {
            ${"randomValue".$i} = rand(0 , 3);
            displaySymbol(${"randomValue".$i}, $i );
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
        
       
        }
        
        /*      $randomValue1 = rand(0, 2);
        displaySymbol($randomValue1);
        $randomValue2 = rand(0, 2);
        displaySymbol($randomValue2);
        $randomValue3 = rand(0, 2);
        displaySymbol($randomValue3);
         
        if ($randomValue == 0){
            echo '<img src="img/seven.png" alt="seven" title="seven" width="70px" />';
        }
        else if ($randomValue == 1){
            echo '<img src="img/cherry.png" alt="cherry" title="cherry" width="70px" />';
        }
            else {
                echo '<img src="img/lemon.png" alt="lemon" title="lemon" width="70px" />';
        }
        */
        
        function displaySymbol($randomValue, $pos){
            $randomValue = rand(0, 3);

            
            switch ($randomValue){
                case 0: $symbol = "seven";
                    break;
                case 1: $symbol = "cherry";
                    break;
                case 2: $symbol = "lemon";
                    break;
                case 3: $symbol = "bar";
                    break;
            }
            echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol) . "'width='70' >";
        }
        
        function displayPoints($randomValue1, $randomValue2, $randomValue3) {
            echo "<div id='output'>";
            
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                switch ($randomValue1) {
                    case 0: $totalPoints = 1000;
                        echo "<h1>Jackpot!</h1>";
                        break;
                    case 1: $totalPoints = 500;
                        break;
                    case 2: $totalPoints = 250;
                        break;
                    case 3: $totalPoints = 900;
                        echo "<h1>Semi - Jackpot!</h1>";
                        break;
                }
                
                echo "<h2> You won $totalPoints points! </h2>";
            } else {
                echo "<h3> Try Again! </h3>";
            }
            echo "</div>";
        }
?>