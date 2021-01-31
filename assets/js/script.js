
var currentPlayList=[];
var audioElement;
var mouseDown=false;
function formatTime(sec){
	secRound=Math.round(sec);
	var secAfter=secRound%60;
	var minutes=((secRound-secAfter)/60)%60;
	var hours=Math.floor(((secRound-secAfter)/60)/60);
	var time="";
	if(hours>0){
		if(hours>9){
			time=time+hours+":";
		}else{
			time=time+"0"+hours+":";
		}
	}
	if(minutes>9){
		time=time+minutes+":";
	}else{
		time=time+"0"+minutes+":";
	}
	if(secAfter>9){
		time=time+secAfter;
	}else{
		time=time+"0"+secAfter;
	}
	return time;
}
function updateTimeProgressbar(audio){
	$(".progressTime.current").text(formatTime(audio.currentTime));
	$(".progressTime.remaining").text(formatTime(audio.duration-audio.currentTime));
	if(progress==100){
		audio.pause();
		progress=0;
		$(".controlButton.pause").hide();
		$(".controlButton.play").show();
	}

	var progress=(audio.currentTime/audio.duration)*100;
	$(".progressElementsContainer .progress").css("width",progress+"%");
}
function updateVolumeProgressbar(audio){

	var progress=audio.volume*100;
	$(".volumeContainer .progress").css("width",progress+"%");
}

class Audio{

	constructor(){
		this.audio=document.createElement('audio');
		this.addEvent();
	}
	set track(src){
		this.audio.src=src;
	}
	set idS(songId){
		this.id=songId;
	}
	play(){
		if(this.audio.currentTime==0){
			$.post("includes/handlers/ajax/updateSongPopularity.php",{songId:this.id});	
		}
		
		this.audio.play();
	}

	pause(){
		this.audio.pause();

	}
	addEvent(){
		this.audio.addEventListener("canplay" ,function(){
			$(".progressTime.remaining").text(formatTime(this.duration));
			
		});

		this.audio.addEventListener("timeupdate" ,function(){
			if(this.duration){
				updateTimeProgressbar(this);
			}
		});
		this.audio.addEventListener("volumechange", function(){
			updateVolumeProgressbar(this);
		})
		
	}
	setTime(sec){
		this.audio.currentTime=sec;
	}
	set mPause(bool){
		this.manualPause=bool;
	}
}