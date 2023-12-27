<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        $this->load->library('session');
    }

    public function index()
    {
        $sessiondata = array(
            'userid' => '',
            'userpass' => '',
            'module_group_guid' => '',
        );

        $this->session->set_userdata($sessiondata);
        $this->load->view('login');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login_c');
    }

    public function password()
    {
        if ($this->session->userdata('loginuser') == true) {
            $this->load->view('header');
            $this->load->view('changepassword');
            $this->load->view('footer');
        } else {
            redirect('#');
        }
    }

    public function submit_password()
    {
        if ($this->session->userdata('loginuser') == true) {
            $this->xbridge->get_uri();
            $prev_pass = $this->input->post('prev_password');
            $new_pass = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');
            $user_guid = $this->session->userdata('user_guid');

            if ($new_pass != $confirm_password) {
                $this->session->set_flashdata('warning', 'New Password and Confirm Password does not match!');
                redirect('login_c/password');
            };

            // print_r($this->session->userdata());die;
            $old_password = $this->db->query("SELECT * FROM set_user WHERE user_guid = '$user_guid' GROUP BY user_guid LIMIT 1");
            $prev_password = $this->db->query("SELECT md5('$prev_pass') as prev_pass");
            // echo $this->db->last_query();die;
            $old_passwords = $old_password->row('user_password');
            $prev_passwords = $prev_password->row('prev_pass');
            if ($prev_passwords != $old_passwords) {
                $this->session->set_flashdata('message', 'Old Password Wrong');
                redirect('login_c/password');
            }

            $check_module = $this->db->query("SELECT acc_module_group_guid FROM acc_module_group WHERE acc_module_group_name = 'Panda B2B'")->row('acc_module_group_guid');

            $this->db->query("UPDATE set_user set user_password = md5('$confirm_password'),updated_by = '" . $_SESSION['userid'] . "',updated_at = NOW() where user_guid = '$user_guid' and module_group_guid = '$check_module'");
            $new_passwords = $this->db->query("SELECT md5('$confirm_password') as new_pass")->row('new_pass');

            $this->db->query("INSERT INTO reset_pwd_self (transaction_guid,user_guid,from_value,to_value,created_by,created_at) SELECT UPPER(REPLACE(UUID(), '-', '')), '$user_guid','$old_passwords','$new_passwords','" . $_SESSION['userid'] . "',now()");

            // echo $this->db->last_query();die;

            $_SESSION['userpass'] = $confirm_password;

            $this->session->set_flashdata('message', 'Password Updated');
            redirect('login_c/password');
        } else {
            redirect('#');
        }
    }

    public function customer_setsession()
    {
        if($this->session->userdata('loginuser') == true) 
        {
            $customer_guid = $this->input->post('customer');
            $user_id = $_SESSION['userid'];

            $get_supplier_query = $this->login_model->check_supplier($user_id,$customer_guid);

            foreach ($get_supplier_query->result() as $row) {
                $session_supplier[] = $row->supplier_reg_no;
            }

            // print_r($session_supplier);die;
            // $_SESSION['module_code'] = $module_code;
            // print_r($module_code);die;

            $sessiondata = array(
                'customer_guid' => $this->input->post('customer'),
                'show_side_menu' => 'TRUE',
                'session_supplier' => $session_supplier,
            );
            $this->session->set_userdata($sessiondata);

            print_r($sessiondata); die;

            $redirect = '';
            if (in_array('DASH', $_SESSION['module_code'])) {
                $redirect = 'dashboard';
            } else {
                $redirect = 'panda_home';
            }

            
            $data = array(
                //'module_code' => $module_code,
                'para' => 'true',
                'redirect' => $redirect,

            );
            echo json_encode($data);
        } else {
            redirect('#');
        }
    }

    /**New Function Here */
    public function validate_check()
    {
        $this->form_validation->set_rules('userid', 'User ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $userid = $this->input->post('userid');
            $password = addslashes($this->input->post('password'));

            $result = $this->login_model->validate_login($userid, $password);

            if($result->row('isactive') == '0')
            {
                // Add JavaScript code to show an alert and redirect back to login
                echo '<script>alert("User Account Deactive. Please contact support team.");';
                echo 'window.location.href = "' . site_url('login_c') . '";</script>';

                /*$this->session->set_flashdata('message','User Account Deactive. <br>&nbsp; Please contact support team.');
                redirect('login_c');*/
            }
            else if($result->row('isactive') == '9')
            {
                // Add JavaScript code to show an alert and redirect back to login
                echo '<script>alert("User Account Incomplete. Please contact support team.");';
                echo 'window.location.href = "' . site_url('login_c') . '";</script>';

                /*$this->session->set_flashdata('message','User Account Incomplete. <br>&nbsp; Please contact support team.');
                redirect('login_c');*/
            }
            else if($result->num_rows() == '0')
            {
                // Add JavaScript code to show an alert and redirect back to login
                echo '<script>alert("Invalid User ID / Password. Please verify and try again.");';
                echo 'window.location.href = "' . site_url('login_c') . '";</script>';
                
                /*$this->session->set_flashdata('message','Invalid User ID / Password. <br>&nbsp; Please verify and try again.');
                redirect('login_c');*/
            }
            else
            {
                if ($result->num_rows() > 0) {
                    $browser = $this->agent->browser();
                    $ip_addr = $this->input->ip_address();
                    $insert_user_logs = $this->db->query("REPLACE INTO b2b_finance.user_logs SELECT UPPER(REPLACE(UUID(), '-', '')), '" . $result->row('user_guid') . "', '$userid', now(), '$ip_addr', '$browser'");
                    $check_userlog = $this->db->query("SELECT * FROM b2b_finance.user_logs where user_guid = '" . $result->row('user_guid') . "'");
    
                    //set the session variables
                    $sessiondata = array(
                        'userid' => $userid,
                        'user_logs' => $check_userlog->row('user_logs_guid'),
                        'user_guid' => $result->row('user_guid'),
                        'user_group_name' => $result->row('user_group_name'),
                        'user_group_guid' => $result->row('user_group_guid'),
                        'admin_active' => $result->row('admin_active'),
                        'loginuser' => TRUE,
                        'portal_template' => 'finance'
                    );
                    $this->session->set_userdata($sessiondata);
                    // $this->xbridge->get_uri();
    
                    redirect('login_c/list_customer');
                }
            }

        }
    }

    public function list_customer()
    {
        if ($this->session->userdata('loginuser') == true && $this->session->userdata('userid') != '' && $_SESSION['user_logs'] == $this->xbridge->validate_login()) 
        {
            $requiredSessionVar = array('userid', 'userpass', 'location', 'user_guid', 'user_group_name', 'user_group_guid', 'isenable', 'loginuser', 'query_loc', 'user_logs', 'portal_template','admin_active');

            foreach ($_SESSION as $key => $value) {
                if (!in_array($key, $requiredSessionVar)) {
                    unset($_SESSION[$key]);
                }
            }

            $user_id = $_SESSION['userid'];

            if ($_SESSION['admin_active'] == '1')
            {
                $get_customer = $this->db->query("SELECT *
                FROM(
                SELECT DISTINCT a.logo,a.customer_guid,a.customer_name,a.seq,a.row_seq,a.maintenance,
                DATE_FORMAT(a.maintenance_date,'%d-%m-%Y') AS maintenance_date
                FROM b2b_finance.`customer_info` AS a
                WHERE active = 1 
                ) AS aa
                GROUP BY aa.customer_guid
                ORDER BY aa.seq ASC,aa.row_seq ASC");

            } 
            else 
            {

                $get_customer = $this->db->query("SELECT DISTINCT c.logo,c.customer_guid,c.customer_name,c.seq,c.maintenance,DATE_FORMAT(c.maintenance_date,'%d-%m-%Y') AS maintenance_date FROM `user_info` AS a 
                INNER JOIN `user_relationship` b ON a.user_guid = b.user_guid
                INNER JOIN `customer_info` c ON b.customer_guid = c.customer_guid 
                WHERE a.user_id = '$user_id' 
                AND c.active = '1' 
                GROUP BY c.customer_guid
                ORDER by c.seq asc,c.row_seq ASC");

            }

            $data = array(
                'customer' => $get_customer,
            );

            $this->load->view('header');
            $this->load->view('customer', $data);
            $this->load->view('footer');

        }
        else 
        {
            redirect('#');
        }
    }
}
