<?php 
    class Users extends Controller {
        public function __construct() {
            $this->userModel = $this->model('User');
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

                // Validate Name
                if (empty($data['name'])) {
                    $data['name_err'] = 'Plese enter name';
                }
                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Plese enter email';
                } else {
                    // check if a user with the submitted email already exists
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                    }
                }
                // Validate Password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Plese enter password';
                } else if (strlen($data['password']) < 6 ) {
                    $data['password_err'] = 'Password must be at lease 6 characters';
                }
                // Validate Confirm Password
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Plese confirm password';
                } else if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // Validated 
                    die('success');
                } else {
                    // Load view with errors
                    $this->view('users/register', $data);
                }

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

                // Load view
                $this->view('users/register', $data);
            }
        }

        public function login() {
            // Check for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
                // process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Plese enter email';
                }

                // Validate Email
                if (empty($data['password'])) {
                    $data['password_err'] = 'Plese enter password';
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    // Validated 
                    die('success');
                } else {
                    // Load view with errors
                    $this->view('users/login', $data);
                }
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