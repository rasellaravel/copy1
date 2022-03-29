  	'use strict';
  	$(document).ready(function () {
	//Basic alert
	var sweet_1 = document.querySelector('.sweet-1');
	if(sweet_1){
		sweet_1.onclick = function(){
			swal("Here's a message!", "It's pretty, isn't it?")
		}
	}
	//success message
	var alert_success_msg = document.querySelector('.alert-success-msg');
	if(alert_success_msg){
		alert_success_msg.onclick = function(){
			swal("Good job!", "You clicked the button!", "success");
		}
	}

	//Alert confirm
	var alert_confirm = document.querySelector('.alert-confirm');
	if(alert_confirm){
		alert_confirm.onclick = function(){
			swal({
				title: "Are you sure?",
				text: "Your will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				closeOnConfirm: false
			},
			function(){
				swal("Deleted!", "Your imaginary file has been deleted.", "success");
			});
		}
	}

	//Success or cancel alert
	var alert_success_cancel = document.querySelector('.alert-success-cancel');
	if(alert_success_cancel){
		alert_success_cancel.onclick = function(){
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this imaginary file!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Yes, delete it!",
				cancelButtonText: "No, cancel plx!",
				closeOnConfirm: false,
				closeOnCancel: false
			},
			function(isConfirm) {
				if (isConfirm) {
					swal("Deleted!", "Your imaginary file has been deleted.", "success");
				} else {
					swal("Cancelled", "Your imaginary file is safe :)", "error");
				}
			});
		}
	}
	//prompt alert
	var alert_prompt = document.querySelector('.alert-prompt');
	if(alert_prompt){
		alert_prompt.onclick = function(){
			swal({
				title: "An input!",
				text: "Write something interesting:",
				type: "input",
				showCancelButton: true,
				closeOnConfirm: false,
				inputPlaceholder: "Write something"
			}, function (inputValue) {
				if (inputValue === false) return false;
				if (inputValue === "") {
					swal.showInputError("You need to write something!");
					return false
				}
				swal("Nice!", "You wrote: " + inputValue, "success");
			});
		}
	}

	//Ajax alert
	var alert_ajax = document.querySelector('.alert-ajax');
	if(alert_ajax){
		alert_ajax.onclick = function(){
			swal({
				title: "Ajax request example",
				text: "Submit to run ajax request",
				type: "info",
				showCancelButton: true,
				closeOnConfirm: false,
				showLoaderOnConfirm: true
			}, function () {
				setTimeout(function () {
					swal("Ajax request finished!");
				}, 2000);
			});
		}
	}


	$('#openBtn').on('click',function () {
		$('#myModal').modal({
			show: true
		})
	});

	$(document).on('show.bs.modal', '.modal', function (event) {
		var zIndex = 1040 + (10 * $('.modal:visible').length);
		$(this).css('z-index', zIndex);
		setTimeout(function() {
			$('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
		}, 0);
	});
});
