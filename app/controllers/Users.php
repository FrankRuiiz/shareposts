<?php 
    class Users extends Controller {
        public function __construct() {

        }

        public function register() {
            // Check for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
                // process form
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