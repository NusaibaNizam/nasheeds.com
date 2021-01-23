<?php
	/**
	 * 
	 */
	class Artist
	{
		private $id;
		private $con;
		
		public function __construct($con, $id)
		{
			$this->con=$con;
			$this->id=$id;
		}
		public function getArtist(){

			$artistQuery=mysqli_query($this->con,"SELECT artist FROM artists WHERE id='".$this->id."'");
			$artist=mysqli_fetch_array($artistQuery);
			return $artist['artist'];
		}
	}
?>