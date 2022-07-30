<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Reservation_model extends CI_Model
{
        

          /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function Bookings( $hotelId = "" , $statut = '' , $date = '' )
    {
        $this->db->select('BaseTbl.* ');
        $this->db->from('tbl_reservation as BaseTbl');
 

        if($statut != ''){   $this->db->where('BaseTbl.statut in ('.$statut.')' ); } 
        if($hotelId != ''){   $this->db->where('BaseTbl.hotelId = ' , $hotelId ); } 
        if($date!="") {   $this->db->where('BaseTbl.checkout >= ' , $date ); } 
        $this->db->order_by('MONTH(BaseTbl.checkin) DESC ' );
        $query = $this->db->get();
        return $query->result();
    }


  /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function ordersByMonth( $month , $statut = '' )
    {
        $this->db->select('count(BaseTbl.checkin) countRes , MONTH(BaseTbl.checkin) monthRes  ');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->where('YEAR(BaseTbl.checkin) = YEAR(NOW()) ' );
        $this->db->where('MONTH(BaseTbl.checkin) = ' , $month );

        if($statut != ''){   $this->db->where('BaseTbl.statut in ('.$statut.')' ); } 

        $this->db->group_by('MONTH(BaseTbl.checkin)  ' );
        $query = $this->db->get();
        return $query->row();
    }




  /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function ordersByDay(  $statut = '' )
    {
        $this->db->select('BaseTbl.* ');
        $this->db->from('tbl_reservation as BaseTbl');
       
        $this->db->where('BaseTbl.createdDTM > ' , date('Y-m-d 00:00:00' ) );

        if($statut != ''){   $this->db->where('BaseTbl.statut = ' , $statut ); } 

        
        $query = $this->db->get();
        return $query->result();
    }


      /**




         /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function salesByHotel($hotelId , $statut = '')
    {
        $this->db->select('count(BaseTbl.checkin) countRes , Hotel.name   ');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->join('tbl_hotels as Hotel' , 'BaseTbl.hotelId = Hotel.hotelId ','Left');
        $this->db->where('YEAR(BaseTbl.checkin) = YEAR(NOW()) ' );
        $this->db->where('BaseTbl.hotelId  = ' , $hotelId );
        
        if($statut != ''){   $this->db->where('BaseTbl.statut = ' , $status ); } 
        $this->db->order_by('MONTH(BaseTbl.checkin) ASC ' );

              

        $query = $this->db->get();
        return $query->row();
    }




    
  

  /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function reservation($reservationId )
    {
        $this->db->select('BaseTbl.*  ');
        $this->db->from('tbl_reservation as BaseTbl');
        $this->db->where('BaseTbl.reservationId =', $reservationId );        

        $query = $this->db->get();
        return $query->row();
    }

      /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function reservationDetails($reservationId )
    {
        $this->db->from('tbl_reservation_details as BaseTbl');
        $this->db->join('tbl_hotel_room as Room' , 'BaseTbl.roomId = Room.roomId ','Left');
        $this->db->where('BaseTbl.reservationId =', $reservationId ); 
        $this->db->group_by('BaseTbl.detailId ' );        
        

        $query = $this->db->get();
        return $query->result();
    }


    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editreservation($reservationInfo, $reservationId)
    {
        $this->db->where('reservationId', $reservationId);
        $this->db->update('tbl_reservation', $reservationInfo);
        return TRUE;
    }



    

}

  
