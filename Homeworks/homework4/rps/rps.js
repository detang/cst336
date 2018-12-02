var imgPlayer;
var btnRock;
var btnPaper;
var btnScissors;
var btnGo;
var computerChoice;
var playerChoice;


function init(){
	imgPlayer = document.getElementById('imgPlayer');
	btnRock = document.getElementById('btnRock');
	btnPaper = document.getElementById('btnPaper');
	btnScissors = document.getElementById('btnScissors');
	btnGo = document.getElementById('btnGo');
	deselectAll();
}

// function selectRock(){
// 	imgPlayer.src = 'images/rock.png';
// 	btnRock.style.backgroundColor = '#888888'
// 	btnPaper.style.backgroundColor = 'silver'
// 	btnScissors.style.backgroundColor = 'silver'
// }

// function selectPaper(){
// 	imgPlayer.src = 'images/paper.png';
// 	btnRock.style.backgroundColor = 'silver'
// 	btnPaper.style.backgroundColor = '#888888'
// 	btnScissors.style.backgroundColor = 'silver'
// }

// function selectScissors(){
// 	imgPlayer.src = 'images/scissors.png';
// 	btnRock.style.backgroundColor = 'silver'
// 	btnPaper.style.backgroundColor = 'silver'
// 	btnScissors.style.backgroundColor = '#888888'
// }

function deselectAll(){
	btnRock.style.backgroundColor = 'silver';
	btnPaper.style.backgroundColor = 'silver';
	btnScissors.style.backgroundColor = 'silver';
}

function select(choice) {
	playerChoice = choice;
	// alert(choice);
	imgPlayer.src = 'images/' + choice + '.png';
	deselectAll();
	if (choice == 'rock') {
		btnRock.style.backgroundColor = '#888888';
	}
	if (choice == 'paper') {
		btnPaper.style.backgroundColor = '#888888';
	}
	if (choice == 'scissors') {
		btnScissors.style.backgroundColor = '#888888';
	}
	btnGo.style.display = 'block';
}

function go() {
	var numChoice = Math.floor(Math.random() * 3);
	var imgComputer = document.getElementById('imgComputer');
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	if (numChoice == 0){
		computerChoice = 'rock';
		imgComputer.src = 'images/rock.png';
		document.getElementById('lblRock').style.backgroundColor = 'yellow';
		
		if (playerChoice == 'rock') {
			// txtEndTitle.innerHTML = '';
			// txtEndMessage.innerHTML = 'TIE';
			$('#txtEndTitle').html('');
			$('#txtEndMessage').html('TIE');
		}
		else if (playerChoice == 'paper') {
			// txtEndTitle.innerHTML = 'Paper beats Rock';
			// txtEndMessage.innerHTML = 'YOU WIN!';
			$('#txtEndTitle').html('Paper beats Rock');
			$('#txtEndMessage').html('YOU WIN!');
		}
		else if (playerChoice == 'scissors') {
			// txtEndTitle.innerHTML = 'Rock beats Scissors';
			// txtEndMessage.innerHTML = 'YOU LOSE!';
			$('#txtEndTitle').html('Rock beats Scissors');
			$('#txtEndMessage').html('YOU LOSE!');
		}

	}
	else if (numChoice == 1){
		computerChoice = 'paper';
		imgComputer.src = 'images/paper.png';
		document.getElementById('lblPaper').style.backgroundColor = 'yellow';

		
		if (playerChoice == 'rock') {
			// txtEndTitle.innerHTML = 'Paper beats Rock';
			// txtEndMessage.innerHTML = 'YOU LOSE!';
			$('#txtEndTitle').html('Paper beats Rock');
			$('#txtEndMessage').html('YOU LOSE!');
		}
		else if (playerChoice == 'paper') {
			// txtEndTitle.innerHTML = '';
			// txtEndMessage.innerHTML = 'TIE';
			$('#txtEndTitle').html('');
			$('#txtEndMessage').html('TIE');			
		}
		else if (playerChoice == 'scissors') {
			// txtEndTitle.innerHTML = 'Scissors beats Paper';
			// txtEndMessage.innerHTML = 'YOU WIN!';
			$('#txtEndTitle').html('Scissors beats Paper');
			$('#txtEndMessage').html('YOU WIN!');
		}

	}
	else if (numChoice == 2){
		computerChoice = 'scissors';
		imgComputer.src = 'images/scissors.png';
		document.getElementById('lblScissors').style.backgroundColor = 'yellow';
		
		if (playerChoice == 'rock') {
			// txtEndTitle.innerHTML = 'Rock beats Scissors';
			// txtEndMessage.innerHTML = 'YOU WIN!';
			$('#txtEndTitle').html('Rock beats Scissors');
			$('#txtEndMessage').html('YOU WIN!');
		}
		else if (playerChoice == 'paper') {
			// txtEndTitle.innerHTML = 'Scissors beats Paper';
			// txtEndMessage.innerHTML = 'YOU LOSE!';
			$('#txtEndTitle').html('Scissors beats Paper');
			$('#txtEndMessage').html('YOU LOSE!');
		}
		else if (playerChoice == 'scissors') {
			// txtEndTitle.innerHTML = '';
			// txtEndMessage.innerHTML = 'TIE';
			$('#txtEndTitle').html('');
			$('#txtEndMessage').html('TIE');
		}
	}
	document.getElementById('endScreen').style.display = 'block';
}

function startGame(){
	document.getElementById('introScreen').style.display = 'none';
}

function replay(){
	document.getElementById('endScreen').style.display = 'none';
	btnGo.style.display = 'none';
	deselectAll();
	
	document.getElementById('lblRock').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblPaper').style.backgroundColor = '#EEEEEE';
	document.getElementById('lblScissors').style.backgroundColor = '#EEEEEE';
	
	imgPlayer.src = 'images/question.png';
	document.getElementById('imgComputer').src = 'images/question.png';
}