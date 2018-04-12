<?php 
    class Users extends Controller {
        public function __construct() {

        }

        public function register() {
            // Check for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
                // process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
            } else  {
                // Load the form
                
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validate Name
                if (empty($data['name'])) {
                    $data['name_err'] = 'Plese enter name';
                }
                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Plese enter email';
                }
                // Validate Password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Plese enter valid password';
                }
                // Validate Confirm Password
                if (empty($data['confirm_password'])) {
                    $data['password_confirmation_err'] = 'Plese enter password confirmation';
                }

                // Load view
                $this->view('users/register', $data);
            }
        }

        public function login() {
            // Check for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
                // process form
            } else  {
                // Load the form
                
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }


    }