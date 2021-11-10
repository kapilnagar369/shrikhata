<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/login');
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
			'email'=>$email,
			'password'=>$password,
		);

		$result=$this->Model->login($whereData,'ad_admin');
		if ($result) {
			$this->session->set_userdata('Myadmin',$result);
			redirect('welcome/dashboard');
		}else{
			$this->session->set_flashdata('dangermessage','<div class="alert alert-info alert-dismissable">
                <strong>Sorry!</strong> Incorrect Email And Password.</div>');
			redirect('welcome');
		}
	} 

	// Dashboard

	public function dashboard()
	{ 
		if ($this->session->userdata('Myadmin')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            // $data['Hospital']=$this->Model->record_count('Hospital');
            // $data['Lab']=$this->Model->record_count('Lab');
            $data['Client']=$this->Model->record_count('Client');
            // $data['Ambulance']=$this->Model->record_count('Ambulance');
            // $data['total_beds']=$this->Model->sum('total_beds','Hospital');
            // $data['used_beds']=$this->Model->sum('used_beds','Hospital');
            // $data['vcant_beds'] = $data['total_beds']-$data['used_beds']; 
         /*   $data['executive']=$this->Model->record_count('executive');
         /*   $data['executive']=$this->Model->record_count('executive');
            $data['task']=$this->Model->record_count('task');*/
            /*$data['supersubcat']=$this->Model->record_count('ad_supersubcat');*/
            $data['user']=$this->Model->record_count('users');
            $data['party_master']=$this->Model->record_count('Party');
            $this->load->view('admin/index',$data);
			$this->load->view('admin/assets/footer');
		}else{
			redirect('welcome');
		}
	}

	 public function logout()
    {
        
        $this->session->unset_userdata('Myadmin');
        session_destroy();
        redirect(site_url('Welcome'), 'refresh');
    }

     public function profile()
    {
        
        if ($this->session->userdata('Myadmin')) {
            $this->load->view('admin/assets/header');
            $this->load->view('admin/assets/sidebar');
            $data['admin'] = $this->Model->select('ad_admin');
            $this->load->view('admin/profile',$data);
            $this->load->view('admin/assets/footer');
        } else {
            redirect('Welcome');
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
                        'date' => date("Y-m-d "),
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
                        'date' => date("Y-m-d "),
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
                    'date' => date("Y-m-d "),
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
