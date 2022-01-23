<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Reservation extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hotel_model');
        $this->load->model('reservation_model'); 
        $this->load->model('user_model');  
        $this->isLoggedIn();   
    }
    

  

    
     public function bookings($hotelId) 
     {
            $this->global['pageTitle'] = 'Bookings';

            $data['bookings'] =   $this->reservation_model->Bookings($hotelId , 2 );
            foreach ($data['bookings'] as $order  )
        {
            $order->client = $this->user_model->user( $order->createdBy );
            $order->hotel = $this->hotel_model->hotel( $order->hotelId );
        }
          
            
            
            $this->loadViews("reservation/list", $this->global, $data , NULL);
     }

    

    
     

}