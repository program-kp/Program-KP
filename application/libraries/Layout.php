<?php

class Layout
{
    public $layout = 'template/main';
    protected $role;
    protected $ci;
    protected $menu_active;
    protected $sidebar;
    protected $css_files = [];
    protected $js_files = [];

    public function __construct($params = array())
    {
        $this->ci =& get_instance();
        if (isset($params['layout']))
            $this->layout = $params['layout'];
        if ($this->ci->session->has_userdata('role')) {
            $this->role = $this->ci->session->role;
        }
    }

    /**
     * Setting layout yang digunakan
     * @param [String] $layout [path to layout]
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * Set Menu Active = nama menu di layout
     * @param [type] $menu [description]
     */
    public function set_active_menu($menu)
    {
        $this->menu_active = $menu;
    }

    public function custom_side_bar($side_bar)
    {
        $this->role = "Custom";
        $this->sidebar = $side_bar;
    }

    public function add_css($files)
    {
        $this->css_files = array_merge($this->css_files, $files);
    }

    public function add_js($files)
    {
        $this->js_files = array_merge($this->js_files, $files);
    }

    /**
     * Render Layout
     * @param  String $view Path File View
     * @param  array $data array data untuk view
     * @param  array $dataLayout array data untuk layout
     */
    public function render($view, $data = array(), $dataLayout = array())
    {
        $content = $this->ci->load->view($view, $data, true);
        $dataLayout['active_menu'] = (isset($dataLayout['active_menu'])) ? $dataLayout['active_menu'] : $this->menu_active;
        $this->ci->load->view($this->layout, array_merge($dataLayout,
            array('content' => $content, 'role' => $this->role, 'sidebar' => $this->sidebar,'css'=>$this->css_files,'js'=>$this->js_files)));
    }

    public function renderPartial($view, $data = array())
    {
        $this->ci->load->view($view, $data);
    }
}