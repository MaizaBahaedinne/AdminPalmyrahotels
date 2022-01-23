<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';



class Users extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();    
    }
    

 	function clients()
    	{

          $data['Users'] = $this->user_model->userListing() ; 
    	  $this->global['pageTitle'] = 'Client';
          $this->loadViews("users/list", $this->global, $data, NULL);   
             
   	 }   
        		
   



	

		
		
		
}