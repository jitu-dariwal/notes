<html>
	<head>
		<title>Popup on mouse out</title>
	</head>
	<body>
		<h1>Mouse Out from view area then open popup.</h1>
		<script>
			document.addEventListener("mouseleave", function(event){
				if(event.clientY <= 0 || event.clientX <= 0 || (event.clientX >= window.innerWidth || event.clientY >= window.innerHeight)){
					var detail = getCookie("testCookies");
					if (detail == "") {
						setCookie("testCookies", 1, 1);
						alert("set Cookies");
					}
				}
			});
		
			function setCookie(cname,cvalue,exdays) {
				var d = new Date();
				d.setTime(d.getTime() + (exdays*24*60*60*1000));
				var expires = "expires=" + d.toGMTString();
				document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
			}

			function getCookie(cname) {
				var name = cname + "=";
				var decodedCookie = decodeURIComponent(document.cookie);
				var ca = decodedCookie.split(';');
				for(var i = 0; i < ca.length; i++) {
					var c = ca[i];
					while (c.charAt(0) == ' ') {
						c = c.substring(1);
					}
					if (c.indexOf(name) == 0) {
						return c.substring(name.length, c.length);
					}
				}
				return "";
			}
		</script>
	</body>
</html>