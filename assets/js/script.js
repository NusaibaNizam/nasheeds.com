
var currentPlayList=new Array();
var audioElement;

class Audio{
	constructor(){
		this.audio=document.createElement('audio');
	}
	set currentlyPlaying(currentlyP){
		this.currentlyPlaying=currentlyP;

	}
	set track(src){
		this.audio.src=src;
	}
	set idS(songId){
		this.id=songId;
	}
	play(){
		if(this.audio.currentTime==0){
			console.log("ok");
			$.post("includes/handlers/ajax/updateSongPopularity.php",{songId:this.id});	
		}else{
			console.log("not");
		}
		
		this.audio.play();
	}

	pause(){
		this.audio.pause();
	}
}