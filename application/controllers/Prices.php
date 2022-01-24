<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';



class Prices extends BaseController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('saison_model');
        $this->load->model('hotel_model');
       
        
        $this->isLoggedIn();   
    }
    

	public function priceByHotel($hotelId)
		        {    
            			 
		        		$data['hotel'] =  $this->hotel_model->hotel($hotelId);
		                $data['medias'] = $this->hotel_model->hotelMediaListing($hotelId) ;
		                $data['rooms'] = $this->hotel_model->hotelRoomsListing($hotelId) ;

		               
		                	foreach ($data['rooms'] as $room ) {
		                		$room->media = $this->hotel_model->roomMediaListing($room->roomId) ;
		                		$room->prices = $this->hotel_model->roomMsPrice($hotelId,  date("Y-m-d")   ) ;
		                		$room->options = $this->hotel_model->roomOptionsListing(  $room->options   )  ;
		                	}

		                 $data['hotelPrice'] =	$this->hotel_model->roomMsPrice($hotelId,  date("Y-m-d") ) ; 

		                 $data['hotelPriceByroom'] =	$this->hotel_model->roomMsPriceByHotel($hotelId,  date("Y-m-d") ) ; 

		                $this->global['pageTitle'] = 'Prices '.$data['hotel']->name;

		            	$data['Saisons'] = $this->saison_model->saisonListing( ) ;
		                $this->loadViews("price/list", $this->global, $data, NULL);   
		        }
        		
    
		

		
		
		
}