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
        $this->load->model('search_model'); 
        $this->load->model('user_model');  
        $this->isLoggedIn();   
    }
    

  

    
     public function bookings($hotelId = "" ) 
     {
            $hotel = $this->hotel_model->hotel( $hotelId );
            $this->global['pageTitle'] = 'Bookings | '.$hotel->name ;

            $data['bookings'] =   $this->reservation_model->Bookings($hotelId  , '1,2' , date("Y-m-d") );
            foreach ($data['bookings'] as $order  )
                {   
                    $order->client = $this->user_model->user( $order->createdBy );
                    $order->hotel = $this->hotel_model->hotel( $order->hotelId );
                }
          
            
            
            $this->loadViews("reservation/list", $this->global, $data , NULL);
     }

    public function orders($hotelId) 
     {
            
            $hotel = $this->hotel_model->hotel( $hotelId );
            $this->global['pageTitle'] = 'Orders | '.$hotel->name ;

            $data['bookings'] =   $this->reservation_model->Bookings($hotelId  , '0' );
            foreach ($data['bookings'] as $order  )
                {   
                    $order->client = $this->user_model->user( $order->createdBy );
                    $order->hotel = $this->hotel_model->hotel( $order->hotelId );
                }
          
            
            
            $this->loadViews("reservation/list", $this->global, $data , NULL);
     }

    public function searchs($hotelId) 
     {
            $hotel = $this->hotel_model->hotel( $hotelId );
            $this->global['pageTitle'] = 'Searchs | '.$hotel->name ;

            $data['bookings'] =   $this->search_model->searchs($hotelId   );
            foreach ($data['bookings'] as $order  )
                {   
                    $order->client = $this->user_model->user( $order->createdBy );
                    $order->hotel = $this->hotel_model->hotel( $order->hotelId );
                }
          
            
            
            $this->loadViews("reservation/searchList", $this->global, $data , NULL);
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



      public function approuvebooking ($reservationId) 
     {
            
            $data['reservation'] =  $this->reservation_model->reservation($reservationId);
            $data['reservation']->client =  $this->user_model->user($data['reservation']->createdBy );
            $data['reservation']->hotel =  $this->hotel_model->hotel($data['reservation']->hotelId );
            $data['reservation']->details =  $this->reservation_model->reservationDetails($reservationId);

            $data['reservation']->details =  $this->reservation_model->reservationDetails($reservationId);
                foreach ($data['reservation']->details as $detail ) 
                    {       
                        $detail->prices = $this->hotel_model->roomMsPrice($data['reservation']->hotelId ,  $data['reservation']->checkin ,  $data['reservation']->pension   ) ;
                        $detail->room = $this->hotel_model->Room( $detail->roomId ) ;
                        $detail->opts  = $this->hotel_model->roomOptionsListing(  str_replace("\"", "", $detail->options )  )  ;

                    }


         $reservationInfo = array(  
                        'approuvedBy' =>  $this->input->post("TTadults")  ,
                        'children'  =>  $this->input->post("TTchilds" )  ,
                        'price'  =>  $this->input->post("TTprice")  ,
                        'statut' =>  1 ,
                        'createdBy' => $this->vendorId ,
                        'createdDTM'=> date('Y-m-d H:i:s'), 
                      );
                 $this->reservation_model->editContact($reservationInfo , $reservationId); 

                $content = $this->load->view('reservation/printFacture', $data , true);

                 if( $this->send_mail(
                    $data['reservation']->client->email  , 
                    "Booking N".$data['reservation']->reservationId." [Palmyra ".$data['reservation']->hotel->name."] " ,
                     ""  ,
                    $content ,  "booking@palmyrahotels.tn" ,  
                    "Booking2022" , 
                    $data['reservation']->hotel->mail ) ) 
                 { 

                        redirect('Reservation/mybookings');
                 }
            
     }
     

}