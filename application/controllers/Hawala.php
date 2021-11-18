<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hawala extends CI_Controller {

  public function details ($id='')
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $client_id = $this->session->userdata('Client')->id;
          $whereData  = array('client_id' =>$client_id);
          $data['result'] = $this->Model->selectHawala($client_id,$id);
          $this->load->view('admin/Hawala/details.php',$data);
          $this->load->view('admin/assets/footer');
    } else {
          redirect('Client');
    }
  }

  public function AddHawalafromLedger() {
    $client_id = $this->session->userdata('Client')->id;
    if($this->input->post('debit_credit')=='Debit') {
       $credit_party = $this->input->post('party_ids');
       $debit_party = $this->input->post('party_idh');
    } else {
       $credit_party = $this->input->post('party_idh');
       $debit_party = $this->input->post('party_ids');
    }
             $whereData  = array('client_id' =>$client_id);
             $ent = $this->Model->getSingleRoworder('Hawala', $whereData,'id desc');
            $vch_num = 0;
            if(isset($ent)) {
            $vch_num = str_replace($this->session->userdata('Client')->client_code.'HV','',$ent->vch_no);
            }
            $vouchar_no = $this->session->userdata('Client')->client_code.'HV'.($vch_num+1);
            $data = array(
                'vch_no'    =>  $vouchar_no,
                'debit_party'    => $debit_party,
                'credit_party'   => $credit_party,
                'trxn_date'      => date('Y-m-d',strtotime($this->input->post('trxn_date'))),
                'amount'         => $this->input->post('amount'),
                'remark'         => $this->input->post('remark'),
                'client_id'      => $client_id,
                'created_at'     => date("Y-m-d H:i:s"),
                'updated_at'     => date("Y-m-d H:i:s"),
                'status'         => 1
            );
           $hawala_id = $this->Model->insert($data,'Hawala');
            
          
              // $credit_party = $this->input->post('party_ids');
              // $debit_party = $this->input->post('party_idh');
               $amount = $this->input->post('amount');
         
               $where  = array('client_id' =>$this->session->userdata('Client')->id,'id'=>$debit_party);
               $party_data=$this->Model->selectAllById('Party', $where);
            $accounts=array('client_id'=>$client_id,
                            'type'=>'12',
                            'party_id'=>$debit_party,
                            'credit'=>$amount,
                            'vouchar_id'=>$hawala_id,
                            'debit'=>0,
                            'trxn_date'=>date('Y-m-d',strtotime($this->input->post('trxn_date'))),
                            'narration'=>'Transfer to '.$party_data[0]['party_name'],
                            'created_at'    => date("Y-m-d H:i:s"),
                            'updated_at'    => date("Y-m-d H:i:s")
          );
            
          $result = $this->Model->insert($accounts,'accounts');
           $where  = array('client_id' =>$this->session->userdata('Client')->id,'id'=>$credit_party);
            $party_data2=$this->Model->selectAllById('Party', $where);
           $accounts1=array('client_id'=>$client_id,
                            'type'=>'13',
                            'party_id'=>$credit_party,
                            'vouchar_id'=>$hawala_id,
                            'credit'=>0,
                            'debit'=>$amount,
                            'trxn_date'=>date('Y-m-d',strtotime($this->input->post('trxn_date'))),
                            'narration'=>'Transfer from '.$party_data2[0]['party_name'],
                            'created_at'    => date("Y-m-d H:i:s"),
                            'updated_at'    => date("Y-m-d H:i:s")
          );
         
          $result = $this->Model->insert($accounts1,'accounts');
        if ($result) {
                $this->session->set_flashdata('AddLedger', '<div class="alert alert-success ">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Hawala Entry Details Added Sucessfully!!</strong>.
                  </div>');
                redirect('Ledger/details');
            } else {
                $this->session->set_flashdata('AddLedger', '<div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry Hawala Entry Not Added!!</strong>.
                </div>');
                 redirect('Ledger/details');
            }
  }

  public function updateComment() {
      if ($this->session->userdata('Client')) {
      $wheredata =array('party_id'=>$_POST['party_id']);
      $updatearr =array('comments'=>$_POST['comments']);
      $this->Model->update($wheredata,'accounts',$updatearr);
      echo 'done';
    }
  }

 }
