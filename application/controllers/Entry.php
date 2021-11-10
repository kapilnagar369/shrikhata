<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entry extends CI_Controller {

  public function details ()
  {   
    if ($this->session->userdata('Client')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
           $where  = array('client_id' =>$this->session->userdata('Client')->id);
          $data['result']=$this->Model->selectAllById('Entry',$where);
         
          $this->load->view('admin/Entry/Entry.php',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('Client');
      }
  }

  public function addEntry()
  {  
   if ($this->session->userdata('Client')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $id = $this->session->userdata('Client')->id;

          $where  = array('client_id' =>$id,'status'=>2);
          $result=$this->Model->selectAllById('Entry', $where);
          $whereData  = array('client_id' =>$id);

         if(!$result){
            $ent = $this->Model->getSingleRoworder('Entry', $whereData,'id desc');
            $vch_num = 1;
            if(isset($ent)) {
            $vch_num = str_replace($this->session->userdata('Client')->client_code,'',$ent->vch_no);
            }
            $vouchar_no = $this->session->userdata('Client')->client_code.($vch_num+1);
            $data = array(
                'vch_no'    =>  $vouchar_no,
                'client_id'    =>  $id,
                'trxn_date'    =>  date("Y-m-d"),
                'status'        => 2,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            );
            $this->Model->insert($data,'Entry');
          } else {

            $vouchar_no = $result[0]['vch_no'];  
          }  

           if($result) {
             $wData  = array('client_id' =>$id,'vouchar_id'=>$result[0]['id']);
            $data['vouchtemp']  = $this->Model->selectAllById('temp_voucher_details', $wData);
            }
            $data['entryd']  = $result;
            $data['vouchar_no']  = $vouchar_no;
            $data['party'] = $this->Model->selectAllById('Party', $whereData);
            $data['Exchange']=$this->Model->selectAllById('Exchange',$whereData);
            $data['Idmaster']=$this->Model->selectIDMaster($id);
            $this->load->view('admin/Entry/addEntry',$data);
            $this->load->view('admin/assets/footer');
        } else {
            redirect('Client');
        }
  }
  function check_user() {
    $Entry_code = $this->input->post('Entry_code');// get first name
 
    $this->db->from('Entry');
    $this->db->where('Entry_Code',$Entry_code);
    $this->db->where('client_id',$this->session->userdata('Client')->id);
    $query = $this->db->get();

    $num = $query->num_rows();
    if ($num > 0) {
        $this->form_validation->set_message('check_user', 'Such Entry Code already exist!');
            return FALSE;
    } else {
        return TRUE;
    }
}
   public function savedraft() {
  if(isset($_POST)) {
       $updatearr= array(
        'trxn_date'=>date('Y-m-d',strtotime($_POST['trxn_date'])),
        'gross_pl'=>$_POST['totalgrosspl'],
        'net_pl'=>$_POST['totalnetpl'],
        'commision'=>$_POST['totalcommis'],
        'pati'=>$_POST['totalpati'],
        'updated_at'=>date('Y-m-d H:i:s'));
      $wheredata =array('vch_no'=>$_POST['vouchar_no']);
      $this->Model->update($wheredata,'Entry',$updatearr);
      $result=$this->Model->selectAllById('Entry', $wheredata);
      if(count($_POST['Idmaster'])>0) {
    $data = $this->Model->deleterec(array('vouchar_id'=>$result[0]['id']), 'temp_voucher_details');
    $vouchardetails = array();
   

   for($i=0;$i<count($_POST['Idmaster']);$i++) {
     if($_POST['Idmaster'][$i] !='' && $_POST['pointin'][$i] !='') {
      $vouchardetails[]= array(
        'vouchar_id'=>$result[0]['id'],
        'client_id'=>$result[0]['client_id'],
        'user_id'=>$_POST['Idmaster'][$i],
        'party_code'=>$_POST['partyin'][$i],
        'party_id'=>$_POST['partyidin'][$i],
        'id_rate'=>$_POST['ratein'][$i],
        'point'=>$_POST['pointin'][$i],
        'gross_amount'=>$_POST['amountin'][$i],
        'commision'=>$_POST['comin'][$i],
        'net_amount'=>$_POST['netamountin'][$i],
        'pati'=>$_POST['patiin'][$i],
        'final_amount'=>$_POST['finalamountin'][$i],
        'gross_profit'=>$_POST['grossprofitin'][$i],
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'));
      }
    }
    if(count($vouchardetails)>0) {
    $result = $this->db->insert_batch('temp_voucher_details',$vouchardetails);
    echo 1;
    } else {
     echo 0;
        }
      }
   }
  }

     public function saveEntry() {
    if(isset($_POST)) {
       $updatearr= array(
        'trxn_date'=>date('Y-m-d',strtotime($_POST['trxn_date'])),
        'gross_pl'=>$_POST['totalgrosspl'],
        'net_pl'=>$_POST['totalnetpl'],
        'commision'=>$_POST['totalcommis'],
        'pati'=>$_POST['totalpati'],
        'status'=>0,
        'updated_at'=>date('Y-m-d H:i:s'));
      $wheredata =array('vch_no'=>$_POST['vouchar_no']);
      $this->Model->update($wheredata,'Entry',$updatearr);
      $result=$this->Model->selectAllById('Entry', $wheredata);
      if(count($_POST['Idmaster'])>0) {
    $data = $this->Model->deleterec(array('vouchar_id'=>$result[0]['id']), 'temp_voucher_details');
    $data = $this->Model->deleterec(array('vouchar_id'=>$result[0]['id']), 'voucher_details');
    $vouchardetails = array();
   

   for($i=0;$i<count($_POST['Idmaster']);$i++) {
     if($_POST['Idmaster'][$i] !='' && $_POST['pointin'][$i] !='') {
      $vouchardetails[]= array(
        'vouchar_id'=>$result[0]['id'],
        'client_id'=>$result[0]['client_id'],
        'user_id'=>$_POST['Idmaster'][$i],
        'party_code'=>$_POST['partyin'][$i],
        'party_id'=>$_POST['partyidin'][$i],
        'id_rate'=>$_POST['ratein'][$i],
        'point'=>$_POST['pointin'][$i],
        'gross_amount'=>$_POST['amountin'][$i],
        'commision'=>$_POST['comin'][$i],
        'net_amount'=>$_POST['netamountin'][$i],
        'pati'=>$_POST['patiin'][$i],
        'final_amount'=>$_POST['finalamountin'][$i],
        'gross_profit'=>$_POST['grossprofitin'][$i],
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s'));
      }
    }
    if(count($vouchardetails)>0) {
     $this->db->insert_batch('voucher_details',$vouchardetails);
     $this->accounting($result[0]['id'],$result[0]['client_id'],date('Y-m-d',strtotime($_POST['trxn_date'])));
    
    echo 1;
    }
    else {
     echo 0;
      }
    }
    }
   }



   public  function accounting($vch_id,$client_id,$trxn_date) {
     $GrossAmount=array();
     $GrossAmount = $this->getPartyAmount($vch_id,$client_id,$trxn_date);
     $zaccount =array();
     $zaccount = $this->getzAccountAmount($vch_id,$client_id,$trxn_date);
     
     $final_array=array_merge($GrossAmount,$zaccount);
     $upkeys = array('credit','debit','trxn_date','narration','is_deleted','is_tally');
   	 $wheredata =  array('vouchar_id' => $vch_id );
     $this->Model->update($wheredata,'accounts',array('is_deleted'=>2));
     $this->Model->insert_on_duplicate_update_batch('accounts',$final_array,$upkeys);
     $this->Model->deleterec(array('vouchar_id'=>$vch_id,'is_deleted'=>2), 'accounts');
     return true;
   }
   
   public function getPartyAmount($vch_id,$client_id,$trxn_date) {
     $sql="SELECT vouchar_id,$client_id as client_id,'".date('Y-m-d H:i:s',strtotime($trxn_date))."' as created_at,'".date('Y-m-d',strtotime($trxn_date))."' as trxn_date,   if(sum(gross_amount) >0,sum(gross_amount),0) as debit,if(sum(gross_amount) <0,sum(gross_amount),0) as credit , 'Settlement' as narration , party_id, '1' as type,'0' as is_deleted FROM `voucher_details` 

    	where vouchar_id=$vch_id and gross_amount!=0 group by party_code   having (debit !=0 or credit !=0)
    	union all

    	 SELECT  vouchar_id,$client_id as client_id,'".date('Y-m-d H:i:s',strtotime($trxn_date))."' as created_at,'".date('Y-m-d',strtotime($trxn_date))."' as trxn_date, if(sum(commision) >0,sum(commision),0) as debit,if(sum(commision) <0,sum(commision),0) as credit ,'commission' as narration , party_id, '2' as type,'0' as is_deleted FROM `voucher_details` 
    	 where vouchar_id=$vch_id and  commision!=0 group by party_code
    	  union all  
    	  
    	  SELECT vouchar_id,$client_id as client_id,'".date('Y-m-d H:i:s',strtotime($trxn_date))."' as created_at,'".date('Y-m-d',strtotime($trxn_date))."' as trxn_date, if(sum(pati) >0,sum(pati),0) as debit,if(sum(pati) <0,sum(pati),0) as credit ,'pati' as narration , party_id ,'3' as type,'0' as is_deleted FROM  `voucher_details`
 		
 		  where vouchar_id=$vch_id and pati!=0 group by party_code";    
    $query = $this->db->query($sql);
    return $query->result_array();
   }

   public function getzAccountAmount($vch_id,$client_id,$trxn_date) {
       $where  = array('client_id' =>$this->session->userdata('Client')->id,'party_code'=>'zzzzzz');
       $party_data=$this->Model->selectAllById('Party', $where);
     $party_id=   $party_data[0]['id'];




       $sql="SELECT vouchar_id,$client_id as client_id,'".date('Y-m-d H:i:s',strtotime($trxn_date))."' as created_at,'".date('Y-m-d',strtotime($trxn_date))."' as trxn_date,   if(sum(gross_amount) <0,sum(gross_amount),0) as debit,if(sum(gross_amount) >0,sum(gross_amount),0) as credit , 'Shri khata Settlement' as narration ,$party_id as party_id ,'4' as type,'0' as is_deleted  FROM `voucher_details`  join Idmaster on Idmaster.id=voucher_details.user_id join Exchange on Exchange.id =Idmaster.exch_code
        where vouchar_id=$vch_id and Exchange.Direct_Settle ='No' having (debit !=0 or credit !=0)  
    	   union all

        SELECT vouchar_id,$client_id as client_id,'".date('Y-m-d H:i:s',strtotime($trxn_date))."' as created_at,'".date('Y-m-d',strtotime($trxn_date))."' as trxn_date, if(sum(commision) <0,sum(commision),0) as debit,if(sum(commision) >0,sum(commision),0) as credit ,'Shri khata commission' as narration , $party_id as party_id ,'5'  as type,'0' as is_deleted FROM `voucher_details` 
    	 where vouchar_id=$vch_id  having (debit !=0 or credit !=0)
    	  union all  
    	  SELECT vouchar_id,$client_id as client_id,'".date('Y-m-d',strtotime($trxn_date))."' as trxn_date,'".date('Y-m-d H:i:s',strtotime($trxn_date))."' as created_at,if(sum(pati) <0,sum(pati),0) as debit,if(sum(pati) >0,sum(pati),0) as credit ,'Shri khata pati' as narration , $party_id as party_id,'6' as type,'0' as is_deleted FROM `voucher_details`
 		
 		  where vouchar_id=$vch_id  having (debit !=0 or credit !=0)
          union all
       SELECT vouchar_id,$client_id as client_id,'".date('Y-m-d H:i:s',strtotime($trxn_date))."' as created_at,'".date('Y-m-d',strtotime($trxn_date))."' as trxn_date,   if((point*Exchange.rate)/100 <0,(point*Exchange.rate)/100,0) as debit,if((point*Exchange.rate)/100 >0,(point*Exchange.rate)/100,0) as credit ,  CONCAT('Settlement of ',Exchange.Exchange_Name) as narration ,Settlement_ac  as party_id ,'10' as type,'0' as is_deleted  FROM `voucher_details`  join Idmaster on Idmaster.id=voucher_details.user_id join Exchange on Exchange.id =Idmaster.exch_code
        where vouchar_id=$vch_id and Exchange.Direct_Settle ='Yes' group by party_id having (debit !=0 or credit !=0) 
        union all
        SELECT vouchar_id,$client_id as client_id,'".date('Y-m-d H:i:s',strtotime($trxn_date))."' as created_at,'".date('Y-m-d',strtotime($trxn_date))."' as trxn_date,   if(((Idmaster.rate-Exchange.rate)*point)/100 <0,((Idmaster.rate-Exchange.rate)*point)/100,0) as debit,if(((Idmaster.rate-Exchange.rate)*point)/100 >0,((Idmaster.rate-Exchange.rate)*point)/100,0) as credit , CONCAT('Settlement of ',Exchange.Exchange_Name) as narration ,$party_id  as party_id ,'11' as type,'0' as is_deleted  FROM `voucher_details`  join Idmaster on Idmaster.id=voucher_details.user_id join Exchange on Exchange.id =Idmaster.exch_code
        where vouchar_id=$vch_id and Exchange.Direct_Settle ='Yes' having (debit !=0 or credit !=0) 
        ";      
    $query = $this->db->query($sql);
    return $query->result_array();
   }
  
   public Function addEntrydetails()
  {         
                 $this->form_validation->set_rules('Entry_code', 'Entry Code', 'required|callback_check_user');// call callback function

           // $this->form_validation->set_rules('party_code', 'Party Code', 'required|is_unique[Party.party_code]|max_length[8]|alpha_numeric');
           if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
             $data['party']=$this->Model->select('Party','updated_at desc');
            $this->load->view('admin/Entry/addEntry',$data);
            $this->load->view('admin/assets/footer');
          } else {
            

            $data = array(
                'Entry_Code'    => $this->input->post('Entry_code'),
                'Entry_Name'    => $this->input->post('Entry_name'),
                'Currancy'     => $this->input->post('Currancy'),
                'Upline_Code'     => $this->input->post('Upline_Code'),
                'Direct_Settle'         => $this->input->post('Direct_Settle'),
                'Settlement_ac'    => $this->input->post('Settlement_ac'),
                'Rate'        => $this->input->post('Rate'),
                'Commision'         => $this->input->post('Commision'),
                'commision_ac'    => $this->input->post('commision_ac'),
                'Comm_Type'    => $this->input->post('Comm_Type'),
                'client_id'     => $this->session->userdata('Client')->id,
                'status'        => 1,
                'created_at'    => date("Y-m-d H:i:s"),
                'updated_at'    => date("Y-m-d H:i:s")
            );
            
            $result = $this->Model->insert($data,'Entry');
            if ($result) {
                $this->session->set_flashdata('AddEntry', '<div class="alert alert-success ">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Entry Details Added Sucessfully!!</strong>.
                  </div>');
                
                redirect('Entry/details');
                
            } else {
                
                $this->session->set_flashdata('AddEntry', '<div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry Entry Not Added!!</strong>.
                </div>');
                
                redirect('Entry/details');
                
            }
          }
  }

  public function editEntry($id)
  {
        if ($this->session->userdata('Client')) {

            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $client_id = $this->session->userdata('Client')->id;
            $whereData  = array('client_id' =>$client_id);
          $where  = array('id'=>$id);
          $result=$this->Model->selectAllById('Entry', $where);

           $vouchar_no = $result[0]['vch_no'];  
             if($result) {
             $wData  = array('vouchar_id'=>$result[0]['id']);
            $data['vouchtemp']  = $this->Model->selectAllById('voucher_details', $wData);
            }
            $data['entryd']  = $result;
            $data['vouchar_no']  = $vouchar_no;
            $data['party'] = $this->Model->selectAllById('Party', $whereData);
            $data['Exchange']=$this->Model->selectAllById('Exchange',$whereData);
            $data['Idmaster']=$this->Model->selectIDMaster($client_id);
            $this->load->view('admin/Entry/editEntry',$data);
            $this->load->view('admin/assets/footer');
        } else {
            redirect('Client');
        }
  }

  public function editEntrydetails()
  {    
          
        if ($this->session->userdata('Client')) {
            $wheredata = array(
                'id' => $this->input->post('id')
            );

              $data = array(
                'Entry_Name'    => $this->input->post('Entry_name'),
                'Currancy'     => $this->input->post('Currancy'),
                'Upline_Code'     => $this->input->post('Upline_Code'),
                'Direct_Settle'         => $this->input->post('Direct_Settle'),
                'Settlement_ac'    => $this->input->post('Settlement_ac'),
                'Rate'        => $this->input->post('Rate'),
                'Commision'         => $this->input->post('Commision'),
                'commision_ac'    => $this->input->post('commision_ac'),
                'Comm_Type'    => $this->input->post('Comm_Type'),
                'updated_at'    => date("Y-m-d H:i:s")
            );
            
            
            

            
            
            $result = $this->Model->update($wheredata,'Entry',$data);
            if ($result) {
                $this->session->set_flashdata('UpadteEntry', '<div class="alert alert-success ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Entry Record Updated Sucessfully!!</strong>.
        </div>');
                
               redirect('Entry/details');
                
            } else {
                
                $this->session->set_flashdata('UpadteEntry', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Entry Record Not Updateed !!</strong>.
        </div>');
                
               redirect('Entry/details');
                
            }
        } else {
            redirect('Client');
        }
        
  }

  public function deleterecord($id, $tbl, $rd)
  {

      if ($this->session->userdata('Client')) {
        $wheredata    = array('id' => $id);
       
           $data = $this->Model->deleterec($wheredata, $tbl);
           $wheredata    = array(
            'vouchar_id' => $id
            );
            $this->Model->deleterec($wheredata, 'temp_voucher_details');
            $this->Model->deleterec($wheredata, 'voucher_details');
            $this->Model->deleterec($wheredata, 'accounts');
            if($data){
              $this->session->set_flashdata('deleteEntry', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Entry Record Deleted Sucessfully!!</strong>.
              </div>');
              redirect('Entry/'.$rd);
        }else {
              $this->session->set_flashdata('deleteEntry', '<div class="alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Entry Record Not Deleted!!</strong>.
              </div>');
              redirect('Entry/'.$rd);
         }}else{
        redirect('Client');
      }
      
  }
 public function deactiverecord($id)
  {

    
        $wheredata    = array(
            'id' => $id,
        );
     
         
        $wheredata=array('id'=>$id);
        $data=array('status'=>1);
        $result=$this->Model->update($wheredata,'Entry',$data);
        redirect('Entry/details');
        $this->session->set_flashdata('deleteEntry', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Entry Record Deleted Sucessfully!!</strong>.
              </div>');
        redirect('Entry/details');
       
         
      
  }
  public function upadteStatus($status,$id)
  {
      if ($this->session->userdata('Client')) {
        $wheredata=array('id'=>$id);
        $data=array('status'=>$status);
        $result=$this->Model->update($wheredata,'Entry',$data);
        if ( $result){
            redirect('Entry/details');
          }else{
            redirect('Entry/details');
          }
      }else{
        redirect('Client');
      }
  }
  public function getExchangewiseReport() {
     $vch_no = $_POST['vouchar_no'];
  
     $sql="SELECT ex.Exchange_Code,sum(vch.gross_profit) as  gross_profit,sum(vch.pati) as pati,sum(vch.commision) as commision,sum(vch.gross_profit+vch.pati+vch.commision) as net_profit from temp_voucher_details vch join Entry  ent on vch.vouchar_id=ent.id join Idmaster im on im.id= vch.user_id join Exchange ex on ex.id = im.exch_code and ent.vch_no='$vch_no' group by ex.id ";    
     $query = $this->db->query($sql);
    $res= $query->result_array();
    // return json_encode($res);
 
    echo json_encode($res);
   
  }
 }
