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

            $data['bookings'] =   $this->reservation_model->Bookings($hotelId  , '1,2' );
            foreach ($data['bookings'] as $order  )
                {   
                    $order->client = $this->user_model->user( $order->createdBy );
                    $order->hotel = $this->hotel_model->hotel( $order->hotelId );
                }
          
            
            
            $this->loadViews("reservation/list", $this->global, $data , NULL);
     }

    

         public function view($reservationId) 
     {
            $this->global['pageTitle'] = 'My Bookings';

            $data['reservation'] =  $this->reservation_model->reservation($reservationId);
            $data['reservation']->details =  $this->reservation_model->reservationDetails($reservationId);
            foreach ($data['reservation']->details as $detail ) 
                {       
                    $detail->prices = $this->hotel_model->roomMsPrice($data['reservation']->hotelId ,  $data['reservation']->checkin ,  $data['reservation']->pension   ) ;
                    $detail->room = $this->hotel_model->Room( $detail->roomId ) ;
                    $detail->opts  = $this->hotel_model->roomOptionsListing(  str_replace("\"", "", $detail->options )  )  ;
                    $detail->guest1  =  ""  ;
                    $detail->guest2  =  ""  ;
                    $detail->guest3  =  ""  ;
                    $detail->guest4  =  ""  ;

                }

           
            $data['reservation']->client = $this->user_model->user($data['reservation']->createdBy);
             $data['hotel'] =  $this->hotel_model->hotel($data['reservation']->hotelId);
            
            $data['user'] =   $this->user_model->user($this->vendorId );
                
          
            
            
            $this->loadViews("reservation/details", $this->global, $data , NULL);
     }
     

}