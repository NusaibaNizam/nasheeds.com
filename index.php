<?php
include("includes/includedFiles.php");
 ?>

<h1 class="pageHeading">Heart Touching Nasheed Albums</h1>
<div class="gridView" data-simplebar data-simplebar-auto-hide="false">
	<?php
		$albumQuery=mysqli_query($con,"SELECT * FROM albums ORDER BY rand() LIMIT 10");
		while($row=mysqli_fetch_array($albumQuery)) {
			echo "<div class='gridItem' title='Album: ".$row['title']."'>
				<a onclick='changePageTo(\"albums.php?id=".$row['id']."\")'' >
					<div class='gridImg'>
					<img src='".$row['artworkPath']."'>
					</div>
					<div class='gridInfo'>"
						.$row['title'].
					"</div>
				</a>
			</div>";
			//echo $row['title']."<br>";
		}
	?>
</div>

