<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Controller {

	public function details ()
	{   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $client_id = $this->session->userdata('Client')->id;
          $data['result']=$this->Model->selectJournal($client_id);
          $this->load->view('admin/Journal/details',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
	}

	public function addJournal()
	{  
   if ($this->session->userdata('Client')) {
             $client_id = $this->session->userdata('Client')->id;
             $whereData  = array('client_id' =>$client_id);
            

            $where  = array('client_id' =>$client_id,'status'=>2);
             $result=$this->Model->selectAllById('Journal', $where);

         if(!$result){
            $ent = $this->Model->getSingleRoworder('Journal', $whereData,'id desc');
            $vch_num = 0;
            if(isset($ent)) {
            $vch_num = str_replace($this->session->userdata('Client')->client_code.'JV','',$ent->vch_no);
            }
            $vouchar_no = $this->session->userdata('Client')->client_code.'JV'.($vch_num+1);
            $data = array(
                'vch_no'    =>  $vouchar_no,
                'client_id'    =>  $client_id,
                'trxn_date'    =>  date("Y-m-d"),
                'status'        => 2,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            );
            $vch_id=$this->Model->insert($data,'Journal');

          
          } else {

            $vouchar_no = $result[0]['vch_no'];  
            $vch_id = $result[0]['id'];  
          }

              $whereData  = array('client_id' =>$client_id);
             $data['Party'] = $this->Model->selectAllById('Party', $whereData);
             $data['vouchar_no'] = $vouchar_no;
             $data['vouchar_id'] = $vch_id;
             $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
		        $this->load->view('admin/Journal/addJournal',$data);
            $this->load->view('admin/assets/footer');
        }else{
            redirect('Client');
        }
	}

	public Function addJournaldetails()
  {
  			  
            if(isset($_POST)) {
       $updatearr= array(
        'trxn_date'=>date('Y-m-d',strtotime($_POST['trxn_date'])),
        'amount'=>$_POST['amount'],
        'debit_party_id'=>$_POST['debit_party_id'],
        'credit_party_id'=>$_POST['credit_party_id'],
        'remark'=>$_POST['remark'],
        'status'=>0,
        'updated_at'=>date('Y-m-d H:i:s'));
       
         $wheredata =array('vch_no'=>$_POST['vouchar_no']);
        $this->Model->update($wheredata,'Journal',$updatearr);
        $where  = array('client_id' =>$this->session->userdata('Client')->id,'id'=>$_POST['credit_party_id']);
         $party_data=$this->Model->selectAllById('Party', $where);
         $accounts=array('client_id'=>$this->session->userdata('Client')->id,
                            'type'=>'9',
                            'party_id'=>$_POST['debit_party_id'],
                            'vouchar_id'=>$_POST['vouchar_id'],
                            'credit'=>0,
                            'debit'=>$_POST['amount'],
                            'trxn_date'=>date('Y-m-d',strtotime($_POST['trxn_date'])),
                            'narration'=>"Transfer from ".$party_data[0]['party_code'],
                            'created_at'    => date("Y-m-d H:i:s"),
                            'updated_at'    => date("Y-m-d H:i:s")
          );
          $result = $this->Model->insert($accounts,'accounts');
       
            $where  = array('client_id' =>$this->session->userdata('Client')->id,'id'=>$_POST['debit_party_id']);
         $party_data2=$this->Model->selectAllById('Party', $where);
         $accounts2=array('client_id'=>$this->session->userdata('Client')->id,
                            'type'=>'9',
                            'party_id'=>$_POST['credit_party_id'],
                            'vouchar_id'=>$_POST['vouchar_id'],
                            'credit'=>$_POST['amount'],
                            'debit'=>0,
                            'trxn_date'=>date('Y-m-d',strtotime($_POST['trxn_date'])),
                            'narration'=>"Transfer to ".$party_data2[0]['party_code'],
                            'created_at'    => date("Y-m-d H:i:s"),
                            'updated_at'    => date("Y-m-d H:i:s")
          );
          $result = $this->Model->insert($accounts2,'accounts');
       


       $this->session->set_flashdata('AddJournal', '<div class="alert alert-success ">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Journal Added Sucessfully!!</strong>.
                  </div>');
                
                redirect('Journal/details');

      }
                
         
        
  }

  public function editJournal($id)
  {
        if ($this->session->userdata('Client')) {
             $client_id = $this->session->userdata('Client')->id;
             $whereData  = array('client_id' =>$client_id);
             $data['Party'] = $this->Model->selectAllById('Party', $whereData);
             $where = array('client_id' =>$client_id,'id'=>$id);
             $data['result'] = $this->Model->selectAllById('Journal', $where);
             $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $this->load->view('admin/Journal/editJournal', $data);
          $this->load->view('admin/assets/footer');
        } else {
          redirect('Client');
        }
  }

  public function editJournaldetails()
  {
        
        if ($this->session->userdata('Client')) {
            $wheredata = array(
                'id' => $this->input->post('id')
            );

              
           $updatearr= array(
        'trxn_date'=>date('Y-m-d',strtotime($_POST['trxn_date'])),
        'amount'=>$_POST['amount'],
        'debit_party_id'=>$_POST['debit_party_id'],
        'remark'=>$_POST['remark'],
        'credit_party_id'=>$_POST['credit_party_id'],
        'status'=>0,
        'updated_at'=>date('Y-m-d H:i:s'));
       
        
        $this->Model->update($wheredata,'Journal',$updatearr);
                 $where = array(
                'vouchar_id' => $this->input->post('id')
                       );

               $this->Model->deleterec($where,'accounts');
                $where  = array('client_id' =>$this->session->userdata('Client')->id,'id'=>$_POST['credit_party_id']);
         $party_data=$this->Model->selectAllById('Party', $where);
              $accounts=array('client_id'=>$this->session->userdata('Client')->id,
                            'type'=>'9',
                            'party_id'=>$_POST['debit_party_id'],
                            'vouchar_id'=>$this->input->post('id'),
                            'credit'=>0,
                            'debit'=>$_POST['amount'],
                            'trxn_date'=>date('Y-m-d',strtotime($_POST['trxn_date'])),
                            'narration'=>"Transfer from ".$party_data[0]['party_code'],
                            'created_at'    => date("Y-m-d H:i:s"),
                            'updated_at'    => date("Y-m-d H:i:s")
          );
          $result = $this->Model->insert($accounts,'accounts');
       
            $where  = array('client_id' =>$this->session->userdata('Client')->id,'id'=>$_POST['debit_party_id']);
         $party_data2=$this->Model->selectAllById('Party', $where);
         $accounts2=array('client_id'=>$this->session->userdata('Client')->id,
                            'type'=>'9',
                            'party_id'=>$_POST['credit_party_id'],
                            'vouchar_id'=>$this->input->post('id'),
                            'credit'=>$_POST['amount'],
                            'debit'=>0,
                            'trxn_date'=>date('Y-m-d',strtotime($_POST['trxn_date'])),
                            'narration'=>"Transfer to ".$party_data2[0]['party_code'],
                            'created_at'    => date("Y-m-d H:i:s"),
                            'updated_at'    => date("Y-m-d H:i:s")
          );
          $result = $this->Model->insert($accounts2,'accounts');




            
            
   
                $this->session->set_flashdata('UpadteJournal', '<div class="alert alert-success ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Journal Record Updated Sucessfully!!</strong>.
        </div>');
                
               redirect('Journal/details');
                
        
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
              $this->session->set_flashdata('deleteJournal', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Client Record Deleted Sucessfully!!</strong>.
              </div>');
              redirect('Client/'.$rd);
        }else {
              $this->session->set_flashdata('deleteJournal', '<div class="alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Client Record Not Deleted!!</strong>.
              </div>');
              redirect('Client/'.$rd);
         }}else{
          $this->session->set_flashdata('deleteJournal', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please De-Active Client !!</strong>.
        </div>');
        redirect('Client/'.$rd);
      } }else{
        redirect('Client');
      }
      
  }

  public function upadteStatus($status,$id)
  {
      if ($this->session->userdata('Client')) {
        $wheredata=array('id'=>$id);
        $data=array('status'=>$status);
        $result=$this->Model->update($wheredata,'Journal',$data);
        if ( $result){
            redirect('Journal/details');
          }else{
            redirect('Journal/details');
          }
      }else{
        redirect('Client');
      }
  }

    
}
