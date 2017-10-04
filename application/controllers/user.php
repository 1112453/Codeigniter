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
        
        function index(){
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
                    
                    $this->form_validation->set_message('Account already exists');
                    $this->load->view('view_registerUser');
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
                $data['mail'] = $this->input->post('mail');

                if($this->model_user->insert_user($data) == FALSE){
                    echo "Account already exists";
                }else{
                    $this->load->view('welcome_message');
                }
            }
        }
    }