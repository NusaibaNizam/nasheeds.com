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
		public function getSongIds(){

			$query=mysqli_query($this->con,"SELECT id FROM (SELECT * FROM songs WHERE artist='".$this->id."' ORDER BY lastPlayed DESC) AS new ORDER BY plays DESC");
			$array=array();
			while ($row=mysqli_fetch_array($query)) {
				array_push($array, $row['id']);
			}

			return $array;
		}
		public function getSongNum(){

			$query=mysqli_query($this->con,"SELECT id FROM songs WHERE artist='".$this->id."'");
			return mysqli_num_rows($query);
		}
	}
?>