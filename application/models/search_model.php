<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Search_model extends CI_Model
{




   /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function serachByMonth( $month , $statut = '' )
    {
        $this->db->select('count(BaseTbl.checkin) countRes , MONTH(BaseTbl.checkin) monthRes  ');
        $this->db->from('tbl_search as BaseTbl');
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
    function searchByHotel($hotelId , $statut = '')
    {
        $this->db->select('count(BaseTbl.checkin) countRes , Hotel.name   ');
        $this->db->from('tbl_search as BaseTbl');
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
    function searchs ( $hotelId = "" , $statut = '' )
    {
        $this->db->select('BaseTbl.* ');
        $this->db->from('tbl_reservation as BaseTbl');
 
        if($hotelId != ''){   $this->db->where('BaseTbl.hotelId = ' , $hotelId ); } 

        $this->db->order_by('MONTH(BaseTbl.checkin) ASC ' );
        $query = $this->db->get();
        return $query->result();
    }


                /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getSearchInfo()
    {
        $this->db->select('BaseTbl.*');
        $this->db->from('tbl_search BaseTbl');
        $this->db->where('searchId', $searchId);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewSearch($searchInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_search', $searchInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    
    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editSearch($searchInfo, $searchId)
    {
        $this->db->where('searchId', $searchId);
        $this->db->update('tbl_search', $searchInfo);
        return TRUE;
    }




   
}

  