<?php
	include("includes/includedFiles.php");
?>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div id="dialog" title="Enter Playlist Name">
	<h2><br></h2>
  <form><input type="text" style="z-index:10000" name="playlistName" spellcheck="false"><br></form>
</div>
<div class="playlistContainer">
	<h2>Playlists</h2>
	<div class="buttonItems">
		<button class="button green" onclick="createPlaylist()">NEW PLAYLIST</button>
	</div>
	<div class="gridView" data-simplebar data-simplebar-auto-hide="false">
		
	</div>
</div>