<?php
	
	include("includes/config.php");
	if(isset($_SESSION['userLoggedIn'])){
		$sessionUser=$_SESSION['userLoggedIn'];
	}
	else{
		header("Location: register.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Spotify Clone</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div id=nowPlayingContainer>
		<div id="nowPlaying">
			<div id="songDetails"></div>
			<div id="controlPanel">
				<div class="content controls">
					<div class="buttons">
						<button class="controlButton shuffle" title="Shuffle">
							<img src="assets/images/icons/shuffle.png" alt="Shuffle">
						</button>
						<button class="controlButton previous" title="Previous">
							<img src="assets/images/icons/previous.png" alt="Previous">
						</button>
						<button class="controlButton play" title="Play">
							<img src="assets/images/icons/play.png" alt="Play">
						</button>
						<button class="controlButton pause" title="Pause" style="display: none;">
							<img src="assets/images/icons/pause.png" alt="Pause">
						</button>
						<button class="controlButton next" title="Next">
							<img src="assets/images/icons/next.png" alt="Next">
						</button>
						<button class="controlButton repeat" title="Repeat">
							<img src="assets/images/icons/repeat.png" alt="Repeat">
						</button>
					</div>
					<div class="progressElementsContainer">
						<span class="progressTime current">0.00</span>

						<div class="progressBar">
							<div class="progressBackground"> 
								<div class="progress"></div>
							</div>
						</div>

						<span class="progressTime remaining">0.00</span>
					</div>
				</div>
			</div>
			<div id="volume"></div>
		</div>
	</div>
</body>
</html>