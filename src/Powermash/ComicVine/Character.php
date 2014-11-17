<?php 

namespace Powermash\ComicVine;

/**
* 
*/
class Character
{
	
	/**
	 * 
	 */
	public $aliases;
	
	/**
	 * 
	 */
	public $apiDetailUrl;
	
	/**
	 * 
	 */
	public $birth;
	
	/**
	 * 
	 */
	public $characterEnemies;
	
	/**
	 * 
	 */
	public $characterFriends;
	
	/**
	 * 
	 */
	public $countOfIssueAppearances;
	
	/**
	 * 
	 */
	public $creators;
	
	/**
	 * 
	 */
	public $dateAdded;
	
	/**
	 * 
	 */
	public $dateLastUpdated;
	
	/**
	 * 
	 */
	public $deck;
	
	/**
	 * 
	 */
	public $description;
	
	/**
	 * 
	 */
	public $firstAppearedInIssue;
	
	/**
	 * 
	 */
	public $gender;
	
	/**
	 * 
	 */
	public $id;
	
	/**
	 * 
	 */
	public $image;
	
	/**
	 * 
	 */
	public $issueCredits;
	
	/**
	 * 
	 */
	public $issuesDiedIn;
	
	/**
	 * 
	 */
	public $movies;
	
	/**
	 * 
	 */
	public $name;
	
	/**
	 * 
	 */
	public $origin;
	
	/**
	 * 
	 */
	public $powers;
	
	/**
	 * 
	 */
	public $publisher;
	
	/**
	 * 
	 */
	public $realName;
	
	/**
	 * 
	 */
	public $siteDetailUrl;
	
	/**
	 * 
	 */
	public $storyArcCredits;
	
	/**
	 * 
	 */
	public $teamEnemies;
	
	/**
	 * 
	 */
	public $teamFriends;
	
	/**
	 * 
	 */
	public $teams;
	
	/**
	 * 
	 */
	public $volumeCredits;

	public function getImage()
	{
		if ($this->image === null) {
			return null;
		}

		$sizes = ['super_url', 'medium_url', 'screen_url'];
		foreach ($sizes as $size) {
			if (isset($this->image->{$size})) {
				return $this->image->{$size};
			}
		}

		return null;
	}
}