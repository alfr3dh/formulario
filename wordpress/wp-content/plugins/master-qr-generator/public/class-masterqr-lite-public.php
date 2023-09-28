<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sharabindu.com
 * @since     1.2.6
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/public
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */
class Master_QR_Lite_Public
{

    /**
     * The ID of this plugin.
     *
     * @since   1.2.6
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since   1.2.6
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since   1.2.6
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = plugin_basename(__FILE__);
        $this->version = $version;
        add_shortcode('masterqr-post', array(
            $this,
            'mastershortcode_atts'
        ));
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since   1.2.6
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Master_QR_Lite_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Master_QR_Lite_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since   1.2.6
     */
    public function enqueue_scripts()
    {
        if(!class_exists('masterqr')){
        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Master_QR_Lite_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Master_QR_Lite_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        global $wp;
        $current_id_link = home_url(add_query_arg(array() , $wp->request));

             $options = get_option('masterqr_settings');   
        $qrc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width']: 200;
        $dot_scale = isset($options['dot_scale']) ? $options['dot_scale'] : 0.5; 

        wp_enqueue_script($this->plugin_name, MASTER_QR_LITE_URL . 'public/js/qrcode.min.js', array(
            'jquery'
        ) , $this->version, true);

        wp_enqueue_script('master_qr', MASTER_QR_LITE_URL . 'public/js/master-qr.js', array(
            'jquery'
        ) , $this->version, true);


                $data = array(
            "linksas"=> $current_id_link,
            "scale"=> $dot_scale,
            "size"=> $qrc_size,
            "sizesd"=> $qrc_size,
        );

        wp_localize_script( 'master_qr', 'datas', $data );    

    }
    }

    /**
     * This function is display Qr code on frontend.
     */

    public function qcr_code_element($content)
    {
        if(!class_exists('masterqr')){
        $current_id = get_the_id();
        $current_id_link = get_the_permalink(get_the_id());
        $masterqr_meta_display = get_post_meta(get_the_ID(), 'masterqr_meta', true) ? get_post_meta(get_the_ID(), 'masterqr_meta', true) : 'no';
    $rand = rand(45475,34834);
        $qrc_qr_image = '';
        $post_types = get_post_types();
        $options = get_option('masterqr_settings');
$qrc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width']: 200;
        if (!empty($options))
        {
            $singlular_exclude = is_singular($options);
        }
        else
        {
            $singlular_exclude = '';
        }

        $qrc_alignment = isset($options['qrc_select_alignment'])? $options['qrc_select_alignment'] : 'left';


        if (($masterqr_meta_display == 'yes') or ($singlular_exclude)  or is_singular('product'))
        {     
            $content .= '';
        }
        else
        {
        
        $content .= '<div style="text-align:' . $qrc_alignment . '"><div  id="masteqr-post'.$rand.'" class="masteqr-post"  data-size="'.$qrc_size.'"></div></div>';
        }
        return $content;

    }
    }public function mastershortcode_atts($atts)
    {

    $rand = rand(45475,34834);
        $options = get_option('masterqr_settings');
$qrc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width']: 200;

        $qrc_alignment = isset($options['qrc_select_alignment'])? $options['qrc_select_alignment'] : 'left';
        
        $content = '<div style="text-align:' . $qrc_alignment . '"><div id="masteqr-post'.$rand.'" class="masteqr-post" data-size="'.$qrc_size.'"></div></div>';
    
        return $content;

    }
    

    /**
     * This function is Provide for Createing Woocomerce custom product tab for Qr Code
     */

    public function woomaster_custom_product_tabs($tabs)
    {
        if(!class_exists('masterqr')){
        $options = get_option('masterqr_settings');
        $master_wc_ptab_name = isset($options['master_wc_ptab_name']) ? $options['master_wc_ptab_name'] : __('Product QR','master-qr-generator');


        $tabs['master_pricing_tab'] = array(
            'title' => $master_wc_ptab_name,
            'priority' => 200,
            'callback' => array(
                $this,
                'master_qrc_tab_content'
            )
        );

        $masterqr_meta_display = get_post_meta(get_the_ID(), 'masterqr_meta', true) ? get_post_meta(get_the_ID(), 'masterqr_meta', true) : 'no';

        $options = get_option('masterqr_settings');
        if (!empty($options))
        {
            $singlular_wc_exclude = is_singular($options);
        }
        else
        {
            $singlular_wc_exclude = '';
        }

        if (($masterqr_meta_display == 'yes') or ($singlular_wc_exclude))
        {
            return false;
        }
        else
        {
            return $tabs;

        }

    }
    }

    /**
     *  Woocomerce custom product tab Call Back function
     */

    public function master_qrc_tab_content()
    {
        if(!class_exists('masterqr')){

        $rand = rand(45475,34834);
        $options = get_option('masterqr_settings');

        $qrc_wc_alignment = isset($options['qrc_wc_select_alignment'])? $options['qrc_wc_select_alignment'] : 'left';

        $qrc_wc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width']: 200;

        echo '<div style="text-align:' . $qrc_wc_alignment . '"><div id="masteqr-post'.$rand.'" class="masteqr-post" data-size="'.$qrc_wc_size.'"></div></div>';


        
    }
    }

}

