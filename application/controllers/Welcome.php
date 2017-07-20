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
        $this->load->model('m_backlink');
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');

        if ($this->session->userdata('status') != "login") {
            redirect(base_url("index.php/login"));
        }
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
        $c->unset_columns('iduser');
        $c->field_type('iduser','hidden');
        $c->callback_before_insert(array($this,'user'));
        $c->where(array('iduser' => $this->session->userdata('id')));
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
        $c->field_type('iduser','hidden');
        $c->callback_before_insert(array($this,'user'));
        $c->where(array('domain.iduser' => $this->session->userdata('id')));
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
        $c->field_type('iduser','hidden');
        $c->callback_before_insert(array($this,'user' ));
        $c->unset_columns('email', 'username', 'password','iduser');


        $this->output($c->render());
    }

    function user($arr_id){
        $id = $this->session->userdata('id');
        $arr_id['iduser']  = $id;
        return $arr_id;
    }

    public function no_link() {
        return '#';
    }

    public function domain_backlink() {
        $c = new Grocery_CRUD();

        $c->set_table('domain_backlink');
        $c->set_relation('domain', 'domain', 'domain');
        $c->set_relation('backlink', 'backlink', 'backlink');
        $c->change_field_type('indexed', 'enum', array('yes', 'No'));

        $this->output($c->render());
    }

    public function list_backlink() {
        $data['list_backlink'] = $this->m_backlink->list_backlink();
        $data['list_domain'] = $this->m_backlink->list_domain();
        $data['domain_backlink'] = $this->m_backlink->list_domain_backlink();
        $data['list_email'] = $this->m_backlink->list_email();
        $this->load->view('list_backlink', $data);
    }

    public function domain_backlink_insert() {
        $this->m_backlink->insert('domain_backlink', $this->input->post());
        print_r($this->input->post());
    }
    
    public function detail_backlinked(){
        $bl = $this->m_backlink->get_data_where('domain_backlink',array('id' => $this->input->post('backlinkedid')))->row();
        $html = '<ul>'
                . '<li class="list-group-item">Domain : ' . $bl->domain . '</li>'
                . '<li class="list-group-item">Backlink: ' . $bl->backlink . '</li>'
                . '<li class="list-group-item">url: ' . $bl->url . '</li>'
                . '<li class="list-group-item">email: ' . $bl->email . '</li>'
                . '<li class="list-group-item">username: ' . $bl->username . '</li>'
                . '<li class="list-group-item">password: ' . $bl->password . '</li>'
                . '<li class="list-group-item list-group-item-success">indexed: ' . $bl->indexed . '</li>'
                . '<li class="list-group-item">Keyword: ' . $bl->keyword . '</li>'
                . '</ul>';
        echo $html;
    }

}
