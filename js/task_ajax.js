'use strict';
function taskAJAX(task, taskErrorMessage){
	var taskPanelHeading = document.querySelector('#task-panel-heading');
	var taskPanelBody = document.querySelector('#task-panel-body');	
	var btnCompute = document.querySelector('#compute-btn');	
	var inputData = document.querySelector('#input-data');
	var ErrorMessage = document.querySelector('#error-msg-txt');
	var ErrorMessageBlock = document.querySelector('#error-msg-block');	
	var defaultPanelHeading = taskPanelHeading.innerHTML;
	var btnRepeat = document.querySelector('#btn-repeat');
	var answerBlock = document.querySelector('#answer-block');
	var answerText = document.querySelector('#answer-text');
	var form = document.querySelector('#form');	
	
	function btnRepeatClick() {
		taskPanelHeading.innerHTML = defaultPanelHeading;
		answerBlock.classList.toggle('hidden', true);
		form.classList.toggle('hidden', false);
	}
	
	function showAnswer(text) {
		taskPanelHeading.innerHTML = 'Відповідь:';
		form.classList.toggle('hidden', true);
		btnCompute.classList.toggle('disabled', false);
		inputData.classList.toggle('disabled', false);
		answerText.innerHTML =  text;
		answerBlock.classList.toggle('hidden', false);		
	}	
	
	function xrhDone(answer) {
		showAnswer(answer);		
	}	
	
	function xrhFail() {
		showAnswer('Помилка звязку з сервером');		
	}
	
	function calculateDataPromise(data) {		      
		return $.post('compute_' + task + '.php', data);
	}
	
	function btnComputeClick() {
		var data = inputData.value;
		if (data) {
			ErrorMessageBlock.classList.toggle('hidden', true);
			btnCompute.classList.toggle('disabled', true);
			inputData.classList.toggle('disabled', true);
			calculateDataPromise('data=' + data).then(xrhDone, xrhFail);			
		} else {
			console.log('empty data');
			ErrorMessage.innerHTML =   taskErrorMessage;
			ErrorMessageBlock.classList.toggle('hidden', false);
		}
	}
	
	btnCompute.addEventListener('click', btnComputeClick);
	btnRepeat.addEventListener('click', btnRepeatClick);
}