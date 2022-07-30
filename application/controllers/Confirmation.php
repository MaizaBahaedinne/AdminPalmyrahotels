<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';



class Confirmation extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hotel_model');
        $this->load->model('search_model');
       	$this->load->model('blog_model');
        $this->load->model('reservation_model'); 
        $this->load->model('search_model'); 
        $this->load->model('user_model'); 


            
    }
    

	public function index()
		        {    
            			 
		                $this->global['pageTitle'] = 'Blog';
 						
		            	 $data['blogs'] = $this->blog_model->blogListing() ;
		                
 		                $this->loadViews("blog/list", $this->global, $data, NULL);   
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
                
          
         

            $this->load->view('reservation/confirmation', $data);
         //   $this->loadViews("reservation/details", $this->global, $data , NULL);
     }

		

		public function AcceptOrder($reservationId) 
     {
           
 			$reservationInfo = array(  
                        
                        'statut' =>  2 ,
                        
                        'approuvedDTM'=> date('Y-m-d H:i:s'), 
                      );
                 $this->reservation_model->editreservation($reservationInfo , $reservationId); 
           	
           	$data['reservation'] =  $this->reservation_model->reservation($reservationId);
            $data['reservation']->details =  $this->reservation_model->reservationDetails($reservationId);

			 $data['reservation']->client = $this->user_model->user($data['reservation']->createdBy);
             $data['hotel'] =  $this->hotel_model->hotel($data['reservation']->hotelId);	

           		$content =
                 "Hello ".$data['reservation']->client->name.", 
                  
                 <br>Your reservation N".$data['reservation']->reservationId." has been confirmed you find in this <a href='palmyrahotels.tn/Confirmation/view/".$data['reservation']->reservationId."' >link</a> the printbale Voucher.
                    
                <br><br>

                <hr>
                
               
                <br>
                ". $this->global['sig'] ;

                        $this->send_mail(
                    $data['reservation']->client->email  ,  
                    "Booking N".$data['reservation']->reservationId." [Palmyra ".$data['hotel']->name."] " ,
                     ""  ,
                    $content ,  "booking@palmyrahotels.tn" ,  
                    "Booking2022" , 
                    "admin@palmyrahotels.tn" );
                 

            redirect('Confirmation/view/'.$reservationId) ;
         
     }

     	public function RefuseOrder($reservationId) 
     {
           


 			$reservationInfo = array(  
                        
                        'statut' =>  3 ,
                        'cause'=> nl2br($this->input->post('cause')) , 	
                        'approuvedDTM'=> date('Y-m-d H:i:s'), 
                      );
                 $this->reservation_model->editreservation($reservationInfo , $reservationId); 
                      	$data['reservation'] =  $this->reservation_model->reservation($reservationId);
            $data['reservation']->details =  $this->reservation_model->reservationDetails($reservationId);

			 $data['reservation']->client = $this->user_model->user($data['reservation']->createdBy);
             $data['hotel'] =  $this->hotel_model->hotel($data['reservation']->hotelId);	

           		$content =
                 "Hello  ".$data['reservation']->client->name.", 
                  
                 <br>Unfortunately, we are unable to accommodate your booking request N".$data['reservation']->reservationId." at this time. We wish you luck in your search and we hope that you enjoy your vacation.
                    
                <br><br>

                <hr>
                
               
                <br>
                ". $this->global['sig'] ;

                        $this->send_mail(
                    $data['reservation']->client->email  ,  
                    "Booking N".$data['reservation']->reservationId." [Palmyra ".$data['hotel']->name."] " ,
                     ""  ,
                    $content ,  "booking@palmyrahotels.tn" ,  
                    "Booking2022" , 
                    "admin@palmyrahotels.tn" );
                 

            redirect('Confirmation/view/'.$reservationId) ;
         
     }



		
		
}