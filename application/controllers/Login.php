<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
    /**
     * This is default constructor of the class
     */
    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('crud_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index(){
        $this->isLoggedIn();
    }
    
    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn(){
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {

            redirect('/dashboard');
        }
    }
    
    
    /**
     * This function used to logged in user
     */
    public function loginMe(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'username', 'required|max_length[128]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $result = $this->login_model->loginMe($username, $password);
            
            if(count($result) > 0)
            {
                foreach ($result as $res)
                {
                    $sessionArray = array('userId'=>$res->userId,                    
                                            'role'=>$res->roleId,
                                            'roleText'=>$res->role,
                                            'name'=>$res->name,
                                            'isLoggedIn' => TRUE
                                    );
                                    
                    $this->session->set_userdata($sessionArray);

                    $where = array('userId' => $res->userId);
  
                    $data = array(
                        'isLogin' => 1,
                    );
            
                    $this->crud_model->update($where,$data,'tbl_users');

                    redirect('/dashboard');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'username or password mismatch');
                redirect('/login');
            }
        }
    }

    public function showlock(){
        $this->load->model('user_model');

        $data['list_user'] = $this->user_model->userListing();

        $this->load->view("/showlock",  $data, NULL);
    }

    public function openlock(){
        $userId = $this->uri->segment(2);

        $where = array('userId' => $userId);
  
        $data = array(
            'isLogin' => 0,
        );

        $this->crud_model->update($where,$data,'tbl_users');

        redirect('openlock');
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword(){
        $this->load->view('forgotPassword');
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser(){
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('login_username','username','trim|required|xss_clean');
                
        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else 
        {
            $username = $this->input->post('login_username');
            
            if($this->login_model->checkusernameExist($username))
            {
                $encoded_username = urlencode($username);
                
                $this->load->helper('string');
                $data['username'] = $username;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();
                
                $save = $this->login_model->resetPasswordUser($data);                
                
                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_username;
                    $userInfo = $this->login_model->getCustomerInfoByusername($username);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo[0]->name;
                        $data1["username"] = $userInfo[0]->username;
                        $data1["message"] = "Reset Your Password";
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This username is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

    // This function used to reset the password 
    function resetPasswordConfirmUser($activation_id, $username){
        // Get username and activation code from URL values at index 3-4
        $username = urldecode($username);
        
        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($username, $activation_id);
        
        $data['username'] = $username;
        $data['activation_code'] = $activation_id;
        
        if ($is_correct == 1)
        {
            $this->load->view('newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }
    
    // This function used to create new password
    function createPasswordUser(){
        $status = '';
        $message = '';
        $username = $this->input->post("username");
        $activation_id = $this->input->post("activation_code");
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('password','Password','required|max_length[20]');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($username));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');
            
            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($username, $activation_id);
            
            if($is_correct == 1)
            {                
                $this->login_model->createPasswordUser($username, $password);
                
                $status = 'success';
                $message = 'Password changed successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password changed failed';
            }
            
            setFlashData($status, $message);

            redirect("/login");
        }
    }
}

?>