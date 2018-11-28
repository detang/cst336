var selectedWord="";
var selectedHint="";
var board=[];
var remainingGuesses=6;
var words = [{word:"snake", hint:"it's a reptile"},
            {word:"monkey", hint:"its a mammal"},
            {word:"beetle", hint:"it's an insect"}];
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

window.onload = startGame();

function startGame()
{
    pickWord();
    initBoard();
    updateBoard();
    createLetters();
    showHint();
    
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function initBoard() {
    for (var letter in selectedWord)
    {
        board.push("_");
    }
}

function updateBoard() {
    
    $("#word").empty();
    
    for(var i=0; i<board.length; i++)
    {
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br/>");
}

function createLetters() {
    for (var letter of alphabet)
    {
        $("#letters").append("<button class='letter' class= 'btn btn-success' id='" + letter + "'>" + letter +"</button>");
    }
    $(".letter").click(function() {
        checkLetter($(this).attr("id"));
        disableButton($(this));
        }
    );
}


function showHint() {
    $("#hint").append("<button class='hnt' class='btn btn-regular'> Hint </button>");
    $(".hnt").click(function() {
                    document.getElementById("hint").innerHTML=selectedHint;
                    remainingGuesses-=1;
                    updateMan();
                    remainingGuesses+=1;
                }
                )
    
}


function checkLetter(letter) {
    var positions = new Array();
    
    for (var i=0; i<selectedWord.length; i++) {   
        if (letter == selectedWord[i]) {
            positions.push(i);
        }
    }
    if (positions.length>=1) {
        updateWord(positions, letter);
        if(!board.includes('_')) {
            endGame(true);
        }
    }
    else {
        remainingGuesses-=1;
        updateMan();
    }
    if(remainingGuesses<=0) {
        endGame(false);
    }
}

function updateWord(positions, letter) {
    for(var pos of positions) {
        board[pos]=letter;
    }
    for(var i=0; i<board.length; i++) {
        console.log(board[i]);
    }
    updateBoard();
}

function updateMan() {
    $("#hangImg").attr("src", "img/stick_"+(6-remainingGuesses)+".png");
}


function endGame(win) {
    $("#letters").hide();
    if(win) {
        $('#won').show();
    }
    else {
        $('#lost').show();
    }
    $(".replayBtn").on("click", function(){location.reload();});
}


function disableButton() {
    btn.prop("disabled", true);
    btn.attr("class","btn btn-danger");
}