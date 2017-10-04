<?php
    class User extends CI_Controller
    {
        function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->library('form_validation');
            $this->load->model('model_user');
            $this->load->helper(array('form', 'url'));
        }
        
        function register(){
            $this->form_validation->set_rules('account','Account', 'required');
            $this->form_validation->set_rules('password','Password', 'required', array('required'=>'You must provide a %s.'));
            $this->form_validation->set_rules('confirmPassword','Confirm Password', 'required');
            $this->form_validation->set_rules('mail','Mail', 'required');
            
            if($this->form_validation->run() == FALSE){
                $this->load->view('view_registerUser');
            }else{
                $data = array();
                $data['account'] = $this->input->post('account');
                $data['password'] = $this->input->post('password');
                $data['mail'] = $this->input->post('mail');

                if($this->model_user->insert_user($data) == FALSE){
                    
                    //$this->form_validation->set_message('Account already exists');
                   // $this->load->view('view_registerUser');
                    echo "Account already exists";
                }else{
                    $this->load->view('view_loginUser');
                }
            }
        }
        
        function login(){
            $this->form_validation->set_rules('account','Account', 'required');
            $this->form_validation->set_rules('password','Password', 'required', array('required'=>'You must provide a %s.'));
            if($this->form_validation->run() == FALSE){
                $this->load->view('view_loginUser');
            }else{
                $data = array();
                $data['account'] = $this->input->post('account');
                $data['password'] = $this->input->post('password');

                if($this->model_user->get_user($data) == FALSE){
                    echo "Account or Password wrong";
                }else{
                    $dataList['list'] = $this->model_user->getlist_user();
                    $dataList['username'] = $data['account'];
                    $this->load->view('view_User',$dataList);
                }
            }
        }
        
        function edit(){
            $id = $this->uri->segment(3);
            $id = intval($id);
            $info = $this->model_user->get_userbyid($id);
            $this->form_validation->set_rules('password','Password', 'required', array('required'=>'You must provide a %s.'));
            $this->form_validation->set_rules('confirmPassword','Confirm Password', 'required');
            $this->form_validation->set_rules('mail','Mail', 'required');
            
            if($this->form_validation->run() == FALSE){
                $this->load->view('view_editUser', $info);
            }else{
                $data = array();
                $data['password'] = $this->input->post('password');
                $data['mail'] = $this->input->post('mail');
                $data['id'] = $id;
                $data['account'] = $info->account;
                if($this->model_user->edit_user($data) == FALSE){
                    
                    //$this->form_validation->set_message('Account already exists');
                   // $this->load->view('view_registerUser');
                    echo "Account already exists";
                }else{
                    $dataList['list'] = $this->model_user->getlist_user();
                    $dataList['username'] = $data['account'];
                    $this->load->view('view_User',$dataList);
                }
            }
        }
        
        function delete(){
            $id = $this->uri->segment(3);
            $this->model_user->delete_user($id);
            $dataList['list'] = $this->model_user->getlist_user();
           // $account = $dataList->account;
           // $dataList['username'] = $account;
            $this->load->view('view_User',$dataList);
        }
    }