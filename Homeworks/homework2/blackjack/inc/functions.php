<?php
        
        $usedCard = array();
        
        function play(){
                echo '<div id="player">';
                
                playerHand($usedCard);
                
                echo'</div>
                        <div class = "container">
                        <a class="button-one" title="Relevant Title" href="#">Hit!</a>
                        <a class="button-two" title="Relevant Title" href="#">Stand!</a>
                        </div>';
        }
        
        //***************************************************************************************
        
        function pickCard(){
                $deck = array(
                        "Diamond"       => array("AD", "2D", "3D", "4D", "5D", "6D", "7D", "8D", "9D", "10D", "JD", "QD", "KD"),
                        "Clubs"         => array("AC", "2C", "3C", "4C", "5C", "6C", "7C", "8C", "9C", "10C", "JC", "QC", "KC"),
                        "Hearts"        => array("AH", "2H", "3H", "4H", "5H", "6H", "7H", "8H", "9H", "10H", "JH", "QH", "KH"),
                        "Spades"        => array("AS", "2S", "3S", "4S", "5S", "6S", "7S", "8S", "9S", "10S", "JS", "QS", "KS"),
                );
                        
                $pattern = array_rand($deck);                           //here you will get a random suit
                $card = $deck[$pattern][array_rand($deck[$pattern])];           //generate random value within suit 
                
                echo $card;

                
                // if (in_array("Glenn", $people)) {
                //   echo "Match found";
                // }
                // else {
                //   echo "Match not found";
                // }
                
                return $card;
        }
        
        function displayCard($card){
                echo "<img id='card' src='img/$card.png' alt='$pattern'>";
        }
        
        function playerHand($usedCard) {

                $dealCard1 = pickCard();
                $usedCard[] = $dealCard1;
                
                $dealCard2 = pickCard();
                $usedCard[] = $dealCard2;

                displayCard($dealCard1);
                displayCard($dealCard2);
                
        }

?>