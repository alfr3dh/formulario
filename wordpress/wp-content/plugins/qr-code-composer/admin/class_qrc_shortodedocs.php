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
class QRC_litecodeDOcs{

    public function __construct()
    {
add_action('admin_init', array($this ,'qrc_shortcode_docs_page'));

}

function qrc_shortcode_docs_page()
{

    register_setting("qrc_shortcode_docs", "qrc_shortcode_docs", '');
    

    add_settings_section("shrtcode_docs_section", "Shortcode Documentation", array($this ,'settting_docs_sec_func'), 'qrc_docs_admin_shortcode');

    add_settings_field("qr_code_custom_text_docs", esc_html__("Custom Link/Text(Premium)", "qr-code-composer") , array($this ,"qr_code_custom_text_docs"), 'qrc_docs_admin_shortcode', "shrtcode_docs_section",array('class'=>'premiumfe'));

    add_settings_field("qr_code_phnumber_docs", esc_html__("Phone Number(Premium)", "qr-code-composer") , array($this ,"qr_code_phnumber_docs"), 'qrc_docs_admin_shortcode', "shrtcode_docs_section",array('class'=>'premiumfe'));

    add_settings_field("qr_code_whatapp_docs", esc_html__("QR for WhatsApp(Premium)", "qr-code-composer") , array($this ,"qr_code_whatapp_docs"), 'qrc_docs_admin_shortcode', "shrtcode_docs_section",array('class'=>'premiumfe'));
    add_settings_field("qr_code_wifi_docs", esc_html__("QR for Wifi(Premium)", "qr-code-composer") , array($this ,"qr_code_wifi_docs"), 'qrc_docs_admin_shortcode', "shrtcode_docs_section",array('class'=>'premiumfe'));

    add_settings_field("qr_code_maps_docs", esc_html__("QR for Maps(Premium)", "qr-code-composer") , array($this ,"qr_code_maps_docs"), 'qrc_docs_admin_shortcode', "shrtcode_docs_section",array('class'=>'premiumfe'));

    add_settings_field("qr_code_event_docs", esc_html__("QR for Event (Premium)", "qr-code-composer") , array($this ,"qr_code_event_docs"), 'qrc_docs_admin_shortcode', "shrtcode_docs_section",array('class'=>'premiumfe'));

    add_settings_field("qr_code_vcard_docs", esc_html__("QR for vCard(Premium)", "qr-code-composer") , array(
      $this,
      "qr_code_vcard_docs"
  ) , 'qrc_docs_admin_shortcode', "shrtcode_docs_section",array('class'=>'premiumfe'));  

}
/**
 * This function is a callback function of  add seeting section
 */

function settting_docs_sec_func()
{

    echo "<p class='shrdocs'>You can create as many QR Codes as you want by using the Shortcode in attribute, enter your content in its place in attribute and use that shortcode anywhere on your site, you will see the QR code you want.</p>";
}

/**
 * This function is a callback function of  add seeting field
 */

function qr_code_whatapp_docs(){ ?>

<textarea id="qr_whatappdocs" >[qr_whatsapp_composer whatsapp="+15623526019" size="200" logo="" color="#311cb5" background="#fff"]</textarea><p>
<button type="button" class="qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_whatappdocs">Copy</button></p>
 <ul>
     <li><em> *whatsapp</em> = "Write Whatsapp numer with Country Code" ,</li>
     <li><em>*size </em>= "Numeric value" ,(optional)</li>
     <li><em>*logo </em>= "image URL" ,(optional)</li>
     <li><em>*color</em> = "Color code" ,(optional)</li>
     <li><em>*background </em>= "Color code" ,(optional)</li>

 </ul>
    <?php


}




function qr_code_custom_text_docs(){ ?>

<textarea id="qr_cust_tx_docs" >[qr_link_composer link="Enter Content text or number" size="200" logo="" color="#311cb5" background="#fff"]</textarea><p>
<button type="button" class="qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_cust_tx_docs">Copy</button></p>
 <ul>
     <li><em> *link</em> = "Write Text, Url, Number" ,</li>
     <li><em>*size </em>= "Numeric value" ,(optional)</li>
     <li><em>*logo </em>= "image URL" ,(optional)</li>
     <li><em>*color</em> = "Color code" ,(optional)</li>
     <li><em>*background </em>= "Color code" ,(optional)</li>
 </ul>
    <?php


}

function qr_code_phnumber_docs(){ ?>

<textarea id="qr_phone_docs" >[qrc_phonenumber number="+3493948334" size="300" logo="" color="#311cb5" background="#fff"]</textarea><p>
<button type="button" class="qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_phone_docs">Copy</button></p>
 <ul>
     <li><em> *number</em> = "Write phone or mobile number with country code" ,</li>
     <li><em>*size </em>= "Numeric value" ,(optional)</li>
     <li><em>*logo </em>= "image URL" ,(optional)</li>
     <li><em>*color</em> = "Color code" ,(optional)</li>
     <li><em>*background </em>= "Color code" ,(optional)</li>
 </ul>
    <?php


}
function qr_code_wifi_docs(){ ?>
<textarea id="qr_wifi_docs" >[qr_wifi_composer wifi_name="Your-Wifi" wifi_type="WPA" wifi_password="1234" size="200" logo="" color="#311cb5" background="#fff" ]</textarea>
<p>
<button type="button" class="qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_wifi_docs">Copy</button></p>
 <ul>
     <li><em> *wifi_name</em> = "Enter wifi name" ,</li>
     <li><em> *wifi_type</em> = "Enter wifi type" ,</li>
     <li><em> *wifi_password</em> = "Enter wifi password" ,</li>
     <li><em>*size </em>= "Numeric value" ,(optional)</li>
     <li><em>*logo </em>= "image URL" ,(optional)</li>
     <li><em>*color</em> = "Color code" ,(optional)</li>
     <li><em>*background </em>= "Color code" ,(optional)</li>
 </ul>
    <?php


}
function qr_code_maps_docs(){ ?>
<textarea id="qr_maps_docs" >[qr_maps_composer query="Sharabindu Bakshi" longitude="23.7709135" latitude="88.6239061" size="200" logo="" color="#311cb5" background="#fff"]</textarea>
<p>
<button type="button" class="qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qr_maps_docs">Copy</button>
</p>
 <ul>
     <li><em> *query</em> = "String value" ,</li>
     <li><em> *longitude</em> = "numeric value" ,</li>
     <li><em> *latitude</em> = "numeric value" ,</li>
     <li><em>*size </em>= "Numeric value" ,(optional)</li>
     <li><em>*logo </em>= "image URL" ,(optional)</li>
     <li><em>*color</em> = "Color code" ,(optional)</li>
     <li><em>*background </em>= "Color code" ,(optional)</li>

 </ul>
    <?php


}
function qr_code_vcard_docs()
{ ?>
<textarea id="qrc_vcard_single_docs" >[qrc_vcard_single name="Sharabindu" company="Plugin House" subtitle="Creating innovative" mobile="+15623526019" phone="+102194434" email="sharabindu86@gmail.com" website="https://sharabindu.com" address ="70A Boat Quay,Singapore" note ="This is a software Company"  logo="" color="#311cb5" background="#fff" size="250"]</textarea>
<p>
<button type="button" class="qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qrc_vcard_single_docs">Copy</button>
</p>
 <ul>

     <li><em> *name</em> = "enter the Vcard name or title" ,</li>
     <li><em> *company</em> = "(if have)" ,</li>
     <li><em> *subtitle</em> = "(if have)" ,</li>
     <li><em> *mobile</em> = "numeric" ,</li>
     <li><em> *email</em> = "String" ,</li>
     <li><em> *phone</em> = "numeric" ,</li>
     <li><em> *website</em> = "String" ,</li>
     <li><em> *address</em> = "String" ,</li>
     <li><em> *note</em> = "String" ,</li>
     <li><em>*size </em>= "Numeric value" ,(optional)</li>
     <li><em>*logo </em>= "image URL" ,(optional)</li>
     <li><em>*color</em> = "Color code" ,(optional)</li>
     <li><em>*background </em>= "Color code" ,(optional)</li>
<em>
If you do not want to use a field in the vCard, enter that field and leave the value blank</em>
 </ul>
<?php

}function qr_code_event_docs()
{ ?>
<textarea id="qrc_event" >[qrc_event summary="Sharabindu" description="Plugin House" location="Singapore" startdate="2023/04/22" starttime="04:00" enddate="2023/04/28" endtime="05:00" logo="" color="#311cb5" background="#fff" size="250"]</textarea>
<p>
<button type="button" class="qrc_clip_btn" data-clipboard-demo data-clipboard-target="#qrc_event">Copy</button>
</p>
 <ul>

     <li><em> *summary</em> = "input the Event name" ,</li>
     <li><em> *description</em> = "(if have) write the event description" ,</li>
     <li><em> *location</em> = "write the event location" ,</li>
     <li><em> *startdate</em> = "input event start date.Foramt:Y/M/D" ,</li>
     <li><em> *starttime</em> = "input event start time.Foramt- H:i, eg:06:00" ,</li>
     <li><em> *enddate</em> = "input event end  date.Foramt:Y/M/D" ," ,</li>
     <li><em> *endtime</em> = "input event end time.Foramt- H:i, eg:13:00"" ,</li>
     <li><em>*size </em>= "Numeric value" ,(optional)</li>
     <li><em>*logo </em>= "image URL" ,(optional)</li>
     <li><em>*color</em> = "Color code" ,(optional)</li>
     <li><em>*background </em>= "Color code" ,(optional)</li>
<em>
If you do not want to use a field in the vCard, enter that field and leave the value blank</em>
 </ul>
<?php

}
}