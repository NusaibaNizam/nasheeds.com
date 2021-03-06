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
		$(".searchInput").keyup(function(){
			clearTimeout(timer);
			timer=setTimeout(function(){
				var val= $(".searchInput").val();
				if(val!=''){
					$.post("includes/handlers/ajax/getSearch.php",{songQ:val}, function(data){
						$(".searchOutputSong").html('<h2>Songs</h2>	<div class="songListContainer art"  data-simplebar data-simplebar-auto-hide="false"><ul class="songList search"></ul></div>	');
						song=JSON.parse(data);
						var tempPlayLis=[];
						if(song.length>0){
							for(i=0;i<song.length;i++){
								tempPlayLis.push(song[i].id.toString());
							}

		            		$.each(song,function(key, item) {
		            		var index=key+1;
		            		$(".searchOutputSong .songList").append("<li class='songRow'><div class='songNumberCon'><img src='assets/images/icons/play-white.png' onclick='setTrack("+item.id+",["+tempPlayLis+"], true)'><span class='songNumber'>"+index+".</span></div><div class='songInfo'><span class='songTitle'>"+item.title+"</span><p class='song'>"+item.artist+"</p></div><div class='songMore'><img class='optionButton' src='assets/images/icons/more.png' ></div><div class='songDuration'><span class='songDuration'>"+item.duration+"</span></div></li>");
		            		});
	            		}else{
	            			$(".searchOutputSong").html("<h2>Songs</h2><p class='noResuslt'>No Songs Found That Match '"+val+"'..</>");
	            		}
					});


					$.post("includes/handlers/ajax/getSearch.php",{atristQ:val}, function(data){
						$(".searchOutputArtist").html('<h2>Artists</h2><div class="artistContainer" data-simplebar data-simplebar-auto-hide="false"><ul class="artistList"></ul></div>');
						atrist=JSON.parse(data);
						if(atrist.length>0){
		            		$.each(atrist,function(key, item) {
		            		var index=key+1;
		            		$(".searchOutputArtist .artistList").append("<li class='artistRow borderBottom'><div class='artistName'><span class='point' onclick='changePageTo(\"artist.php?id="+item.id+"\")'>"+item.artist+"</span></div></li>");
		            	});
	            		}else{
	            			$(".searchOutputArtist").html("<h2>Artists</h2><p class='noResuslt'>No Artists Found That Match '"+val+"'..</>");
	            		}
					});		
					$.post("includes/handlers/ajax/getSearch.php",{albumQ:val}, function(data){
						$(".searchOutputAlbum").html('<h2>Albums</h2><div class="grid" data-simplebar data-simplebar-auto-hide="false"><div class="gridView"></div></div>');
						album=JSON.parse(data);
						if(album.length>0){
		            		$.each(album,function(key, item) {
		            		var index=key+1;
		            		$(".searchOutputAlbum .gridView").append("<div class='gridItem' title='Album: "+item.title+"'><a onclick='changePageTo(\"albums.php?id="+item.id+"\")'' ><div class='gridImg'><img src='"+item.artworkPath+"'></div><div class='gridInfo'>"+item.title+"</div></a></div>");
		            	});
	            		}else{
	            			$(".searchOutputAlbum").html("<h2>Albums</h2><p class='noResuslt'>No Albums Found That Match '"+val+"'..</>");
	            		}
					});		
				}else{

					$(".searchOutputSong").html('');
					$(".searchOutputArtist").html('');
					$(".searchOutputAlbum").html('');
				}
			},500);
		});
	});
</script> 
<div class="searchOutput">
	<div class="searchOutputSong">
		
	</div>

	<div class="searchOutputArtist">

	</div>

	<div class="searchOutputAlbum">
		
	</div>
</div>