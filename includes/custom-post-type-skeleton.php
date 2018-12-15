<?php  /* <~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~< Skeleton >~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~> */

//Create your Skeleton CPT - Use custom-post-type.php for reference
$skeleton_cpt = new Skeletons('skeletons',array('post_type' => 'skeletons','name_singular' => 'Skeleton','name_plural' => 'Skeletons','icon' => TERX_CHILD_GRAPHICS . 'favicon-16x16.png'));

class Skeletons extends TERXCustomPostType{
	public function __construct($namespace,$config){
		parent::__construct($namespace,$config);
		$this->register_taxonomy(); //Optional, creates namespaced taxonomy. Pass arguments: $hierarchical = false,$name_singular = false,$name_plural = false, $end_of_slug = false
		$this->setup_meta_boxes(); //Optional, creates meta boxes, overwrite methods in your subclass
	}
	//Subclass Methods and Overwrites
	//Overwriting the init function is helpful if you need to change setup options.
}
?>