<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Acceuil extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hotel_model');
         $this->load->model('events_model');
         $this->load->model('reservation_model');
         $this->load->model('bar_model');
          $this->load->model('user_model');
         $this->load->model('search_model');
         $this->load->model('avis_model');
        $this->isLoggedIn();   
    }
    


    
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {



        for ($i= 1; $i < 13  ; $i++) { 
             $data['orders'][$i] = $this->reservation_model->ordersByMonth($i) ;  
             $data['sales'][$i]  = $this->reservation_model->ordersByMonth($i,2) ;
        }


        $data['salesToday'] = $this->reservation_model->ordersByDay(2) ; 

        $data['ordersToday'] = $this->reservation_model->ordersByDay(0) ; 
        foreach ($data['ordersToday'] as $order  )
        {
            $order->client = $this->user_model->user( $order->createdBy );
            $order->hotel = $this->hotel_model->hotel( $order->hotelId );
        }
       $data['searchToday'] =  $this->hotel_model->searchListing(date("Y-m-d 00:00:00"));
        

        $this->global['pageTitle'] = 'Home';
        
         $this->loadViews("acceuil", $this->global,  $data , NULL);
       
       
            //   $this->send_mail("maizabahaedinne@gmail.com", "Testo"  , "" , "Test Mail" )   ;
        

    }


     /**
     * This function used to load the first screen of the user
     */
    public function About()
    {

       
                     
        
        $this->global['pageTitle'] = 'About';
        $this->loadViews("about", $this->global,  NULL , NULL);
    }
    

}