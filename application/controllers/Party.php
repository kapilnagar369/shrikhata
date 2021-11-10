<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Party extends CI_Controller {

  public function details ()
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $where  = array('client_id' =>$this->session->userdata('Client')->id);
          $data['result']=$this->Model->selectAllById('Party',$where);
          $this->load->view('admin/Party/Party',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
  }

  public function addParty()
  {  
   if ($this->session->userdata('Client')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $this->load->view('admin/Party/addParty');
            $this->load->view('admin/assets/footer');
        }else{
            redirect('Client');
        }
  }
  function check_user() {
    $party_code = $this->input->post('party_code');// get first name
 
    $this->db->from('Party');
    $this->db->where('party_code', $party_code);
    $this->db->where('client_id',$this->session->userdata('Client')->id);
    $query = $this->db->get();

    $num = $query->num_rows();
    if ($num > 0) {
        $this->form_validation->set_message('check_user', 'Such Party Code already exist!');
            return FALSE;
    } else {
        return TRUE;
    }
}
  public Function addPartydetails()
  {
          $this->form_validation->set_rules('party_code', 'Party Code', 'required|callback_check_user');// call callback function

           if($this->input->post('web_access')=='Yes') {
              $this->form_validation->set_rules('user_name', 'user name', 'required|is_unique[Party.user_name]|alpha_numeric');

           }
           if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $this->load->view('admin/Party/addParty');
            $this->load->view('admin/assets/footer');
          } else {
            

            if($_POST['user_name']) {
              $user_name =$this->input->post('user_name');
            }
            else{
               $user_name = "";
            }
            $data = array(
                'party_code'    => $this->input->post('party_code'),
                'party_name'    => $this->input->post('party_name'),
                'reference'     => $this->input->post('reference'),
                'wa_number'     => $this->input->post('wa_number'),
                'email'         => $this->input->post('email'),
                'party_type'    => $this->input->post('party_type'),
                'op_bal'        => $this->input->post('op_bal'),
                'dr_cr'         => $this->input->post('dr_cr'),
                'web_access'    => $this->input->post('web_access'),
                'user_name'     => $user_name,
                'password'      => $this->input->post('password'),
                'client_id'     => $this->session->userdata('Client')->id,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s"),
                'status'        => 1
            );
            
            $party_id = $this->Model->insert($data,'Party');
            if($this->input->post('op_bal')>0) {
            if($this->input->post('dr_cr')=='dr') {
              $debit=$this->input->post('op_bal');
              $credit = 0;
            } else {
                 $debit=0;
                 $credit = $this->input->post('op_bal');
            }
            
            $accounts=array('client_id'=>$this->session->userdata('Client')->id,
                            'type'=>'7',
                            'party_id'=>$party_id,
                            'credit'=>$credit,
                            'debit'=>$debit,
                            'trxn_date'=>date("Y-m-d"),
                            'narration'=>'Op. Balance',
                            'created_at'    => date("Y-m-d H:i:s"),
                            'updated_at'    => date("Y-m-d H:i:s")
          );
          $result = $this->Model->insert($accounts,'accounts');
          
          $where  = array('client_id' =>$this->session->userdata('Client')->id,'party_code'=>'zzzzzz');
         $party_data=$this->Model->selectAllById('Party', $where);
         $party_code= $this->input->post('party_code');
         $accounts1=array('client_id'=>$this->session->userdata('Client')->id,
                            'type'=>'8',
                            'party_id'=>$party_data[0]['id'],
                            'credit'=>$debit,
                            'debit'=>$credit,
                            'trxn_date'=>date("Y-m-d"),
                            'narration'=>'Op. Balance of '.$party_code,
                            'created_at'    => date("Y-m-d H:i:s"),
                            'updated_at'    => date("Y-m-d H:i:s")
          );
          $result = $this->Model->insert($accounts1,'accounts');
         }
            if ($party_id) {
                $this->session->set_flashdata('AddParty', '<div class="alert alert-success ">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Party Details Added Sucessfully!!</strong>.
                  </div>');
                
                redirect('Party/details');
                
            } else {
                
                $this->session->set_flashdata('AddParty', '<div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry Party Not Added!!</strong>.
                </div>');
                
                redirect('Party/details');
                
            }
          }
  }

  public function editParty($id)
  {
        if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $whereData  = array('id' =>$id);
          $data['records'] = $this->Model->selectAllById('Party', $whereData);
          $this->load->view('admin/Party/editParty', $data);
          $this->load->view('admin/assets/footer');
        } else {
          redirect('Client');
        }
  }

  public function editPartydetails()
  {    
         
        if ($this->session->userdata('Client')) {
            $wheredata = array(
                'id' => $this->input->post('id')
            );
             
             

              $data = array(
                // 'party_code'    => $this->input->post('party_code'),
                'party_name'    => $this->input->post('party_name'),
                'reference'     => $this->input->post('reference'),
                'wa_number'     => $this->input->post('wa_number'),
                'email'         => $this->input->post('email'),
                'party_type'    => $this->input->post('party_type'),
                'op_bal'        => $this->input->post('op_bal'),
                'dr_cr'         => $this->input->post('dr_cr'),
                'web_access'    => $this->input->post('web_access'),
                // 'user_name'     => $this->input->post('user_name'),
                 'client_id'     => $this->session->userdata('Client')->id,
                'updated_at'    => date("Y-m-d H:i:s"),
                // 'status'        => 1
            );
            
            

            
              $result = $this->Model->update($wheredata,'Party',$data);
              $party_id = $this->input->post('id');
              if($this->input->post('op_bal')>0) {
            if($this->input->post('dr_cr')=='dr') {
              $debit=$this->input->post('op_bal');
              $credit = 0;
            } else {
                 $debit=0;
                 $credit = $this->input->post('op_bal');
            }
            
            $accounts=array(
                            'credit'=>$credit,
                            'debit'=>$debit,
                            'narration'=>'Op. Balance',
                            'updated_at'    => date("Y-m-d H:i:s")
          );
            $wheredata = array(
            				'client_id'=>$this->session->userdata('Client')->id,
                            'type'=>'7',
                            'party_id'=>$party_id);
          $result = $this->Model->update($wheredata,'accounts',$accounts);
          $party_code= $this->input->post('party_code');
          $where  = array('client_id' =>$this->session->userdata('Client')->id,'narration'=>'Op. Balance of '.$party_code,'type'=>'8');
         
         $accounts1=array('client_id'=>$this->session->userdata('Client')->id,
                           'credit'=>$debit,
                            'debit'=>$credit,
                            'updated_at'    => date("Y-m-d H:i:s")
          );
          $result = $this->Model->update($where,'accounts',$accounts1);
         } else {
         	   $party_code= $this->input->post('party_code');
         	  $where  = array('client_id' =>$this->session->userdata('Client')->id,'narration'=>'Op. Balance of '.$party_code,'type'=>'8');
         		
         	 $data = $this->Model->deleterec($where, 'accounts');
         	  
         	   $wheredata = array(
            				'client_id'=>$this->session->userdata('Client')->id,
                            'type'=>'7',
                            'party_id'=>$party_id);
         	 $data = $this->Model->deleterec($wheredata, 'accounts');
         }


            if ($result) {
                $this->session->set_flashdata('UpadteParty', '<div class="alert alert-success ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Party Record Updated Sucessfully!!</strong>.
        </div>');
                
               redirect('Party/details');
                
            } else {
                
                $this->session->set_flashdata('UpadteParty', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Party Record Not Updateed !!</strong>.
        </div>');
                
               redirect('Party/details');
                
            }
        } else {
            redirect('Client');
        }
        
  }

  public function deleterecord($id, $tbl, $rd)
  {

      if ($this->session->userdata('Client')) {
        $wheredata    = array(
            'id' => $id,
            'status'  =>0
        );
        $result=$this->Model->selectAllById($tbl, $wheredata);
         if($result){
           $data = $this->Model->deleterec($wheredata, $tbl);
            if($data){
              $this->session->set_flashdata('deleteParty', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Party Record Deleted Sucessfully!!</strong>.
              </div>');
              redirect('Party/'.$rd);
        }else {
              $this->session->set_flashdata('deleteParty', '<div class="alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Party Record Not Deleted!!</strong>.
              </div>');
              redirect('Party/'.$rd);
         }}else{
          $this->session->set_flashdata('deleteParty', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please De-Active Party !!</strong>.
        </div>');
        redirect('Party/'.$rd);
      } }else{
        redirect('Client');
      }
      
  }

  public function upadteStatus($status,$id)
  {
      if ($this->session->userdata('Client')) {
        $wheredata=array('id'=>$id);
        $data=array('status'=>$status);
        $result=$this->Model->update($wheredata,'Party',$data);
        if ( $result){
            redirect('Party/details');
          }else{
            redirect('Party/details');
          }
      }else{
        redirect('Client');
      }
  }





  public function send_notification() {
   
$message='working';
    $firebaseToken = array('fND5_RMlSAqZrNEkGRX2Bp:APA91bHckXeRf_DEtPg3fkJSI5nQBVN6R51KYRDSTLvsjPS3qxaI87EALdnZvapv9DmdQjX-J9xJpqOjGyWw_QYHlvtC5y--GjRCwq4dEiugWpkp7GW0L1LGqjNXG0UtPj08TsC72avY');
        $SERVER_API_KEY = 'AAAA42musqE:APA91bFfXUxl4y7-a5nqRf6_yZiz6bPCREJO9WprUrE8j-usEHRCm3lX093lP8Ol8iRI-IEEOoNBQfUjl_63kk-pmoQcH4WJNC1R7p_c9jTo4lcRGZBds3uWVcPc1jFttqAHqv2IPGJ_';
        $data = [
          "registration_ids" => $firebaseToken,
          "notification" => [
            "title" => "New Request",
            "body" => $message,  
          ]
        ];
        $dataString = json_encode($data);
        $headers = [
          'Authorization: key=' . $SERVER_API_KEY,
          'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        print_r($response);
  }
 }
