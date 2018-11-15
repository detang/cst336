<?php
include 'inc/functions.php';

if(isset($_GET['easyTest'])){
    $answerArr=array("144", "12", "3", "202", "72");
    $resultsArr=array($_GET['easyTest'], $_GET['TrickQuestion'], $_GET['sockQuestion'], $_GET['radioBullet'], $_GET['ageQuestion']);
    }
?>

    <!DOCTYPE html>
    <HTML lang="en">

    <head>
        <meta charset="utf-8">
        <title>Math Quiz - Homework 3</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <header>
            <h1>Welcome to My Pop Quiz!</h1>
            <hr/>
        </header>

        <main>
            <br/><br/>
            <div id="quiz">
                <form id="testForm">
                    <!--------------------------------------------------------------------------------------------------------Line Breaker-------------------------------------------------------------------------------------------------------->
                    
                    <!--First Question-->
                    1) What is 12 * 12?
                    <br/><br/>
                    <input name="easyTest" type="text" placeholder="Answer" value="<?=$_GET['easyTest']?>">

                    <hr id="nextQuestion" />
                    <!--------------------------------------------------------------------------------------------------------Line Breaker-------------------------------------------------------------------------------------------------------->


                    <!--Next Question -->
                    2) At a party, everyone shook hands with everybody else. <br/> There were 66 handshakes. How many people were at the party?
                    <br/><br/>

                    <select name="TrickQuestion">
                    <option value="" selected>Choose your Answer</option>
                    <option value="30" <?=($_GET['TrickQuestion']=='30'?'selected':'')?>> 30</option>
                    <option value="14" <?=($_GET['TrickQuestion']=='14'?'selected':'')?>> 14</option>
                    <option value="12" <?=($_GET['TrickQuestion']=='12'?'selected':'')?>> 12</option>
                    <option value="25" <?=($_GET['TrickQuestion']=='25'?'selected':'')?>> 25</option>
                </select>
                    <br/><br/><br/><br/>

                    <hr id="nextQuestion" />
                    <!--------------------------------------------------------------------------------------------------------Line Breaker-------------------------------------------------------------------------------------------------------->

                    <!--Next Question -->
                    3) It's dark. You have ten grey socks and ten blue socks you want to put into pairs. <br/> All socks are exactly the same except for their colour. <br/> How many socks would you need to take with you to ensure you had at least a pair?
                    <br/><br/>

                    <input type="number" name="sockQuestion" min="0" max="16" placeholder="Amount" value="<?=$_GET['sockQuestion']?>">

                    <hr id="nextQuestion" />
                    <!--------------------------------------------------------------------------------------------------------Line Breaker-------------------------------------------------------------------------------------------------------->

                    <!-- Next Question-->
                    4) Which of these numbers is even? <br/>
                    <table id="radioTab">
                        <tr>
                            <td>
                                <input id="radio1" name="radioBullet" type="radio" value="897" <?=($_GET['radioBullet']=='897'?'checked':'')?>>
                                <label for="radio1">897</label>
                            </td>
                            <td>
                                <input id="radio2" name="radioBullet" type="radio" value="643" <?=($_GET['radioBullet']=='643'?'checked':'')?>>
                                <label for="radio2">643</label>
                            </td>
                            <td>
                                <input id="radio3" name="radioBullet" type="radio" value="101" <?=($_GET['radioBullet']=='101'?'checked':'')?>>
                                <label for="radio3">101</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="radio4" name="radioBullet" type="radio" value="185" <?=($_GET['radioBullet']=='185'?'checked':'')?>>
                                <label for="radio4">185</label>
                            </td>
                            <td>
                                <input id="radio5" name="radioBullet" type="radio" value="202" <?=($_GET['radioBullet']=='202'?'checked':'')?>>
                                <label for="radio5">202</label>
                            </td>
                            <td>
                                <input id="radio6" name="radioBullet" type="radio" value="999" <?=($_GET['radioBullet']=='999'?'checked':'')?>>
                                <label for="radio6">999</label>
                            </td>
                        </tr>
                    </table>

                    <hr id="nextQuestion" />
                    <!--------------------------------------------------------------------------------------------------------Line Breaker-------------------------------------------------------------------------------------------------------->

                    <!--Next Question -->
                    5) My grandson is about as many days as my daugher in weeks, and my grandson is as many months as I am in years. <br/> My grandson, my daughter and I together are 120 years. Can you tell me my age in years?

                    <br/><br/>
                    <select name="ageQuestion">
                    <option value="">Select Your Answer</option>
                    <option value="60" <?=($_GET['ageQuestionq5']=='60'?'selected':'')?> >60</option>
                    <option value="72" <?=($_GET['ageQuestion']=='72'?'selected':'')?> >72</option>
                    <option value="66" <?=($_GET['ageQuestion']=='66'?'selected':'')?> >66</option>
                    <option value="81" <?=($_GET['ageQuestion']=='81'?'selected':'')?> >81</option>
                </select>

                    <!--------------------------------------------------------------------------------------------------------END OF QUIZ-------------------------------------------------------------------------------------------------------->

                    <!--Submit Button -->
                    <br/><br/><br/>
                    <input type="submit" value="Submit">

                </form>
            </div>

            <br/><br/>

            <?php
                if(isset($_GET['easyTest'])){
                    if(!allAnswered($resultsArr)){
                        checkAnswered($_GET['easyTest'], $_GET['TrickQuestion'], $_GET['sockQuestion'], $_GET['radioBullet'], $_GET['ageQuestion']);
                    }else {
                        displayResults($answerArr, $resultsArr);
                    }
                }
            ?>

        </main>



        <footer id="lowtext">
            <hr> CST336 - Internet Programming. 2018&copy; Tang <br/>
            <strong>Disclaimer:</strong> The information in this page is totally real.<br/> It is used for academic purposes only.

            <figure>
                <img src="img/logo.PNG" alt="School Logo" />
            </figure>
        </footer>
    </body>

    </HTML>
