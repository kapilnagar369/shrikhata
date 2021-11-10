<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function details ()
	{   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
         $client_id = $this->session->userdata('Client')->id;
        
         

  $sql="SELECT vch.party_code,ex.Exchange_Code,sum(vch.gross_profit) as  gross_profit,sum(vch.pati) as pati,sum(vch.commision) as commision,sum(vch.gross_profit+vch.pati+vch.commision) as net_profit from voucher_details vch join Entry  ent on vch.vouchar_id=ent.id join Idmaster im on im.id= vch.user_id join Exchange ex on ex.id = im.exch_code group by vch.party_id ";    
     $query = $this->db->query($sql);
    $data['result']= $query->result_array();
         $this->load->view('admin/Report/details',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
	}

	  
}
