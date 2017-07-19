<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function index() {
        $this->output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function output($output = null) {
        $this->load->view('show_data.php', (array) $output);
    }

    function unique_field_name($field_name) {
        return 's' . substr(md5($field_name), 0, 8); //This s is because is better for a string to begin with a letter and not with a number
    }

    public function email() {
        $crud = new Grocery_CRUD();

        $crud->set_table('email');
        $crud->set_subject('Email');

        $crud->required_fields('password', 'email');

        $output = $crud->render();
        $this->output($output);
    }

    public function niche() {
        $c = new Grocery_CRUD();

        $c->set_table('niche');
        $c->set_subject('Niche');

        $this->output($c->render());
    }

    public function hosting() {
        $c = new Grocery_CRUD();

        $c->set_table('hosting');
        $c->set_subject('Hosting');
        $c->callback_column($this->unique_field_name('email'), array($this, 'link_email'));
        $c->set_relation('email', 'email', 'email');

        $o = $c->render();
        $this->output($o);
    }

    public function link_email($value, $row) {
        return '<a href="' . site_url('welcome/email/read/' . $row->email) . '">' . $value . '</a>';
    }

    public function domain() {
        $c = new Grocery_CRUD();

        $c->set_table('domain');
        $c->set_subject('Domain');
        $c->set_relation('email', 'email', 'email')
                ->set_relation('webmaster', 'email', 'email')
                ->set_relation('adsense', 'email', 'email')
                ->set_relation('niche', 'niche', 'niche');
        $c->set_relation('hosting', 'hosting', 'hosting');
        $c->unset_columns($this->unique_field_name('webmaster'), $this->unique_field_name('adsense'));

        $this->output($c->render());
    }

    public function backlink() {
        $c = new Grocery_CRUD();

        $c->set_table('backlink');
        $c->set_subject('Backlink');
        
        $c->change_field_type('type', 'enum', array('Comment', 'WEB 2.0', 'Link Profile', 'Redirect', 'Forum'));
        $c->change_field_type('rating', 'enum', array('Very Good', 'Good', 'Not Bad'));
        $c->change_field_type('email_verification', 'enum', array('yes', 'No'));
        $c->unset_columns('email', 'username', 'password');
        
        
        $this->output($c->render());
    }
    
    public function no_link(){
        return '#';
    }

        public function domain_backlink(){
        $c = new Grocery_CRUD();
        
        $c->set_table('domain_backlink');
        $c->set_relation('domain', 'domain', 'domain');
        $c->set_relation('backlink', 'backlink', 'backlink');
        $c->change_field_type('indexed', 'enum', array('yes', 'No'));
//        $c->set_relation_n_n('backlink', 'domain_backlink', 'backlink', 'domain', 'backlink', 'backlink');
        
        $this->output($c->render());
    }
}
