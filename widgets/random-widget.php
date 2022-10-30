<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Currency Widget.
 *
 * Elementor widget that uses the currency control.
 *
 * @since 1.0.0
 */
class Random_Elementor_Widget extends \Elementor\Widget_Base

{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_enqueue_style('techiepress-menu-btrcss', plugin_dir_url(__FILE__) . '../assets/css/bootstrap.min.css');
        wp_enqueue_style('techiepress-menu-css', plugin_dir_url(__FILE__) . '../assets/css/menu.css');

        wp_enqueue_script('techiepress-menu-btrjs', plugin_dir_url(__FILE__) . '../assets/js/bootstrap.min.js', array('jquery'));
        wp_enqueue_script('techiepress-menu-js', plugin_dir_url(__FILE__) . '../assets/js/menu.js', array('jquery'));

    }

    /**
     * Get widget name.
     *
     * Retrieve currency widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'Random Widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Random widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Random Widget', 'elemrandom');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Random widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the currency widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['basic'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the currency widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['Hamburger', 'Menu'];
    }

    /**
     * Register Random widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {
        // start basic section
        $this->start_controls_section(
            'menu_section',
            [
                'label' => esc_html__('Contents', 'elementor-currency-control'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'menu_select',
            [
                'label' => esc_html__('Select Menu', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'solid' => esc_html__('Solid', 'textdomain'),
                    'dashed' => esc_html__('Dashed', 'textdomain'),
                    'dotted' => esc_html__('Dotted', 'textdomain'),
                    'double' => esc_html__('Double', 'textdomain'),
                    'none' => esc_html__('None', 'textdomain'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .your-class' => 'border-style: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    public function get_style_depends()
    {
        return ['techiepress-menu-css'];
    }

    public function get_script_depends()
    {
        return ['techiepress-menu-js'];
    }

    /**
     * Render currency widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        require_once PLUGIN_DIR . '/widgets/menu-html-parts.php';
    }
}