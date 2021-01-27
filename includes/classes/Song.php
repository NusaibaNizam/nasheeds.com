<?php
	/**
	 * 
	 */
	class Song
	{
		private $id;
		private $con;
		private $myslqiData;
		private $title;
		private $artistId;
		private $albumId;
		private $languageId;
		private $duration;
		private $path;
		public function __construct($con, $id)
		{
			$this->con=$con;
			$this->id=$id;
			$songQuery=mysqli_query($this->con,"SELECT * FROM songs WHERE id='".$this->id."'");
			$this->myslqiData=mysqli_fetch_array($songQuery);
			$song=$this->myslqiData;
			$this->title=$song['title'];
			$this->artistId=$song['artist'];
			$this->languageId=$song['language'];
			$this->albumId=$song['album'];
			$this->duration=$song['duration'];
			$this->path=$song['path'];
		}
		public function getArtist(){

			return (new Artist($this->con, $this->artistId))->getArtist();
		}
		public function getTitle(){

			return $this->title;
		}
		public function getLanguageId(){

			return $this->languageId;
		}

		public function getPath(){

			return $this->path;
		}
		
		public function getDuration(){

			return $this->duration;
		}

		public function getMyslqiData(){

			return $this->myslqiData;
		}
		public function getAlbumObj(){

			return new Artist($this->con, $this->albumId);
		}
		public function setLastPlayed(){
			mysqli_query($this->con,"UPDATE songs SET lastPlayed='".date('Y-m-d H:i:s')."' WHERE id='".$this->id."'");
		}	
	}
?>