<?php
/**
 * The file that defines the bulk qrc_download admin area
 *
 * -facing side of the site and the admin area.
 *
 * @link       https://sharabindu.com
 * @since      3.2.7
 *
 * @package    qrc_composer_pro
 * @subpackage qrc_composer_pro/admin
 */

class QRCLigt_CustomQr{

    public function __construct()
    {

    add_action('admin_init', array($this ,'qrc_custom_link_generator_page'));
}


public function qrc_custom_link_generator_page()
{
    register_setting("qrc_custom_link_generator", "qrc_custom_link_generator", array($this ,'qr_log_option_page_sanitize'));
        

        add_settings_section("logo_qrc_download_section", " ", array($this ,'settting_log_sec_func'), 'qrc_logo_admin_sec');

        add_settings_field("qr_code_custom_text", esc_html__("Custom Link/Text /email/number", "qr-code-composer") , array($this ,"qr_code_custom_text"), 'qrc_logo_admin_sec', "logo_qrc_download_section", array('class'=>'vacrdmeauto'));

        add_settings_field("qr_code_phonenumber", esc_html__("QR code for phone number", "qr-code-composer") , array($this ,"qr_code_phonenumber"), 'qrc_logo_admin_sec', "logo_qrc_download_section", array('class'=>'vacrdmeauto'));

        add_settings_field("qr_code_mail_text", esc_html__("QR for WhatsApp ", "qr-code-composer") , array($this ,"qr_code_mail_text"), 'qrc_logo_admin_sec', "logo_qrc_download_section", array('class'=>'vacrdmeauto'));

        add_settings_field("qr_code_wifi_text", esc_html__("QR for Wifi ", "qr-code-composer") , array($this ,"qr_code_wifi_text"), 'qrc_logo_admin_sec', "logo_qrc_download_section", array('class'=>'vacrdmeauto'));

        add_settings_field("qr_code_maps_text", esc_html__("QR for Maps ", "qr-code-composer") , array($this ,"qr_code_maps_text"), 'qrc_logo_admin_sec', "logo_qrc_download_section", array('class'=>'vacrdmeauto'));

        add_settings_field("qr_code_event_text", esc_html__("QR for Event ", "qr-code-composer") , array($this ,"qr_code_event_text"), 'qrc_logo_admin_sec', "logo_qrc_download_section", array('class'=>'vacrdmeauto'));



}
/**
 * This function is a callback function of  add seeting field
 */

public function qr_code_event_text()
{
    printf('<p><label class="mqrc_label">Summary/ Title:</label> <input type="text" placeholder="Write Summary/ Title" id="mrc_wifi_p" >
           </p><p>
           <label class="mqrc_label">Description:</label>   
           <textarea placeholder="Write Event Description" id="mrc_wifi_p" ></textarea></p><p>

            <label class="mqrc_label">Location:</label>    
            <input type="text" placeholder="Write Event Loaction" id="mrc_wifi_p" ></p><p>

            <label class="mqrc_label">Start Date & Time:</label>  

            <input type="text" class="qrcprodemo" id="mrc_jsdhshd">
            <input type="text" class="qrcprodemo1" id="mrc_jsdhshd"></p><p>
            <label class="mqrc_label">End Date & Time:</label>    
            <input type="text" class="qrcprodemo2" id="mrc_jsdhshd">
            <input type="text" class="qrcprodemo3" id="mrc_jsdhshd"></p>
            <p class="qr_st_val">
            <input id="qrevents" type="text" value="[qrc_event]" readonly><a id="qrcevent" video-url="https://www.youtube.com/watch?v=5L_XP4qXlj8"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a>
            </p>');



}


/**
 * This function is a callback function of  add seeting section
 */

public function settting_log_sec_func()
{

    echo "<h3>This is Premium Features</h3>";
}

/**
 * This function is a callback function of  add seeting field
 */

public function qr_code_maps_text()
{

    printf('<p><label for="qrc_wifi" class="qrc_label wifi">Latitude</label>
	    <input type="text" placeholder="Enter map latitude" id="qrc_wifi" style="min-width:300px"></p><p>
	    <label for="qrc_wifi_t"  class="qrc_label wifi">Longitude</label> 
	    	<input type="text" placeholder="Enter map longitude" id="qrc_wifi_t" style="min-width:300px"></p><p>	
	    	<label for="qrc_wifi_p"  class="qrc_label wifi">Query</label>	
	    	<input type="text" placeholder="Write Maps Query" id="qrc_wifi_p" style="min-width:300px"></p>
	    	
	    	<p class="qr_st_val">
	    	<input id="qmaps" type="text" value="[qr_maps_composer]" readonly ><a id="qrcmap" video-url="https://www.youtube.com/watch?v=hvyI2TjrGM4"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a></p>');

}
/**
 * This function is a callback function of  add seeting field
 */

public function qr_code_wifi_text()
{
     printf('<p><label for="qrc_wifi" class="qrc_label wifi">Wifi Name</label>
	    <input type="text" placeholder="Write wifi name" id="qrc_wifi" style="min-width:300px"></p><p>
	    <label for="qrc_wifi_t"  class="qrc_label wifi">Wifi Type</label> 
	    	<input type="text" placeholder="Write wifi type" id="qrc_wifi_t" style="min-width:300px">	</p><p>
	    	<label for="qrc_wifi_p"  class="qrc_label wifi">Wifi Password   </label>	
	    	<input type="text" placeholder="Write wifi password" id="qrc_wifi_p" style="min-width:300px"></p>
	    	
	    	<p class="qr_st_val">
	    	<input id="qwifi" type="text" value="[qr_wifi_composer]" readonly ><a id="qrcwifi" video-url="https://www.youtube.com/watch?v=jqvtNpNpPZc"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a>
	    	</p>');

}
/**
 * This function is a callback function of  add seeting field
 */

public function qr_code_mail_text()
{
    $placeholder = esc_html('Write Whatsapp numer with Country Code ', 'qr-code-composer');

    printf('<input type="text" id="qwe_sizw" placeholder="'.$placeholder.'" style="min-width:300px"><span class="qr_st_val">
	    	<input id="boo" type="text" value="[qr_whatsapp_composer]" readonly></span><a id="qrcwhatapp" video-url="https://www.youtube.com/watch?v=NHPDHzGQsoo"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a>
        	');

}

/**
 * This function is a callback function of  add seeting field
 */

public function qr_code_custom_text()
{

    $placeholder = esc_html('Write Text, Number or Link ', 'qr-code-composer');

    printf('<div><input style="width:300px" type="text" id="qwe_sizw" placeholder="'.$placeholder.'"><span class="qr_st_val">
        <input id="foo" type="text" value="[qr_link_composer]" readonly ></span><a id="qrccustom" video-url="https://www.youtube.com/watch?v=z3iEHvdcIO0"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a>');

}
public function qr_code_phonenumber()
{

    $placeholder = esc_html('Input phone or mobile number', 'qr-code-composer');

    printf('<input type="text" id="qwe_sizw" placeholder="'.$placeholder.'" style="width:300px"><span class="qr_st_val">
                <input id="foohpf" type="text" value="[qrc_phonenumber]" readonly></span><a id="qrchone" video-url="https://www.youtube.com/watch?v=AeNknsIkGnU"><span title="Video Documentation" id="qrcintehf" class="dashicons dashicons-video-alt3"></span></a>');

}

/**
 * admin form field validation
 */

public function qr_log_option_page_sanitize($input)
{
    $sanitary_values = array();
    return $sanitary_values;
}

}