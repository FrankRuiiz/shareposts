<?php
    class Pages extends Controller {
        public function __construct() {
        } 

        public function index() {
            $data = [
                'title' => 'Share Posts',
                'description' => 'simple social network built on frlmvc framework'
            ];

            // pass variable from above to view
            $this->view('pages/index', $data );
        }

        public function about() {
            $data = [
                'title' => 'About',
                'description' => 'App to share posts with other users'
            ];

            $this->view('pages/about', $data);
        }
    }