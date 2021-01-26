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
}