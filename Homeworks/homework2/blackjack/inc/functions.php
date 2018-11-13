<?php
        
        function start(){
                echo '<div id="player">';
                
                playerHand($usedCard);
                
                
                echo'</div>';
        }
        
        function cardCount($card1, $card2){
                
                $count1 = substr($card1, 0, -1);
                $count2 = substr($card2, 0, -1);
                

                
                if ($count1 == "A"){
                        $count1 = 1;
                }
                elseif ($count1 == "J"){
                        $count1 = 10;
                }
                elseif ($count1 == "Q"){
                        $count1 = 10;
                }
                elseif ($count1 == "K"){
                        $count1 = 10;
                }
                elseif ($count2 == "A"){
                        $count2 = 1;
                }
                elseif ($count2 == "J"){
                        $count2 = 10;
                }
                elseif ($count2 == "Q"){
                        $count2 = 10;
                }
                elseif ($count2 == "K"){
                        $count2 = 10;
                }

                return $count1 + $count2;
        }
        
        //***************************************************************************************
        
        function pickCard(){
                $deck = array(
                        "Diamond"       => array("AD", "2D", "3D", "4D", "5D", "6D", "7D", "8D", "9D", "10D", "JD", "QD", "KD"),
                        "Clubs"         => array("AC", "2C", "3C", "4C", "5C", "6C", "7C", "8C", "9C", "10C", "JC", "QC", "KC"),
                        "Hearts"        => array("AH", "2H", "3H", "4H", "5H", "6H", "7H", "8H", "9H", "10H", "JH", "QH", "KH"),
                        "Spades"        => array("AS", "2S", "3S", "4S", "5S", "6S", "7S", "8S", "9S", "10S", "JS", "QS", "KS"),
                );
                
                shuffle($deck);
                $pattern = array_rand($deck);                           //here you will get a random suit
                $card = $deck[$pattern][array_rand($deck[$pattern])];           //generate random value within suit 
                
                return $card;
        }
        
        function displayCard($card){
                echo "<img id='card' src='img/$card.png' alt='$pattern'>";
        }
        
        function playerHand() {
                
                $neededcards = Array();

                $dealCard1 = pickCard();
                
                $dealCard2 = pickCard();
                
                while ($dealcard1 != $dealcard2) {
                        $dealCard2 = pickCard();
                }
                
                array_push($neededcards, $dealCard1);
                array_push($neededcards, $dealCard2);                
                displayCard($dealCard1);
                displayCard($dealCard2);
                
                $score = cardCount($dealCard1, $dealCard2);
                
                $hitCount = 0;
                
                while($score <= 21){
                        $hitCount = $hitCount + 1;
                        $hitCard = pickCard();
                        array_push($neededcards, $hitCard);
                        displayCard($hitCard);
                        $score = $score + cardCount(0, $hitCard);
                        
                        if ($score > 21){
                                $finalScore = $score - cardCount(0, $hitCard);
                        }
                }
                
                if ($finalScore == 21){
                        echo '<div id="score">';
                        echo "Your score is $finalScore ";
                        echo "You Win!";
                        echo "You only need the first "; 
                        print_r(count($neededcards) - 1); 
                        echo " cards</br>";
                        echo '</div>';   
                }
                else {
                        echo '<div id="score">';
                        echo "Your score is $finalScore </br>";
                        echo "It will take $hitCount hit(s) to bust.</br>";
                        echo "You only need the first "; 
                        print_r(count($neededcards) - 1); 
                        echo " cards</br>";
                        echo '</div>';
                        
                }
        }
?>