<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

	public function login($whereData,$tableName){
		$this->db->from($tableName);
		$this->db->where($whereData);
		$query=$this->db->get()->row();
		if ($query) {
			return $query;
		}else{
			return false;
		}
	}
	
	public function insert($data,$tableName){
		$this->db->insert($tableName,$data);
		$insertId=$this->db->insert_id();
		    // $this->db->last_query();
         
		return $insertId;
	}

	public function select($table,$order="",$limit="")
	{ 
		$this->db->select('*');
		$this->db->order_by($order);
		$this->db->limit($limit);
		$this->db->from($table);
		$query = $this -> db -> get();
		return $query->result_array();
	}
	
	PUBLIC function  insert_on_duplicate_update_batch($table,$data,$upkeys) {

         if(empty($data))
            return true;
        if(!isset($data[0]))
            return true;
        $keys = array_keys($data[0]);
        $xval = "";
        foreach($data as $val) {
               
        if(isset($val)) {
        		$xval.= '("'.implode('","', $val).'"), ';
    	   }
        }
         $xval= substr(trim($xval), 0, -1);

        
        foreach ($upkeys as $key ) {
          
          	if($key=='is_deleted') { 
          		 $update_fields[] = $key . '=0';
          	}
          else	 if($key=='is_tally') { 
          		 $update_fields[] = $key . '=1';
          	}
          	 else {
          	 	 $update_fields[] = $key . '=VALUES(' . $key . ')';
          	}
           
         }   	
         $sql=   "INSERT IGNORE INTO " . $table . " (" . implode(', ', $keys) . ")
        VALUES ". $xval ." ON DUPLICATE KEY UPDATE ".implode(', ', $update_fields);
        $query = $this->db->query($sql);
        if($query) return true;

 }
	public function update($whereData,$tableName,$data)
    {
		$query = $this->db->where($whereData);
		$query = $this->db->update($tableName,$data);
		 if ($this->db->affected_rows() > 0)
            {
              return TRUE;
            }
            else
            {
              return FALSE;
            }
	}
	public function update2($whereData,$tableName,$data)
    {
		$query = $this->db->where_in('trxn_id',$whereData);
		$query = $this->db->update($tableName,$data);
		 if ($this->db->affected_rows() > 0)
            {
              return TRUE;
            }
            else
            {
              return FALSE;
            }
	}
	public function updateparty($whereData,$tableName,$data)
    {
		$query = $this->db->where_in('party_id',$whereData);
		$query = $this->db->update($tableName,$data);
		 if ($this->db->affected_rows() > 0)
            {
              return TRUE;
            }
            else
            {
              return FALSE;
            }
	}
	public function getSingleRow($table, $condition)
        {
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($condition);
            $query = $this->db->get();
            //echo $this->db->last_query();
           
            return $query->row();       
        }
       

 	public function getSingleRoworder($table, $condition,$order)
        {
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($condition);
            $this->db->order_by($order);
            $query = $this->db->get();
           // echo $this->db->last_query();
           
            return $query->row();       
        }
        	
	public function selectAllById($tableName,$whereData="")
    {
	    $this -> db -> select('*');
	    $this -> db -> from($tableName);
	    $this -> db -> where($whereData);
	    $query = $this -> db -> get();
	    //echo $this->db->last_query();exit();
	    return $query->result_array();
	}

	public function selectIDMaster($id)
    {	 $whereData  = array('Idmaster.client_id' =>$id);
	    $this->db->select('Idmaster.*,Party.party_code,Party.id as party_id,Exchange.rate as exrate');
	    $this->db->from('Idmaster');
	   $this->db->join('Party', 'Idmaster.party_code = Party.id'); 
	   $this->db->join('Exchange', 'Idmaster.exch_code = Exchange.id'); 
	    $this->db->where($whereData);
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}
		

		public function selectIDMasterlist($id)
    {	
     $whereData  = array('Idmaster.client_id' =>$id);
	    $this->db->select('Idmaster.*,Party.party_code as party_party_code,partner.party_code as partner_party_code,commision.party_code as commision_party_code,Exchange.Exchange_Code as Exchange_Code');
	    $this->db->from('Idmaster');
	   $this->db->join('Party', 'Idmaster.party_code = Party.id'); 
	   $this->db->join('Party partner', 'Idmaster.partner_code = partner.id'); 
	   $this->db->join('Party commision', 'Idmaster.commision_ac = commision.id'); 
	   $this->db->join('Exchange', 'Idmaster.exch_code = Exchange.id'); 
	   $this->db->where($whereData);
	    $query = $this->db->get();
	    
	    return $query->result_array();
	}


	public function getBalance($whereData)
    {	
    	$this->db->select(array("(sum(ABS(debit)) -sum(ABS(credit))) as bal"));
	    $this->db->from('accounts');
	    $this->db->where($whereData);
		$this->db->order_by('accounts.trxn_date asc');
	    $query = $this->db->get();
	    // echo $this->db->last_query();
	    return $query->row();
	}
	public function getLedger($whereData)
    {	
    	$this->db->select('accounts.*,Entry.vch_no,Journal.vch_no as vch_noj,Hawala.vch_no as vch_noh');
	    $this->db->from('accounts');
 	    $this->db->join('Entry', 'accounts.vouchar_id = Entry.id and accounts.type in (1,2,3,4,5,6,7,8,10,11)','left'); 
 	    $this->db->join('Journal', 'accounts.vouchar_id = Journal.id and accounts.type in (9)','left'); 
 	    $this->db->join('Hawala', 'accounts.vouchar_id = Hawala.id and accounts.type in (12,13)','left'); 
	    $this->db->where($whereData);
	  
		$this->db->order_by('accounts.trxn_date asc');
	    $query = $this->db->get();
	    
		return $query->result_array();

	}
		public function getBalanceSheet($whereData,$type='')
    {	
    	if($type=='debit') {
        	$this->db->select('avg(accounts.is_tally) as is_tallyd,accounts.comments as commentsd,Party.party_name as party_named,Party.party_code as party_coded,Party.id as party_idd,if((sum(abs(debit)) -sum(abs(credit))) >0,(sum(abs(debit)) -sum(abs(credit))),"-") as debitd');
	   $this->db->join('Party', 'accounts.party_id = Party.id'); 
	   	    $this->db->from('accounts');
  $this->db->having('abs(debitd)>',false);

    	} else if($type=='credit') {
    	$this->db->select('avg(accounts.is_tally) as is_tally,accounts.comments,Party.party_name,Party.party_code,Party.id as party_id,if((sum(abs(debit)) -sum(abs(credit))) <0,(sum(abs(debit)) -sum(abs(credit))),"-") as credit');
	    $this->db->join('Party', 'accounts.party_id = Party.id'); 
	   	$this->db->from('accounts');
		$this->db->having('abs(credit)>',false);

    	} else {
    	$this->db->select('avg(accounts.is_tally) as is_tally,accounts.comments,Party.party_name,Party.party_code,Party.id as party_id,if((sum(debit) -sum(credit)) >0,(sum(debit) -sum(credit)),"-") as debit,if((sum(debit) -sum(credit)) <0,(sum(debit) -sum(credit)),"-") as credit');
	   $this->db->join('Party', 'accounts.party_id = Party.id'); 
	   $this->db->from('accounts');

	   }
	    $this->db->where($whereData);
	    $this->db->group_by('accounts.party_id'); 

	    $query = $this->db->get();
	    	// echo $this->db->last_query();
	    return $query->result_array();
	}	

	public function selectJournal($client_id)
    {	
    	$this->db->select('Journal.*,debit.party_name as debit_party_name,debit.party_code as debit_party_code,credit.party_code as credit_party_code,credit.party_name as credit_party_name');
	    $this->db->join('Party debit', 'Journal.debit_party_id = debit.id'); 
	    $this->db->join('Party credit', 'Journal.credit_party_id = credit.id'); 
	   	$this->db->from('Journal');

	    $this->db->where('Journal.client_id',$client_id);

	    $query = $this->db->get();
	    	// echo $this->db->last_query();
	    return $query->result_array();
	}
	public function selectHawala($client_id,$id)
    {	
    	$this->db->select('Hawala.*,debit.party_name as debit_party_name,debit.party_code as debit_party_code,credit.party_code as credit_party_code,credit.party_name as credit_party_name');
	    $this->db->join('Party debit', 'Hawala.debit_party = debit.id'); 
	    $this->db->join('Party credit', 'Hawala.credit_party = credit.id'); 
	   	$this->db->from('Hawala');

	    $this->db->where('Hawala.client_id',$client_id);
	    if($id)
	    $this->db->where('Hawala.id',$id);
	   
	    $query = $this->db->get();
	    	// echo $this->db->last_query();
	    return $query->result_array();
	}

	public function selectExchange($client_id)
    {	
    	$this->db->select('Exchange.*,upline.party_name as upline_party_name,upline.party_code as upline_party_code,commision.party_code as commision_party_code,commision.party_name as commision_party_name,Settlement.party_code as Settlement_party_code,Settlement.party_name as Settlement_party_name');
	    $this->db->join('Party upline', 'Exchange.Upline_Code = upline.id'); 
	    $this->db->join('Party commision', 'Exchange.commision_ac = commision.id'); 
	    $this->db->join('Party Settlement', 'Exchange.Settlement_ac = Settlement.id'); 
	   	$this->db->from('Exchange');

	    $this->db->where('Exchange.client_id',$client_id);

	    $query = $this->db->get();
	    	// echo $this->db->last_query();
	    return $query->result_array();
	}
	public function artistList($cat_id,$sub_cat_id)
	{
		   $query = $this->db->query("SELECT * FROM `artist` WHERE `cat_id`=$cat_id AND find_in_set('".$sub_cat_id."',sub_cat_id)");
		   return $query->result_array();

	}
	public function deleterec($whereData,$tableName)
    {
		$query = $this->db->where($whereData);
		$query = $this->db->delete($tableName);
		return $query;
	}

	public function record_count($table,$data='')
 	{
	   	if(!empty($data))
	   	{
	       	$this->db->where($data);
	    }
      
	    $this->db->from($table);
	    return $this->db->count_all_results();
 	}
 	public function sum($column,$table)
 	{
	  
      $this->db->select_sum($column);
$this->db->from($table);
$query=$this->db->get();
	    return $query->result_array()[0][$column];

 	}
}