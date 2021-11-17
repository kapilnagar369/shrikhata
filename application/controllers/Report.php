<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function details ()
	{   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
         $client_id = $this->session->userdata('Client')->id;
         $sql="SELECT vch.party_code,vch.point,vch.id_rate,ex.Exchange_Code,sum(vch.gross_profit) as  gross_profit,sum(vch.pati) as pati,sum(vch.commision) as commision,sum(vch.gross_profit+vch.pati+vch.commision) as net_profit from voucher_details vch join Entry  ent on vch.vouchar_id=ent.id join Idmaster im on im.id= vch.user_id join Exchange ex on ex.id = im.exch_code and vch.client_id=$client_id group by ex.id ";    
  $query = $this->db->query($sql);
  $data['result']= $query->result_array();
  $this->load->view('admin/Report/exchangewise',$data);
  $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
	}

  public function Party ()
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
         $client_id = $this->session->userdata('Client')->id;
        
         

  $sql="SELECT vch.party_code,vch.point,vch.id_rate,ex.Exchange_Code,sum(vch.gross_profit) as  gross_profit,sum(vch.pati) as pati,sum(vch.commision) as commision,sum(vch.gross_profit+vch.pati+vch.commision) as net_profit from voucher_details vch join Entry  ent on vch.vouchar_id=ent.id join Idmaster im on im.id= vch.user_id join Exchange ex on ex.id = im.exch_code and vch.client_id=$client_id group by vch.party_id ";    
     $query = $this->db->query($sql);
    $data['result']= $query->result_array();
         $this->load->view('admin/Report/partywise',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
  }



  public function SParty ()
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
         $client_id = $this->session->userdata('Client')->id;
        
         

  $sql="SELECT vch.party_code,im.user_name,vch.point,vch.id_rate,ex.Exchange_Code,sum(vch.gross_amount) as  gross_amount,sum(vch.pati) as pati,sum(vch.commision) as commision,sum(final_amount) as final_amount from voucher_details vch join Entry  ent on vch.vouchar_id=ent.id join Idmaster im on im.id= vch.user_id join Exchange ex on ex.id = im.exch_code and vch.client_id=$client_id group by vch.user_id ";    
     $query = $this->db->query($sql);
    $data['result']= $query->result_array();
         $this->load->view('admin/Report/Spartywise',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
  }

     public function SExchange ()
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
         $client_id = $this->session->userdata('Client')->id;
        
         

  $sql="SELECT vch.party_code,im.user_name,vch.point,vch.id_rate,ex.Exchange_Code,sum(vch.gross_amount) as  gross_amount,sum(vch.pati) as pati,sum(vch.commision) as commision,sum(final_amount) as final_amount from voucher_details vch join Entry  ent on vch.vouchar_id=ent.id join Idmaster im on im.id= vch.user_id join Exchange ex on ex.id = im.exch_code and vch.client_id=$client_id group by vch.user_id ";    
     $query = $this->db->query($sql);
    $data['result']= $query->result_array();
         $this->load->view('admin/Report/sexchangewise',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
  }
	  
}
