<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<h1 class="mt-4">Wellcome</h1>
			<h3 class="mt-4">To fire keyboard event you can use this:</h3>
			
			<input type="text" placeholder="foo" />
			
		</div>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		
		<script>
			
				function keydown(ctrl, alt, shift, which, key) {
					var e = $.Event("keydown");
					e.ctrlKey = ctrl;
					e.altKey = alt;
					e.shiftKey = shift;
					e.isTrigger = 1;
					if (typeof which === 'string') {
						key = which;
						which = key.toUpperCase().charCodeAt(0);
					}
					e.key = key;
					e.which = e.keyCode = which;
					//console.log(e)
					return e;
				}
				function keypress(key) {
					var e = $.Event("keypress");
					e.key = key;
					e.which = e.keyCode = 0;
					return e;
				}
				function shortcut({
					ctrl = false,
					alt = false,
					shift = false,
					which,
					key
				}) {
					var doc = $(document.documentElement || window);
					if (typeof which === 'string') {
						key = which;
						which = key.toUpperCase().charCodeAt(0);
					}
					
					
					
					doc.trigger(keydown(ctrl, alt, shift, which, key));
					doc.trigger(keypress(key));
				}
				
				shortcut({ctrl: true, alt: false, which: 'p'});
				
				$(function() {
					/* var e = $.Event('keypress');
					e.ctrlKey = true;
					e.which = 65; // Character 'A'
					$(document).trigger(e); */
				});
				
			/* $(document).ready(function(){
				var triggerEvent = $.Event('keypress');
				triggerEvent.which = 65;
				
				triggerEvent.ctrlKey = true;
				$('h1').trigger(triggerEvent);
			}) */
			
			// get the element in question
			const input = document.getElementsByTagName("input")[0];

			// focus on the input element
			input.focus();

			// add event listeners to the input element
			input.addEventListener('keypress', (event) => {
			  console.log("You have pressed key: ", event.key);
			});

			input.addEventListener('keydown', (event) => {
			  console.log(`key: ${event.key} has been pressed down`);
			});

			input.addEventListener('keyup', (event) => {
			  console.log(`key: ${event.key} has been released`);
			});

			// dispatch keyboard events
			input.dispatchEvent(new KeyboardEvent('keydown',  {'key':'e'}));
			input.dispatchEvent(new KeyboardEvent('keyup', {'key':'y'}));
			//input.dispatchEvent(new KeyboardEvent('keydown',  {'key':'Ctrl'}));
			input.dispatchEvent(new KeyboardEvent('keydown',  {'key':'p'}));
		</script>
	</body>
</html>