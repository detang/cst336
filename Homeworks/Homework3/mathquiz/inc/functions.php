<?php
    function allAnswered($arr) {
        $returnValue = true;
        
        for( $i = 0; $i < sizeof($arr) && $returnValue; $i++) {
            if( $arr[$i] == '') {
                $returnValue = false;
            }
        }
        return $returnValue;
    }
    
    function checkAnswered($number1, $number2, $number3, $number4, $number5) {
        
        if($number1 == '' || $number2 == '' || $number3 == '' || $number4 == '' || $number5 == '' ) {
            
            echo "<div id='results'>";
            echo "<span class='resultMessage' class='noAnswer'> You missed a question. </span> <br/>";
           
            for($i = 1; $i <= 5; $i++ ) {
                
                if( ${'number'. $i } == "") {
                    
                    echo "<span class='noAnswer'> You need to answer #" .$i. "<br/>"; 
                    
                }
            }
            
            echo "</div>";
        }
    }
    
    function displayResults($answerArr, $resultsArr) {
        
        echo "<div id='results'>";
        
        echo "<span class='resultMessage'> Results </span><br/><br/>";
        
        $correctCount=0;
        
        for($i=0;$i<sizeof($answerArr);$i++) {
            
            if(str_replace(' ', '', strtolower($resultsArr[$i])) == $answerArr[$i]) {
                
                echo "Question " . ($i+1) . " is Correct! <br/>";
                $correctCount++;
            }
            else{
                
                echo "Question " . ($i+1) . " is Incorrect! <br/>";
            }
        }
            
        echo "<br / > <br />";
        echo "You got " . $correctCount . " right!";
        
        if ($correctCount <= 1) {
            
            echo " LOL!!!";
        }
        
        echo "</div>";
    }
?>