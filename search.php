<?php
	include("includes/includedFiles.php");
?>
<h3 class="searchHeader">
	Search for Nasheed, Artist or Album...
</h3>
<div class="searchContainer">
	<input type="text" name="searchInput" class="searchInput" id="searchInput" placeholder="Search Here" spellcheck="false" onfocus="this.value=this.value" autofocus>
</div>
<script type="text/javascript">

	$(function(){
		var timer;
		$(".searchInput").keyup(function(){
			clearTimeout(timer);
			timer=setTimeout(function(){
				var val= $(".searchInput").val();
				if(val!=''){
					$.post("includes/handlers/ajax/getSearch.php",{term:val}, function(data){
						$(".searchOutput").html('<h2>Songs</h2>	<div class="songListContainer art"  data-simplebar data-simplebar-auto-hide="false"><ul class="songList search"></ul></div>	');
						song=JSON.parse(data);
						var tempPlayLis=[];
						if(song.length>0){
							for(i=0;i<song.length;i++){
								tempPlayLis.push(song[i].id.toString());
							}

							console.log(tempPlayLis);
		            		$.each(song,function(key, item) {
		            		var index=key+1;
		            		$(".songList").append("<li class='songRow'><div class='songNumberCon'><img src='assets/images/icons/play-white.png' onclick='setTrack("+item.id+",["+tempPlayLis+"], true)'><span class='songNumber'>"+index+".</span></div><div class='songInfo'><span class='songTitle'>"+item.title+"</span><p class='song'>"+item.artist+"</p></div><div class='songMore'><img class='optionButton' src='assets/images/icons/more.png' ></div><div class='songDuration'><span class='songDuration'>"+item.duration+"</span></div></li>");
		            		});
	            		}else{
	            			$(".searchOutput").html("<h2>Songs</h2><p class='noSong'>No Songs Found That match '"+val+"'..</>");
	            		}
					});	
				}
			},500);
		});
	});
</script> 
<div class="searchOutput">


</div>