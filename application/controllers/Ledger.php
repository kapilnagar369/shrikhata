<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ledger extends CI_Controller {

  public function details ($party_id='',$start='',$end='')
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $client_id = $this->session->userdata('Client')->id;
          $whereData  = array('client_id' =>$client_id);
          $data['party'] = $this->Model->selectAllById('Party', $whereData);
          $data['result']=array();
          if($party_id!='') {
              $wh  = array('client_id' =>$client_id,'party_id' =>$party_id,);
                         $data['tally_log'] = $this->Model->getSingleRoworder('tally_log', $wh,'id desc');
                        
             $whereData  = array('accounts.party_id' =>$party_id,'DATE(accounts.trxn_date) >='=>date('Y-m-d',strtotime($start)),'DATE(accounts.trxn_date) <='=>date('Y-m-d',strtotime($end)));
            
              $data['result']=$this->Model->getLedger($whereData);
              $data['start']=$start;
              $data['party_id']=$party_id;
              $data['end']=$end;
              $whereData  = array('accounts.party_id' =>$party_id,'DATE(accounts.trxn_date) <'=>date('Y-m-d',strtotime($start)));
              $data['bal']=$this->Model->getBalance($whereData)->bal;

          } 
          $this->load->view('admin/Ledger/Ledger.php',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
    }
  }

  public function saveTally() {
   $dr_cr='';
      if ($this->session->userdata('Client')) {
        if($_POST['closebal']>0) {
          $dr_cr='dr';
        } else if($_POST['closebal']<0){
            $dr_cr='cr';
        }
        $tally_log=array('client_id'=>$this->session->userdata('Client')->id,
                            'log_time'=>date('Y-m-d H:i:s'),
                            'amount'=>$_POST['closebal'],
                            'party_id'=>$_POST['party_code'],
                            'dr_cr'=>$dr_cr
                );
      $result = $this->Model->insert($tally_log,'tally_log');
      $where =array('party_id'=>$_POST['party_code']);
       $updatearr =array('is_tally'=>0);
      $this->Model->update($where,'accounts',$updatearr);
     
        $updatearr =array('is_tally'=>1);
      if(@$_POST['trxn_id']){
      $wheredata =$_POST['trxn_id'];
      $this->Model->update2($wheredata,'accounts',$updatearr);
    }
      echo 'done';
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
