<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Password extends CI_Controller {   
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != TRUE){    
            redirect(base_url('login'));
        }   
        $this->load->model('password_model');
        $this->load->library('form_validation');
        $this->load->helper(array('string','security','form'));
    } 
	public function index()
	{   
        level_user('password','index',$this->session->userdata('kategori'),'read') > 0 ? '': show_404();
        $this->load->view('member/password/password');
    } 
	public function gantipassword()
	{  
        level_user('password','index',$this->session->userdata('kategori'),'edit') > 0 ? '': show_404();
        $password = $this->password_model;
		$validation = $this->form_validation; 
        $validation->set_rules($password->rules());
		if ($this->form_validation->run() == FALSE){
			$errors = $this->form_validation->error_array();
			$data['errors'] = $errors;
        }else{    
            $post = $this->input->post();
            $datapass['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
            if($password->editpassword($datapass)){  
                $data['success']= true;
                $data['message']="berhasil merubah password"; 
            } else{
				$errors['fail'] = "gagal melakukan update data";
				$data['errors'] = $errors;
			} 
        } 
        $data['token'] = $this->security->get_csrf_hash();
        echo json_encode($data); 
    } 
}
