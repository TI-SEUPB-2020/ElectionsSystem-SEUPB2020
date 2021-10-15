<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./footer.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Footer</title>
</head>
<body>
	<p id="demo"></p>

	<script>
		// Set the date we're counting down to
		var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();

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



	<footer>
		<div class="social-menu">
		  <ul>
		    <li><a href=""><i class="fa fa-facebook"></i></a></li>
		    <li><a href=""><i class="fa fa-twitter"></i></a></li>
		    <li><a href=""><i class="fa fa-instagram"></i></a></li>
		    <li><a href=""><i class="fa fa-youtube"></i></a></li>
		    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
		  </ul>
		</div>
	</footer>
</body>
</html>