<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';



class Users extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();    
    }
    

    public function index()
        {

          $data['Users'] = $this->user_model->userListing() ; 
          $this->global['pageTitle'] = 'Users';
          $this->loadViews("users/list", $this->global, $data, NULL);         
        }   

 	public function clients()
    	{

          $data['Users'] = $this->user_model->userListing(4) ; 
    	  $this->global['pageTitle'] = 'Client';
          $this->loadViews("users/list", $this->global, $data, NULL);         
   	    }   



        public function edit($userId)
            {

          $data['user'] = $this->user_model->user($userId) ; 
          $this->global['pageTitle'] = 'Client | '.$data['user']->name;
          $this->loadViews("users/edit", $this->global, $data, NULL);         
        }   
        		
   



	

		
		
		
}