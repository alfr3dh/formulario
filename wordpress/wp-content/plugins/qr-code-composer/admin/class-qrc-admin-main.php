<?php


class QRCAdminMain{


	public function __construct()
	{
		add_action( 'admin_menu', array($this, 'admin_menu_define' ));	
	}

/**
 * This function is Add Menu page call back function.
 */

public function admin_menu_define()
{

    $icon_url = QRC_COMPOSER_URL . 'admin/img/mini.png';

    add_menu_page(esc_html__('QRC Composer', 'qr-code-composer') , esc_html__('QRC Composer', 'qr-code-composer') , 'manage_options', 'qr_composer', array(
        $this,
        'qrc_option_func'
    ) , $icon_url);


    add_submenu_page('qr_composer', esc_html__('Bulk Print', 'qr-code-composer'), '<span class="qrc_print_qr_menu"> '.esc_html__('Bulk Print(PRO)', 'qr-code-composer').'</span>', 'manage_options', 'qrc_print_pdf', array(
        $this,
        'qrc_print_pdf'
    ));

    add_submenu_page('qr_composer', esc_html__(' Download QR', 'qr-code-composer'), '<span class="qrc_down_qr_menu">'.esc_html__('Download All QR (PRO)', 'qr-code-composer').'</span>', 'manage_options', 'qrc_list_view', array(
        $this,
        'qrc_list_view'
    ));
    add_submenu_page( 'qr_composer', esc_html__('Get Pro', 'qr-code-composer') , esc_html__('Premium Features!', 'qr-code-composer') , 'manage_options', admin_url('/').'admin.php?page=qr_composer#tab7');


}
/**
 * This function is Qr Code Composer Pro Features Field
 */

function qrc_pro_func(){ 


}

    function qrc_list_view(){ 

         $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'qrc_list_setting';

          ?>
                <div class="qrcodewrap">
                  <div class="qr_wp_admin">
                      <ul class="qrc_nav_bar">
                          <li><a href="https://qrcode-composer.dipashi.com/qr-code-download/" target="_blank"><?php echo esc_html('Live demo', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/plugins/qr-code-composer/" target="_blank"><?php echo esc_html('Buy Premium', 'qr-code-composer') ?></a></li>
                          <li><a href="https://qrcode-composer.dipashi.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo QRC_COMPOSER_URL . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                          <li  class="qrc_fd_cnt"> 
                              <h3><?php echo esc_html('Download QR code from one page', 'qr-code-composer')?> </h3>
                      <small><?php echo esc_html('Download all Post type QR Codes from One Page', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_menu">
                          <ul>
                             <li class="selected">
                              <a href="?page=qrc_list_view&tab=qrc_list_setting" class="<?php echo $active_tab == 'qrc_list_setting' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Download  Settings', 'qr-code-composer') ?></a>

                             </li>
                             <li><a href="?page=qrc_list_view&tab=qrc_list_page" class=" <?php echo $active_tab == 'qrc_list_page' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Download Page', 'qr-code-composer') ?></a></li>
         
                          </ul>
                       </div>
                       <div class="tirmoof_box">
                                         
                    <div id="tirmoof_djkfh">

                    <?php
            
              if ($active_tab == 'qrc_list_setting')
              {
                 settings_fields("qrc_list_view_option");

                 do_settings_sections('qrc_list_setting');
              }
              else
              { ?>
    
            <div class="qrc_print_pro_demo"  style="background:url(<?php echo esc_attr( QRC_COMPOSER_URL .'/admin/img/downlad-min.png') ; ?>);min-height:2427px;width:100%;height:100%"></div> 
              <?php
          }
          ?>  

                                
              </div>
            </div>
          </div>
         </div>

         <?php

     }


function qrc_print_pdf()
{
         $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'qrc_print_setting';
     ?>
                <div class="qrcodewrap">
                  <div class="qr_wp_admin">
                      <ul class="qrc_nav_bar">
                          <li><a href="https://qrcode-composer.dipashi.com/qr-code-print-demo/" target="_blank"><?php echo esc_html('Bulk Print demo', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/qr-code-composer/" target="_blank"><?php echo esc_html('Buy premium', 'qr-code-composer') ?></a></li>
                          <li><a href="https://qrcode-composer.dipashi.com/docs/introduction/" target="_blank"><?php echo esc_html('Docs', 'qr-code-composer') ?></a></li>

                          <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                          <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                      </ul>
                      <ul  class="qrc_hdaer_cnt">
                          <li> <img src=" <?php echo QRC_COMPOSER_URL . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                              <li  class="qrc_fd_cnt"> 
                                  <h3><?php echo esc_html('QR Code Bulk Print', 'qr-code-composer');?> </h3>
                          <small><?php echo esc_html('Print QR Code In Bulk Qty based on Post type', 'qr-code-composer') ?></small></li>
                      </ul>

                  </div>

               <div class="tirmoof">
                       <div class="tirmoof_menu">
                          <ul>
                             <li class="selected">
                              <a href="?page=qrc_print_pdf&tab=qrc_print_setting" class="<?php echo $active_tab == 'qrc_print_setting' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Print Settings', 'qr-code-composer') ?></a>

                             </li>
                             <li>                      <a href="?page=qrc_print_pdf&tab=qrc_print_page" class=" <?php echo $active_tab == 'qrc_print_page' ? 'selected-active' : ''; ?>"><?php echo esc_html__('Print Page', 'qr-code-composer') ?></a></li>
       
                          </ul>
                       </div>
                       <div class="tirmoof_box">
                                         
                    <div id="tirmoof_djkfh">

                    <?php
              
              if ($active_tab == 'qrc_print_setting')
              {
                 settings_fields("qrc_print_option");

                 do_settings_sections('qrc_print_setting');

              }
              else
              {
        ?>
        <div class="qrc_print_pro_demo"  style="background:url(<?php echo esc_attr( QRC_COMPOSER_URL .'/admin/img/print-page-min.png') ; ?>);min-height: 685px;width:100%"></div> 
        <?php
              }
          ?>  

                                
              </div>
            </div>
          </div>
         </div>

         <?php
          }


     public function qrc_option_func()
     {
         $options = get_option('qr-code-composer_settings');
    $options_value = isset($options['qr_download_text']) ? $options['qr_download_text'] : 'Download QR';
    $valuebg = (isset($options['qr_dwnbtnbg_color'])) ? $options['qr_dwnbtnbg_color'] : '#c8fd8c';
    $value = (isset($options['qr_dwnbtn_color'])) ? $options['qr_dwnbtn_color'] : '#000';
        ?>
         <div class="qrcodewrap">
             <div class="qr_wp_admin">
                 <ul class="qrc_nav_bar">
                     <li><a href="https://sharabindu.com/plugins/qr-code-composer/" target="_blank"><?php echo esc_html('Buy Premium', 'qr-code-composer') ?></a></li>
                     <li><a href="https://qrcode-composer.dipashi.com/docs/introduction/" target="_blank"><?php echo esc_html('Documentation', 'qr-code-composer') ?></a></li>

                     <li><a href="https://sharabindu.com/contact-us/" target="_blank"><?php echo esc_html('Support', 'qr-code-composer') ?></a></li>
                     <li><a href="https://sharabindu.com/plugins/" target="_blank"><?php echo esc_html('More Plugin', 'qr-code-composer') ?></a></li>
                 </ul>
                 <ul  class="qrc_hdaer_cnt">
                     <li> <img src=" <?php echo QRC_COMPOSER_URL . '/admin/img/logo.png' ?>" alt="qr logo"></li>

                     <li  class="qrc_fd_cnt"> 
                         <h3><?php echo esc_html('QR Code Composer -', 'qr-code-composer') . ' ' . QRC_COMPOSER_VERSION; ?> </h3>
                 <small><?php echo esc_html('Boost the sales of products & services', 'qr-code-composer') ?></small></li>
                 </ul>

             </div>
<div class="tab-nav">
  <ul>
    <li class="active"><a href="#tab1"><?php echo esc_html("Design QR code", "qr-code-composer") ?></a></li>
    <li><a href="#tab2"><?php echo esc_html("Auto Generate QR Code", "qr-code-composer") ?></a></li>
    <li><a href="#tab3"><?php echo esc_html("Custom QR  (PRO)", "qr-code-composer") ?></a></li>
    <li><a href="#tab4"><?php echo esc_html("vCard QR Code", "qr-code-composer") ?></a></li>
    <li><a href="#tab5"><?php echo esc_html("Integration", "qr-code-composer") ?></a></li>
    <li><a href="#tab6"><?php echo esc_html("Shortcode Attribute (PRO)", "qr-code-composer") ?></a></li>
    <li><a href="#tab7"><?php echo esc_html("Premium features", "qr-code-composer") ?></a></li>
  </ul> <!-- END tabs-nav -->
</div>
  <div class="tab-content">

    <div  class="tab1-tab active">
        <form method="post" action="options.php" class="qrcdesings" >
            <div class="desingwrapper">
            <div class="leftside">

                    <input type="hidden" name="qr-code-composer_settings[render]" value="image" id="render">
                        <input type="hidden" name="qr-code-composer_settings[size]" value="700" id="size">
                        <input type="hidden" name="qr-code-composer_settings[text]" value="http://localhost/yoobar/hello-world/" id="text">
    
            <?php              
            settings_fields("qrc_composer_settings");
             do_settings_sections('qrc_design_sec'); ?>
             <div class="qrcsubmits">
             <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
         </div>
         </div>
         <div class="rightside">
         <div class="qrc_prev_manage">

            <div id="qrccomsposerprview" class="qrc_canvas"></div> 
        <div>
       <a class="qrdemodownload">
           <button type="button" style="color:<?php echo $value;?>;background:<?php echo $valuebg;?>;font-weight: 600;border: 1px solid transparent;padding: 6px 0;margin-top: 5px;" id="result"><?php echo $options_value; ?></button>
           </a>
</div>
        </div>    

         </div>
         </div>
    </div>
    <div  class="tab2-tab">
        <div id="dynamic-qr">
<div class="qrc_wrap-md-8">
  <?php              
           
             do_settings_sections('qrc_admin_sec'); ?>
         </div>
<div class="qrc_wrap-md-4">
             <div style="float: none; clear: both;    margin-top: 13%;">
                     <div class="qrc_pro_ftcs_cont" style="margin-top:40px">
                     <h4 class="pro_ftcs__h"><?php echo esc_html__('Benefits of a QR Code Logo', 'qr-code-composer') ?></h4>
                     <img style="box-shadow: 2px 2px 11px 2px #9f9f9f;" src="<?php echo QRC_COMPOSER_URL . '/admin/img/premd.png' ?>" alt="Pro Features">

                      <ul>

                         <li><?php echo esc_html__('Boost Website Traffic', 'qr-code-composer') ?></li>
                        <li><?php echo esc_html__('Serve as an element of your company\'s advertising', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Create a Social Proof', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Draw Customers to Your Brand', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Consumers easily jump to your brand ', 'qr-code-composer') ?></li>
                     </ul>
                     <a class="qrc_gtnow" href="https://sharabindu.com/plugins/qr-code-composer/"><?php echo esc_html__('Get Premium', 'qr-code-composer') ?></a>
                 </div>

                 <div class="qrc_pro_ftcs_cont">
                     <h4 class="pro_ftcs__h"><?php echo esc_html__('Why Upgrade the premium version?', 'qr-code-composer') ?></h4>
                    <ul><li><?php echo esc_html__('Colorful QR Code', 'qr-code-composer') ?></li>
                        <li><?php echo esc_html__('Facility to add background color', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Logo image Upload', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('QR Code For Custom Text/Custom Link/Number', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Generate vCard QR Code', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Bulk vCard QR code generation', 'qr-code-composer') ?></li>

                         <li><?php echo esc_html__('QR code for Google Maps', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('QR code for Whatsapp', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Wifi Access QR', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('QR code for Event', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Widget API for QR code', 'qr-code-composer') ?></li>

                         <li><?php echo esc_html__('Shortcode with Attribute Supported', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Bulk Print QR code Images', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Downloads All QR form one page', 'qr-code-composer') ?></li>
                         <li><?php echo esc_html__('Elementor Addon', 'qr-code-composer') ?></li>

              
                     </ul>
                 </div>

             </div>
         </div> 
</div>

             <div class="qrcsubmits">
             <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcs_desingcrt"></span></button>
         <span class="qrcsdhicr_dsigns"></span>
        </div>
</form>
    </div>

    <div  class="tab3-tab">

         <?php  

            settings_fields("qrc_custom_link_generator");
             do_settings_sections('qrc_logo_admin_sec');
         ?>     
    </div>
    <div  class="tab4-tab">
        <div id="dynamic-qr">
            
        <div class="qrc_wrap-md-8">
        <form method="post" action="options.php" class="qrcpro_vacradsubmits" >              

         <?php  

             settings_fields("qrc_vcard_generator");
             do_settings_sections('qrc_vacrd_admin_sec');
         ?>                <div class="qrcsubmits">
           <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcvcard_sdhi"></span></button>
           <span class="qrcvcard_djkfhjhj"></span>    </div>
         </form>
         </div>
<div class="qrc_wrap-md-4">
             <div style="float: none; clear: both;    margin-top: 13%;">
                 <div class="qrc_pro_ftcs_cont">
                     <h4 class="pro_ftcs__h">vCard Premium</h4>

                     <ul><li>Metabox option based on post type</li>
                        <li>Display metabox vcard automatically after the content</li>
                         <li>Craete dynamic shortcode for each vcard</li>
                         <li>vcard color &amp; backhround</li>
                         <li>Download Vcard from matabox</li>
                         <li>Download vacrd from frontend</li>
                         <li>WordPress default &amp; Custom post type supported</li>
                         <li>Image/logo upload</li>
                
                     </ul>

                     <a class="qrc_gtnow" href="https://qrcode-composer.dipashi.com/card/elizabeth-i-brown/">Metabox Demo</a>
                 </div>
                     <div class="qrc_pro_ftcs_cont" style="margin-top:40px">
                     <h4 class="pro_ftcs__h">Benefits of vCard for Post type based</h4>
                     <img src="<?php echo QRC_COMPOSER_URL . '/admin/img/vcard.png' ?>" alt="Pro Features">

                     <ul>
                         <li>Can generate Bulk vCard </li>
                         <li>Custom Post type Support</li>
                         <li>Generate with a single  Post/page/product/custom post </li>
                         <li>Display Automatically</li>
                         <li>Dynamic Shortcode</li>
                         <li>Can Easily manage with customer/employee</li>
                         <li>Can Smooth handle with card management</li>
                         <li>Draw Customers to Your Brand</li>
                     </ul>
                 </div>
             </div>
         </div>         
    </div>
            </div>
    <div  class="tab5-tab">

        <form method="post" action="options.php" class="qrcpro_integration">              

         <?php  

             settings_fields("qrc_admin_integrate");
             do_settings_sections('qrc_admin_integrate_sec');
         ?>
 

  <div class="qrcsubmits">
                  <button type ="submit" id="osiudi" class="button button-primary"><?php echo esc_html('Save Changes','qr-code-composer') ?> <span class="qrcintegrates"></span></button>
         <span class="qrcintegrates_djkfhjhj"></span>
            </div>



         </form>
    </div>
    <div  class="tab6-tab">
         <?php  

             settings_fields("qrc_shortcode_docs");
             do_settings_sections('qrc_docs_admin_shortcode');
         ?>            

    </div>
    <div  class="tab7-tab">
         <?php 
    $qrc_image_url = QRC_COMPOSER_URL . 'admin/img/'; 
    require_once QRC_COMPOSER_PATH . 'admin/pro_features.php';
             
         ?>            

    </div>
  </div> <!-- END tabs-content -->
        <div class="qrcProsoComosebox">
         
                                
         </div>
     </div>


    <?php
     }


}
if(class_exists('QRCAdminMain')){

	new QRCAdminMain();
}