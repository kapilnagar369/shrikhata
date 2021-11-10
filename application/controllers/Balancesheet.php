<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balancesheet extends CI_Controller {

  public function details ()
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $client_id = $this->session->userdata('Client')->id;
          $closing_date = '';
          $type = '';
        $data=array();
         if(isset($_POST['closing_date'])) {  $date=date('Y-m-d',strtotime($_POST['closing_date'])); } else { $date = date('Y-m-d');}
         if(isset($_POST['report_type'])) {  $type= $_POST['report_type']; } else {  $type= 'Horizontal'; }
          $whereData  = array('accounts.client_id' =>$client_id,'DATE(accounts.trxn_date) <='=>date('Y-m-d',strtotime($date)));
          if($type=='Horizontal') {
                $data['result']=$this->Model->getBalanceSheet($whereData);
          } else {
               $debit=$this->Model->getBalanceSheet($whereData,'debit');
               $credit=$this->Model->getBalanceSheet($whereData,'credit');
                
                $final=array();
                if(count($debit)>=count($credit)) {
                  foreach($debit as $key => $val) {
                    $vall=array();
                    if(isset($credit[$key]))
                       $vall = array_merge($val,$credit[$key]);
                    else 
                        $vall = $val;
                    array_push($final, $vall);
                  }
                }
                 if(count($debit)<count($credit)) {
                  foreach($credit as $key => $val) {
                    $vall=array();
                    if(isset($debit[$key]))
                         $vall = array_merge($val,$debit[$key]);
                     else 
                         $vall = $val;
                    array_push($final, $vall);
                  }
                }
                
            $data['final']=$final;
                
          }
           $data['type']=$type;
           $data['date']=$date;
          $this->load->view('admin/Balancesheet/Balancesheet.php',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
    }
  }


  public function saveTallyBalSheet() {
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
                            'dr_cr'=>$dr_cr
                );
      $result = $this->Model->insert($tally_log,'tally_log');
           if(@$_POST['checked_party_id']) {
               $where =$_POST['checked_party_id'];
               $updatearr =array('is_tally'=>0);
               $this->Model->updateparty($where,'accounts',$updatearr);
     }
        $updatearr =array('is_tally'=>1);
      if(@$_POST['party_id']){
      $wheredata =$_POST['party_id'];
      $this->Model->updateparty($wheredata,'accounts',$updatearr);
    }
      echo 'done';
    }
  }

  public function updateComment() {
      if ($this->session->userdata('Client')) {
      $wheredata =array('trxn_id'=>$_POST['trxn_id']);
      $updatearr =array('comments'=>$_POST['comments']);
      $this->Model->update($wheredata,'accounts',$updatearr);
      echo 'done';
    }
  }

 }
