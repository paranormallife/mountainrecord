<?php
function acx_slideshow_styles() 
{	
	wp_register_style('acx_slideshow_admin_style', plugins_url('css/style_admin.css?v='.ACX_SLIDESHOW_VERSION, __FILE__));
	wp_enqueue_style('acx_slideshow_admin_style');
	
	wp_register_style('acx_slideshow_box_style', plugins_url('css/layout.css?v='.ACX_SLIDESHOW_VERSION, __FILE__));
	wp_enqueue_style('acx_slideshow_box_style');
	
	wp_register_style('acx_slideshow_addons_style', plugins_url('css/slideshow_addons.css?v='.ACX_SLIDESHOW_VERSION, __FILE__));
	wp_enqueue_style('acx_slideshow_addons_style');
	
}
add_action('admin_enqueue_scripts', 'acx_slideshow_styles');

function acx_slideshow_wp_styles() 
{	
	wp_register_style('acx_slideshow_front_style', plugins_url('css/style.css?v='.ACX_SLIDESHOW_VERSION, __FILE__));
	wp_enqueue_style('acx_slideshow_front_style');
}
add_action('wp_enqueue_scripts', 'acx_slideshow_wp_styles');

function acx_slideshow_scripts()
{ 
	wp_enqueue_script('jquery');
}
add_action('admin_enqueue_scripts', 'acx_slideshow_scripts');

$acx_slideshow_version = get_option('acx_slideshow_version');
if($acx_slideshow_version != ACX_SLIDESHOW_VERSION)
{
	$acx_slideshow_version = ACX_SLIDESHOW_VERSION;
	update_option('acx_slideshow_version',$acx_slideshow_version);
}

function print_acx_slideshow_option_heading($heading)
{
	$heading_format = "<h2 class='acx_slideshow_option_head'>";
	$heading_format .= $heading;
	$heading_format .= "</h2>";
	return $heading_format;
}
function print_acx_slideshow_option_block_start($title,$pre_fix="",$suf_fix="")
{
	global $acx_slideshow_options_uid;
	if(!$acx_slideshow_options_uid || $acx_slideshow_options_uid == "")
	{
	$acx_slideshow_options_uid = 0;
	}
	$acx_slideshow_options_uid = $acx_slideshow_options_uid+1;
	echo "<div class='acx_slideshow_q_holder acx_slideshow_q_holder_".$acx_slideshow_options_uid."'>";
	echo $pre_fix;
	echo "<h4>".$title."</h4>";
	echo $suf_fix;
	echo "<div class='acx_slideshow_q_holder_c acx_slideshow_q_holder_c_".$acx_slideshow_options_uid."'>";
}
function print_acx_slideshow_option_block_end()
{
	echo "</div> <!-- acx_slideshow_q_holder_c -->";
	echo "</div> <!-- acx_slideshow_q_holder -->";
}
function acx_slideshow_post_isset_check($field)
{
	$value = "";
	if(ISSET($_POST[$field]))
	{
		$value = $_POST[$field];
	}
	return $value;
}

function acx_slideshow_quick_form()
{
	$acx_installation_url = "";
	if(ISSET($_SERVER['HTTP_HOST']))
	{
		$acx_installation_url = $_SERVER['HTTP_HOST'];
	} 
?>
<div class="acx_slideshow_es_common_raw acx_slideshow_es_common_bg">
	<div class="acx_slideshow_es_middle_section">
    
    <div class="acx_slideshow_es_acx_content_area">
    	<div class="acx_slideshow_es_wp_left_area">
        <div class="acx_slideshow_es_wp_left_content_inner">
        	<div class="acx_slideshow_es_wp_main_head"><?php _e('Do you Need Technical Support Services to Get the Best Out of Your Wordpress Site ?','simple-slideshow-manager'); ?></div> <!-- wp_main_head -->
            <div class="acx_slideshow_es_wp_sub_para_des"><?php _e('Acurax offer a number of WordPress related services: Form installing WordPress on your domain to offering support for existing WordPress sites.','simple-slideshow-manager'); ?></div> <!-- acx_slideshow_es_wp_sub_para_des -->
            <div class="acx_slideshow_es_wp_acx_service_list">
            	<ul>
                <li><?php _e('Troubleshoot WordPress Site Issues','simple-slideshow-manager'); ?></li>
                    <li><?php _e('Recommend & Install Plugins For Improved WordPress Performance','simple-slideshow-manager'); ?></li>
                    <li><?php _e('Create, Modify, Or Customise, Themes','simple-slideshow-manager'); ?></li>
                    <li><?php _e('Explain Errors And Recommend Solutions','simple-slideshow-manager'); ?></li>
                    <li><?php _e('Custom Plugin Development According To Your Needs','simple-slideshow-manager'); ?></li>
                    <li><?php _e('Plugin Integration Support','simple-slideshow-manager'); ?></li>
                    <li><?php _e('Many ','simple-slideshow-manager'); ?><a href="http://wordpress.acurax.com/?utm_source=slideshow&utm_campaign=expert_support" target="_blank"><?php _e('More...','simple-slideshow-manager'); ?></a></li>
               </ul>
            </div> <!-- acx_slideshow_es_wp_acx_service_list -->
            
   <div class="acx_slideshow_es_wp_send_ylw_para"><?php _e('We Have Extensive Experience in WordPress Troubleshooting,Theme Design & Plugin Development.','simple-slideshow-manager'); ?></div> <!-- acx_slideshow_es_wp_secnd_ylw_para-->
   
        </div> <!-- acx_slideshow_es_wp_left_content_inner -->
        </div> <!-- acx_slideshow_es_wp_left_area -->
        
        <div class="acx_slideshow_es_wp_right_area">
        	<div class="acx_slideshow_es_wp_right_inner_form_wrap">
            	<div class="acx_slideshow_es_wp_inner_wp_form">
                <div class="acx_slideshow_es_wp_form_head"><?php _e('WE ARE DEDICATED TO HELP YOU. SUBMIT YOUR REQUEST NOW..!','simple-slideshow-manager'); ?></div> <!-- acx_slideshow_es_wp_form_head -->
               <form class="acx_slideshow_es_wp_support_acx">
                <span class="acx_slideshow_es_cnvas_input acx_slideshow_es_half_width_sec acx_slideshow_es_haif_marg_right"><input type="text" placeholder="<?php _e('Name*','simple-slideshow-manager'); ?>" id="acx_name"></span> <!-- acx_slideshow_es_cnvas_input -->
                <span class="acx_slideshow_es_cnvas_input acx_slideshow_es_half_width_sec acx_slideshow_es_haif_marg_left"><input type="email" placeholder="<?php _e('Email*','simple-slideshow-manager'); ?>" id="acx_email"></span> <!-- acx_slideshow_es_cnvas_input -->
                <span class="acx_slideshow_es_cnvas_input acx_slideshow_es_half_width_sec acx_slideshow_es_haif_marg_right"><input type="text" placeholder="<?php _e('Phone Number*','simple-slideshow-manager'); ?>" id="acx_phone"></span> <!-- acx_slideshow_es_cnvas_input -->
                <span class="acx_slideshow_es_cnvas_input acx_slideshow_es_half_width_sec acx_slideshow_es_haif_marg_left"><input type="text" placeholder="<?php _e('Website URL*','simple-slideshow-manager'); ?>" value="<?php echo $acx_installation_url; ?>" id="acx_weburl"></span> <!-- acx_slideshow_es_cnvas_input -->
                <span class="acx_slideshow_es_cnvas_input"><input type="text" placeholder="<?php _e('Subject*','simple-slideshow-manager'); ?>" id="acx_subject"></span> <!-- acx_slideshow_es_cnvas_input -->
                <span class="acx_slideshow_es_cnvas_input"><textarea placeholder="<?php _e('Question*','simple-slideshow-manager'); ?>" id="acx_question"></textarea></span> <!-- acx_slideshow_es_cnvas_input -->
                <span class="acx_slideshow_es_cnvas_input"><input class="acx_slideshow_es_wp_acx_submit" type="button" value="<?php _e('SUBMIT REQUEST','simple-slideshow-manager'); ?>" onclick="acx_quick_slideshow_request_submit();"></span> <!-- acx_slideshow_es_cnvas_input -->
                </form>
                </div> <!-- acx_slideshow_es_wp_inner_wp_form -->
            </div> <!-- acx_slideshow_es_wp_right_inner_form_wrap -->
        </div> <!-- acx_slideshow_es_wp_left_area -->
    </div> <!-- acx_slideshow_es_acx_content_area -->
    
    <div class="acx_slideshow_es_footer_content_cvr">
    <div class="acx_slideshow_es_wp_footer_area_desc"><?php _e('Its our pleasure to thank you for using our plugin and being with us. We always do our best to help you on your needs.','simple-slideshow-manager'); ?></div> <!--acx_slideshow_es_wp_footer_area_desc -->
    </div> <!-- acx_slideshow_es_footer_content_cvr -->
    
    </div> <!-- acx_slideshow_es_middle_section -->
</div> <!--acx_slideshow_es_common_raw -->
<script type="text/javascript">
var request_acx_form_status = 0;
function acx_quick_form_reset()
{
	jQuery("#acx_subject").val('');
	jQuery("#acx_question").val('');
}
acx_quick_form_reset();
function acx_quick_slideshow_request_submit()
{
	var acx_name = jQuery("#acx_name").val();
	var acx_email = jQuery("#acx_email").val();
	var acx_phone = jQuery("#acx_phone").val();
	var acx_weburl = jQuery("#acx_weburl").val();
	var acx_subject = jQuery("#acx_subject").val();
	var acx_question = jQuery("#acx_question").val();
	var order = '&action=acx_quick_slideshow_request_submit&acx_name='+acx_name+'&acx_email='+acx_email+'&acx_phone='+acx_phone+'&acx_weburl='+acx_weburl+'&acx_subject='+acx_subject+'&acx_question='+acx_question+'&acx_smw_es=<?php echo wp_create_nonce("acx_smw_es"); ?>'; 
	if(request_acx_form_status == 0)
	{
		request_acx_form_status = 1;
		jQuery.post(ajaxurl, order, function(quick_request_acx_response)
		{
			if(quick_request_acx_response == 1)
			{
				alert('<?php _e('Your Request Submitted Successfully!','simple-slideshow-manager'); ?>');
				acx_quick_form_reset();
				request_acx_form_status = 0;
			} else if(quick_request_acx_response == 2)
			{
				alert('<?php _e('Please Fill Mandatory Fields.','simple-slideshow-manager'); ?>');
				request_acx_form_status = 0;
			} else
			{
				alert('<?php _e('There was an error processing the request, Please try again.','simple-slideshow-manager'); ?>');
				acx_quick_form_reset();
				request_acx_form_status = 0;
			}
		});
	} else
	{
		alert('<?php _e('A request is already in progress.','simple-slideshow-manager'); ?>');
	}
}
</script>
<?php }
function acx_slideshow_comparison_with_premium()
{
	$acx_slideshow_misc_hide_advert = get_option('acx_slideshow_misc_hide_advert');
	if($acx_slideshow_misc_hide_advert == "")
	{
		$acx_slideshow_misc_hide_advert = "no";
	}
	if($acx_slideshow_misc_hide_advert == "no")
	{
		acx_slideshow_comparison(1); 
	}
}
function acx_quick_slideshow_request_submit_callback()
{
	
	$acx_name =  $acx_email =  $acx_phone =  $acx_weburl = $acx_subject = $acx_question = $acx_smw_es = "";
	if(ISSET($_POST['acx_name']))
	{
		$acx_name =  $_POST['acx_name'];
	}
	if(ISSET($_POST['acx_email']))
	{
		$acx_email =  $_POST['acx_email'];
	}
	if(ISSET($_POST['acx_phone']))
	{
		$acx_phone =  $_POST['acx_phone'];
	}
	if(ISSET($_POST['acx_weburl']))
	{
		$acx_weburl =  $_POST['acx_weburl'];
	}
	if(ISSET($_POST['acx_subject']))
	{
		$acx_subject =  $_POST['acx_subject'];
	}
	if(ISSET($_POST['acx_question']))
	{
		$acx_question =  $_POST['acx_question'];
	}
	if(ISSET($_POST['acx_smw_es']))
	{
		$acx_smw_es = $_POST['acx_smw_es'];
	}
	if (!wp_verify_nonce($acx_smw_es,'acx_smw_es'))
	{
		$acx_smw_es == "";
	}
	if(!current_user_can('manage_options'))
	{
		$acx_smw_es == "";
	}

	if($acx_smw_es == "" || $acx_name == "" || $acx_email == "" || $acx_phone == "" || $acx_weburl == "" || $acx_subject == "" || $acx_question == "")
	{
		echo 2;
	} else
	{
		$current_user_acx = wp_get_current_user();
		$current_user_acx = $current_user->user_email;
		if($current_user_acx == "")
		{
			$current_user_acx = $acx_email;
		}
		$headers[] = 'From: ' . $acx_name . ' <' . $current_user_acx . '>';
		$headers[] = 'Content-Type: text/html; charset=UTF-8'; 
		$message = "Name: ".$acx_name . "\r\n <br>";
		$message = $message . "Email: ".$acx_email . "\r\n <br>";
		if($acx_phone != "")
		{
			$message = $message . "Phone: ".$acx_phone . "\r\n <br>";
		}
		// In case any of our lines are larger than 70 characters, we should use wordwrap()
		$acx_question = wordwrap($acx_question, 70, "\r\n <br>");
		$message = $message . "Request From: slideshow - Expert Help Request Form \r\n <br>"; 
		$message = $message . "Website: ".$acx_weburl . "\r\n <br>";
		$message = $message . "Question: ".$acx_question . "\r\n <br>";
		$message = stripslashes($message);
		$acx_subject = "Quick Support - " . $acx_subject;
		$emailed = wp_mail( 'info@acurax.com', $acx_subject, $message, $headers );
		if($emailed)
		{
			echo 1;
		} else
		{
			echo 0;
		}
	}
	die(); // this is required to return a proper result
}add_action('wp_ajax_acx_quick_slideshow_request_submit','acx_quick_slideshow_request_submit_callback');

/* get all data from database */
$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
if(is_serialized($acx_slideshow_imageupload_complete_data))
{
	$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
}

$acx_slideshow_gallery_data = get_option('acx_slideshow_gallery_data');
if(is_serialized($acx_slideshow_gallery_data))
{
	$acx_slideshow_gallery_data = unserialize($acx_slideshow_gallery_data);	
}
$acx_slideshow_misc_user_level = get_option('acx_slideshow_misc_user_level');

if($acx_slideshow_misc_user_level=="")
{
	$acx_slideshow_misc_user_level = "manage_options";
}
function acx_slideshow_js() 
{
	if(function_exists('wp_enqueue_media'))
	{
		wp_enqueue_media();	
	}
?>
<script type="text/javascript">
function acx_slideshow_upload_images_template_loader(button_id,uploader_title,uploader_button,hidden_field_id)
{                                                       
	if(button_id)
	{
	button_id = "#"+button_id;
	}
	if(uploader_title == "")
	{
	uploader_title = "<?php _e('Choose Image','simple-slideshow-manager'); ?>";
	}
	if(uploader_button == "")
	{
	uploader_button = "<?php _e('Select','simple-slideshow-manager'); ?>";
	}
	if(hidden_field_id)
	{
	hidden_field_id = "#"+hidden_field_id;
	}
	var custom_uploader_template_1_1;
	
		//If the uploader object has already been created, reopen the dialog
		if (custom_uploader_template_1_1) 
		{
		custom_uploader_template_1_1.open();
		return;
		}
		//Extend the wp.media object
		custom_uploader_template_1_1 = wp.media.frames.file_frame = wp.media({
		title: uploader_title,
		button:
		{
			text: uploader_button
		},
		multiple: false	});
		//When a file is selected, grab the URL and set it as the text field's value
		custom_uploader_template_1_1.on('select', function() 
		{
			attachment = custom_uploader_template_1_1.state().get('selection').first().toJSON();
			if(hidden_field_id)
			{
			jQuery(hidden_field_id).val(attachment.id);
			}
			var acx_slideshow_upload_image_url="#acx_slideshow_upload_image_url";
			jQuery(acx_slideshow_upload_image_url).val(attachment.url);
			var acx_slideshow_title="#acx_slideshow_title";
			jQuery(acx_slideshow_title).val(attachment.title);
			var acx_slideshow_caption="#acx_slideshow_caption";
			jQuery(acx_slideshow_caption).val(attachment.caption);
			var acx_slideshow_alttext="#acx_slideshow_alttext";
			jQuery(acx_slideshow_alttext).val(attachment.alt);
			var acx_slideshow_desc="#acx_slideshow_desc";
			jQuery(acx_slideshow_desc).val(attachment.description);
			upload_image();
			
		});
		//Open the uploader dialog
		custom_uploader_template_1_1.open();
}
</script>
<?php
} 
add_action('admin_head', 'acx_slideshow_js',1);
function acx_slideshow_jquery()
{
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'acx_slideshow_jquery' );
add_action('admin_enqueue_script','acx_slideshow_jquery');
function acx_slideshow_jquery_ui_sortable()
{
	wp_enqueue_script('jquery-ui-sortable');
}
add_action('admin_enqueue_script','acx_slideshow_jquery_ui_sortable');

function acx_slideshow_api_js()
{
?>
<script type="text/javascript" id="acx_js_api">
function call_acx_y_player(frame_id, func,id,u_id, args)
{
	frame_id_dpl = frame_id+u_id;
	var frame ='#'+frame_id+u_id+id;
	var frame_id_yt='#'+frame_id+u_id+'_frame_'+id;
	var imageid = '#acx_image_'+u_id+'_'+id;
	var vedio_stat_field ='#acx_hidden_id_'+u_id;
	var palybuttn = '.acx_dis_yplay_but_'+u_id;
	var pausebuttn = '.acx_dis_ypause_but_'+u_id;
	var newvalue = 0;
	if(func=="playVideo")
	{
		
		var img_yt_thumbnail_element = ".acx_ssm_yt_"+u_id+"_"+id;
		var img_yt_thumbnail_h = jQuery(img_yt_thumbnail_element).height();  
		var img_yt_thumbnail_w = jQuery(img_yt_thumbnail_element).width();  

		var img_stop = '.img_stop_'+u_id;
		var img_play = '.img_play_'+u_id;

		jQuery(img_stop).hide();
		jQuery(img_play).hide();


		var img_prev = '.img_prev_'+u_id;
		var img_next = '.img_next_'+u_id;

		jQuery(img_prev).hide();
		jQuery(img_next).hide();

		jQuery(imageid).hide();
		jQuery(frame).fadeIn('slow');

		var framecode="<iframe id='youtube_url' src='https://www.youtube.com/embed/"+frame_id+"?autoplay=1&controls=0&wmode=opaque&cc_load_policy=1&rel=0&iv_load_policy=3&loop=0' width='"+img_yt_thumbnail_w+"' height='"+img_yt_thumbnail_h+"'></iframe>";

		jQuery(frame_id_yt).html(framecode);

		jQuery(palybuttn).hide();
		jQuery(pausebuttn).show();
		jQuery(vedio_stat_field).val('play');
	}
	else if(func=="stopVideo")
	{
		var img_stop = '.img_stop_'+u_id;
		var img_play = '.img_play_'+u_id;

		jQuery(img_stop).show();
		jQuery(img_play).show();

		var img_prev = '.img_prev_'+u_id;
		var img_next = '.img_next_'+u_id;

		jQuery(img_prev).show();
		jQuery(img_next).show();

		jQuery(frame).hide();

		var framecode="";
		jQuery(frame_id_yt).html(framecode);

		jQuery(imageid).fadeIn('slow');
		jQuery(palybuttn).show();
		jQuery(pausebuttn).hide();
		jQuery(vedio_stat_field).val('stop');
		}
		if(!frame_id) return;
		if(frame_id_dpl.id) frame_id_dpl = frame_id_dpl.id;
		else if(typeof jQuery != "undefined" && frame_id_dpl instanceof jQuery && frame_id_dpl.length) frame_id = frame_id_dpl.get(0).id;
		if(!document.getElementById(frame_id_dpl)) return;
		args = args || [];
		/*Searches the document for the IFRAME with id=frame_id*/
		var all_iframes = document.getElementsByTagName("iframe");
		for(var i=0, len=all_iframes.length; i<len; i++){
		if(all_iframes[i].id == frame_id_dpl || all_iframes[i].parentNode.id == frame_id){
		/*The index of the IFRAME element equals the index of the iframe in
		the frames object (<frame> . */
		window.frames[i].postMessage(JSON.stringify({
		"event": "command",
		"func": func,
		"args": args,
		"id": frame_id
		}), "*");
		}
	}
}
function acx_play_vimeo_video(vedio_id,id,u_id)
{
	var img_vm_thumbnail_element = ".acx_ssm_vm_"+u_id+"_"+id;
	var img_vm_thumbnail_h = jQuery(img_vm_thumbnail_element).height();  
	var img_vm_thumbnail_w = jQuery(img_vm_thumbnail_element).width(); 

	var iframe_id = "#player_"+vedio_id+u_id;
	var iframe = jQuery(iframe_id)[0],
	player = iframe;
	var frame ='#'+vedio_id+u_id+id;
	var frame_id_vimeo ='#'+vedio_id+u_id+"_frame_"+id;
	var imageid = '#acx_image_vimeo_'+u_id+'_'+id;
	var vedio_stat_field ='#acx_hidden_id_'+u_id;
	var palybuttn = '.acx_dis_vplay_but_'+u_id;
	var pausebuttn = '.acx_dis_vpause_but_'+u_id;

	var img_stop = '.img_stop_'+u_id;
	var img_play = '.img_play_'+u_id;

	jQuery(img_stop).hide();
	jQuery(img_play).hide();

	var img_prev = '.img_prev_'+u_id;
	var img_next = '.img_next_'+u_id;

	jQuery(img_prev).hide();
	jQuery(img_next).hide();

	jQuery(vedio_stat_field).val('play');
	jQuery(imageid).hide();
	jQuery(frame).fadeIn('slow');

	var framecode="<iframe src='https://player.vimeo.com/video/"+vedio_id+"?player_id=player&autoplay=1&title=0&byline=0&portrait=0&loop=0&autopause=0' width='"+img_vm_thumbnail_w+"' height='"+img_vm_thumbnail_h+"'></iframe>";

	jQuery(frame_id_vimeo).html(framecode);

	jQuery(palybuttn).hide();
	jQuery(pausebuttn).show();
}
function acx_stop_vimeo_video(vedio_id,id,u_id)
{
	var iframe_id = "#player_"+vedio_id+u_id;
	var iframe = jQuery(iframe_id)[0],
	player = iframe;
	var frame_id_vimeo ='#'+vedio_id+u_id+"_frame_"+id;
	var frame ='#'+vedio_id+u_id+id;
	var imageid = '#acx_image_vimeo_'+u_id+'_'+id;
	var vedio_stat_field ='#acx_hidden_id_'+u_id;
	var palybuttn = '.acx_dis_vplay_but_'+u_id;
	var pausebuttn = '.acx_dis_vpause_but_'+u_id;
	var framecode="";
	jQuery(frame_id_vimeo).html(framecode);

	var img_stop = '.img_stop_'+u_id;
	var img_play = '.img_play_'+u_id;

	jQuery(img_stop).show();
	jQuery(img_play).show();

	var img_prev = '.img_prev_'+u_id;
	var img_next = '.img_next_'+u_id;

	jQuery(img_prev).show();
	jQuery(img_next).show();

	jQuery(frame).hide();
	jQuery(imageid).fadeIn('slow');
	jQuery(palybuttn).show();
	jQuery(pausebuttn).hide();
	jQuery(vedio_stat_field).val('stop');
}
</script>
<?php
}
add_action('wp_head','acx_slideshow_api_js');

// rename the gallery with new value
$uid =0;
if(!isset($acx_slideshow_js_array))
{
	$acx_slideshow_js_array = array();
} 
function acx_slideshow($acx_slideshow_array)
{
	$acx_slideshow_output = $gallery_name = $gallery_height = $gallery_width = '';
	if(isset($acx_slideshow_array['name']))
	{
		$gallery_name=$acx_slideshow_array['name'];
	}
	if(isset($acx_slideshow_array['height']))
	{
		$gallery_height=$acx_slideshow_array['height'];
	}
	if(isset($acx_slideshow_array['width']))
	{
		$gallery_width=$acx_slideshow_array['width'];
	}
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data,$uid,$acx_slideshow_js_array;
	if($acx_slideshow_js_array=="")
	{
		$acx_slideshow_js_array = array();
	}
	if($gallery_height == "")
	{
		if(is_array($acx_slideshow_gallery_data) && array_key_exists($gallery_name,$acx_slideshow_gallery_data))
		{
			if(array_key_exists('acx_slideshow_height',$acx_slideshow_gallery_data[$gallery_name]))
			{
				$acx_slideshow_height = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_height'];	
			}
			else
			{
				$acx_slideshow_height ='';
			}
		} 
		else
		{
			$acx_slideshow_height = '';
		}
	}
	else
	{
		$acx_slideshow_height = $gallery_height;
	}
	
	if($gallery_width == "")
	{
		if(is_array($acx_slideshow_gallery_data) && array_key_exists($gallery_name,$acx_slideshow_gallery_data))
		{
			if(array_key_exists('acx_slideshow_width',$acx_slideshow_gallery_data[$gallery_name]))
			{
				$acx_slideshow_width =  $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_width'];
			}
			else
			{
				$acx_slideshow_width ='';
			}
		}  
		else
		{
			$acx_slideshow_width = '';
		}
	}
	else
	{
		$acx_slideshow_width = $gallery_width;
	}
	if(is_array($acx_slideshow_imageupload_complete_data) && array_key_exists($gallery_name,$acx_slideshow_imageupload_complete_data))
	{
		$slide_count=count($acx_slideshow_imageupload_complete_data[$gallery_name]);
	}
	else
	{
		$slide_count=0;
	}
	$gal_found = 0;
	foreach($acx_slideshow_imageupload_complete_data as $key => $value)
	{
		if($key==$gallery_name)
		{
			$gal_found = 1;
		}
	}
		
	$acx_gallery_uid = str_replace(' ','_',$gallery_name);
	if($gal_found==0)
	{
		
		$acx_slideshow_output="<div class='acx_ss_error'>".__('The gallery group ','simple-slideshow-manager')."<b>".$gallery_name."</b>".__(' is no longer available , Please reconfigure your widget/shortcode/phpcode which displays this slideshow','simple-slideshow-manager')."</div>";
		
	}
	elseif($slide_count == 0)
	{
		
		$acx_slideshow_output="<div class='acx_ss_error'>
		".__('The gallery group','simple-slideshow-manager')." <b>".$gallery_name."</b>".__(' is no data available , Please add images or videos to','simple-slideshow-manager')." <b>".$gallery_name."</b>
		</div>";
	} 
	elseif($acx_slideshow_height=="" || $acx_slideshow_width=="" || $acx_slideshow_height=="0px" || $acx_slideshow_width=="0px")
	{
		
		$acx_slideshow_output="<div class='acx_ss_error'>"
		.__('You have not configured height or width for the slideshow group', 'simple-slideshow-manager')."<b>".$gallery_name.",</b>,".__(' Please go to wp-admin -> Slideshow -> Manage Gallery -> Advanced Settings and configure Slideshow width and height.','simple-slideshow-manager')." 
		</div>";
	}
	else
	{
	$acx_slideshow_output.="<div id='image_slideshow_holder' style='";if($acx_slideshow_width!="") { $acx_slideshow_output.="max-width:".$acx_slideshow_width; } $acx_slideshow_output.="'>";
	
	$acx_slideshow_output.="<ul id='image_slideshow' class='acx_ppt acx_ppt_".$uid." acx_ppt_uid_".$acx_gallery_uid."' style='"; if($acx_slideshow_width!="") { $acx_slideshow_output.="width:".$acx_slideshow_width.";"; } if($acx_slideshow_height!=""&&$acx_slideshow_width!=""){ $acx_slideshow_output.="overflow:hidden;"; }$acx_slideshow_output.="'>";
	for($i = 0 ; $i<$slide_count; $i++)
	{
		if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="image") 
		{
			$acx_slideshow_link_url = esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['link_url']);
			$acx_slideshow_target = $acx_slideshow_imageupload_complete_data[$gallery_name][$i]['link_target']; 
			if($acx_slideshow_target=="")
			{
				$acx_slideshow_target = "_blank";
			}
			$acx_slideshow_output.="<li>";
			
			if($acx_slideshow_link_url!="")
			{
				
				$acx_slideshow_output.="<a href='".$acx_slideshow_link_url."' target='".$acx_slideshow_target."' title='".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_title']."'>";
				
			}
			$acx_slideshow_output.="<img src='".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_url'])."' title='".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_title']."' alt='".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_alttext']."' style='";if ($acx_slideshow_height != ""){ $acx_slideshow_output.="max-height:".$acx_slideshow_height.";"; } if ($acx_slideshow_width != ""){ $acx_slideshow_output.="width:".$acx_slideshow_width.";";  }$acx_slideshow_output.="'>";
		
			if($acx_slideshow_link_url!="")
			{
			
				$acx_slideshow_output.="</a>";
				
			}
			
			$acx_slideshow_output.="<div class='img_prev_".$uid." img_prev'></div>";
			$acx_slideshow_output.="<div class='img_next_".$uid." img_next'></div>";

			$acx_slideshow_output.="</li>";
		}
		else if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="youtube_video")
		{	
			$vedio_id = "http://www.youtube.com/embed/".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['vedio_id']."?enablejsapi=1";
			$acx_slideshow_output.="<li>";
			
			$acx_slideshow_output.="<div style='display:none;"; if ($acx_slideshow_height != ""){ $acx_slideshow_output.="max-height:".$acx_slideshow_height.";'"; } $acx_slideshow_output.="class='acx_v_hold' id='".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['vedio_id'].$uid.$i."'>";
			
			$acx_slideshow_output.="<div id='".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['vedio_id'].$uid."_frame_".$i."' style='width:100%;height:100%;'></div>";
			
			$acx_slideshow_output.="<div class='acx_no_mo' style='height:100%;width:100%;'></div>
			</div>";
			
			$acx_slideshow_output.="<img class='acx_ssm_yt_".$uid."_".$i."' id='acx_image_".$uid."_".$i."' src='".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."' style='";if ($acx_slideshow_height != ""){ $acx_slideshow_output.="max-height:".$acx_slideshow_height.";";  }if ($acx_slideshow_width != ""){ $acx_slideshow_output.="width:".$acx_slideshow_width.";'"; } $acx_slideshow_output.=" />";
			$play="playVideo";
			$stop="stopVideo";
			$acx_video_id=$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['vedio_id'];
			$acx_slideshow_output.="<div class='acx_dis_play_but acx_dis_yplay_but_".$uid."' style='cursor:pointer;' title='' onclick ='call_acx_y_player(\"$acx_video_id\",\"$play\",\"$i\",\"$uid\");'> </div>
			<div class='player_cntrls'>";
			
			$acx_slideshow_output.="<div class='acx_dis_pause_but acx_dis_ypause_but_".$uid." style='cursor:pointer;' title='' onclick ='call_acx_y_player(\"$acx_video_id\",\"$stop\",\"$i\",\"$uid\");'> </div>
			</div>";
			
			$acx_slideshow_output.="<div class='img_prev_".$uid." img_prev'></div>";
			$acx_slideshow_output.="<div class='img_next_".$uid." img_next'></div>";

			$acx_slideshow_output.="</li>";	
		}
		else if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="vimeo_video")
		{
			$vedio_id = "http://player.vimeo.com/video/".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['vedio_id'];
			
			$acx_slideshow_output.="<li>";
			
			$acx_slideshow_output.="<div style='display:none;"; if ($acx_slideshow_height != ""){ $acx_slideshow_output.="max-height:".$acx_slideshow_height.";'"; } $acx_slideshow_output.="class='acx_v_hold' id='".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['vedio_id'].$uid.$i."'>";
			$acx_slideshow_output.="<div id='".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['vedio_id'].$uid."_frame_".$i."' style='width:100%;height:100%;'></div>";
			
			$acx_slideshow_output.="<div class='acx_no_mo' style='height:100%;width:100%;'></div>
			</div>";
			
			$acx_slideshow_output.="<img class='acx_ssm_vm_".$uid."_".$i."' id='acx_image_vimeo_".$uid."_".$i."' src='".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."' style='";if ($acx_slideshow_height != ""){ $acx_slideshow_output.="max-height:".$acx_slideshow_height.";";  }if ($acx_slideshow_width != ""){ $acx_slideshow_output.="width:".$acx_slideshow_width.";'"; } $acx_slideshow_output.=" />";
			$acx_video_id=$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['vedio_id'];
			$acx_slideshow_output.="<div class='acx_dis_play_but acx_dis_vplay_but_".$uid."' style='cursor:pointer;' title='' onclick ='acx_play_vimeo_video(\"$acx_video_id\",\"$i\",\"$uid\");'> </div>
			<div class='player_cntrls'>";
			
			$acx_slideshow_output.="<div class='acx_dis_pause_but acx_dis_vpause_but_".$uid." style='cursor:pointer;' title='' onclick ='acx_stop_vimeo_video(\"$acx_video_id\",\"$i\",\"$uid\");'> </div>
			</div>";
			$acx_slideshow_output.="<div class='img_prev_".$uid." img_prev'></div>";
			$acx_slideshow_output.="<div class='img_next_".$uid." img_next'></div>";

			$acx_slideshow_output.="</li>";	
		}
	}
	$acx_slideshow_output.="<input type='hidden' id='acx_hidden_id_".$uid."' value='stop'/>";
	$acx_slideshow_output.="</ul></div><!-- image_slideshow_holder -->";

	if(is_array($acx_slideshow_gallery_data) && array_key_exists($gallery_name,$acx_slideshow_gallery_data))
	{
		if(array_key_exists('acx_slideshow_timespan',$acx_slideshow_gallery_data[$gallery_name]) && array_key_exists('acx_slideshow_fadeouttime',$acx_slideshow_gallery_data[$gallery_name]) && array_key_exists('acx_slideshow_fadeintime',$acx_slideshow_gallery_data[$gallery_name]) && array_key_exists('acx_slideshow_pauseon_hover',$acx_slideshow_gallery_data[$gallery_name]))
		{
			$acx_slideshow_timespan = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_timespan'];
			$acx_slideshow_fadeouttime = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_fadeouttime'];
			$acx_slideshow_fadeintime = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_fadeintime'];
			$acx_slideshow_pauseon_hover = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_pauseon_hover'];
		}
		else
		{
			$acx_slideshow_timespan="";
			$acx_slideshow_fadeintime="";
			$acx_slideshow_fadeouttime ="";
			$acx_slideshow_pauseon_hover ="";
		}
		if($acx_slideshow_timespan==""||$acx_slideshow_timespan==0)
		{
			$acx_slideshow_timespan = 4000;
		}
		else
		{
			$acx_slideshow_timespan = $acx_slideshow_timespan * 1000;
		}
		if($acx_slideshow_fadeintime=="" || $acx_slideshow_fadeintime ==0)
		{
			$acx_slideshow_fadeintime = 1000;
		}
		else
		{
			$acx_slideshow_fadeintime = $acx_slideshow_fadeintime * 1000;
		}
		if($acx_slideshow_fadeouttime == "" || $acx_slideshow_fadeouttime == 0)
		{
			$acx_slideshow_fadeouttime = 1000;
		}
		else
		{
			$acx_slideshow_fadeouttime = $acx_slideshow_fadeouttime * 1000;
		}
	}
	else
	{
		$acx_slideshow_timespan = '4000';
		$acx_slideshow_fadeintime = '1000';
		$acx_slideshow_fadeouttime = '1000';
		$acx_slideshow_pauseon_hover ="true";
	}
	$acx_slideshow_js_array[$uid]= array(
										"acx_slideshow_timespan"=>$acx_slideshow_timespan,
										"acx_slideshow_fadeouttime"=>$acx_slideshow_fadeouttime,
										"acx_slideshow_fadeintime"=>$acx_slideshow_fadeintime,
										"acx_slideshow_pauseon_hover"=>$acx_slideshow_pauseon_hover
									);
	}
	$acx_slideshow_output = apply_filters( 'acx_slideshow_output_filter', $acx_slideshow_output, $acx_slideshow_array, $uid);
	$uid = $uid+1;
	return $acx_slideshow_output;	
}
function acx_simple_slideshow_main_filter_hook($output,$acx_slideshow_array,$uid)
{
	if($output!="")
	{
	return $output;
	}
}
add_filter( 'acx_slideshow_output_filter', 'acx_simple_slideshow_main_filter_hook', 10, 3);
function acx_slideshow_js_show()
{
global $acx_slideshow_js_array;	
?>
<!-- Starting of Javascript Generated by Simple Slideshow Manager -->
<script type="text/javascript">
<?php
foreach($acx_slideshow_js_array as $key => $value)
{
 $acx_slideshow_timespan = $acx_slideshow_js_array[$key]['acx_slideshow_timespan'];
 $acx_slideshow_fadeouttime = $acx_slideshow_js_array[$key]['acx_slideshow_fadeouttime'];
 $acx_slideshow_fadeintime = $acx_slideshow_js_array[$key]['acx_slideshow_fadeintime'];
 $acx_slideshow_pauseon_hover = $acx_slideshow_js_array[$key]['acx_slideshow_pauseon_hover'];
 $uid = $key;
?>
jQuery('.acx_ppt_<?php echo $uid; ?> li:gt(0)').addClass('inactive');
jQuery('.acx_ppt_<?php echo $uid; ?> li:last').addClass('last');
jQuery('.acx_ppt_<?php echo $uid; ?> li:last').addClass('inactive');
jQuery('.acx_ppt_<?php echo $uid; ?> li:first').addClass('first');
jQuery('.acx_ppt_<?php echo $uid; ?> li:first').addClass('active');

jQuery('#img_play_<?php echo $uid; ?>').addClass('inactive');
var sliderHover_<?php echo $uid; ?> = false;

var cur_<?php echo $uid; ?> = jQuery('.acx_ppt_<?php echo $uid; ?> li:first');
var interval;

jQuery('.img_next_<?php echo $uid; ?>').click( function() 
{
	goFwd_<?php echo $uid; ?>();
	showPause_<?php echo $uid; ?>();
} );

jQuery('.img_prev_<?php echo $uid; ?>').click( function() 
{
	goBack_<?php echo $uid; ?>();
	showPause_<?php echo $uid; ?>();
	
} );

jQuery('#img_stop_<?php echo $uid; ?>').click( function()
 {

	stop_<?php echo $uid; ?>();
	showPlay_<?php echo $uid; ?>();
} );

jQuery('#img_play_<?php echo $uid; ?>').click( function() 
{
	start_<?php echo $uid; ?>();
	showPause_<?php echo $uid; ?>();
} );

function goFwd_<?php echo $uid; ?>() 
{
	stop_<?php echo $uid; ?>();
	forward_<?php echo $uid; ?>();
	start_<?php echo $uid; ?>();
}

function goBack_<?php echo $uid; ?>() 
{
	stop_<?php echo $uid; ?>();
	back_<?php echo $uid; ?>();
	start_<?php echo $uid; ?>();
}

function forward_<?php echo $uid; ?>() 
{

var hidden_id = 'acx_hidden_id_'+<?php echo $uid; ?>;
var vedio_status = document.getElementById(hidden_id).value;
if(vedio_status!="play")
{
	cur_<?php echo $uid; ?>.animate({
										opacity: 0
									}, <?php echo $acx_slideshow_fadeouttime ?>).addClass('inactive').removeClass('active');
	
	if ( cur_<?php echo $uid; ?>.hasClass('last'))
	cur_<?php echo $uid; ?> = jQuery('.acx_ppt_<?php echo $uid; ?> li:first');
	else
	cur_<?php echo $uid; ?> = cur_<?php echo $uid; ?>.next();
	cur_<?php echo $uid; ?>.animate({
										opacity: 1
									}, <?php echo $acx_slideshow_fadeintime ?>).addClass('active').removeClass('inactive');
}
}
jQuery(".acx_ppt_<?php echo $uid; ?>").hover(
function () 
{
<?php 
if($acx_slideshow_pauseon_hover=="true")
{ 
?>
stop_<?php echo $uid; ?>();
showPlay_<?php echo $uid; ?>();
var hidden_id = 'acx_hidden_id_'+<?php echo $uid; ?>;
var vedio_status = document.getElementById(hidden_id).value;
if(vedio_status=="play")
{
	jQuery('#img_play_<?php echo $uid; ?>').hide();
	jQuery('#img_stop_<?php echo $uid; ?>').hide();
}
<?php } ?>
},
function ()
{
<?php 
if($acx_slideshow_pauseon_hover=="true")
{ 
?>
var hidden_id = 'acx_hidden_id_'+<?php echo $uid; ?>;
var vedio_status = document.getElementById(hidden_id).value;
if(vedio_status!="play")
{
	stop_<?php echo $uid; ?>();
	start_<?php echo $uid; ?>();
	showPause_<?php echo $uid; ?>();

}
<?php } ?>
}
);

function back_<?php echo $uid; ?>()
{
var hidden_id = 'acx_hidden_id_'+<?php echo $uid; ?>;
var vedio_status = document.getElementById(hidden_id).value;
if(vedio_status!="play")
{
	cur_<?php echo $uid; ?>.animate({
										opacity: 0
									}, <?php echo $acx_slideshow_fadeouttime ?>).addClass('inactive').removeClass('active');
	if ( cur_<?php echo $uid; ?>.hasClass('first'))
	cur_<?php echo $uid; ?> = jQuery('.acx_ppt_<?php echo $uid; ?> li:last');
	else
	cur_<?php echo $uid; ?> = cur_<?php echo $uid; ?>.prev();
	cur_<?php echo $uid; ?>.animate({
										opacity: 1
									}, <?php echo $acx_slideshow_fadeintime ?>).addClass('active').removeClass('inactive');
}
}

function showPause_<?php echo $uid; ?>()
{
	jQuery('#img_play_<?php echo $uid; ?>').hide();
	jQuery('#img_stop_<?php echo $uid; ?>').show();
}

function showPlay_<?php echo $uid; ?>() 
{
	jQuery('#img_stop_<?php echo $uid; ?>').hide();
	jQuery('#img_play_<?php echo $uid; ?>').show();
}

function start_<?php echo $uid; ?>() 
{
	interval_<?php echo $uid; ?> = setInterval( "forward_<?php echo $uid; ?>()", <?php echo $acx_slideshow_timespan  ?> );
}

function stop_<?php echo $uid; ?>()
{
	clearInterval( interval_<?php echo $uid; ?> );
}

jQuery(function() 
{
	start_<?php echo $uid; ?>();
} );

jQuery( document ).ready(function() {
acx_hidden_id_<?php echo $uid; ?> = jQuery("#acx_hidden_id_<?php echo $uid; ?>").val('stop');
});
<?php
}
?>
</script>
<!-- Ending of Javascript Generated by Advanced Slideshow Manager -->	

<?php
}
add_action('wp_footer', 'acx_slideshow_js_show');
function acx_slideshow_sc( $atts ) 
{
	$acx_slideshow_array=array();
	extract( shortcode_atts( array(
									'name' => "",
									'height' => "",
									'width' => "",), $atts 
								) );
	$temp_height = str_replace("%","",$height);
	$temp_height = str_replace("px","",$temp_height);
	if(!is_numeric($temp_height))
	{
		$height = "";
	}
	$temp_width = str_replace("%","",$width);
	$temp_width = str_replace("px","",$temp_width);
	if(!is_numeric($temp_width))
	{
		$width = "";
	}
	ob_start();
	$acx_slideshow_array=array(
								'name'=> $name,
								'height'=> $height,
								'width'=> $width
								);
	$acx_slideshow_output_slide=acx_slideshow($acx_slideshow_array);
	echo $acx_slideshow_output_slide;
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}add_shortcode( 'acx_slideshow', 'acx_slideshow_sc' );
// Starting Widget Code
class Acx_Slideshow_Widget extends WP_Widget
{

// Register the widget
    function Acx_Slideshow_Widget() 
	{
// Set some widget options
		$acx_ssm_widget_title=__('Simple Slideshow Manager','simple-slideshow-manager');
        $widget_options = array('description' => __('Allow users to include a slideshow From Acurax Slideshow Plugin','simple-slideshow-manager'),'classname' => 'acx_slideshow_desc');
		$control_options = array('width' => 300);
		parent::__construct('acx_slideshow_widget', $acx_ssm_widget_title , $widget_options ,$control_options );
    }
// Output the content of the widget
    function widget($args, $instance) 
	{
		$acx_slideshow_array=array();
        extract( $args ); // Don't worry about this
// Get our variables
        $title = apply_filters( 'widget_title', $instance['title'] );
		$gallery_name = $instance['gallery_name'];
		$gallery_height = $instance['gallery_height'];
		$gallery_width = $instance['gallery_width'];
// This is defined when you register a sidebar
        echo $before_widget;
        // If our title isn't empty then show it
        if ( $title ) 
		{
            echo $before_title . $title . $after_title;
        }
		$acx_slideshow_array=array(
								'name'=> $gallery_name,
								'height'=> $gallery_height,
								'width'=> $gallery_width
								);
		$acx_slideshow_output_slide_widget=acx_slideshow($acx_slideshow_array);
		echo $acx_slideshow_output_slide_widget;
// This is defined when you register a sidebar
        echo $after_widget;
    }
// Output the admin options form
	function form($instance) 
	{
// These are our default values
		$defaults = array( 'title' => __('Simple Slideshow','simple-slideshow-manager'),'gallery_name' => '','gallery_height' => '150px','gallery_width' => '200px' );
// This overwrites any default values with saved values
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
				<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
				value="<?php echo $instance['title']; ?>" type="text" class="widefat" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('gallery_name'); ?>"><?php _e('Gallery Name:'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('gallery_name'); ?>" id="<?php echo $this
				->get_field_id('gallery_name'); ?>">
				<?php
				
				$acx_slideshow_gallery_data = get_option('acx_slideshow_gallery_data');
				if(is_serialized($acx_slideshow_gallery_data))
				{
					$acx_slideshow_gallery_data = unserialize($acx_slideshow_gallery_data);	
				}
				if($acx_slideshow_gallery_data == "" )
				{
					$acx_slideshow_gallery_data = array();
				}
				$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
				if(is_serialized($acx_slideshow_imageupload_complete_data))
				{
					$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
				}
				if($acx_slideshow_imageupload_complete_data == "" )
				{
					$acx_slideshow_imageupload_complete_data = array();
				}
				
				foreach ($acx_slideshow_imageupload_complete_data as $key => $value)
			    {
				?>
				<option value="<?php echo $key; ?>"<?php if ($instance['gallery_name'] == $key) { echo 'selected="selected"'; } ?>><?php echo $key; ?> </option>
				<?php
				}
				?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('gallery_width'); ?>"><?php _e('Slide Width:'); ?></label>
				<input id="<?php echo $this->get_field_id('gallery_width'); ?>" name="<?php echo $this->get_field_name('gallery_width'); ?>"
				value="<?php echo $instance['gallery_width']; ?>" type="text" class="widefat" />
				<?php _e('Width is Needed Eg:200px','simple-slideshow-manager'); ?>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('gallery_height'); ?>"><?php _e('Slide Height:'); ?></label>
				<input id="<?php echo $this->get_field_id('gallery_height'); ?>" name="<?php echo $this->get_field_name('gallery_height'); ?>"
				value="<?php echo $instance['gallery_height']; ?>" type="text" class="widefat" />
				<?php _e('Height is Needed Eg:150px','simple-slideshow-manager'); ?>
			</p>
			
		<?php
	}
// Processes the admin options form when saved
	function update($new_instance, $old_instance) 
	{
// Get the old values
		$instance = $old_instance;
// Update with any new values (and sanitise input)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['gallery_name'] = strip_tags( $new_instance['gallery_name'] );
		$instance['gallery_height'] = strip_tags( $new_instance['gallery_height'] );
		$instance['gallery_width'] = strip_tags( $new_instance['gallery_width'] );
		return $instance;
	}
} add_action('widgets_init', create_function('', 'return register_widget("Acx_Slideshow_Widget");'));
// Ending Widget Codes

// Starting Ajax
function acx_slideshow_ajax_upload_callback()
{
	global $wpdb,$acx_slideshow_misc_user_level;
	if(!isset($_POST['acx_slideshow_ajax_upload_es'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!wp_verify_nonce($_POST['acx_slideshow_ajax_upload_es'],'acx_slideshow_ajax_upload_es')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	$image_url = $gallery_name = $image_title = $image_caption = $image_alttext = $image_desc = $video_url = $type = '';
	if(ISSET($_POST['image_url']))
	{
		$image_url = $_POST['image_url'];
	}
	if(ISSET($_POST['gallery_name']))
	{
		$gallery_name = $_POST['gallery_name'];
	}
	if(ISSET($_POST['image_title']))
	{
		$image_title = $_POST['image_title'];
	}
	if(ISSET($_POST['image_caption']))
	{
		$image_caption = $_POST['image_caption'];
	}
	if(ISSET($_POST['image_alttext']))
	{
		$image_alttext = $_POST['image_alttext'];
	}
	if(ISSET($_POST['image_desc']))
	{
		$image_desc = $_POST['image_desc'];
	}
	if(ISSET($_POST['video_url']))
	{
		$video_url = $_POST['video_url'];
	}
	if(ISSET($_POST['type']))
	{
		$type = $_POST['type'];
	}
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
	}
	if($acx_slideshow_imageupload_complete_data == "" )
	{
		$acx_slideshow_imageupload_complete_data = array();
	}
	
	
	$slide_count=count($acx_slideshow_imageupload_complete_data[$gallery_name]);
	
/* insert image info to array */
	if($type=="image")
	{
		$acx_slideshow_imageupload_complete_data[$gallery_name][$slide_count]=(array(
																		"type"=>sanitize_text_field($type),
																		"image_url" =>esc_url_raw($image_url),
																		"image_title"=>sanitize_text_field($image_title),
																		"image_caption" =>sanitize_text_field($image_caption),
																		"image_alttext" =>sanitize_text_field($image_alttext),
																		"image_desc" =>sanitize_text_field($image_desc),
																		"link_url"=>"",
																		"link_target"=>""
																	  ));
	}
	else if($type=="youtube_video")
	{
		$regexstr = '~
            # Match Youtube link and embed code
            (?:                             # Group to match embed codes
                (?:<iframe [^>]*src=")?       # If iframe match up to first quote of src
                |(?:                        # Group to match if older embed
                    (?:<object .*>)?      # Match opening Object tag
                    (?:<param .*</param>)*  # Match all param tags
                    (?:<embed [^>]*src=")?  # Match embed tag to the first quote of src
                )?                          # End older embed code group
            )?                              # End embed code groups
            (?:                             # Group youtube url
                https?:\/\/                 # Either http or https
                (?:[\w]+\.)*                # Optional subdomains
                (?:                         # Group host alternatives.
                youtu\.be/                  # Either youtu.be,
                | youtube\.com              # or youtube.com
                | youtube-nocookie\.com     # or youtube-nocookie.com
                )                           # End Host Group
                (?:\S*[^\w\-\s])?           # Extra stuff up to VIDEO_ID
                ([\w\-]{11})                # $1: VIDEO_ID is numeric
                [^\s]*                      # Not a space
            )                               # End group
            "?                              # Match end quote if part of src
            (?:[^>]*>)?                       # Match any extra stuff up to close brace
            (?:                             # Group to match last embed code
                </iframe>                 # Match the end of the iframe
                |</embed></object>          # or Match the end of the older embed
            )?                              # End Group of last bit of embed code
            ~ix';
 
        preg_match($regexstr, $video_url, $matches);
		$imgid = $matches[1];
		$thumbnail_image = "http://img.youtube.com/vi/".$imgid."/hqdefault.jpg";
		$acx_slideshow_imageupload_complete_data[$gallery_name][$slide_count]=(array(
																		"type"=>sanitize_text_field($type),
																		"video_url" =>esc_url_raw($video_url),
																		"thumbnail_image"=>esc_url_raw($thumbnail_image),
																		"vedio_id" =>$imgid
																		
																	  ));
	}
	else if($type=="vimeo_video")
	{	
		$regexstr = '~
				# Match Vimeo link and embed code
				(?:<iframe  [^>]*src=")?       # If iframe match up to first quote of src
				(?:                         # Group vimeo url
				https?:\/\/             # Either http or https
				(?:[\w]+\.)*            # Optional subdomains
				vimeo\.com              # Match vimeo.com
				(?:[\/\w]*\/videos?)?   # Optional video sub directory this handles groups links also
				\/                      # Slash before Id
				([0-9]+)                # $1: VIDEO_ID is numeric
				[^\s]*                  # Not a space
				)                           # End group
				"?                          # Match end quote if part of src
				(?:[^>]*></iframe>)?        # Match the end of the iframe
				(?:<p>.*</p>)?              # Match any title information stuff
				~ix';
				preg_match($regexstr, $video_url, $matches); 
				$imgid = $matches[1];
				$hash = unserialize(@file_get_contents("http://vimeo.com/api/v2/video/".$imgid.".php"));
				if($hash==false)
				{?>
					<script>
					alert('<?php _e('invalid vimeo url','simple-slideshow-manager'); ?>');
					location.reload();
					</script>
				<?php die();
				}
				$thumbnail_image= $hash[0]['thumbnail_medium']; 
		$acx_slideshow_imageupload_complete_data[$gallery_name][$slide_count]=(array(
																		"type"=>sanitize_text_field($type),
																		"video_url" =>esc_url_raw($video_url),
																		"thumbnail_image"=>esc_url_raw($thumbnail_image),
																		"vedio_id"=>$imgid
																	  ));
	}
	if (current_user_can($acx_slideshow_misc_user_level)) 
	{
		if(!is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
		}
		update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);


	}
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
	}
	if($acx_slideshow_imageupload_complete_data == "" )
	{
		$acx_slideshow_imageupload_complete_data = array();
	}
	$slide_count=count($acx_slideshow_imageupload_complete_data[$gallery_name]);
	$acx_ssm_slide_delete=__('Delete This Slide','simple-slideshow-manager');
	$acx_ssm_slide_edit=__('Edit This Slide','simple-slideshow-manager');
	$acx_ssm_slide_add=__('Add Link To This Slide','simple-slideshow-manager');
/* response display */
	echo "<div id='s_s_notice'>". __('Slides Inserted','simple-slideshow-manager') ."</div>";
	echo"<ul id = \"acx_slideshow_sortable\">";
	for($i = 0  ; $i <$slide_count ; $i++)
	{
		
		if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="image")
		{
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_url'])."\" alt = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_alttext']."\" title = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_title']."\" > &nbsp;";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_title']."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";
			echo "<div class=\"edit_but\" id=\"acx_edit_image_".$i."\" onclick = \"acx_edit(".$i.");\" title='".$acx_ssm_slide_edit."'></div></br>";
			echo "<div class=\"add_link\" id=\"acx_edit_image_".$i."\" onclick = \"acx_edit(".$i.");\" title='".$acx_ssm_slide_add."'></div></br>";	
			echo "</li>";
		}
		else  if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="youtube_video")
		{
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src=\"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."\"  alt = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" title = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" > &nbsp;";
			echo "<div class=\"play_but\" title=\"\"></div></br>";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";	
			echo "</li>";
		}
		else  if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="vimeo_video")
		{
 
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src=\"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."\"  alt = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" title = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" > &nbsp;";
			echo "<div class=\"play_but\" title=\"\"></div></br>";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";	
			echo "</li>";
		}
	}
	echo"</ul>";
	if($slide_count>1)
	{
		echo "<span class='note'style='text-align:center'>". __( 'Drag and Drop to Reorder Slides', 'simple-slideshow-manager' ) . "</span>";
	}
	die(); // this is required to return a proper result
} add_action('wp_ajax_acx_slideshow_ajax_upload', 'acx_slideshow_ajax_upload_callback');
function acx_slideshow_ajax_updateRecordsListings_callback()
{
	global $wpdb,$acx_slideshow_misc_user_level;
	
	if(!isset($_POST['acx_slideshow_ajax_updateRecordsListings_es']))  die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!wp_verify_nonce($_POST['acx_slideshow_ajax_updateRecordsListings_es'],'acx_slideshow_ajax_updateRecordsListings_es'))  die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	$social_icon_array_order = array();
	if(ISSET($_POST['recordsArray']))
	{
		$social_icon_array_order = $_POST['recordsArray'];
	}
	if(ISSET($_POST['gallery_name']))
	{
		$gallery_name = $_POST['gallery_name'];
	}
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
	}
	if($acx_slideshow_imageupload_complete_data == "" )
	{
		$acx_slideshow_imageupload_complete_data = array();
	}
	$countr = count($social_icon_array_order);
	for($i=0;$i<$countr; $i++)
	{
		$num = $social_icon_array_order[$i];
		$local[$i]=$acx_slideshow_imageupload_complete_data[$gallery_name][$num];
	}	
	$acx_slideshow_imageupload_complete_data[$gallery_name] = $local;
	// ********** response *************
	if (current_user_can($acx_slideshow_misc_user_level)) 
	{
		if(!is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
		}
		update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);
	}
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
	}
	$slide_count=count($acx_slideshow_imageupload_complete_data[$gallery_name]);
	echo "<div id='s_s_notice'>".__('Slides Sorted','simple-slideshow-manager') ."</div>";
	echo"<ul id = \"acx_slideshow_sortable\">";
	//echo $slide_count;
	for($i = 0  ; $i <$slide_count ; $i++)
	{
		if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="image")
		{
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_url'])."\" alt = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_alttext']."\" title = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_title']."\" > &nbsp;";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_title']."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";
			echo "<div class=\"edit_but\" id=\"acx_edit_image_".$i."\" onclick = \"acx_edit(".$i.");\" title='".$acx_ssm_slide_edit."'></div></br>";
			echo "<div class=\"add_link\" id=\"acx_edit_image_".$i."\" onclick = \"acx_edit(".$i.");\" title='".$acx_ssm_slide_add."'></div></br>";	
			echo "</li>";
		}
		else  if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="youtube_video")
		{
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src=\"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."\"  alt = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" title = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" > &nbsp;";
			echo "<div class=\"play_but\" title=\"\"></div></br>";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";	
			echo "</li>";
		}
		else  if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="vimeo_video")
		{
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src=\"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."\"  alt = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" title = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" > &nbsp;";
			echo "<div class=\"play_but\" title=\"\"></div></br>";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";	
			echo "</li>";
		
		}
	}
	echo"</ul>";
	if($slide_count>1)
	{
		echo "<span class='note'style='text-align:center'>". __( 'Drag and Drop to Reorder Slides', 'simple-slideshow-manager' ) . "</span>";
	}
	die(); // this is required to return a proper result
} add_action('wp_ajax_acx_slideshow_ajax_updateRecordsListings', 'acx_slideshow_ajax_updateRecordsListings_callback');
function acx_slideshow_ajax_deleteimage_callback()
{
	global $wpdb,$acx_slideshow_misc_user_level;
	if(!isset($_POST['acx_slideshow_ajax_deleteimage_es'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!wp_verify_nonce($_POST['acx_slideshow_ajax_deleteimage_es'],'acx_slideshow_ajax_deleteimage_es')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	$gallery_name = $index = "";
	if(ISSET($_POST['gallery_name']))
	{
		$gallery_name = $_POST['gallery_name'];
	}
	if(ISSET($_POST['index']))
	{
		$index = $_POST['index'];
	}
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
	}
	if($acx_slideshow_imageupload_complete_data == "" )
	{
		$acx_slideshow_imageupload_complete_data = array();
	}
	$key = array_search($index, $acx_slideshow_imageupload_complete_data[$gallery_name]); 
	unset($acx_slideshow_imageupload_complete_data[$gallery_name][$index]);
	$acx_slideshow_imageupload_complete_data[$gallery_name] = array_values($acx_slideshow_imageupload_complete_data[$gallery_name]);
	if(current_user_can($acx_slideshow_misc_user_level)) 
	{
		if(!is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
		}
		update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);
	}
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
	}
	$slide_count=count($acx_slideshow_imageupload_complete_data[$gallery_name]);
	echo "<div id='s_s_notice'>". __('Slides Deleted','simple-slideshow-manager') ."</div>";
	echo"<ul id = \"acx_slideshow_sortable\">";
/* response display */ 

	for($i = 0  ; $i <$slide_count ; $i++)
	{
		if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="image")
		{
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_url'])."\" alt = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_alttext']."\" title = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_title']."\" > &nbsp;";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['image_title']."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";
			echo "<div class=\"edit_but\" id=\"acx_edit_image_".$i."\" onclick = \"acx_edit(".$i.");\" title='".$acx_ssm_slide_edit."'></div></br>";
			echo "<div class=\"add_link\" id=\"acx_edit_image_".$i."\" onclick = \"acx_edit(".$i.");\" title='".$acx_ssm_slide_add."'></div></br>";
			echo "</li>";
		}
		else  if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="youtube_video")
		{
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src=\"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."\"  alt = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" title = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" > &nbsp;";
			echo "<div class=\"play_but\" title=\"\"></div></br>";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";	
			echo "</li>";
		}
		else  if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="vimeo_video")
		{
			echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
			echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
			echo "<img src=\"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."\"  alt = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" title = \"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" > &nbsp;";
			echo "<div class=\"play_but\" title=\"\"></div></br>";
			echo "<div class=\"del_but\" id=\"acx_delete_image_".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url'])."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";	
			echo "</li>";
		}
	}
	echo"</ul>";
	if($slide_count>1)
	{
		echo "<span class='note'style='text-align:center'>". __( 'Drag and Drop to Reorder Slides', 'simple-slideshow-manager' ) . "</span>";
	}	
	die(); // this is required to return a proper result
}
 add_action('wp_ajax_acx_slideshow_ajax_deleteimage', 'acx_slideshow_ajax_deleteimage_callback');

function acx_ajax_renamefunction_callback()
{
	$status='0';
	global $wpdb,$acx_slideshow_misc_user_level;
	if(!isset($_POST['acx_ajax_renamefunction_es'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!wp_verify_nonce($_POST['acx_ajax_renamefunction_es'],'acx_ajax_renamefunction_es')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	$new_galleryname = $old_galleryname = '';
	if(ISSET($_POST['newname']))
	{
	$new_galleryname = trim($_POST['newname']);
	}
	if(ISSET($_POST['newname']))
	{
	$old_galleryname = trim($_POST['oldname']);
	}
	$acx_slideshow_misc_user_level = get_option('acx_slideshow_misc_user_level');
	if($acx_slideshow_misc_user_level=="")
	{
	$acx_slideshow_misc_user_level = "manage_options";
	}
	if (current_user_can($acx_slideshow_misc_user_level)) 
	{
		$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
		if(is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
		}
		if($acx_slideshow_imageupload_complete_data == "" )
		{
			$acx_slideshow_imageupload_complete_data = array();
		}
		$acx_slideshow_gallery_data = get_option('acx_slideshow_gallery_data');
		if(is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = unserialize($acx_slideshow_gallery_data);	
		}
		if($acx_slideshow_gallery_data == "" )
		{
			$acx_slideshow_gallery_data = array();
		}
		$found = '';
		foreach ($acx_slideshow_imageupload_complete_data as $key => $value)
		{
			if($key==$new_galleryname)
			{
				$found="yes";
				$status='1';
			}
		}
		if($found!="yes")
		{
			foreach ($acx_slideshow_imageupload_complete_data as $key => $value)
			{
				
				if($key==$old_galleryname)
				{
					$acx_slideshow_imageupload_complete_data[$new_galleryname] = $acx_slideshow_imageupload_complete_data[$old_galleryname];
					unset($acx_slideshow_imageupload_complete_data[$old_galleryname]);
				}
			}
			if(!is_serialized($acx_slideshow_imageupload_complete_data))
			{
				$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
			}
			update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);
			
			foreach ($acx_slideshow_gallery_data as $key => $value)
			{
				if($key==$old_galleryname)
				{
					$acx_slideshow_gallery_data[$new_galleryname] = $acx_slideshow_gallery_data[$old_galleryname];
					unset($acx_slideshow_gallery_data[$old_galleryname]);
				}
			}
			if(!is_serialized($acx_slideshow_gallery_data))
			{
				$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
			}
			update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
		$status='2';
		} 
	}
	echo $status;
die();

}
add_action('wp_ajax_acx_ajax_renamefunction', 'acx_ajax_renamefunction_callback');

function acx_slideshow_ajax_editimage_callback()
{
	global $wpdb;
	if(!isset($_POST['acx_slideshow_ajax_editimage_es'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!wp_verify_nonce($_POST['acx_slideshow_ajax_editimage_es'],'acx_slideshow_ajax_editimage_es')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	$gallery_name = $index = $title =  $alttext = $url = $target = "";
	if(ISSET($_POST['gallery_name']))
	{
		$gallery_name = $_POST['gallery_name'];
	}
	if(ISSET($_POST['index']))
	{
		$index = $_POST['index'];
	}
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
	}
	if($acx_slideshow_imageupload_complete_data == "" )
	{
		$acx_slideshow_imageupload_complete_data = array();
	}
	if(ISSET($acx_slideshow_imageupload_complete_data[$gallery_name][$index]['image_title']))
	{
		$title = $acx_slideshow_imageupload_complete_data[$gallery_name][$index]['image_title'];
	}
	if(ISSET($acx_slideshow_imageupload_complete_data[$gallery_name][$index]['image_alttext']))
	{
		$alttext = $acx_slideshow_imageupload_complete_data[$gallery_name][$index]['image_alttext'];
	}
	if(ISSET($acx_slideshow_imageupload_complete_data[$gallery_name][$index]['link_url']))
	{
		$url= $acx_slideshow_imageupload_complete_data[$gallery_name][$index]['link_url'];
	}
	if(ISSET($acx_slideshow_imageupload_complete_data[$gallery_name][$index]['link_target']))
	{
		$target =  $acx_slideshow_imageupload_complete_data[$gallery_name][$index]['link_target'];
	}
	
	echo "<form name=\"acx_editimage_form\" id=\"acx_editimage_form\" method=\"post\" action=\"\">";
	echo "<table cellpadding=\"0\"><tr><td>". __('Image Title','simple-slideshow-manager') ."</td><td><input type=\"text\" id=\"acx_slideshow_edit_title\" name=\"acx_slideshow_edit_title\" size=\"40\" value=\"".$title."\" /></td></tr>";
	echo "<tr><td>". __('Image Alt Text','simple-slideshow-manager') ."</td><td><input type=\"text\" id=\"acx_slideshow_edit_alt\" name=\"acx_slideshow_edit_alt\" size=\"40\" value=\"".$alttext."\" /></td></tr>";
	echo "<tr><td>". __('Link URL','simple-slideshow-manager') ."</td><td><input type=\"text\" id=\"acx_slideshow_edit_url\" name=\"acx_slideshow_edit_url\" size=\"40\" value=\"".esc_url($url)."\" /></td></tr>"; ?>
	<tr><td><?php _e('Target','simple-slideshow-manager'); ?></td><td><select id="acx_link_target">
	<option value="_blank" <?php if ($target == "_blank") { echo 'selected="selected"'; } ?>><?php _e('_blank','simple-slideshow-manager'); ?></option>
	<option value="_self" <?php if ($target == "_self") { echo 'selected="selected"'; } ?>><?php _e('_self','simple-slideshow-manager'); ?></option>
	<option value="_parent" <?php if ($target == "_parent") { echo 'selected="selected"'; } ?>><?php _e('_parent','simple-slideshow-manager'); ?></option>
	<option value="_top" <?php if ($target == "_top") { echo 'selected="selected"'; } ?>><?php _e('_top','simple-slideshow-manager'); ?></option>
	</select></td></tr>
	<?php
	echo "<tr><td colspan=\"2\"><a href=\"#\" class=\"button can_edit\" id=\"acx_edit_image_link\" onclick=\"acx_slideshow_change_edittext_cancel();\" >". __('Cancel','simple-slideshow-manager') ."</a>";
	echo "<a href=\"#\" class=\"button edit_edit\" id=\"acx_edit_image_link\" onclick=\"acx_slideshow_change_edittext(".$index.");\" >".__('Update','simple-slideshow-manager') ."</a></td></tr></table>";
	echo "</form>";
	die(); // this is required to return a proper result
}
add_action('wp_ajax_acx_slideshow_ajax_editimage','acx_slideshow_ajax_editimage_callback');

function acx_slideshow_ajax_changeedittext_callback()
{
	global $wpdb,$acx_slideshow_misc_user_level;
	if(!isset($_POST['acx_slideshow_ajax_changeedittext_es'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if(!wp_verify_nonce($_POST['acx_slideshow_ajax_changeedittext_es'],'acx_slideshow_ajax_changeedittext_es')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	$gallery_name = $index = $title = $alttext = $url = $target = "";
	if(ISSET($_POST['gallery_name']))
	{
		$gallery_name = $_POST['gallery_name'];
	}
	if(ISSET($_POST['index']))
	{
		$index = $_POST['index'];
	}
	if(ISSET($_POST['title']))
	{
		$title = $_POST['title'];
	}
	if(ISSET($_POST['alttext']))
	{
		$alttext = $_POST['alttext'];
	}
	if(ISSET($_POST['url']))
	{
		$url = $_POST['url'];
	}
	if(ISSET($_POST['target']))
	{
		$target = $_POST['target'];
	}
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
	}
	if($acx_slideshow_imageupload_complete_data == "" )
	{
		$acx_slideshow_imageupload_complete_data = array();
	}
	$acx_slideshow_imageupload_complete_data[$gallery_name][$index]['image_title']= sanitize_text_field($title);
	$acx_slideshow_imageupload_complete_data[$gallery_name][$index]['image_alttext']= sanitize_text_field($alttext);
	$acx_slideshow_imageupload_complete_data[$gallery_name][$index]['link_url']= esc_url_raw($url);
	$acx_slideshow_imageupload_complete_data[$gallery_name][$index]['link_target']= sanitize_text_field($target);
	if (current_user_can($acx_slideshow_misc_user_level)) 
	{
		if(!is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
		}
		update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);
	}
	die(); // this is required to return a proper result
	
}
add_action('wp_ajax_acx_slideshow_ajax_changeedittext','acx_slideshow_ajax_changeedittext_callback');

function acx_slideshow_pluign_promotion()
{
	$acx_tweet_text_array = array
						(
						__('I am using Simple Slideshow Manager worspress plugin from @acuraxdotcom and you should too','simple-slideshow-manager'),
						__('It looks awesome thanks @acuraxdotcom for developing such a wonderful Slideshow plugin','simple-slideshow-manager'),
						__('Simple Slideshow Manager from @acuraxdotcom very simple and easy to configure','simple-slideshow-manager'),
						__('I have been using Simple Slideshow Manager plugin for a while and it looks nice','simple-slideshow-manager'),
						__('Its very nice and flexible Slideshow plugin thanks @acuraxdotcom','simple-slideshow-manager'),
						__('Simple Slideshow Managers user interface looks very simple and easy to understand.Good job @acuraxdotcom..','simple-slideshow-manager'), 
						__('Simple Slideshow Manager from @acuraxdotcom is too much understandable to beginners.','simple-slideshow-manager'), 
						__('I installed Simple Slideshow Manager wordpress plugin from @acuraxdotcom and it looks awesome.','simple-slideshow-manager')
						);
$acx_tweet_text = array_rand($acx_tweet_text_array, 1);
$acx_tweet_text = $acx_tweet_text_array[$acx_tweet_text];
$acx_ssm_company_name=__('Acurax Web Designing Company','simple-slideshow-manager');
$acx_ssm_pre_name=__('Premium Simple Slideshow Manager','simple-slideshow-manager');
    echo '<div id="acx_td" class="error" style="background: none repeat scroll 0pt 0pt infobackground; border: 1px solid inactivecaption; padding: 5px;line-height:16px;">
	<p>'.__('It looks like you have been enjoying using Simple Slideshow Manager plugin from','simple-slideshow-manager').' <a href="'.esc_url('http://www.acurax.com?utm_source=plugin&utm_medium=thirtyday&utm_campaign=ssm').'" title="'.$acx_ssm_company_name.'" target="_blank">'.__('Acurax','simple-slideshow-manager').'</a> '.__('for atleast 30 days.Would you consider upgrading to ','simple-slideshow-manager').'<a href="'.esc_url('http://www.acurax.com/products/simple-advanced-slideshow-manager/?utm_source=plugin&utm_medium=thirtyday_yellow&utm_campaign=ssm').'" title="'.$acx_ssm_pre_name.'" target="_blank">'.__('premium version','simple-slideshow-manager').'</a> '.__('to enjoy more features and help support continued development of the plugin? - Spreading the world about this plugin. Thank you for using the plugin','simple-slideshow-manager').'</p>
	<p>
	<a href="'.esc_url('http://wordpress.org/support/view/plugin-reviews/simple-slideshow-manager').'" class="button" style="color:black;text-decoration:none;padding:5px;margin-right:4px;" target="_blank">'.__('Rate it 5 Stars on wordpress','simple-slideshow-manager').'</a>
	<a href="https://twitter.com/share?url=http://www.acurax.com/products/simple-advanced-slideshow-manager/&text='.$acx_tweet_text.' -" class="button" style="color:black;text-decoration:none;padding:5px;margin-right:4px;" target="_blank">'.__('Tell Your Followers','simple-slideshow-manager').'</a>
	<a href="'.esc_url('http://www.acurax.com/products/simple-advanced-slideshow-manager/?utm_source=plugin&utm_medium=thirtyday&utm_campaign=ssm').'" class="button" style="color:black;text-decoration:none;padding:5px;margin-right:4px;" target="_blank">'.__('Order Premium Version','simple-slideshow-manager').'</a>
	<a href="'.esc_url('admin.php?page=Acurax-Slideshow-Misc&td=hide').'" class="button" style="color:black;text-decoration:none;padding:5px;margin-right:4px;margin-left:20px;">'.__('Don\'t Show This Again','simple-slideshow-manager').'</a>
</p>
		  
		  </div>';
}
$acx_slideshow_installed_date = get_option('acx_slideshow_installed_date');
if ($acx_slideshow_installed_date=="") {
$acx_slideshow_installed_date = time();
update_option('acx_slideshow_installed_date',$acx_slideshow_installed_date);
}
$acx_slideshow_installed_date = get_option('acx_slideshow_installed_date');
if($acx_slideshow_installed_date < ( time() - 2952000 ))
{
	if (get_option('acx_ssm_td') != "hide")
	{
		add_action('admin_notices', 'acx_slideshow_pluign_promotion',100);
	}
}

function acx_slideshow_dont_show_notice()
{
	$acx_status = '';
	if(ISSET($_GET['td']))
	{
	$acx_status = $_GET['td'];
	}
	if($acx_status == 'hide') 
	{
		update_option('acx_ssm_td', "hide");
		?>
		<style type='text/css'>
		#acx_td
		{
		display:none;
		}
		</style>
		<div id="acx_notif_tnk" class="error" style="background: none repeat scroll 0pt 0pt infobackground; border: 1px solid inactivecaption; padding: 5px;line-height:16px;">
		<?php _e('Thanks again for using the plugin. we will not show the mesage again.','simple-slideshow-manager'); ?>
		</div>
		<script>
		setTimeout(function(){
			jQuery('#acx_notif_tnk').hide();
		},5000);
		</script>
		<?php
	}
}
add_action('admin_notices', 'acx_slideshow_dont_show_notice',200);
function acx_slideshow_pluign_finish_version_update()
{
    echo "<div id='message class='updated'> <p><b>".__('Thanks for updating Simple Slideshow Manager plugin... You need to visit','simple-slideshow-manager')."<a href='admin.php?page=Acurax-Slideshow-Settings&status=updated#updated'>".__('Plugin\'s Settings Page','simple-slideshow-manager')."</a>".__(' to Complete the Updating Process - ','simple-slideshow-manager')."<a href='admin.php?page=Acurax-Slideshow-Settings&status=updated#updated'>".__('Click Here Visit Simple Slideshow Manager Plugin Settings','simple-slideshow-manager')."</a></b></p>
		  </div>";
}
$acx_slideshow_version = get_option('acx_slideshow_version');
if($acx_slideshow_version < ACX_SLIDESHOW_VERSION || $acx_slideshow_version == "") // << Old Version // Current Verison
{
	add_action('admin_notices', 'acx_slideshow_pluign_finish_version_update',1);
}
function acx_slideshow_pluign_old_version()
{
    echo '<div id="message" class="error">
		  <p><b>'.__("You are using an old version of wordpress, You need to have wordpress version 3.5 or above to have the plugin to work properly, please update your wordpress installation.","simple-slideshow-manager").'</b></p>
		  </div>';
}
if(!function_exists('wp_enqueue_media'))
{
	add_action('admin_notices', 'acx_slideshow_pluign_old_version',1);
}
function acx_slideshow_comparison($ad=2)
{
$ad_1 = '
</hr>
<a name="compare"></a><div id="ss_middle_wrapper" style="margin-top:10px;"> 
		<div id="ss_middle_center"> 
			<div id="ss_middle_inline_block"> 
			
				<div class="middle_h2_1"> 
					<h2>'. __("Limited on Features ?","simple-slideshow-manager").'</h2>
					<h3>'. __("Compare and Decide","simple-slideshow-manager").'</h3>
				</div><!-- middle_h2_1 -->
				
<div id="ss_features_table"> 
				
					<div id="ss_table_header"> 
						<div class="tb_h1"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
							<div class="tb_h2"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h2 -->
							<div class="tb_h3"> <div class="ss_download"> </div><!-- ss_download --> </div><!-- tb_h3 -->
						<div class="tb_h4 slideshow_tb_h4"> <a href="http://clients.acurax.com/advanced-slideshow-manager.php?utm_source=wpadmin&utm_medium=button&utm_campaign=compare" target="_blank"><div class="ss_buy_now"> </div><!-- ss_buy_now --></a> </div><!-- tb_h4 -->
					</div><!-- ss_table_header -->
						
					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 160px;"> '. __("Gallery ","simple-slideshow-manager").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("No Limits - Can have any number of galleries","simple-slideshow-manager").'</li>
								<li>'. __("Can Customize Each Gallery Transition Effects","simple-slideshow-manager").'</li>
								<li>'. __("Can Set Height & Width","simple-slideshow-manager").'</li>
								<li>'. __("Enable/Disable Slide Transition Pause on Mouseover","simple-slideshow-manager").'</li>
								<li>'. __("Centering Slideshow","simple-slideshow-manager").'</li>
								<li>'. __("Random Slideshow","simple-slideshow-manager").'</li>
								<li>'. __("Next and Previous Button Navigation","simple-slideshow-manager").'</li>
								<li>'. __("Responsive Slideshow","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","simple-slideshow-manager").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
								<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->
					
					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 160px;">'. __("Image Display ","simple-slideshow-manager").' </div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("No Limits - Can Have Any Number of Image Slides","simple-slideshow-manager").'</li>
								<li>'. __("Add link to image slides.","simple-slideshow-manager").'</li>
								<li>'. __("Add alt text to image slides. (Better for SEO)","simple-slideshow-manager").'</li>
								<li>'. __("Show Description on image slides","simple-slideshow-manager").'</li>
								<li>'. __("Enable/Disable - Description Always Show","simple-slideshow-manager").'</li>
								<li>'. __("Enable/Disable- Show Description Only On Mouseover","simple-slideshow-manager").'</li>
								<li>'. __("set image description font color","simple-slideshow-manager").'</li>
								<li class="ss_last_one">'. __("Can set description display position","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE","simple-slideshow-manager").' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->			

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 30px;"> '. __(" Video Display ","simple-slideshow-manager").' </div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("No Limits - Can Have Any Number of Youtube videos","simple-slideshow-manager").'</li>
								<li>'. __("No Limits - Can Have Any Number of Vimeo videos","simple-slideshow-manager").'</li>
								<li>'. __("Can choose video control button themes/styles","simple-slideshow-manager").'</li>
								<li>'. __("Can upload your own control button icons","simple-slideshow-manager").'</li>
								<li>'. __("Can set Video control button background color","simple-slideshow-manager").'</li>
								<li>'. __("Mute and unmute control","simple-slideshow-manager").'</li>
								<li class="ss_last_one">'. __("Pause and play control","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","simple-slideshow-manager").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 484px;"> '. __(" Slide Transition Styles ","simple-slideshow-manager").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("fade","simple-slideshow-manager").'</li>
								<li>'. __("blind-X","simple-slideshow-manager").'</li>
								<li>'. __("blind-Y","simple-slideshow-manager").'</li>
								<li>'. __("blind-Z","simple-slideshow-manager").'</li>
								<li>'. __("cover","simple-slideshow-manager").'</li>
								<li>'. __("curtain-X","simple-slideshow-manager").'</li>
								<li>'. __("curtain-Y","simple-slideshow-manager").'</li>
								<li>'. __("fade & Zoom","simple-slideshow-manager").'</li>
								<li>'. __("grow-X","simple-slideshow-manager").'</li>
								<li>'. __("grow-Y","simple-slideshow-manager").'</li>
								<li>'. __("scroll-Up","simple-slideshow-manager").'</li>
								<li>'. __("scroll-Down","simple-slideshow-manager").'</li>
								<li>'. __("scroll-Left","simple-slideshow-manager").'</li>
								<li>'. __("scroll-Right","simple-slideshow-manager").'</li>
								<li>'. __("scroll-Horizontal","simple-slideshow-manager").'</li>
								<li>'. __("scroll-Vertical","simple-slideshow-manager").'</li>
								<li>'. __("shuffle","simple-slideshow-manager").'</li>
								<li>'. __("slide-X","simple-slideshow-manager").'</li>
								<li>'. __("slide-Y","simple-slideshow-manager").'</li>
								<li>'. __("toss","simple-slideshow-manager").'</li>
								<li>'. __("turn-Up","simple-slideshow-manager").'</li>
								<li>'. __("turn-Down","simple-slideshow-manager").'</li>
								<li>'. __("turn-Left","simple-slideshow-manager").'</li>
								<li>'. __("turn-Right","simple-slideshow-manager").'</li>
								<li>'. __("uncover","simple-slideshow-manager").'</li>
								<li>'. __("wipe","simple-slideshow-manager").'</li>
								<li class="ss_last_one">'. __("Zoom","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","simple-slideshow-manager").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 110px;"> '. __(" Customize Slide Transition ","simple-slideshow-manager").'<br/></div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Can set transition InSpeed","simple-slideshow-manager").'</li>
								<li>'. __("Can Set transition OutSpeed","simple-slideshow-manager").'</li>
								<li>'. __("Can set transition Interval","simple-slideshow-manager").'</li>
								<li>'. __("Enable or disable easing","simple-slideshow-manager").'</li>
								<li>'. __("Preview Transition While Configuring","simple-slideshow-manager").'</li>
								<li>'. __("Enable or disable slide synchronization","simple-slideshow-manager").'</li>
								<li class="ss_last_one">'. __("Can set FadeIn and FadeOut","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE","simple-slideshow-manager").' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->				

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 70px;">'.__("Easy to Configure","simple-slideshow-manager").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Simple User interface","simple-slideshow-manager").'</li>
								<li>'. __("Easy to understand every option settings","simple-slideshow-manager").'</li>
								<li>'. __("Drag and Drop to Reorder Slides","simple-slideshow-manager").'</li>
								<li class="ss_last_one">'. __("Set Which User Level Can Manage Slideshow","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE","simple-slideshow-manager").' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->			

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 150px;">'. __("Widget Support","simple-slideshow-manager").' </div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Multiple Widget support","simple-slideshow-manager").'</li>
								<li>'. __("Simple Widget settings","simple-slideshow-manager").'</li>
								<li>'. __("Define Slideshow Size for each widget","simple-slideshow-manager").'</li>
								<li>'. __("Define FadeIn and FadeOut for each widget","simple-slideshow-manager").'</li>
								<li>'. __("Define transition Interval for each widget","simple-slideshow-manager").'</li>
								<li>'. __("Advanced Widget Settings","simple-slideshow-manager").'</li>
								<li>'. __("Define Slide Transition Animation for each widget","simple-slideshow-manager").'</li>
								<li class="ss_last_one">'. __("Enable or disable easing option for each widget","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","simple-slideshow-manager").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 225px;">'. __("Shortcode Support ","simple-slideshow-manager").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Multiple Instances","simple-slideshow-manager").'</li>
								<li>'. __("Simple shortcode automatic generator","simple-slideshow-manager").'</li>
								<li>'. __("Define FadeIn and FadeOut for each Shortcode","simple-slideshow-manager").'</li>
								<li>'. __("Define transition Interval for each Shortcode","simple-slideshow-manager").'</li>
								<li>'. __("Advanced ShortCode generator","simple-slideshow-manager").'</li>
								<li>'. __("Define Slideshow Size for each Shortcode","simple-slideshow-manager").'</li>
								<li>'. __("Define Slide Transition Animation for each Shortcode","simple-slideshow-manager").'</li>
								<li>'. __("Separate SpeedIn and SpeedOut for each Shortcode","simple-slideshow-manager").'</li>
								<li>'. __("Separate Slide transition interval for each Shortcode","simple-slideshow-manager").'</li>
								<li>'. __("Enable or disable easing option for each Shortcode","simple-slideshow-manager").'</li>
								<li>'. __("Enable or disable pause on hover for each Shortcode","simple-slideshow-manager").'</li>
								<li class="ss_last_one">'. __("Enable or disable synchronization for each Shortcode","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","simple-slideshow-manager").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'.__("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 210px;">'. __("PHP Code Support","simple-slideshow-manager").' </div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","simple-slideshow-manager").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Use Outside loop","simple-slideshow-manager").'</li>
								<li>'. __("Multiple instances","simple-slideshow-manager").'</li>
								<li>'. __("Simple php code support","simple-slideshow-manager").'</li>
								<li>'. __("Define FadeIn and FadeOut for each PHP Code ","simple-slideshow-manager").'</li>
								<li>'. __("Define transition Interval for each PHP Code","simple-slideshow-manager").'</li>
								<li>'. __("Define Slideshow Size for each PHP Code","simple-slideshow-manager").'</li>
								<li>'. __("Define Slide Transition Animation for each PHP Code","simple-slideshow-manager").'</li>
								<li>'. __("Separate SpeedIn and SpeedOut for each PHP Code","simple-slideshow-manager").'</li>
								<li>'. __("Separate Slide transition interval for each PHP Code","simple-slideshow-manager").'</li>
								<li>'. __("Enable or disable easing option for each PHP Code","simple-slideshow-manager").'</li>
								<li>'. __("Enable or disable pause on hover for each PHP Code","simple-slideshow-manager").'</li>
								<li class="ss_last_one">'. __("Enable or disable synchronization for each PHP Code","simple-slideshow-manager").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE","simple-slideshow-manager").' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","simple-slideshow-manager").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->						
					
				
					
				</div><!-- ss_features_table -->		

			<div id="ad_slideshow_2_button_order" style="float: left; width: 100%;">
<a href="http://clients.acurax.com/advanced-slideshow-manager.php?utm_source=plugin_ssm_settings&utm_medium=banner&utm_campaign=plugin_yellow_order" target="_blank"><div id="ad_slideshow_2_button_order_link"></div></a></div> <!-- ad_slideshow_2_button_order --></div></div></div>';
$ad_2='<div id="ad_slideshow_2"> <a href="http://clients.acurax.com/advanced-slideshow-manager.php?utm_source=plugin_ssm_settings&utm_medium=banner&utm_campaign=plugin_enjoy" target="_blank"><div id="ad_slideshow_2_button"></div></a> </div> <!-- ad_slideshow_2 --><br>
<div id="ad_slideshow_2_button_order">
<a href="http://clients.acurax.com/advanced-slideshow-manager.php?utm_source=plugin_ssm_settings&utm_medium=banner&utm_campaign=plugin_yellow_order" target="_blank"><div id="ad_slideshow_2_button_order_link"></div></a></div> <!-- ad_slideshow_2_button_order --> ';
if($ad=="" || $ad == 2) { echo $ad_2; } else if ($ad == 1) { echo $ad_1; } else { echo $ad_2; } 
} // Updated

function acx_slideshow_version_checkfor_gallery()
{
	$acx_slideshow_imageupload_complete_data=get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data=unserialize($acx_slideshow_imageupload_complete_data);
	}
	if($acx_slideshow_imageupload_complete_data == "" )
	{
		$acx_slideshow_imageupload_complete_data = array();
	}
	$acx_slideshow_version = ACX_SLIDESHOW_VERSION; // Current Version
	foreach($acx_slideshow_imageupload_complete_data as $key=>$values)
	{
		$i=0;
		foreach($values as $value)
		{
			if($value['type']=="")
			{
				$value['type'] = "image";
				$acx_slideshow_imageupload_complete_data[$key][$i] = $value;
			}
			$i=$i+1;
		}
	}
	if(!is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data=serialize($acx_slideshow_imageupload_complete_data);
	}
	update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);
	update_option('acx_slideshow_version',$acx_slideshow_version);
}
$acx_slideshow_version = get_option('acx_slideshow_version');
if($acx_slideshow_version < ACX_SLIDESHOW_VERSION) // Current Version
{
	if(function_exists('acx_slideshow_version_checkfor_gallery'))
	{
		add_action('admin_head','acx_slideshow_version_checkfor_gallery');
	}
}
// refresh 
function acx_slideshow_install_licence_refresh_callback()
{
	if (!isset($_POST['acx_slideshow_install_licence_refresh_w_c_n'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	if (!wp_verify_nonce($_POST['acx_slideshow_install_licence_refresh_w_c_n'],'acx_slideshow_install_licence_refresh_w_c_n')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','simple-slideshow-manager')."<a href=''>".__('Click Here','simple-slideshow-manager')."</a>");
	$key = $licence = $id = "";
	$response_stat = "failed";
	if(ISSET($_POST['key']))
	{
		$key = $_POST['key'];
	}
	if(ISSET($_POST['licence']))
	{
		$licence = $_POST['licence'];
	}
	if(!function_exists('acx_check_advanced_slideshow_offline_license') && function_exists('check_acx_pslideshow_license'))
	{
		$result = check_acx_pslideshow_license($licence,'',true,$id);
	}
	else{
		$result = array();
	}
	if(ISSET($result["localkey"]))
	{
		$local_key = $result["localkey"];
	}
	else{
		$local_key = "";
	}
	$acx_advanced_slideshow_licence_array = get_option('acx_advanced_slideshow_licence_array');
	if(is_serialized($acx_advanced_slideshow_licence_array))
	{
		$acx_advanced_slideshow_licence_array = unserialize($acx_advanced_slideshow_licence_array);
	}
	if($acx_advanced_slideshow_licence_array == "" || !is_array($acx_advanced_slideshow_licence_array))
	{
		$acx_advanced_slideshow_licence_array = array();
	}
	$acx_slideshow_purchased_li_array = get_option('acx_slideshow_purchased_li_array');
	if(is_serialized($acx_slideshow_purchased_li_array))
	{
		$acx_slideshow_purchased_li_array = unserialize($acx_slideshow_purchased_li_array);
	}
	if($acx_slideshow_purchased_li_array == "" || !is_array($acx_slideshow_purchased_li_array))
	{
		$acx_slideshow_purchased_li_array = array();
	}
	if(ISSET($result["status"]))
	{
		if($result["status"] == 'Active')
		{
			if(ISSET($acx_advanced_slideshow_licence_array[$key]))
			{
				if(array_key_exists('local_key',$acx_advanced_slideshow_licence_array[$key]))
				{
					$acx_advanced_slideshow_licence_array[$key]['local_key'] = $local_key;
					
					if(!is_serialized($acx_advanced_slideshow_licence_array))
					{
						$acx_advanced_slideshow_licence_array = serialize($acx_advanced_slideshow_licence_array);
					}
					update_option('acx_advanced_slideshow_licence_array',$acx_advanced_slideshow_licence_array);
					
				}
			}
			
		} 
		$acx_slideshow_purchased_li_array[$licence]['status'] = $result['status'];
		if(!is_serialized($acx_slideshow_purchased_li_array))
		{
			$acx_slideshow_purchased_li_array = serialize($acx_slideshow_purchased_li_array);
		}
		update_option('acx_slideshow_purchased_li_array',$acx_slideshow_purchased_li_array); 
		$response_stat = "success";
	}
	echo $response_stat;
	die();
}
add_action("wp_ajax_acx_slideshow_install_licence_refresh","acx_slideshow_install_licence_refresh_callback");
function acx_slideshow_license_refresh_with_forcing($acx_license,$addon_key)
{
	$retry = true;
	$acx_slideshow_ip =  isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];
	$acx_slideshow_domain = $_SERVER['SERVER_NAME'];
	$acx_slideshow_directory = dirname(__FILE__);
	$acx_slideshow_args = array(
		'action' 	=> 'acx-li-check-latest-version',
		'method'	=> 'addon_activation',
		'directory' => $acx_slideshow_directory,
		'unique_id' => $addon_key,
		'domain' 	=> $acx_slideshow_domain,
		'ip' 		=> $acx_slideshow_ip,
		'licence' 	=> $acx_license
	);
	$acx_slideshow_unique_id = "";
	$response_stat = "failed";
	$acx_advanced_slideshow_licence_array = get_option('acx_advanced_slideshow_licence_array');
	if(is_serialized($acx_advanced_slideshow_licence_array))
	{
		$acx_advanced_slideshow_licence_array = unserialize($acx_advanced_slideshow_licence_array);
	}
	if($acx_advanced_slideshow_licence_array == "" || !is_array($acx_advanced_slideshow_licence_array))
	{
		$acx_advanced_slideshow_licence_array = array();
	}
		$acx_slideshow_retry_array = get_option('acx_slideshow_retry_array');
	if(is_serialized($acx_slideshow_retry_array))
	{
		$acx_slideshow_retry_array = unserialize($acx_slideshow_retry_array);
	}
	if($acx_slideshow_retry_array == "")
	{
		$acx_slideshow_retry_array = array();
	}
	if(!is_array($acx_slideshow_retry_array))
	{
		$acx_slideshow_retry_array = array();
	}
	if(ISSET($acx_slideshow_retry_array[$acx_license]['activation_licence_check']))
	{
		if($acx_slideshow_retry_array[$acx_license]['activation_licence_check'] >= 3)
		{
			$retry = false;	
		}
	}
	if($retry == true)
	{
		$response = acx_slideshow_licence_activation_api_request( $acx_slideshow_args );
		$response = json_decode($response, true);
	}
	
	if(!ISSET($response['response_status']) && !ISSET($response['status']))
	{
		if(ISSET($acx_slideshow_retry_array[$acx_license]['activation_licence_check']))
		{
			$acx_slideshow_retry_array[$acx_license]['activation_licence_check'] = $acx_slideshow_retry_array[$acx_license]['activation_licence_check'] + 1;
		}
		else{
			$acx_slideshow_retry_array[$acx_license]['activation_licence_check'] =  1;
		}
	}
	else
	{
		if($response['response_status'] == "success" &&  $response['status'] == "Active")
		{
			$acx_slideshow_purchased_li_array = get_option('acx_slideshow_purchased_li_array');
			if(is_serialized($acx_slideshow_purchased_li_array))
			{
				$acx_slideshow_purchased_li_array = unserialize($acx_slideshow_purchased_li_array);
			}
			if($acx_slideshow_purchased_li_array == "" || !is_array($acx_slideshow_purchased_li_array))
			{
				$acx_slideshow_purchased_li_array = array();
			}
			$acx_slideshow_unique_id = trim($response['unique_id']);
			$acx_slideshow_purchased_li_array[$acx_license] = array(
			'slug' => $response['slug'],
			'status' => $response['status'],
			'download_dynamic_url' => $response['download_dynamic_url']
			); 
			// update licence array
			
			$acx_advanced_slideshow_licence_array[$acx_slideshow_unique_id]['addon_name'] = $response['name'];
			$acx_advanced_slideshow_licence_array[$acx_slideshow_unique_id]['licence_code'] = $acx_license;
			if($response['localkey'] != "")
			{
				$acx_advanced_slideshow_licence_array[$acx_slideshow_unique_id]['local_key'] = $response['localkey'];
			}
			if(!is_serialized($acx_advanced_slideshow_licence_array))
			{
				$acx_advanced_slideshow_licence_array = serialize($acx_advanced_slideshow_licence_array);
			}
			update_option('acx_advanced_slideshow_licence_array',$acx_advanced_slideshow_licence_array); 
			if(!is_serialized($acx_slideshow_purchased_li_array))
			{
				$acx_slideshow_purchased_li_array = serialize($acx_slideshow_purchased_li_array);
			}
			update_option('acx_slideshow_purchased_li_array',$acx_slideshow_purchased_li_array); 
			$acx_slideshow_retry_array[$acx_license]['activation_licence_check'] =  0;
			if(!is_serialized($acx_slideshow_retry_array))
			{
				$acx_slideshow_retry_array = serialize($acx_slideshow_retry_array);
			}
			update_option('acx_slideshow_retry_array',$acx_slideshow_retry_array);
			$response_stat = $response['response_status'];
		}
	}

	return $response_stat;
}
function acx_slideshow_load_plugin_textdomain() {
	load_plugin_textdomain( 'simple-slideshow-manager', FALSE, basename( dirname( __FILE__ ) ) . '/lang/' );
}
add_action( 'plugins_loaded', 'acx_slideshow_load_plugin_textdomain' );
?>