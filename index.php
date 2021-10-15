<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./stylesheet.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Inicio</title>
</head>

<body style="background-image: url(/ElectionsSystem-SEUPB2020/images/fondo.jpg);background-size: cover;">
	<div style="overflow:auto">
		<div class="media">
	   <img src="/ElectionsSystem-SEUPB2020/images/SEUPB.jpg" width="200" height="100">
	</div>
	
	<div style="overflow:auto">
		<div class="col1">
	    <div class="header">ELECCION DE CAPITANES</div>
	    <div class="header2">CARRERAS/ESCUELAS DE LA UNIVERSIDAD</div>
	</div>

	<div class="container">
		<ul>
			<li><a>
				<span class="col3" style="background-color: grey">
					<img src="/ElectionsSystem-SEUPB2020/images/ADMI.png" width="80" height="80" color="black">
				</span>
				<div class="header3">Admnistracion</div>
			</a></li>

			<li><a>
				<span class="col3" style="background-color: red">
					<img src="/ElectionsSystem-SEUPB2020/images/MKT.png" width="80" height="80">
				</span>
				<div class="header3">MKT</div>
			</a></li>

			<li><a>
				<span class="col3" style="background-color: orange">
					<img src="/ElectionsSystem-SEUPB2020/images/ICO.png" width="80" height="80">
				</span>
				<div class="header3">ICO</div>
			</a></li>

			<li><a>
				<span class="col3" style="background-color: yellow">
					<img src="/ElectionsSystem-SEUPB2020/images/MEE.png" width="80" height="80">
				</span>
				<div class="header3">MEE</div>
			</a></li>

			<li><a>
				<span class="col3" style="background-color: skyblue">
					<img src="/ElectionsSystem-SEUPB2020/images/EIE.png" width="80" height="80">
				</span>
				<div class="header3">EIE</div>
			</a></li>
		</ul>
	</div>

	<div class="container">
		<ul>
			<li><a>
				<span class="col3" style="background-color: black">
					<img src="/ElectionsSystem-SEUPB2020/images/CSJ.png" width="80" height="80">
				</span>
				<div class="header3">CSJ</div>
			</a></li>

			<li><a>
				<span class="col3" style="background-color: greenyellow;">
					<img src="/ElectionsSystem-SEUPB2020/images/DTI.png" width="80" height="80">
				</span>
				<div class="header3">DTI</div>
			</a></li>

			<li><a>
				<span class="col3" style="background-color: purple">
					<img src="/ElectionsSystem-SEUPB2020/images/DISEÑO.png" width="80" height="80">
				</span>
				<div class="header3">DISENO</div>
			</a></li>

			<li><a>
				<span class="col3" style="background-color: green">
					<img src="/ElectionsSystem-SEUPB2020/images/FINAN.png" width="80" height="80">
				</span>
				<div class="header3">ING. FINANCIERA</div>
			</a></li>

			<li><a>
				<span class="col3" style="background-color: darkred">
					<img src="/ElectionsSystem-SEUPB2020/images/COMU.png" width="80" height="80">
				</span>
				<div class="header3">COMUNICACION</div>
			</a></li>
		</ul>	
	</div>

	<div class="container">
		<ul>
			<li><a href="#" class="button">Iniciar Sesion</a></li>
			<li><a class="button2" id="counter">Tiempo Restante: <p class="button3" id="demo"></p></a></li>
			<script>
				// Set the date we're counting down to
				var countDownDate = new Date("Dec 10, 2021 23:59:59").getTime();

				// Update the count down every 1 second
				var x = setInterval(function() {

			  	// Get today's date and time
				var now = new Date().getTime();

				// Find the distance between now and the count down date
				var distance = countDownDate - now;

				// Time calculations for days, hours, minutes and seconds
				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				// Display the result in the element with id="demo"
				document.getElementById("demo").innerHTML = days + "d " + hours + "h "
				+ minutes + "m " + seconds + "s ";

				// If the count down is finished, write some text
				if (distance < 0) {
					clearInterval(x);
				    document.getElementById("demo").innerHTML = "EXPIRED";
			  	}
			}, 1000);
			</script>
		</ul>
	</div>

	<footer class="footer">
		<div class="social-menu">
		  <ul>
		    <li><a href="https://www.facebook.com/SEUPBLaPaz"><i class="fa fa-facebook"></i></a></li>
		    <li><a href="https://www.instagram.com/seupblapaz/?hl=es-la"><i class="fa fa-instagram"></i></a></li>
		    <li><a href="https://walink.co/bf715e"><i class="fa fa-whatsapp"></i></a></li>
		  </ul>
	</footer>
</body>
</html>