<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sharabindu.com
 * @since     1.2.6
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Master_QR_Lite
 * @subpackage Master_QR_Lite/admin
 * @author     Sharabindu Bakshi <sharabindu86@gmail.com>
 */


class Master_QR_Lite_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since   1.2.6
     * @access   private
     * @var      string    $qrc_option_page_options     option name.
     */
    private $qrc_option_page_options;

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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }


    /**
     * Register the stylesheets for the admin area.
     *
     * @since   1.2.6
     */
    public function enqueue_styles()
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
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style($this->plugin_name, MASTER_QR_LITE_URL . 'admin/css/masterqr-lite-admin.css', array() , $this->version, 'all');
        wp_enqueue_style("google-font", MASTER_QR_LITE_URL . 'admin/fonts/stylesheet.css', array() , $this->version, 'all');

    }
    }

    /**
     * Register the JavaScript for the admin area.
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
        wp_enqueue_script('wp-color-picker');


        wp_enqueue_script($this->plugin_name, MASTER_QR_LITE_URL . 'public/js/qrcode.min.js', array(
            'jquery'
        ) , $this->version, false);

        wp_enqueue_script("admin-js", MASTER_QR_LITE_URL . 'admin/js/admin.js', array(
            'jquery','wp-color-picker'
        ) , $this->version, true);

        wp_enqueue_script("jquery-bbq", MASTER_QR_LITE_URL . 'admin/js/jquery.bbq.min.js', array('jquery') , $this->version, true);

       $current_id_link = get_the_permalink(get_the_id());


             $options = get_option('masterqr_settings');   
        $qrc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width']: 200;
        $dot_scale = isset($options['dot_scale']) ? $options['dot_scale'] : 0.5; 

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
     * Setting link.
     *
     * @since   1.2.6
     */

    public function plugin_settings_link($links)
    {
        if(!class_exists('masterqr')){
        return array_merge(array(
            '<a href="' . admin_url('admin.php?page=masterqr') . '">' . __('Settings', 'master-qr-generator') . '</a>',
            '<a class="qr_pro_link" href="https://sharabindu.com/plugins/master-qr-generator/">' . __('Go Pro', 'master-qr-generator') . '</a>',
        ) , $links);

    }
    }


    /**
     * This function is Add Menu page call back function.
     */

    public function admin_menu_define()
    {
        if(!class_exists('masterqr')){
        $icon_url = MASTER_QR_LITE_URL . 'admin/img/admin-logo.png';

        add_menu_page(esc_html__('Master QR', 'master-qr-generator') , esc_html__('Master QR', 'master-qr-generator') , 'manage_options', 'masterqr', array(
            $this,
            'qrc_option_func'
        ) , $icon_url);

        add_submenu_page('masterqr', __('Print QR Code','master-qr-generator'), __('Print QR Code','master-qr-generator'), 'manage_options', 'masterqr_print', array(
            $this,
            'masterqr_print'
        ));

        add_submenu_page('masterqr',__('QR Code Downlaod','master-qr-generator'),__('QR Code Downlaod','master-qr-generator'), 'manage_options', 'masterqr_downlaod', array(
            $this,
            'masterqr_downlaod'
        ));
        add_submenu_page('masterqr', __('Why Upgade','master-qr-generator'),  __('Why Upgade','master-qr-generator'), 'manage_options', 'masterqr_update', array(
            $this,
            'masterqr_update'
        ));
        add_submenu_page('masterqr', __('Get Pro','master-qr-generator'),__('Get Pro','master-qr-generator'), 'manage_options', 'https://sharabindu.com/plugins/master-qr-generator/');

    }
    }
 function masterqr_update()
    {  
                $qrc_image_url = MASTER_QR_LITE_URL . 'admin/img/';

                require_once  MASTER_QR_LITE_PATH . 'admin/pro_features.php';
}
 function masterqr_downlaod()
    {
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'settings';

?>
     <div class="masterqrwrap">
         <div class="master_wp_admin">
             <ul class="master_nav_bar">
                 <li><a href="https://masterqr.sharabindu.com/qr-code-download/" target="_blank"><?php echo esc_html('Download Demo', 'master-qr-generator') ?></a></li>

                 <li><a href="https://masterqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html('Documentation', 'master-qr-generator') ?></a></li>
                <li><a href="https://sharabindu.com/plugins/master-qr-generator/" target="_blank"><?php echo esc_html('Get Pro', 'master-qr-generator') ?></a></li>
                <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'master-qr-generator') ?></a></li>
                 <li><a href="https://sharabindu.com/contact-us" target="_blank"><?php echo esc_html('Support', 'master-qr-generator') ?></a></li>
                 <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'master-qr-generator') ?></a></li>
             </ul>
             <ul  class="master_hdaer_cnt">
                 <li> <img src=" <?php echo MASTER_QR_LITE_URL . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                 <li  class="master_fd_cnt"> 
                     <h3><?php echo esc_html('Master QR Download (Premium)', 'master-qr-generator'); ?> </h3>
             <small><?php echo esc_html('This is the Premium Features for Master QR Generator Plugin', 'master-qr-generator') ?></small></li>
             </ul>

         </div>

      <div class="master_headrWrap">
              <div class="master_headrWrap_menu">
                 <ul>
                    <li class="selected">
                     <a href="?page=masterqr_downlaod&tab=settings" class="<?php echo esc_attr($active_tab) == 'settings' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Settings', 'master-qr-generator') ?></a>

                    </li>
                    <li>                      <a href="?page=masterqr_downlaod&tab=page" class=" <?php echo esc_attr($active_tab) == 'page' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Dowload Page', 'master-qr-generator') ?></a></li>
                 </ul>
              </div>
              <div class="master_headrWrap_box">
                <?php         echo '<div class="QRautodisplay">'.esc_html("The color, background, and logo images of these QR codes will come from the", "master-qr-generator"). '
        <a href="admin.php?page=masterqr">'.esc_html("current page settings","master-qr").'</a></div>'; ?>                
           <div id="master_headrWrap_djkfh">
           <?php
        if ($active_tab == 'settings')
        {

            do_settings_sections('masterqr_list_section');
        }
        else
        {
            do_settings_sections('masterqr_dowlist_section');
        }
    ?>  

                       
     </div>
   </div>
 </div>
</div>


<?php
    }

        function masterqr_print()
    {

        $this->masterqr_print_options = get_option('masterqr_print_option');

        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'masterqr_print_settings';

?>
     <div class="masterqrwrap">
         <div class="master_wp_admin">
             <ul class="master_nav_bar">
                 <li><a href="https://masterqr.sharabindu.com/qr-code-print/" target="_blank"><?php echo esc_html('Print Demo', 'master-qr-generator') ?></a></li>
                 <li><a href="https://masterqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'master-qr-generator') ?></a></li>
                <li><a href="https://sharabindu.com/plugins/master-qr-generator/" target="_blank"><?php echo esc_html('Get Pro', 'master-qr-generator') ?></a></li>
                 <li><a href="https://sharabindu.com/contact-us" target="_blank"><?php echo esc_html('Support', 'master-qr-generator') ?></a></li>
                 <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'master-qr-generator') ?></a></li>
            
             </ul>
             <ul  class="master_hdaer_cnt">
                 <li> <img src=" <?php echo MASTER_QR_LITE_URL . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                 <li  class="master_fd_cnt"> 
                     <h3><?php echo esc_html('Master QR Bulk Print (Premium)', 'master-qr-generator')?> </h3>
             <small><?php echo esc_html('This is the Premium Features for Master QR Generator Plugin', 'master-qr-generator') ?></small></li>
             </ul>

         </div>

      <div class="master_headrWrap">
              <div class="master_headrWrap_menu">
                 <ul>
                    <li class="selected">
                     <a href="?page=masterqr_print&tab=masterqr_print_settings" class="<?php echo esc_attr($active_tab) == 'masterqr_print_settings' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Print Settings', 'master-qr-generator') ?></a>

                    </li>
                    <li>                      <a href="?page=masterqr_print&tab=print_page" class=" <?php echo esc_attr($active_tab) == 'print_page' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Print Page', 'master-qr-generator') ?></a></li>
                 </ul>
              </div>
              <div class="master_headrWrap_box">

        <?php echo '<div class="QRautodisplay">'.esc_html("The color, background, and logo images of these QR codes will come from the", "master-qr-generator"). '<a href="admin.php?page=masterqr">'.esc_html("current page settings","master-qr-generator").'</a></div>'; ?>                
           <div id="master_headrWrap_djkfh">

            <?php
        if ($active_tab == 'masterqr_print_settings')
        {

            do_settings_sections('masterqr_print_setting');

        }
        else
        {
            do_settings_sections('masterqr_print_section');
        }
?>  


                       
     </div>
   </div>
 </div>
</div>


<?php
    }

    /**
     * This function is Register settings,add_settings_section and add_settings_field
     */

    public function qcr_settings_page()
    {
        if(!class_exists('masterqr')){
        register_setting("masterqr_settings", "masterqr_settings", array(
            $this,
            'master_option_page_sanitize'
        ));
        

        add_settings_section("master_section_setting", " ", array(
            $this,
            'settting_sec_func'
        ) , 'master_admin_sec');

        add_settings_field("master_code_size", esc_html__("QR Code Size", "master-qr-generator") , array(
            $this,
            "master_input_size"
        ) , 'master_admin_sec', "master_section_setting");

        add_settings_field("qr_checkbox", esc_html__("Exclude From Post type", "master-qr-generator") , array(
            $this,
            "qr_checkbox"
        ) , 'master_admin_sec', "master_section_setting");

        add_settings_field("master_qr_alignment", esc_html__("QR Alignment", "master-qr-generator") , array(
            $this,
            "master_qr_alignment"
        ) , 'master_admin_sec', "master_section_setting");

        add_settings_field("dot_scale", esc_html__("Dot Scale", "master-qr-generator") , array(
            $this,
            "dot_scale"
        ) , 'master_admin_sec', "master_section_setting");

        if (class_exists('WooCommerce'))
        {


            add_settings_field("master_wc_ptab_name", esc_html__("Customize Text in Product Page", "master-qr-generator") ,array($this , "master_wc_ptab_name"), 'master_admin_sec', "master_section_setting");

        }

        add_settings_field("qr_stcode_management", esc_html__("Shortcode for Current Page URL", "master-qr-generator") ,array($this , "qr_stcode_management"), 'master_admin_sec', "master_section_setting");
        add_settings_field("master_qr_color_management", esc_html__("Color (Pro)", "master-qr-generator") , array(
            $this,
            "master_qr_color_management"
        ) , 'master_admin_sec', "master_section_setting");


        add_settings_field("qr_prev_management", esc_html__("Image Upload (Pro)", "master-qr-generator") , array(
            $this,
            "qr_prev_management"
        ) , 'master_admin_sec', "master_section_setting");




    }
    }

    /**
     * This function is a callback function of  add seeting section
     */

    public function settting_sec_func()
    {

    echo '<div class="QRautodisplay">'.esc_html("These QR codes are automatically displayed after the content is based on the type of post", "master-qr-generator").'</div>';
    }

    function qr_stcode_management()
    {

        printf('<input type="text"  value="[masterqr-post]" disabled class="shortcodeurlsdmasretr">');

    }

    function master_wc_ptab_name()
    {

        $options = get_option('masterqr_settings');
        $master_wc_ptab_name = isset($options['master_wc_ptab_name']) ? $options['master_wc_ptab_name'] : 'Product QR';

        printf('<input type="text" name="masterqr_settings[master_wc_ptab_name]" value="%s" placeholder="e:g:Product QR">', $master_wc_ptab_name); 

    }



    /**
       * This function is a callback function of  add seeting field
       */

      function dot_scale()
      {

          $options = get_option('masterqr_settings');

          $dot_scale = isset($options['dot_scale']) ? $options['dot_scale'] : 0.6;
          $placeholder = esc_html('Dot Scale Patterns. Ranges: 0.4 -0.8', 'master-qr-generator');

          printf('<input type="number" id="qwe_sizw" name="masterqr_settings[dot_scale]"   value="%s" placeholder="0.6" min="0.4" max="0.8" step="0.1">
              <p class="qrc_description">%s</p>', $dot_scale, $placeholder);

      }
    /**
     * This function is a callback function of  add seeting field
     */

    public function master_input_size()
    {

        $options = get_option('masterqr_settings');
        $options_value = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width'] : 200;
        $placeholder = esc_html__('Input a square value, Default:200 ', 'master-qr-generator');

        printf('<input type="text" name="masterqr_settings[qr_code_picture_size_width]" class="regular-text"  value="%s" placeholder="200">
            <p class="description">%s</p>', $options_value, $placeholder);

    }

    /**
     * This function is a callback function of  add seeting field
     */

    public function qr_checkbox()
    {

         $args = array(
                'public' => true,
            );

        $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','wp_template','wp_template_part','wp_navigation','wp_global_styles','shop_order_placehold');
    $types = get_post_types( $args);
    $post_types = array_diff($types, $excluded_posttypes);

        foreach ($post_types as $post_type)
        {

            $options = $this->qrc_option_page_options;

            $checked = isset($options[$post_type]) ? 'checked' : '';

            printf('<input type="checkbox" id="%s" class="master-apple-switch" value="%s" name="masterqr_settings[%s]" %s>
                        <label for ="%s" id="qr-label-wrap"><strong>' . ucfirst($post_type) . '</strong></label></br>', $post_type, $post_type, $post_type, $checked, $post_type);

        }

    }

    /**
     * This function is a callback function of  add seeting field
     */

    public function master_qr_alignment()
    {

        $options = $this->qrc_option_page_options;
        $qrc_alignment = isset($options['qrc_select_alignment']) ? $options['qrc_select_alignment'] : 'left';

        $qrc_wc_alignment = isset($options['qrc_wc_select_alignment']) ? $options['qrc_wc_select_alignment'] : 'left';

    ?>
                <select name="masterqr_settings[qrc_select_alignment]">
                    
                <option value="left" <?php echo esc_attr($qrc_alignment) == 'left' ? 'selected' : '' ?>><?php esc_html_e('Left', 'master-qr-generator'); ?></option>
                <option value="right" <?php echo esc_attr($qrc_alignment) == 'right' ? 'selected' : '' ?>><?php esc_html_e('Right', 'master-qr-generator'); ?></option>   
                <option value="center" <?php echo esc_attr($qrc_alignment) == 'center' ? 'selected' : '' ?>><?php esc_html_e('Center', 'master-qr-generator'); ?></option>

                </select>
        <?php if(class_exists("WooCommerce")){ ?>

            <strong><label><?php esc_html_e('QR Alignment(Product Page) ', 'master-qr-generator') ?> </label></strong>
            <select name="masterqr_settings[qrc_wc_select_alignment]">
                
            <option value="left" <?php echo esc_attr($qrc_wc_alignment) == 'left' ? 'selected' : '' ?>><?php esc_html_e('Left', 'master-qr-generator'); ?></option>
            <option value="right" <?php echo esc_attr($qrc_wc_alignment) == 'right' ? 'selected' : '' ?>><?php esc_html_e('Right', 'master-qr-generator'); ?></option>    
            <option value="center" <?php echo esc_attr($qrc_wc_alignment) == 'center' ? 'selected' : '' ?>><?php esc_html_e('Center', 'master-qr-generator'); ?></option>

            </select>

    <?php

        }

    }



        /**
         *  Qr admin Preview field
         */
    public function qr_prev_management(){

         printf('<ul class="master_pro_label_wrap" ><li><strong><label>Logo </label></strong><input type="text" disabled  value="Upload" ></li>');

         printf( '<li style="margin-left: 18px;"><strong><label>Background Image</label></strong><input type="text" disabled  value="Upload" ></li><ul>');





         }
     /**
      *  Qr Color field
      */

    public function master_qr_color_management(){

        printf( '<ul class="master_pro_label_wrap" ><li><strong><label>QR Color</label></strong><input type="text" value="#1919a8" class="qrc-color-picker" ><a class="master_qrc_pro master_lgfg"  href="https://sharabindu.com/plugins/master-qr-generator/">Premium</a></li>');

        printf( '<li><strong><label>Eye Color</label></strong><input type="text" value="#aa5b71" class="qrc-color-picker" ><a class="master_qrc_pro master_lgfg"  href="https://sharabindu.com/plugins/master-qr-generator/">Premium</a></li>');

          printf( '<li><strong><label>Eye Border</label></strong><input type="text" value="#d86931" class="qrc-color-picker" ><a class="master_qrc_pro master_lgfg"  href="https://sharabindu.com/plugins/master-qr-generator/">Premium</a></li>');

        printf( '<li><strong><label>Background Color</label></strong><input type="text" value="#fff8dc" class="qrc-color-picker" ><a class="master_qrc_pro master_lgfg"  href="https://sharabindu.com/plugins/master-qr-generator/">Premium</a></li></ul>');    
     }




    /**
     * admin form field validation
     */

    public function master_option_page_sanitize($input)
    {
        $sanitary_values = array();
        if (isset($input['qr_code_picture_size_width']))
        {
            $sanitary_values['qr_code_picture_size_width'] = sanitize_text_field($input['qr_code_picture_size_width']);
        }
        if (isset($input['dot_scale']))
        {
            $sanitary_values['dot_scale'] = sanitize_text_field($input['dot_scale']);
        }
        if (isset($input['master_wc_ptab_name']))
        {
            $sanitary_values['master_wc_ptab_name'] = sanitize_text_field($input['master_wc_ptab_name']);
        }

        if (isset($input['qrc_select_alignment']))
        {
            $sanitary_values['qrc_select_alignment'] = $input['qrc_select_alignment'];
        }

        if (isset($input['qrc_wc_select_alignment']))
        {
            $sanitary_values['qrc_wc_select_alignment'] = $input['qrc_wc_select_alignment'];
        }

        $post_types = get_post_types();

        foreach ($post_types as $post_type)
        {

            if (isset($input[$post_type]))
            {
                $sanitary_values[$post_type] = $input[$post_type];
            }
        }

        return $sanitary_values;
    }

    /**
     * Qrc Optin page admin form
     */

    public function qrc_option_func()
    {
        if(!class_exists('masterqr')){
        $this->qrc_option_page_options = get_option('masterqr_settings');
        $qrc_image_url = MASTER_QR_LITE_URL . 'admin/img/';
        $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'qrc__settings';

        settings_errors();
    ?>
 
    <?php  ?>  
       
         <div class="masterqrwrap">
             <div class="master_wp_admin">
                 <ul class="master_nav_bar">
                    <li><a href="https://masterqr.sharabindu.com/"  target="_blank"><?php echo esc_html__('Pro Demo', 'master-qr-generator') ?></a>
                    </li>
                 <li><a href="https://sharabindu.com/plugins/master-qr-generator/" target="_blank"><?php echo esc_html('Get Pro', 'master-qr-generator') ?></a></li>
                     <li><a href="https://masterqr.sharabindu.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'master-qr-generator') ?></a></li>

                     <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'master-qr-generator') ?></a></li>
                     <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'master-qr-generator') ?></a></li>
                 </ul>
                 <ul  class="master_hdaer_cnt">
                     <li> <img src=" <?php echo MASTER_QR_LITE_URL . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                     <li  class="master_fd_cnt"> 
                         <h3><?php echo esc_html('Master QR Generator', 'master-qr-generator') . ' ' . MASTER_QR_LITE_VERSION; ?> </h3>
                 <small><?php echo esc_html('The Most Styling QR Code Generated Automatically', 'master-qr-generator') ?></small></li>
                 </ul>

             </div>

          <div class="master_headrWrap">
                    <ul class="qrc_tab_dwn at-tabs-when-possible bbq clearfix at-accordion-or-tabs at-tabs ">
                        <li class="selected">
                         <a href="?page=masterqr&tab=qrc__settings" class="<?php echo $active_tab == 'qrc__settings' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Current Page QR', 'master-qr-generator') ?></a>
                     <section>

                <form method="post" action="options.php">
                      <div class="master_md-8">
                
                           <?php

                  
                        settings_fields("masterqr_settings");

                        do_settings_sections('master_admin_sec');

                        submit_button(); ?>
                        </div>
                        </form>
                             <div class="master_md-4">
                             <div style="float:none;clear:both">
                        <div class="master_ftcs_cont">
                            <h4 class="master_ftcs__h"><?php echo esc_html__('Upgrade to Premium', 'master-qr-generator') ?>
                        </h4>


                        <ul> <li><?php echo esc_html__(' QR Color, Background Color', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__(' QR Eye & Position Color', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Logo / Image Upload', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Add Logo for different Post type', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Background Image Upload', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Shortcode (Attribute Supported)', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Widget supported', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Elementor pagebuilder supported', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('QR Bulk Print for frontend & backend', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('QR Download  for frontend & backend', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Custom Link or Text QR Generator', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Google map Location QR Generator', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Whatsapp chat QR', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('Wifi Access QR Generator', 'master-qr-generator') ?></li>
                            <li><?php echo esc_html__('vCard QR Generator', 'master-qr-generator') ?></li>

                            <li><?php echo esc_html__('Premium Support and Many More', 'master-qr-generator') ?></li>
                         
                        </ul>

                         
                         <h4 class="master_ftcs__h"><?php echo esc_html__('Premium QR Code &#8681;', 'master-qr-generator') ?></h4>
                             <img  src="<?php echo esc_attr( $qrc_image_url .'image-8.png') ; ?>" alt="Pro Features"> 

                             <a class="master_gtnow " href="https://sharabindu.com/plugins/master-qr-generator/"><?php echo esc_html__('Get Premium', 'master-qr-generator') ?></a>  
                        </div>

                         
                              
                             </div>
                         </div>


            </section>
            </li>

            <li><a><?php echo esc_html__('Shortcode Settings (Pro)', 'master-qr-generator') ?></a>
                <section>

        <p class="pfetrs"><?php echo esc_html__('This is a premium feature of this plugin, you can create custom links, text, wifi, whatsapp, maps and qr codes for vCard. The special feature is that it is displayed through shortcodes and each shortcode has attribute so that you can create multiple shortcodes for different content', 'master-qr-generator') ?>. <a href="https://masterqr.sharabindu.com/short-code/"><?php echo esc_html__('View Live demo', 'master-qr-generator') ?></a></p>

                <img src=" <?php echo esc_url($qrc_image_url . 'customqr.png'); ?>" alt="">
                </section>
            </li>  
            <li><a><?php echo esc_html__('Add Logo for Post Type(Pro)', 'master-qr-generator') ?></a>
                <section> <p class="pfetrs"><?php echo esc_html__('With these settings, you can set the logo based on the post type. So you can manage the brand logo and increase the brand value by the QR code. Go to the “Add logo for post type” tab and click the Insert Image button and select the image and then save. ', 'master-qr-generator') ?> <a href="https://masterqr.sharabindu.com/logo-for-different-post-type/"><?php echo esc_html__('View Live demo', 'master-qr-generator') ?></a></p>
                <img src=" <?php echo esc_url($qrc_image_url . 'POSTTYPELOGO.png'); ?>" alt="">
                </section>
            </li> 

                     </ul>
                  </div>
                 <?php
             }
             }

    /**
     *  metabox function
     */

    public function qcr_metabox_page()
    {
        if(!class_exists('masterqr')){
            $args = array(
                'public' => true,
            );

        $excluded_posttypes = array('attachment','revision','nav_menu_item','custom_css','customize_changeset','oembed_cache','user_request','wp_block','scheduled-action','product_variation','shop_order','shop_order_refund','shop_coupon','elementor_library','e-landing-page','wp_template','wp_template_part','wp_navigation','wp_global_styles','shop_order_placehold');
    $types = get_post_types( $args);
    $post_types = array_diff($types, $excluded_posttypes);
        add_meta_box('masterqr_metabox', esc_html__('Master QR Generator', 'master-qr-generator') , array(
            $this,
            'masterqr_metabox_func'
        ) , array(
            $post_types
        ));

    }
    }

    /**
     * This is call back function of add_meta_box
     */

    public function masterqr_metabox_func($post)
    {
        if(!class_exists('masterqr')){
        $qrc_meta_check_info = get_post_meta($post->ID, 'masterqr_meta', true) ? get_post_meta($post->ID, 'masterqr_meta', true) : 'no';

        $options = get_option('masterqr_settings');


        $current_title = get_the_title(get_the_id());
        $current_id_link = get_the_permalink(get_the_id());

        $qrc_size = isset($options['qr_code_picture_size_width']) ? $options['qr_code_picture_size_width']: 200;

        $dot_scale = isset($options['dot_scale']) ? $options['dot_scale'] : 0.5; 

        $qr_download = '<a id="downloadbuton2" download="' . $current_title . '.png" class="button button-secondary" style="width:'.$qrc_size.'px">Download QR
            </a>';
        $rand = rand(34343,56766);
    ?>
    <ul  class="master_metaoutput_wrap">
        <li>
        <label for="checkbox_3" class="checkbox_qr_3"><strong><?php esc_html_e('Disable QR?', 'master-qr-generator') ?> </strong></label>
        </li><li>
        <select name="master_select_field" class="mqr_selct_admin">
            
        <option value="no" <?php echo esc_attr($qrc_meta_check_info) == 'no' ? 'selected' : '' ?>><?php esc_html_e('No', 'master-qr-generator'); ?></option>
        <option value="yes" <?php echo esc_attr($qrc_meta_check_info) == 'yes' ? 'selected' : '' ?>><?php esc_html_e('Yes', 'master-qr-generator'); ?></option>

        </select>
        </li>

        <li class="mast_mta_bx">
        <?php

        echo '<div><div id="masteqr-post'.$rand.'" class="masteqr-post" data-size="'.$qrc_size.'"></div>'.$qr_download.'</div>';


        //return masterqrlite_metaboxs($current_id_link,$qrc_size,$dot_scale,$qr_download);


    
    
    }
    }

    /**
     * This function save meta data
     */

    public function qrc_save_post_meta($post_id)
    {
        if(!class_exists('masterqr')){
        if (array_key_exists('master_select_field', $_POST))
        {

            update_post_meta($post_id, 'masterqr_meta', sanitize_text_field($_POST['master_select_field']));
        }

    }
    }



    public function adminFooterTextQR(){
        if(!class_exists('masterqr')){
          if (isset($_GET['page']) && strpos($_GET['page'], MASTER_QR_LITE_PLUGIN_ID) !== false) {

      ?>

         <div id="footer_contaciner" role="contentinfo">
                 <p id="qr_plg_id"><?php echo esc_html__('Thank you for using','master-qr-generator') ?> <strong><?php echo esc_html__('Master QR Generator','master-qr-generator') ?></strong> <span class="dashicons dashicons-smiley"></span> &nbsp;&nbsp;
                  <?php echo esc_html__('Please rate on','master-qr-generator') ?> <a class="Master_QR_Lite_dash_strat" href="https://wordpress.org/support/plugin/master-qr-generator/reviews/" target="_blank" rel="noopener noreferrer"><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i><i class="dashicons dashicons-star-filled"></i></a> <a href="https://wordpress.org/support/plugin/master-qr-generator/reviews/" target="_blank" rel="noopener noreferrer"><?php echo esc_html__('WordPress.org','master-qr-generator') ?></a> <?php echo esc_html__('to help us spread the word!  ','master-qr-generator') ?></p>
    
             <div class="clear"></div>
         </div>
     <?php
     }
     }  
     }  
}

