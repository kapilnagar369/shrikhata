<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function details ()
	{   
    if ($this->session->userdata('Myadmin')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $data['result']=$this->Model->select('Client','updated_at desc');
          $this->load->view('admin/Client/Client',$data);
          $this->load->view('admin/assets/footer');
    }else{
          redirect('welcome');
      }
	}

	public function addClient()
	{  
   if ($this->session->userdata('Myadmin')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
		        $this->load->view('admin/Client/addClient');
            $this->load->view('admin/assets/footer');
        }else{
            redirect('welcome');
        }
	}

	public Function addClientdetails()
  {
  				 $this->form_validation->set_rules('client_code', 'Client Code', 'required|is_unique[Client.client_code]|max_length[8]|alpha_numeric');
           $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[Client.email]');
           if($this->form_validation->run() == FALSE) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $this->load->view('admin/Client/addClient');
            $this->load->view('admin/assets/footer');
          } else {
            $data = array(
                'client_code'       => $this->input->post('client_code'),
                'client_name'       => $this->input->post('client_name'),
                'amount_ratio'       => $this->input->post('amount_ratio'),
                'refrence'       => $this->input->post('refrence'),
                'edition'       => $this->input->post('edition'),
                'subscription_for_webaccess_of_party'       => $this->input->post('subscription_for_webaccess_of_party'),
 				'start_date'       => date('Y-m-d'),
                'subscription_type'       => $this->input->post('subscription_type'),
                'mobile_number'       => $this->input->post('mobile_number'),
                'whatsapp_api_required'       => $this->input->post('whatsapp_api_required'),
                'email'       => $this->input->post('email'),
                'username'       => $this->input->post('username'),
                'smtp_details'       => $this->input->post('smtp_details'),
                'server_address'       => $this->input->post('server_address'),
                'smtp_username'       => $this->input->post('smtp_username'),
                'smtp_name'       => $this->input->post('smtp_name'),
                'smtp_password'       => $this->input->post('smtp_password'),
                'password'       => $this->input->post('password'),
                'created_at'       => date("Y-m-d H:i:s"),
                'updated_at'       => date("Y-m-d H:i:s"),
                'status'     =>1
            );
            
            $client_id = $this->Model->insert($data,'Client');
            $party= array(
              'party_code'=>'zzzzzz',
              'party_name'=>'Shri Khata',
              'reference'=>'na',
              'wa_number'=>$this->input->post('mobile_number'),
              'email' => $this->input->post('email'),
              'party_type'=>'upline',
              'op_bal'=>0,
              'dr_cr'=>'cr',
              'web_access'=>'No',
              'client_id' =>$client_id,
              'created_at'       => date("Y-m-d H:i:s"),
              'updated_at'       => date("Y-m-d H:i:s"),
              'status'     =>1
            );
            $this->Model->insert($party,'Party');
            
            if ($client_id) {
                $this->session->set_flashdata('AddClient', '<div class="alert alert-success ">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Client Details Added Sucessfully!!</strong>.
                  </div>');
                
                redirect('Client/details');
                
            } else {
                
                $this->session->set_flashdata('AddClient', '<div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Sorry Client Not Added!!</strong>.
                </div>');
                
                redirect('Client/details');
                
            }
        }
  }

  public function editClient($id)
  {
        if ($this->session->userdata('Myadmin')) {
          $this->load->view('admin/assets/header');
          $this->load->view('admin/assets/sidebar');
          $whereData  = array('id' =>$id);
          $data['records'] = $this->Model->selectAllById('Client', $whereData);
          $this->load->view('admin/Client/editClient', $data);
          $this->load->view('admin/assets/footer');
        } else {
          redirect('welcome');
        }
  }

  public function editClientdetails()
  {
        
        if ($this->session->userdata('Myadmin')) {
            $wheredata = array(
                'id' => $this->input->post('id')
            );

              
           $data = array(
               
                'client_name'       => $this->input->post('client_name'),
                'refrence'       => $this->input->post('refrence'),
                'edition'       => $this->input->post('edition'),
                'subscription_for_webaccess_of_party'       => $this->input->post('subscription_for_webaccess_of_party'),
 				'subscription_type'       => $this->input->post('subscription_type'),
                'mobile_number'       => $this->input->post('mobile_number'),
                'whatsapp_api_required'       => $this->input->post('whatsapp_api_required'),
                'email'       => $this->input->post('email'),
                'smtp_details'       => $this->input->post('smtp_details'),
                'server_address'       => $this->input->post('server_address'),
                'smtp_username'       => $this->input->post('smtp_username'),
                'smtp_name'       => $this->input->post('smtp_name'),
                'smtp_password'       => $this->input->post('smtp_password'),
                'password'       => $this->input->post('password'),
                'updated_at'       => date("Y-m-d H:i:s"),
                'status'     =>1
            );
            
            

            
            
            $result = $this->Model->update($wheredata,'Client',$data);
            if ($result) {
                $this->session->set_flashdata('UpadteClient', '<div class="alert alert-success ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Client Record Updated Sucessfully!!</strong>.
        </div>');
                
               redirect('Client/details');
                
            } else {
                
                $this->session->set_flashdata('UpadteClient', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Client Record Not Updateed !!</strong>.
        </div>');
                
               redirect('Client/details');
                
            }
        } else {
            redirect('welcome');
        }
        
  }

  public function deleterecord($id, $tbl, $rd)
  {

      if ($this->session->userdata('Myadmin')) {
        $wheredata    = array(
            'id' => $id,
            'status'  =>0
        );
        $result=$this->Model->selectAllById($tbl, $wheredata);
         if($result){
           $data = $this->Model->deleterec($wheredata, $tbl);
            if($data){
              $this->session->set_flashdata('deleteClient', '<div class="alert alert-success ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Client Record Deleted Sucessfully!!</strong>.
              </div>');
              redirect('Client/'.$rd);
        }else {
              $this->session->set_flashdata('deleteClient', '<div class="alert alert-danger ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Client Record Not Deleted!!</strong>.
              </div>');
              redirect('Client/'.$rd);
         }}else{
          $this->session->set_flashdata('deleteClient', '<div class="alert alert-danger ">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Please De-Active Client !!</strong>.
        </div>');
        redirect('Client/'.$rd);
      } }else{
        redirect('Welcome');
      }
      
  }

  public function upadteStatus($status,$id)
  {
      if ($this->session->userdata('Myadmin')) {
        $wheredata=array('id'=>$id);
        $data=array('status'=>$status);
        $result=$this->Model->update($wheredata,'Client',$data);
        if ( $result){
            redirect('Client/details');
          }else{
            redirect('Client/details');
          }
      }else{
        redirect('Welcome');
      }
  }


  public function index()
  {    if (!$this->session->userdata('Client')) {
    $this->load->view('admin/Client/login');
  } else {
    redirect('Client/dashboard');
  }
  }

  public function login()
  {
    $email    =$this->input->post('email');
    $password =$this->input->post('password');
    $remember =$this->input->post('remember');

    if($remember)
    {
      setcookie('email',$email,time()+(86400 * 30),"/");
      setcookie('pass',$password,time()+(86400 * 30),"/");
      setcookie('rem',$remember,time()+(86400 * 30),"/");
    }else{
      setcookie('email',"",time()-(100),"/");
      setcookie('pass',"",time()-(100),"/");
      setcookie('rem',"",time()-(100),"/");
    }

    $whereData=array(
      'username'=>$email,
      'password'=>$password,
    );

    $result=$this->Model->login($whereData,'Client');
    if ($result) {
      $this->session->set_userdata('Client',$result);
      redirect('Client/dashboard');
    }else{
      $this->session->set_flashdata('dangermessage','<div class="alert alert-info alert-dismissable">
                <strong>Sorry!</strong> Incorrect Username And Password.</div>');
      redirect('Client');
    }
  } 

  // Dashboard

  public function dashboard()
  { 
    if ($this->session->userdata('Client')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $id = $this->session->userdata('Client')->id;
            $wheredata = array('client_id' => $id);
            $data['Exchange']=$this->Model->record_count('Exchange',$wheredata);
            $data['Idmaster']=$this->Model->record_count('Idmaster',$wheredata);
            $data['Entry']=$this->Model->record_count('Entry',$wheredata);
            $data['Party']=$this->Model->record_count('Party',$wheredata);
            $this->load->view('admin/index',$data);
      $this->load->view('admin/assets/footer');
    }else{
      redirect('Client');
    }
  }

   public function logout()
    {
        
        $this->session->unset_userdata('Client');
        session_destroy();
        redirect(site_url('Client'), 'refresh');
    }

     public function profile()
    {
        
        if ($this->session->userdata('Client')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $id = $this->session->userdata('Client')->id;
            $wheredata = array('id' => $id);
            $data['Client'] = $this->Model->selectAllById('Client', $wheredata);
            $this->load->view('admin/Client/profile',$data);
            $this->load->view('admin/assets/footer');
        } else {
            redirect('Client');
        }
        
    }

     public function addadmindetails()
    {
        
        if ($this->session->userdata('Myadmin')) {
           $wheredata = array(
                'id' => 1
            );
            
            if (!empty($_FILES['picture']['name'])) {
                $config['upload_path']   = 'uploads/admin/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name']     = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('picture')) {
                    $uploadData = $this->upload->data();
                    $picture    = $uploadData['file_name'];
                    $data       = array(
                        'name' => $this->input->post('name'),
                        'mobile' => $this->input->post('mobile'),
                        'email' => $this->input->post('email'),
                        'address' => $this->input->post('address'),
                        'dob' => $this->input->post('dob'),
                        'designation'=>$this->input->post('designation'),
                        'image' => $picture,
                        'date' => date("Y-m-d"),
                        'status' => 1
                    );
                } else {
                    
                    $picture = '';
                    $data    = array(
                        'name' => $this->input->post('name'),
                        'mobile' => $this->input->post('mobile'),
                        'email' => $this->input->post('email'),
                        'address' => $this->input->post('address'),
                        'dob' => $this->input->post('dob'),
                        'designation'=>$this->input->post('designation'),
                        'date' => date("Y-m-d"),
                    );
                }
            } else {
                $picture = '';
                $data    = array(
                    'name' => $this->input->post('name'),
                    'mobile' => $this->input->post('mobile'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'dob' => $this->input->post('dob'),
                    'designation'=>$this->input->post('designation'),
                    'date' => date("Y-m-d"),
                );
            }
            
            
            $result = $this->Model->update($wheredata, 'ad_admin', $data);
            if ($result) {
                $this->session->set_flashdata('updateadmin', '<div class="alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Your Record Update Sucessfully!!</strong>.
                </div>');
                
                redirect('welcome/profile');
                
            } else {
                
                $this->session->set_flashdata('updateadmin', '<div class="alert alert-danger ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Your Record Not Update !!</strong>.
                </div>');
                
                redirect('welcome/profile');
                
            }
        } else {
            redirect('Welcome');
        }
        
    }

      public function changepassword()
    {
        $oldpass = $this->input->post('oldpass');
        $newpass = $this->input->post('newpass');
        
        
        $wheredata = array(
            'password' => $oldpass
        );
        
        $result = $this->Model->selectAllById('ad_admin', $wheredata);
        if ($result) {
            $wheredata = array(
                'id' => 1
            );
            $data      = array(
                'password' => $newpass
            );
            $res1      = $this->Model->update($wheredata, 'ad_admin', $data);
            if ($res1) {
                $this->session->set_flashdata('changepassword', '<div class="alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Your Password Update Sucessfully!!</strong>.
                </div>');
                
                redirect('welcome/profile');
                
            } else {
                $this->session->set_flashdata('changepassword', '<div class="alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Your Password Not Update!!</strong>.
                </div>');

                redirect('welcome/profile');
            }
        } else {
            
                $this->session->set_flashdata('changepassword', '<div class="alert alert-success ">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Your Old Password Not Correct!!</strong>.
                </div>');

                redirect('welcome/profile');
        }
        
        
    }
    
}
