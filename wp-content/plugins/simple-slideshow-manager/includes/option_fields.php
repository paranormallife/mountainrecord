<?php
/*
	Create gallery page Starts Here
	Create gallery logic starts here
*/
function acx_slideshow_addgallery_1()
{
	$acx_ssm_html_div_head1=__('Create New Gallery','simple-slideshow-manager');
	print_acx_slideshow_option_block_start($acx_ssm_html_div_head1);	
	echo "<span class='label'>".__('New Gallery Name:','simple-slideshow-manager')."</span>";
	echo "<input type='text' autocomplete='off' name='acx_slideshow_galleryname' id='acx_slideshow_galleryname' value='' size='60' onclick='javascript:hide_validate_span()'/>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	echo "<input type='button' name='acx_slideshow_addgallery'  value='". __('Add Gallery', 'simple-slideshow-manager')."' id='acx_ex_add_gallery' class='button' onclick='javascript:acx_validate_newgallery()'/>";
	echo "<span id='acx_validate_galleryname' style='display:none'></span>";
	echo "<span id='acx_validate_galleryname_2' style='display:none'></span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	print_acx_slideshow_option_block_end();
}  add_action('acx_slideshow_hook_option_fields','acx_slideshow_addgallery_1',100);

function acx_slideshow_addgallery_1_ifpost()
{
	global $error_message,$error_message_gallery_true;
	$error_message="";
	$error_message_gallery_true="";
	$acx_slideshow_imageupload_complete_data=get_option('acx_slideshow_imageupload_complete_data');
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data=unserialize($acx_slideshow_imageupload_complete_data);
	}
	if($acx_slideshow_imageupload_complete_data=="")
	{
		$acx_slideshow_imageupload_complete_data=array();
	}
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	if($acx_slideshow_gallery_data=="")
	{
		$acx_slideshow_gallery_data=array();
	}
	$acx_slideshow_galleryname = trim($_POST['acx_slideshow_galleryname']);
	
	
	if (preg_match('/[\'^£$%`!&*()}{@#~?><>,|=_+¬-]/', $acx_slideshow_galleryname))
	{
		// one or more of the 'special characters' found in $string
					$acx_slideshow_galleryname = "";
	}
	
	if($acx_slideshow_galleryname=="")
	{
		$error_message = __('Please Enter A Valid Name','simple-slideshow-manager');
	}
	foreach ($acx_slideshow_imageupload_complete_data as $key => $value)
	{
		if($acx_slideshow_galleryname == $key)
		{
			$error_message =__('Gallery Name Already Exist, Add Another One','simple-slideshow-manager'); 
		}
	}
	if($acx_slideshow_galleryname!="")
	{
		$acx_slideshow_galleryname = trim($acx_slideshow_galleryname);
		if (!array_key_exists($acx_slideshow_galleryname,$acx_slideshow_imageupload_complete_data))
		{
			$number_of_galleries = count($acx_slideshow_imageupload_complete_data);
			if($number_of_galleries == "")
			{ 
				$number_of_galleries = 0;
			}
			$acx_slideshow_gallery_data[$acx_slideshow_galleryname] = array();
			$acx_slideshow_imageupload_complete_data[$acx_slideshow_galleryname] = array();
			$error_message_gallery_true = __('Gallery ','simple-slideshow-manager').$acx_slideshow_galleryname.__(' Added Successfully','simple-slideshow-manager');
		}
	}
	if(!is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
	}
	update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);
	if(!is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
	}
	update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
	
} add_action('acx_slideshow_hook_option_onpost','acx_slideshow_addgallery_1_ifpost');
function acx_slideshow_addgallery_1_else()
{
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_galleryname;
	$acx_slideshow_galleryname = "";
		$acx_slideshow_imageupload_complete_data=get_option('acx_slideshow_imageupload_complete_data');
		if(is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data=unserialize($acx_slideshow_imageupload_complete_data);
		}
		//---------------- check version and update type
		
} add_action('acx_slideshow_hook_option_postelse','acx_slideshow_addgallery_1_else');
function acx_slideshow_addgallery_1_after_else()
{
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data;
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
	
	
} add_action('acx_slideshow_hook_option_after_else','acx_slideshow_addgallery_1_after_else');
/*
	Create gallery Logic Ends Here
*/

/*
	gallery manage delete Logic Starts Here
*/

function acx_slideshow_addgallery_2()
{
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data;
	$acx_ssm_html_div_head2=__('Existing Galleries','simple-slideshow-manager');
	print_acx_slideshow_option_block_start($acx_ssm_html_div_head2);
	echo "<ul id='acx_ex_gall' style='display:inline-block;'>";
			foreach ($acx_slideshow_imageupload_complete_data as $key => $value)
			{
				$confirm_alert=__('Are you sure? \n\nNOTE: You Cant Undo This Action Once Processed','simple-slideshow-manager');
				echo "<li><div class='acx_left'>";
				echo $key;
		        echo"</div>";
				echo "<div class='acx_right'>"; 
				echo "<a id='acx_slideshow_delete_gallery' class='del_gallery button' href='?page=Acurax-Slideshow-Settings&del=".$key."' alt =".__('Click to Delete this Gallery','simple-slideshow-manager')."' onclick='return confirm(\"$confirm_alert\");'>". __('Delete this Gallery','simple-slideshow-manager')."</a>";
				echo "<a id='acx_slideshow_manage_gallery' class='manage_gallery button'  value = '".$key."' href='admin.php?page=Acurax-Slideshow-Add-Images&name=".$key."' alt = '".__('Click to Manage this Gallery','simple-slideshow-manager')."'>".__('Manage this Gallery','simple-slideshow-manager')."</a></br></br>";
				echo "</div></li>";			
			}
			echo "</ul>";
	echo "<span class='note'></span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	print_acx_slideshow_option_block_end();
}  add_action('acx_slideshow_hook_option_fields','acx_slideshow_addgallery_2',200);

function acx_slideshow_addgallery_2_ifpost()
{
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data;
	$acx_slideshow_choice = acx_slideshow_post_isset_check('acx_slideshow_choice');
	update_option('acx_slideshow_choice',$acx_slideshow_choice);
} add_action('acx_slideshow_hook_option_onpost','acx_slideshow_addgallery_2_ifpost');
function acx_slideshow_addgallery_2_else()
{
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data;
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if($acx_slideshow_imageupload_complete_data == "")
	{	 
		$acx_slideshow_imageupload_complete_data = array(
														 "default" => array()	
														);
		if(!is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
		}
		update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);


	}	
	/*create array for save all image data */
	else
	{
		
		if(is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
		}
	}
	/* if gallery data is null insert into an array */
	$acx_slideshow_gallery_data = get_option('acx_slideshow_gallery_data');
	if($acx_slideshow_gallery_data == "")
	{	 
		$acx_slideshow_gallery_data = array(
											 "default" => array()	
											);
		if(!is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
		}
		update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
	}
	else
	{
		$acx_slideshow_gallery_data = get_option('acx_slideshow_gallery_data');
		if(is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = unserialize($acx_slideshow_gallery_data);	
		}
	}
} add_action('acx_slideshow_hook_option_postelse','acx_slideshow_addgallery_2_else');
function acx_slideshow_addgallery_2_after_else()
{
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data;
		global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data;
	$acx_slideshow_imageupload_complete_data = get_option('acx_slideshow_imageupload_complete_data');
	if($acx_slideshow_imageupload_complete_data == "")
	{	 
		$acx_slideshow_imageupload_complete_data = array(
														 "default" => array()	
														);
		if(!is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
		}
		update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);


	}	
	/*create array for save all image data */
	else
	{
		
		if(is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data = unserialize($acx_slideshow_imageupload_complete_data);	
		}
	}
	/* if gallery data is null insert into an array */
	$acx_slideshow_gallery_data = get_option('acx_slideshow_gallery_data');
	if($acx_slideshow_gallery_data == "")
	{	 
		$acx_slideshow_gallery_data = array(
											 "default" => array()	
											);
		if(!is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
		}
		update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
	}
	else
	{
		$acx_slideshow_gallery_data = get_option('acx_slideshow_gallery_data');
		if(is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = unserialize($acx_slideshow_gallery_data);	
		}
	}
} add_action('acx_slideshow_hook_option_after_else','acx_slideshow_addgallery_2_after_else');
/*
	gallery manage delete Logic Ends Here
*/
function acx_slideshow_above_all_gallery_fun()
{
	/* Delete Gallery Option */
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data;
	$acx_slideshow_imageupload_complete_data=get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data=unserialize($acx_slideshow_imageupload_complete_data);
	}
	if($acx_slideshow_imageupload_complete_data == "")
	{	 
		$acx_slideshow_imageupload_complete_data = array(
														 "default" => array()	
														);
		update_option('acx_slideshow_imageupload_complete_data',serialize($acx_slideshow_imageupload_complete_data));
	}
    if (isset($_GET['del'])) 
	{
       $acx_del_gallery_name = $_GET['del'];
		if($acx_del_gallery_name != "")
		{
			$acx_slideshow_gallery_data = get_option('acx_slideshow_gallery_data');
			if(is_serialized($acx_slideshow_gallery_data))
			{
				$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
			}
			if(ISSET($acx_slideshow_imageupload_complete_data[$acx_del_gallery_name]))
			{
				unset($acx_slideshow_imageupload_complete_data[$acx_del_gallery_name]);
			
			}
			if(ISSET($acx_slideshow_gallery_data[$acx_del_gallery_name]))
			{
				unset($acx_slideshow_gallery_data[$acx_del_gallery_name]);
			}
			if(!is_serialized($acx_slideshow_imageupload_complete_data))
			{
				$acx_slideshow_imageupload_complete_data = serialize($acx_slideshow_imageupload_complete_data);	
			}
			update_option('acx_slideshow_imageupload_complete_data',$acx_slideshow_imageupload_complete_data);
			if(!is_serialized($acx_slideshow_gallery_data))
			{
				$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
			}
			update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
		}
    }
}
add_action('acx_slideshow_hook_option_above_ifpost','acx_slideshow_above_all_gallery_fun');
function acx_slideshow_form_validations()
{
	global $error_message_gallery_true , $error_message;
	if($error_message !="")
	{ 
	?>
	<script>
	document.getElementById('acx_validate_galleryname').style.display='block';
	document.getElementById("acx_validate_galleryname").style.marginLeft="200px";
	document.getElementById('acx_validate_galleryname').innerHTML='<?php echo $error_message; ?>';
	setTimeout(function(){
	jQuery('#acx_validate_galleryname').fadeOut('slow');
	}, 5000);
	</script>
	<?php 
	}

	if($error_message_gallery_true !="")
	{
	?>
	<script>
	document.getElementById('acx_validate_galleryname_2').style.display='block';
	document.getElementById("acx_validate_galleryname_2").style.marginLeft="200px";
	document.getElementById("acx_validate_galleryname_2").style.fontSize = "15px";
	document.getElementById("acx_validate_galleryname_2").style.color = "#0d6e00";
	document.getElementById("acx_validate_galleryname_2").innerHTML='<?php echo $error_message_gallery_true; ?>';
	setTimeout(function(){
	jQuery('#acx_validate_galleryname_2').fadeOut('slow');
	}, 5000);
	</script>
	<?php
	}
	?>
<!-- gallery name validation code start's here -->
	<script>
	function acx_validate_newgallery()
	{
		var val = document.getElementById('acx_slideshow_galleryname').value;
		var val = val.trim();
		var name_pattern=/^[a-zA-Z0-9 ]{0,100}$/i;
		if(val=='')
		{
			document.getElementById('acx_validate_galleryname').style.display='block';
			document.getElementById("acx_validate_galleryname").style.marginLeft="250px";
			document.getElementById('acx_validate_galleryname').innerHTML='<?php _e('Name Should Not Be Empty','simple-slideshow-manager'); ?>';
			return false;
		}
		else if(name_pattern.test(val))
		{
			document.acurax_si_form.submit();
		}
		else 
		{
			document.getElementById('acx_validate_galleryname').style.display='block';
			document.getElementById("acx_validate_galleryname").style.marginLeft="220px";
			document.getElementById('acx_validate_galleryname').innerHTML='<?php _e('Special Characters Are Not Allowed Here','simple-slideshow-manager'); ?>';
			return false;
		}			
	}
		
	function hide_validate_span()
	{
		document.getElementById('acx_slideshow_galleryname').value ='';
		jQuery('#acx_validate_galleryname').fadeOut('slow');
	}
	</script>
<!--  gallery name validation code end's here   -->
<?php
}
add_action('acx_slideshow_hook_option_footer','acx_slideshow_form_validations');
/*
	Gallery Page code end here
*/
/*
	Manage Gallery Page code starts here
*/
/*
	Rename and Shortcode logic starts here
*/
function acx_slideshow_managegallery_1()
{
	global $acx_slideshow_name;
	if(isset($_GET['name']))
	{
		global $acx_selected_gallery_name;
		$acx_ssm_html_div_head3=__('Selected Gallery','simple-slideshow-manager');
		print_acx_slideshow_option_block_start($acx_ssm_html_div_head3);	
		echo "<span class='label'>".__('Gallery Name:','simple-slideshow-manager')."</span>";
		echo "<b id='ajax_change_galleryname_1'>".$acx_selected_gallery_name."</b>";
		echo "<input type='hidden' name='gallery_selected' id='gallery_selected' value='".$acx_selected_gallery_name."'/>";
		echo "<a class='acx_rename_gallery button acx_rename_slide_button' onclick = 'acx_rename(1);' style='margin-left:10px;'>".__('Rename Gallery','simple-slideshow-manager')."</a>";
		echo "<br><br><span class='label'>".__('Shortcode: ','simple-slideshow-manager')."</span>";
		?>
	<script>
	function acx_rename(status)
	{
		if(status==1)
		{
		//display the rename form
			jQuery("#rename_gallery").show();
		} 
		else
		{
		//close the rename form
			jQuery("#rename_gallery").hide();
		}	
	}
	function acx_ajax_rename()
	{
		acx_rename('2');
		message="<?php _e('Unknown Error Occured Please Try Again','simple-slideshow-manager'); ?>";
		var oldname = document.getElementById('old_name').value;
		var newname = document.getElementById('rename').value;
		var newname = newname.trim(); 

		if(newname == '')
		{
			jQuery("#acx_slideshow_loading").remove();
			jQuery("#rename_gallery").hide();
			jQuery("#managegall_notice").show();
			jQuery("#managegall_notice").css('color','red');
			jQuery("#managegall_notice").css('font-weight','Bold');
			jQuery('#managegall_notice').html('<?php _e('Invalid Input,Check It Once','simple-slideshow-manager'); ?>');
			setTimeout(function() {
			jQuery('#managegall_notice').fadeOut('fast');
			}, 3000);
			return false;
		}

		var name_pattern_rename=/^[a-zA-Z0-9 ]{0,100}$/i;

		var acx_load="<div id='acx_slideshow_loading'><div class='load'></div></div>";
		jQuery('body').append(acx_load);

		if(name_pattern_rename.test(newname))
		{
			jQuery('#managegall_notice').html('');
		}
		else
		{
			jQuery("#acx_slideshow_loading").remove();
			jQuery("#rename_gallery").hide();
			jQuery("#managegall_notice").show();
			jQuery("#managegall_notice").css('color','red');
			jQuery("#managegall_notice").css('font-weight','Bold');
			jQuery('#managegall_notice').html('<?php _e('Special Characters Are Not Allowed Here,Try Another Name','simple-slideshow-manager'); ?>');
			setTimeout(function() {
			jQuery('#managegall_notice').fadeOut('fast');
			}, 5000);
			return false;
		}


		var ajax_rename ='&oldname='+oldname+'&newname='+newname+'&action=acx_ajax_renamefunction'+'&acx_ajax_renamefunction_es=<?php echo wp_create_nonce("acx_ajax_renamefunction_es"); ?>'; 
		jQuery.post(ajaxurl, ajax_rename, function(theResponse)
		{
			status=theResponse;
			if(status == 1)
			{
			jQuery("#acx_slideshow_loading").remove();
			message="<?php _e('The Gallery Name You Entered Is Already Present','simple-slideshow-manager'); ?>";
			}
			else if(status == 2)
			{
				jQuery("#acx_slideshow_loading").remove();
				message="<?php _e('Gallery Name Changed Sucesfully!','simple-slideshow-manager'); ?>";

				var completely_replaced = 0;

				url_base = "/wp-admin/admin.php?page=Acurax-Slideshow-Add-Images&name="
				new_action_url = url_base+newname;
				jQuery( "[name='acx_slideshow_form']" ).attr("action",new_action_url);
				location.replace(new_action_url);
				if(jQuery( "[name='acx_slideshow_form']" ).attr("action") == new_action_url)
				{
					completely_replaced = 1;
				}
				else
				{
					completely_replaced = 0;
				}
				if(completely_replaced == 1)
				{
					jQuery( "#rename" ).attr("onblur","if (this.value == '') {this.value = '"+newname+"';}");
					jQuery( "#rename" ).attr("onfocus","if (this.value == '"+newname+"') {this.value = '';}");

					if(jQuery( "#rename" ).attr("onblur") == "if (this.value == '') {this.value = '"+newname+"';}" && jQuery( "#rename" ).attr("onfocus") == "if (this.value == '"+newname+"') {this.value = '';}")
					{
						completely_replaced = 1;
					} 
					else
					{
						completely_replaced = 0;
					}
				}
				if(completely_replaced == 1)
				{
					jQuery("#ajax_change_galleryname_1").html(newname);
					if(jQuery( "#ajax_change_galleryname_1" ).html() == newname)
					{
						completely_replaced = 1;
					} 
					else
					{
						completely_replaced = 0;
					}
				}

				if(completely_replaced == 1)
				{
				jQuery( "#gallery_selected").val(newname);
				if(jQuery("#gallery_selected").val() == newname)
				{
				completely_replaced = 1;
				} 
				else
				{
				completely_replaced = 0;
				}
				}

				if(completely_replaced == 1)
				{
				jQuery( "#acx_slideshow_shortcode_id").val("[acx_slideshow name=\""+newname+"\"]");

				if(jQuery( "#acx_slideshow_shortcode_id").val() == "[acx_slideshow name=\""+newname+"\"]")
				{
					completely_replaced = 1;
				}
				else
				{
					completely_replaced = 0;
				}
				}
				if(completely_replaced == 1)
				{
				jQuery( "#rename").val(newname);
				if(jQuery( "#rename").val() == newname)
					{
						completely_replaced = 1;
					}
					else
					{
						completely_replaced = 0;
					}
				}

				if(completely_replaced == 1)
				{
				jQuery( "#old_name").val(newname);
				if(jQuery( "#old_name").val() == newname)
					{
						completely_replaced = 1;
					}
					else
					{
						completely_replaced = 0;
					}
				}

				if(completely_replaced == 1)
				{
				jQuery( "#acx_gall_name").val(newname);
				if(jQuery( "#acx_gall_name").val() == newname)
					{
						completely_replaced = 1;
					}
					else
					{
						completely_replaced = 0;
					}
				}
				if(completely_replaced != 1)
				{
					url_base = "/wp-admin/admin.php?page=Acurax-Slideshow-Add-Images&name="
					new_action_url = url_base+newname;
					location.replace(new_action_url);
				}
			}
			jQuery("#rename_gallery").hide();
			jQuery("#managegall_notice").show();
			jQuery("#managegall_notice").css('color','green');
			jQuery("#managegall_notice").css('font-weight','Bold');
			jQuery("#managegall_notice").css('color','green');
			jQuery('#managegall_notice').html(message);
			setTimeout(function() {
			jQuery('#managegall_notice').fadeOut('fast');
			}, 3000);
		});
	}
	</script>
	<input type='text' id='acx_slideshow_shortcode_id' value='[acx_slideshow name="<?php echo$acx_selected_gallery_name ?>"]' readonly size='40' onClick='javascript:this.focus();this.select();'>
	<?php
	echo"<a href='admin.php?page=Acurax-Slideshow-Generate-Shortcode'>".__('Click Here For Custom Code Generator','simple-slideshow-manager')."</a></span> ";
	echo "<span class='acx_slideshow_q_sep'></span>";
	print_acx_slideshow_option_block_end();
	}
}  add_action('acx_slideshow_hook_option_fields_manage','acx_slideshow_managegallery_1',100);

/*
	Rename and Shortcode logic ends here
*/
/*
	Add slides Logic Starts Here
*/

function acx_slideshow_managegallery_2()
{
	global $acx_slideshow_imageupload_complete_data,$acx_slideshow_gallery_data,$acx_selected_gallery_name;
	/* if(isset($_GET['name']))
	{ */
		$acx_slideshow_imageupload_complete_data=get_option('acx_slideshow_imageupload_complete_data');
		if(isset($_GET['name']))
		{
			$acx_name = sanitize_text_field(trim($_GET['name']));
			
			$acx_ssm_html_div_head4=__('Slides','simple-slideshow-manager');
		print_acx_slideshow_option_block_start($acx_ssm_html_div_head4);
		?>
		
			<label for="upload_image">
				<input id="acx_slideshow_upload_image_url" readonly type="hidden" size="78" name="acx_slideshow_upload_image" value="" />
				 <a id="acx_slideshow_upload_image_button" onclick="acx_slideshow_upload_images_template_loader('acx_slideshow_upload_image_button','Choose Image','Select','acx_slideshow_upload_image_url');" class="button  acx_slide_upload"><?php _e('Add Image as Slide ','simple-slideshow-manager'); ?></a>
				 <input type="hidden" name="acx_slideshow_title" id="acx_slideshow_title" />
				<input type="hidden" name="acx_slideshow_caption" id="acx_slideshow_caption" />
				<input type="hidden" name="acx_slideshow_alttext" id="acx_slideshow_alttext"/>
				<input type="hidden" name="acx_slideshow_desc" id="acx_slideshow_desc"/>
				 </label>
				 <label for="upload_video">
				 <a id="acx_slideshow_upload_video_button" class="button acx_video_upload" onclick="acx_upload_video(1)" ><?php _e('Add Youtube/Vimeo Video as Slide','simple-slideshow-manager'); ?></a>
				 </label>
		
		
		<div id="response" style="padding:8px;width:99%;margin-top:8px;" class="widefat">
		<?php
		if(is_serialized($acx_slideshow_imageupload_complete_data))
		{
			$acx_slideshow_imageupload_complete_data=unserialize($acx_slideshow_imageupload_complete_data);
		}
		
		$acx_ssm_slide_delete=__('Delete This Slide','simple-slideshow-manager');
		$acx_ssm_slide_edit=__('Edit This Slide','simple-slideshow-manager');
		$acx_ssm_slide_add=__('Add Link To This Slide','simple-slideshow-manager');
		$gallery_name = $acx_selected_gallery_name;
		$slide_count=count($acx_slideshow_imageupload_complete_data[$gallery_name]);
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
			else if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="youtube_video")
			{
				echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
				echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
				echo "<img src=\"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."\"  alt = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url']."\" title = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url']."\" > &nbsp;";
				echo "<div class=\"play_but\" title=\"\"></div></br>";
				echo "<div class=\"del_but\" id=\"acx_delete_image_".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url']."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";	
				echo "</li>";
			}
			else if($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['type']=="vimeo_video")
			{
				echo "<li class=\"ui-state-default\" id = \"recordsArray_".$i."\">";
				echo "<span class=\"ui-icon ui-icon-arrowthick-2-n-s\"></span>";
				echo "<img src=\"".esc_url($acx_slideshow_imageupload_complete_data[$gallery_name][$i]['thumbnail_image'])."\"  alt = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url']."\" title = \"".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url']."\" > &nbsp;";
				echo "<div class=\"play_but\" title=\"\"></div></br>";
				echo "<div class=\"del_but\" id=\"acx_delete_image_".$acx_slideshow_imageupload_complete_data[$gallery_name][$i]['video_url']."\" onclick = \"acx_delete(".$i.");\" title='".$acx_ssm_slide_delete."'></div></br>";	
				echo "</li>";
			}
		}
		echo"</ul>";
		if($slide_count>1)
		{
			echo "<span class='note'style='text-align:center'>". __( 'Drag and Drop to Reorder Slides', 'simple-slideshow-manager' ) . "</span>";
		}
				?>
		</div>	
		<?php
		
		?>
	<div id="acx_upload_video"  class="widefat" style="display:none">
	<div id="upload_vedio">
	
	<?php _e('Video Url','simple-slideshow-manager'); ?></br>
	<input type="text" name="acx_video_url" id="acx_video_url" onChange="acx_change_vediotype();" /></br></br>
	<?php _e('Video Type','simple-slideshow-manager'); ?></br>
			<select name="acx_video_type" id="acx_video_type">
			<option value="youtube_video"><?php _e('Youtube Video','simple-slideshow-manager'); ?> 
			<option value="vimeo_video"><?php _e('Vimeo Video','simple-slideshow-manager'); ?> 
			</select></br></br>
	<span id='videourl_error' style='color:red; display: none; font-weight: bold;'></span></br>
    <input type="button" value="Upload Video"  class="button acx_vedio_upload_buttn" onclick="upload_video()" />
	<input type="hidden" id="acx_gall_name" name="acx_gall_name"  value="<?php echo $acx_name;  ?>"/>
	<a class="close" onclick="acx_upload_video('2');">X</a>
	</div>
</div>

<script type="text/javascript">
var gallery_name = document.getElementById("gallery_selected").value;
function acx_slideshow_ajax_updateRecordsListings_js()
{
//************ Arrange the order of display of image (drag and drop)************
jQuery(function() 
{
jQuery("#acx_slideshow_sortable").sortable(
{ 
opacity: 0.5, cursor: 'move', update: function() 
{
var order = jQuery(this).sortable("serialize")+'&gallery_name='+gallery_name+'&action=acx_slideshow_ajax_updateRecordsListings'+'&acx_slideshow_ajax_updateRecordsListings_es=<?php echo wp_create_nonce("acx_slideshow_ajax_updateRecordsListings_es"); ?>'; 

jQuery.post(ajaxurl, order, function(theResponse)
{
jQuery("#response").html(theResponse);
acx_slideshow_ajax_updateRecordsListings_js();
setTimeout(function() {
jQuery('#s_s_notice').fadeOut('fast');
}, 3000); // <-- time in milliseconds
}); 
}								  
});
});
}
jQuery(document).ready(function()
{
acx_slideshow_ajax_updateRecordsListings_js();
});	
function upload_image()
{
	var gallery_name = document.getElementById("gallery_selected").value;	
	var image_url = document.getElementById("acx_slideshow_upload_image_url").value;
	var image_title = document.getElementById("acx_slideshow_title").value;
	var image_caption = document.getElementById("acx_slideshow_caption").value;
	var image_alttext = document.getElementById("acx_slideshow_alttext").value;
	var image_desc = document.getElementById("acx_slideshow_desc").value;	
	var type = "image";
	if(image_url != "")
	{
		var acx_load="<div id='acx_slideshow_loading'><div class='load'></div></div>";
		jQuery('body').append(acx_load);
		document.getElementById("acx_slideshow_upload_image_url").value = "";
		var order ='&gallery_name='+gallery_name+'&image_url='+image_url+'&image_title='+image_title+'&image_caption='+image_caption+'&image_alttext='+image_alttext+'&image_desc='+image_desc+'&type='+type+'&action=acx_slideshow_ajax_upload'+'&acx_slideshow_ajax_upload_es=<?php echo wp_create_nonce("acx_slideshow_ajax_upload_es"); ?>'; 
		jQuery.post(ajaxurl, order, function(theResponse)
		{
			jQuery("#response").html(theResponse);
			acx_slideshow_ajax_updateRecordsListings_js();
			jQuery("#acx_slideshow_loading").remove();
			setTimeout(function() {
			jQuery('#s_s_notice').fadeOut('fast');
		}, 3000); // <-- time in milliseconds
		});
	}
	else if(image_url=="")
	{
		alert('<?php _e('Select an image to upload','simple-slideshow-manager'); ?>');
	}
}
function acx_upload_video(status)
{
if(status==1)
{
//display the rename form
document.getElementById("acx_video_url").value = "";
jQuery("#acx_upload_video").show();
} 
else
{
//close the rename form
jQuery("#acx_upload_video").hide();
}
}

/* send the data to upload_image page to upload new image (Ajax) */
function upload_video()
{
var gallery_name = document.getElementById("acx_gall_name").value;
var video_url = document.getElementById("acx_video_url").value;
var type = document.getElementById("acx_video_type").value;
var video_url = video_url.trim();

if(type == 'vimeo_video')
{
	var type_validation = 'vimeo';
}
else if(type == 'youtube_video')
{
	var type_validation = 'youtube';
}

if (video_url.indexOf(type_validation) !== -1)
{
}
else
{
		document.getElementById('videourl_error').style.display='block';
		document.getElementById('videourl_error').innerHTML='<?php _e('Input Error Check!! Try Again','simple-slideshow-manager'); ?>';
		setTimeout(function(){
		jQuery('#videourl_error').fadeOut('slow');
		}, 2000);
		return false;
}

var youtube_regex = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
var vimeo_regex= /^.*(vimeo\.com\/)((channels\/[A-z]+\/)|(groups\/[A-z]+\/videos\/))?([0-9]+)/;
if(video_url.match(youtube_regex)||video_url.match(vimeo_regex))
{	
	jQuery("#acx_upload_video").hide();
	var order ='&gallery_name='+gallery_name+'&video_url='+video_url+'&type='+type+'&action=acx_slideshow_ajax_upload'+'&acx_slideshow_ajax_upload_es=<?php echo wp_create_nonce("acx_slideshow_ajax_upload_es"); ?>'; 
	var acx_load="<div id='acx_slideshow_loading'><div class='load'></div></div>";
	jQuery('body').append(acx_load);
	jQuery.post(ajaxurl, order, function(theResponse)
	{
	jQuery("#response").html(theResponse);
	acx_slideshow_ajax_updateRecordsListings_js();
	jQuery("#acx_slideshow_loading").remove();
	setTimeout(function() {
	jQuery('#s_s_notice').fadeOut('fast');
	}, 3000); // <-- time in milliseconds
	});
}
else 
{
		document.getElementById('videourl_error').style.display='block';
		document.getElementById('videourl_error').innerHTML='<?php _e('Enter A Valid Url To Upload','simple-slideshow-manager'); ?>';
		setTimeout(function(){
		jQuery('#videourl_error').fadeOut('slow');
		}, 2000);
}
}
function acx_change_vediotype()
{
	var acx_vedio_url = document.getElementById("acx_video_url").value;
	var dd = document.getElementById('acx_video_type');
if ( acx_vedio_url.indexOf( "vimeo" ) > -1 ) 
{
	dd.selectedIndex = 1;	
}
else if ( acx_vedio_url.indexOf( "youtube" ) > -1 ) 
{
	dd.selectedIndex = 0;	
}
}

</script>
	<?php
	echo "<span class='acx_slideshow_q_sep'></span>";
	print_acx_slideshow_option_block_end();
	}
}
add_action('acx_slideshow_hook_option_fields_manage','acx_slideshow_managegallery_2',200);

/*
	add slides logic ends here
*/
/*
	additional setting logic starts here
*/
function acx_slideshow_managegallery_3()
{
	if(isset($_GET['name']))
	{
		$acx_ssm_html_div_head5=__('Advanced Settings ','simple-slideshow-manager');
		print_acx_slideshow_option_block_start($acx_ssm_html_div_head5);
		do_action('acx_slideshow_manage_gallery_function');
		print_acx_slideshow_option_block_end();
		
	}
}
add_action('acx_slideshow_hook_option_fields_manage','acx_slideshow_managegallery_3',300);
function acx_slideshow_managegallery_last()
{
	if(isset($_GET['name']))
	{
		echo "<input type='button' onclick='advancesettingsvalidating()' class ='button button-primary' name='acx_slideshow_manage_submit' value=".__('Save Settings','simple-slideshow-manager')."/>";
	}
}
add_action('acx_slideshow_hook_option_fields_manage','acx_slideshow_managegallery_last',999);
function acx_slideshow_managegallery_3_html_1()
{
	global $acx_slideshow_timespan;
	echo "<span class='label'>".__('Time span in seconds* ','simple-slideshow-manager')."</span>";
		echo "<input type='text' autocomplete='off' name='acx_slideshow_timespan' id='acx_slideshow_timespan' value='".$acx_slideshow_timespan."' size='60'/>";
		echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_manage_gallery_function','acx_slideshow_managegallery_3_html_1',10);

function acx_slideshow_managegallery_3_ifpost_1()
{
	global $acx_slideshow_gallery_data,$acx_selected_gallery_name,$acx_slideshow_timespan;
	$gallery_name=$acx_selected_gallery_name;
	$show_alert = 0;
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data = unserialize($acx_slideshow_gallery_data);
	}
	$acx_slideshow_timespan = acx_slideshow_post_isset_check('acx_slideshow_timespan');
	if(is_numeric($acx_slideshow_timespan)) 
	{
		$acx_slideshow_timespan = $acx_slideshow_timespan;
	}
	else 
	{
		$acx_slideshow_timespan = 4;
		$show_alert = 1;
	}
	if($show_alert!=1)
	{
		$acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_timespan'] = $acx_slideshow_timespan;
		if(!is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
		}
		update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
	}
}
add_action('acx_slideshow_hook_option_onpost_manage','acx_slideshow_managegallery_3_ifpost_1');

function acx_slideshow_managegallery_3_else_1()
{
	global $acx_slideshow_gallery_data,$acx_slideshow_timespan,$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	$gallery_name=$acx_selected_gallery_name;
	if(is_array($acx_slideshow_gallery_data) && array_key_exists($gallery_name,$acx_slideshow_gallery_data))
	{
		if(array_key_exists('acx_slideshow_timespan',$acx_slideshow_gallery_data[$gallery_name]))
		{
			$acx_slideshow_timespan = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_timespan'];
			
		}
		if($acx_slideshow_timespan=="" || $acx_slideshow_timespan==0)
		{
				$acx_slideshow_timespan = 4;
		}
	}
	else
	{
		$acx_slideshow_timespan = 4;
	}
} add_action('acx_slideshow_hook_option_postelse_manage','acx_slideshow_managegallery_3_else_1');

function acx_slideshow_managegallery_3_html_2()
{
	global $acx_slideshow_fadeintime;
	echo "<span class='label'>".__('Fadein Time in seconds* ','simple-slideshow-manager')."</span>";
	echo "<input type='text' autocomplete='off' name='acx_slideshow_fadeintime' id='acx_slideshow_fadeintime' value='".$acx_slideshow_fadeintime."' size='60'/>";
	echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_manage_gallery_function','acx_slideshow_managegallery_3_html_2',20);

function acx_slideshow_managegallery_3_ifpost_2()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_fadeintime;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	$show_alert = 0;
	$acx_slideshow_fadeintime = acx_slideshow_post_isset_check('acx_slideshow_fadeintime');
	if(is_numeric($acx_slideshow_fadeintime)) 
	{
		$acx_slideshow_fadeintime = $acx_slideshow_fadeintime;
	}
	else 
	{
		$acx_slideshow_fadeintime = 1;
		$show_alert = 1;
	}
	if($show_alert!=1)
	{
		$acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_fadeintime']= $acx_slideshow_fadeintime;
		if(!is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
		}
		update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
	}
}
add_action('acx_slideshow_hook_option_onpost_manage','acx_slideshow_managegallery_3_ifpost_2');

function acx_slideshow_managegallery_3_else_2()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_fadeintime;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	if(is_array($acx_slideshow_gallery_data) && array_key_exists($gallery_name,$acx_slideshow_gallery_data))
	{
		
		if(array_key_exists('acx_slideshow_fadeintime',$acx_slideshow_gallery_data[$gallery_name]))
		{
			$acx_slideshow_fadeintime = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_fadeintime'];
		}
		if($acx_slideshow_fadeintime=="" || $acx_slideshow_fadeintime ==0)
	{
		$acx_slideshow_fadeintime = 1;
	}
	}
	else
	{
		$acx_slideshow_fadeintime = 1;
	}
} add_action('acx_slideshow_hook_option_postelse_manage','acx_slideshow_managegallery_3_else_2');

function acx_slideshow_managegallery_3_html_3()
{
	global $acx_slideshow_fadeouttime;
	echo "<span class='label'>".__('Fadeout Time in seconds* ','simple-slideshow-manager')."</span>";
	echo "<input type='text' autocomplete='off' name='acx_slideshow_fadeouttime' id='acx_slideshow_fadeouttime' value='".$acx_slideshow_fadeouttime."' size='60'/>";
	echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_manage_gallery_function','acx_slideshow_managegallery_3_html_3',30);

function acx_slideshow_managegallery_3_ifpost_3()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_fadeouttime;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	$show_alert = 0;
	$acx_slideshow_fadeouttime = acx_slideshow_post_isset_check('acx_slideshow_fadeouttime');
	if(is_numeric($acx_slideshow_fadeouttime)) 
	{
		$acx_slideshow_fadeouttime = $acx_slideshow_fadeouttime;
	}
	else 
	{
		$acx_slideshow_fadeouttime = 1;
		$show_alert = 1;
	}
	if($show_alert!=1)
	{
		$acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_fadeouttime']= $acx_slideshow_fadeouttime;
		if(!is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
		}
		update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
	}
}
add_action('acx_slideshow_hook_option_onpost_manage','acx_slideshow_managegallery_3_ifpost_3');

function acx_slideshow_managegallery_3_else_3()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_fadeouttime;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	if(is_array($acx_slideshow_gallery_data) && array_key_exists($gallery_name,$acx_slideshow_gallery_data))
	{
		if(array_key_exists('acx_slideshow_fadeouttime',$acx_slideshow_gallery_data[$gallery_name]))
		{
			$acx_slideshow_fadeouttime = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_fadeouttime'];
		}
		if($acx_slideshow_fadeouttime == "" || $acx_slideshow_fadeouttime == 0)
		{
			$acx_slideshow_fadeouttime = 1;
		} 
	}
	else
	{
		$acx_slideshow_fadeouttime = 1;
	}
} add_action('acx_slideshow_hook_option_postelse_manage','acx_slideshow_managegallery_3_else_3');

function acx_slideshow_managegallery_3_html_4()
{
	global $acx_slideshow_pauseon_hover;
	echo "<span class='label'>".__('Enable Pause on Hover ','simple-slideshow-manager')."</span>";
	echo "<select id='acx_slideshow_pauseon_hover' name='acx_slideshow_pauseon_hover'>
	<option value='true'";
	if($acx_slideshow_pauseon_hover=="true"||$acx_slideshow_pauseon_hover=="")
	{
		echo "selected='selected'";
	} echo">Enable</option><option value='false'";
	if($acx_slideshow_pauseon_hover=="false")
	{
		echo "selected='selected'";
	} 
	echo ">Disable</option></select>";
	echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_manage_gallery_function','acx_slideshow_managegallery_3_html_4',40);

function acx_slideshow_managegallery_3_ifpost_4()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_pauseon_hover;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	$acx_slideshow_pauseon_hover = acx_slideshow_post_isset_check('acx_slideshow_pauseon_hover');
	$acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_pauseon_hover']= $acx_slideshow_pauseon_hover;
	if(!is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
	}
	update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
}
add_action('acx_slideshow_hook_option_onpost_manage','acx_slideshow_managegallery_3_ifpost_4');

function acx_slideshow_managegallery_3_else_4()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_pauseon_hover;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	if(is_array($acx_slideshow_gallery_data) && array_key_exists($gallery_name,$acx_slideshow_gallery_data))
	{
		if(array_key_exists('acx_slideshow_pauseon_hover',$acx_slideshow_gallery_data[$gallery_name]))
		{
			$acx_slideshow_pauseon_hover = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_pauseon_hover'];
		}
		else
		{
			$acx_slideshow_pauseon_hover ='';
		}
	}
	else
	{
		$acx_slideshow_pauseon_hover="true";
	}
} add_action('acx_slideshow_hook_option_postelse_manage','acx_slideshow_managegallery_3_else_4');

function acx_slideshow_managegallery_3_html_5()
{
	global $temp_width;
	echo "<span class='label'>".__('Slide Width: ','simple-slideshow-manager')."</span>";
	echo "<input type='text' autocomplete='off' name='acx_slideshow_width' id='acx_slideshow_width' value='".$temp_width."' size='60'/>";
	echo "<input type='hidden' id='acx_slideshow_width_type'  name='acx_slideshow_width_type' value='px'>";
	echo "<span class='note'>".__('Width of the Slide in px ( eg: 500 )','simple-slideshow-manager')."</span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_manage_gallery_function','acx_slideshow_managegallery_3_html_5',50);

function acx_slideshow_managegallery_3_ifpost_5()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_width,$temp_width;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	$show_alert = 0;
	$acx_slideshow_width = acx_slideshow_post_isset_check('acx_slideshow_width');
	if(is_numeric($acx_slideshow_width))
	{
		$acx_slideshow_width = $acx_slideshow_width;
	}
	else
	{
		$acx_slideshow_width = '';
		$show_alert = 1;
	}
	$acx_slideshow_width_type = acx_slideshow_post_isset_check('acx_slideshow_width_type');
	if($acx_slideshow_width != "")
	{
		$acx_slideshow_width = $acx_slideshow_width.$acx_slideshow_width_type;
	} 
	else
	{
		$acx_slideshow_width = "";
	}
	if($show_alert!=1)
	{
		$acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_width']= $acx_slideshow_width;
	if(!is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
	}
	update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
	}
	$temp_width = str_replace("%","",$acx_slideshow_width);
	$temp_width = str_replace("px","",$temp_width);
	if($show_alert == 1)
	{
		echo "<script type=\"text/javascript\">";
		echo "alert('".__('Fields should Not Be Empty (or)The text you entered is in incorrect format..please enter a numeric value!','simple-slideshow-manager')." ')";
		echo "</script>";
	}
}
add_action('acx_slideshow_hook_option_onpost_manage','acx_slideshow_managegallery_3_ifpost_5');

function acx_slideshow_managegallery_3_else_5()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_width,$temp_width;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	if(is_array($acx_slideshow_gallery_data) && array_key_exists($gallery_name,$acx_slideshow_gallery_data))
	{
		if(array_key_exists('acx_slideshow_width',$acx_slideshow_gallery_data[$gallery_name]))
		{
			$acx_slideshow_width = $acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_width'];	
		}
		else
		{
			$acx_slideshow_width ='';
		}
		if(preg_match('/%/', $acx_slideshow_width))
		{
			$acx_slideshow_width_type = "%";
		}
		else if(preg_match('/px/', $acx_slideshow_width))
		{
			$acx_slideshow_width_type ="px";
		}
		$temp_width = str_replace("%","",$acx_slideshow_width);
		$temp_width = str_replace("px","",$temp_width);
	}
	else
	{
		$acx_slideshow_width = '';
		$temp_width = str_replace("%","",$acx_slideshow_width);
		$temp_width = str_replace("px","",$temp_width);
	}
} add_action('acx_slideshow_hook_option_postelse_manage','acx_slideshow_managegallery_3_else_5');


function acx_slideshow_managegallery_3_html_6()
{
	global $temp_height;
	echo "<span class='label'>".__('Slide Height: ','simple-slideshow-manager')."</span>";
	echo "<input type='text' autocomplete='off' name='acx_slideshow_height' id='acx_slideshow_height' value='".$temp_height."' size='60'/>";
	echo "<input type='hidden' id='acx_slideshow_height_type'  name='acx_slideshow_height_type' value='px'>";
	echo "<span class='note'>".__('Height of the Slide in px ( eg: 500 )','simple-slideshow-manager')."</span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_manage_gallery_function','acx_slideshow_managegallery_3_html_6',60);
function acx_slideshow_managegallery_3_ifpost_6()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_height,$temp_height;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
	$show_alert = 0;
	$acx_slideshow_height = acx_slideshow_post_isset_check('acx_slideshow_height');
	if(is_numeric($acx_slideshow_height))
	{
		$acx_slideshow_height = $acx_slideshow_height;
	}
	else
	{
		$acx_slideshow_height = '';
		$show_alert = 1;
	}
	$acx_slideshow_height_type = acx_slideshow_post_isset_check('acx_slideshow_height_type');
	if($acx_slideshow_height != "")
	{
		$acx_slideshow_height = $acx_slideshow_height.$acx_slideshow_height_type;
	} 
	else
	{
		$acx_slideshow_height = "";
	}
	if($show_alert!=1)
	{
		$acx_slideshow_gallery_data[$gallery_name]['acx_slideshow_height']= $acx_slideshow_height;
		if(!is_serialized($acx_slideshow_gallery_data))
		{
			$acx_slideshow_gallery_data = serialize($acx_slideshow_gallery_data);	
		}
		update_option('acx_slideshow_gallery_data',$acx_slideshow_gallery_data);
	}
	$temp_height = str_replace("%","",$acx_slideshow_height);
	$temp_height = str_replace("px","",$temp_height);
	if($show_alert == 1)
	{
		echo "<script type=\"text/javascript\">";
		echo "alert('".__('Fields should Not Be Empty (or)The text you entered is in incorrect format..please enter a numeric value!','simple-slideshow-manager')." ')";
		echo "</script>";
	}
}
add_action('acx_slideshow_hook_option_onpost_manage','acx_slideshow_managegallery_3_ifpost_6');

function acx_slideshow_managegallery_3_else_6()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_height,$temp_height;
	$gallery_name=$acx_selected_gallery_name;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
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
		if (preg_match('/%/', $acx_slideshow_height))
		{
			$acx_slideshow_height_type = "%";
		}
		else if(preg_match('/px/', $acx_slideshow_height))
		{
			$acx_slideshow_height_type ="px";
		}
		$temp_height = str_replace("%","",$acx_slideshow_height);
		$temp_height = str_replace("px","",$temp_height);
	}
	else
	{
		$acx_slideshow_height = '';
		$temp_height = str_replace("%","",$acx_slideshow_height);
		$temp_height = str_replace("px","",$temp_height);
	}
} add_action('acx_slideshow_hook_option_postelse_manage','acx_slideshow_managegallery_3_else_6');


function acx_slideshow_managegallery_3_after_else()
{
	global $acx_slideshow_gallery_data;
	$acx_slideshow_gallery_data=get_option('acx_slideshow_gallery_data');
	if(is_serialized($acx_slideshow_gallery_data))
	{
		$acx_slideshow_gallery_data=unserialize($acx_slideshow_gallery_data);
	}
} add_action('acx_slideshow_hook_option_after_else_manage','acx_slideshow_managegallery_3_after_else');
function acx_slideshow_get_gall_name()
{
	global $acx_selected_gallery_name,$acx_slideshow_gallery_data,$acx_slideshow_imageupload_complete_data;
	if (isset($_GET['name']))
	{
		$acx_selected_gallery_name = sanitize_text_field(trim($_GET['name']));
	}
}
add_action('acx_slideshow_hook_option_above_ifpost_manage','acx_slideshow_get_gall_name',5);
//add_action('acx_slideshow_hook_option_postelse_manage','acx_slideshow_get_gall_name',5);
function acx_slideshow_manage_gallery_fun()
{
	global $acx_selected_gallery_name;
	if (isset($_GET['name']))
	{
		$acx_selected_gallery_name = sanitize_text_field(trim($_GET['name']));
	}
	?>
	<div id="rename_gallery" class="widefat" style = "display:none">
	<div id="rename_lb">
		<form name="gall_renameform" onsubmit="acx_ajax_rename();return false">
			<input type="text" autocomplete="off" id="rename" name="rename" class="field" value="<?php echo $acx_selected_gallery_name;  ?>" onblur="if (this.value == '') {this.value = '<?php echo $acx_selected_gallery_name;  ?>';}" onfocus="if (this.value == '<?php echo $acx_selected_gallery_name;  ?>') {this.value = '';}" />
			<input type="hidden" id="old_name" name="old_name" value="<?php echo $acx_selected_gallery_name;  ?>"/>
			<input type="hidden" id="url" name="url" value="<?php echo esc_url(str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])); ?>"/>
			<input type="button" id="confirm" name="confirm" value="Rename"  class="button acx_rename_buttn" onclick="javascript:acx_ajax_rename()"/>
		</form>
		<a class="close" onclick = "acx_rename('2');">X</a>
	</div>
	</div>
	<?php
}
add_action('acx_slideshow_hook_option_above_ifpost_manage','acx_slideshow_manage_gallery_fun',10);

function acx_slideshow_manage_gallery_fun2()
{
	global $acx_selected_gallery_name;
	if (isset($_GET['name']))
	{
		$acx_selected_gallery_name = sanitize_text_field(trim($_GET['name']));
	}
	?>
	<div id="acx_edit_image" style="display:none">
	<div id="edit_image">
		
	</div>
</div>
<div id="acx_edited">
</div>
	<script type="text/javascript">

//delete image from the selected gallery
function acx_delete(value)
{
	if (confirm('<?php _e('Are You Sure to Delete This Slide?\n\nNOTE: You cannot undo this action.','simple-slideshow-manager'); ?>')) 
	{ 
		var index = value;
		var gallery_name = document.getElementById("gallery_selected").value;
		var order ='&gallery_name='+gallery_name+'&index='+index+'&action=acx_slideshow_ajax_deleteimage'+'&acx_slideshow_ajax_deleteimage_es=<?php echo wp_create_nonce("acx_slideshow_ajax_deleteimage_es"); ?>'; 
		var acx_load="<div id='acx_slideshow_loading'><div class='load'></div></div>";
		jQuery('body').append(acx_load);
		jQuery.post(ajaxurl, order, function(theResponse)
		{
		jQuery("#response").html(theResponse);
		acx_slideshow_ajax_updateRecordsListings_js();
		jQuery("#acx_slideshow_loading").remove();
		setTimeout(function() {
		jQuery('#s_s_notice').fadeOut('fast');
		}, 3000); // <-- time in milliseconds
		});
	}
}
function acx_edit(value)
{
	var index = value;
	var gallery_name = document.getElementById("gallery_selected").value;
	var order ='&gallery_name='+gallery_name+'&index='+index+'&action=acx_slideshow_ajax_editimage'+'&acx_slideshow_ajax_editimage_es=<?php echo wp_create_nonce("acx_slideshow_ajax_editimage_es"); ?>'; 
	var acx_load="<div id='acx_slideshow_loading'><div class='load'></div></div>";
	jQuery('body').append(acx_load);
		jQuery.post(ajaxurl, order, function(theResponse)
		{
		jQuery("#acx_edit_image").show();
		jQuery("#edit_image").html(theResponse);
		acx_slideshow_ajax_updateRecordsListings_js();
		jQuery("#acx_slideshow_loading").remove();
		setTimeout(function() {
		jQuery('#s_s_notice').fadeOut('fast');
		}, 3000); // <-- time in milliseconds
		});
}
function acx_slideshow_change_edittext(value)
{
	var index = value;
	var gallery_name = document.getElementById("gallery_selected").value;
	var title = document.getElementById("acx_slideshow_edit_title").value;
	var caption = ""; //document.getElementById("acx_slideshow_edit_caption").value;
	var alttext = document.getElementById("acx_slideshow_edit_alt").value;
	var desc = ""; //document.getElementById("acx_slideshow_edit_desc").value;
	var url = document.getElementById("acx_slideshow_edit_url").value;
	var target = document.getElementById("acx_link_target").value;
	var acx_load="<div id='acx_slideshow_loading'><div class='load'></div></div>";
	jQuery('#acx_edit_image').append(acx_load);
	var order ='&gallery_name='+gallery_name+'&index='+index+'&title='+title+'&caption='+caption+'&alttext='+alttext+'&desc='+desc+'&url='+url+'&target='+target+'&action=acx_slideshow_ajax_changeedittext'+'&acx_slideshow_ajax_changeedittext_es=<?php echo wp_create_nonce("acx_slideshow_ajax_changeedittext_es"); ?>'; 
	jQuery.post(ajaxurl, order, function(theResponse)
	{
		jQuery("#acx_edited").html(theResponse);
		acx_slideshow_ajax_updateRecordsListings_js();
		var m_edited="<div id='s_s_notice'><?php _e('Image edited','simple-slideshow-manager'); ?></div>";
		jQuery('#response').prepend(m_edited);
		acx_slideshow_change_edittext_cancel();
		jQuery("#acx_slideshow_loading").remove();
		setTimeout(function() {
		jQuery('#s_s_notice').fadeOut('fast');
		}, 5000); // <-- time in milliseconds
	});
}

function acx_slideshow_change_edittext_cancel()
{
	jQuery('#acx_edit_image').hide();
	jQuery('#acx_editimage_form').remove();
}

function advancesettingsvalidating()
{
	var acx_timespan = document.getElementById('acx_slideshow_timespan').value;
	var acx_timespan = acx_timespan.trim();
	
	var acx_fadeintime = document.getElementById('acx_slideshow_fadeintime').value;
	var acx_fadeintime = acx_fadeintime.trim();
	
	var acx_fadeouttime = document.getElementById('acx_slideshow_fadeouttime').value;
	var acx_fadeouttime = acx_fadeouttime.trim();
	
	var acx_slideshowwidth = document.getElementById('acx_slideshow_width').value;
	var acx_slideshowwidth = acx_slideshowwidth.trim();
	
	var acx_slideshowheight = document.getElementById('acx_slideshow_height').value;
	var acx_slideshowheight = acx_slideshowheight.trim();
	
	var numericExpression = /^[0-9]+$/;
	
	//timespan
	if(acx_timespan == '')
	{
		alert('<?php _e('Timespan field should not be empty!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_timespan").focus();
		return false;
	}
	else if(numericExpression.test(acx_timespan) == false)
	{
		alert('<?php _e('Timespan field needs only numeric value!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_timespan").value='';
		document.getElementById("acx_slideshow_timespan").focus();
		return false;
	} 
	//fadein
	else if(acx_fadeintime == '')
	{
		alert('<?php _e('Fadeintime field should not be empty!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_fadeintime").focus();
		return false;
	}
	else if(numericExpression.test(acx_fadeintime) == false)
	{
		alert('<?php _e('Fadeintime field needs only numeric value!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_fadeintime").value='';
		document.getElementById("acx_slideshow_fadeintime").focus();
		return false;
	}
	//fadeout
	else if(acx_fadeouttime == '')
	{
		alert('<?php _e('Fadeouttime field should not be empty!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_fadeouttime").focus();
		return false;
	}
	else if(numericExpression.test(acx_fadeouttime) == false)
	{
		alert('<?php _e('Fadeouttime field needs only numeric value!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_fadeouttime").value='';
		document.getElementById("acx_slideshow_fadeouttime").focus();
		return false;
	}
	//slidewidth
	else if(acx_slideshowwidth == '')
	{
		alert('<?php _e('Slidewidth field should not be empty!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_width").focus();
		return false;
	}
	else if(numericExpression.test(acx_slideshowwidth) == false)
	{
		alert('<?php _e('Slidewidth field needs only numeric value!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_width").value='';
		document.getElementById("acx_slideshow_width").focus();
		return false;
	} 
	
	//slideheight
	else if(acx_slideshowheight == '')
	{
		alert('<?php _e('Slideheight field should not be empty!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_height").focus();
		return false;
	}
	else if(numericExpression.test(acx_slideshowheight) == false)
	{
		alert('<?php _e('Slideheight field needs only numeric value!','simple-slideshow-manager'); ?>');
		document.getElementById("acx_slideshow_height").value='';
		document.getElementById("acx_slideshow_height").focus();
		return false;
	} 
	else
	{
		var cmd = jQuery('#acx_slideshow_form').attr('data');
		document.acx_slideshow_form.submit();
	}
}
</script>
	<?php
}
add_action('acx_slideshow_hook_option_above_ifpost_manage','acx_slideshow_manage_gallery_fun2',50);
/*
	additional settings logic ends here
*/
//manage slide page ends here


//generate code page  starts here
function acx_slideshow_addgallery_1_generate()
{
	global $acx_slideshow_imageupload_complete_data;
	echo "<span id='Shortcode_validatation' style='color:red; display: none; margin-left:0px; font-weight: bold;'></span>";
	print_acx_slideshow_option_block_start("");
	
	echo "<span class='label'>".__('Select Gallery ','simple-slideshow-manager')."</span>";
	echo "<select name='acx_shortcode_gallery' id='acx_shortcode_gallery'>";
	foreach ($acx_slideshow_imageupload_complete_data as $key => $value)
	{
		echo "<option value='".$key."'>".$key."</option>";
	}
	echo "</select>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	echo "<span class='label'>".__('Width ','simple-slideshow-manager')."</span>";
	echo "<input type='text' name='acx_shortcode_gall_width' id='acx_shortcode_gall_width' value=''/>";
	echo "<input type='hidden' id='acx_width_type' name='acx_width_type' value='px'>";
	echo "<span class='note'>".__('Width of the Slide in px ( eg: 500 )','simple-slideshow-manager')."</span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	do_action('acx_slideshow_generate_shortcode_inner_hook_bfr');
	echo "<span class='label'>".__('Height ','simple-slideshow-manager')."</span>";
	echo "<input type='text' name='acx_shortcode_gall_height' id='acx_shortcode_gall_height' value=''/>";
	echo "<input type='hidden' id='acx_height_type' name='acx_height_type' value='px'>";
	echo "<span class='note'>".__('Height of the Slide in px ( eg: 500 )','simple-slideshow-manager')."</span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
	do_action('acx_slideshow_generate_shortcode_inner_hook_aftr');
	echo "<span class='acx_slideshow_q_sep'></span>";
	echo "<a id='acx_slideshow_generate_shortcode' class='button button-primary' alt = '".__('Click to Manage this Gallery','simple-slideshow-manager')."' onclick = 'acx_generate()'>".__('Generate Shortcode','simple-slideshow-manager')."</a>";
	
	print_acx_slideshow_option_block_end();
	?>
	<div id="acx_shortcode" style = "display:none">
				<b><?php _e('Shortcode:-','simple-slideshow-manager'); ?></b>
				<input type="text" name="acx_shortcode_display" id="acx_shortcode_display" value="" readonly size="60" onClick="javascript:this.focus();this.select();"> </br> </br>
				<b><?php _e('Php Code:-','simple-slideshow-manager'); ?></b>
				<input type="text" name="acx_shortcode_display_2" id="acx_shortcode_display_2" value="" readonly size="60" onClick="javascript:this.focus();this.select();">
				</div>
				<?php
}  add_action('acx_slideshow_hook_option_fields_manage_generate','acx_slideshow_addgallery_1_generate',100);

function acx_slideshow_manage_gallery_fun_generate()
{
	global $acx_slideshow_imageupload_complete_data;
	$acx_slideshow_imageupload_complete_data=get_option('acx_slideshow_imageupload_complete_data');
	if(is_serialized($acx_slideshow_imageupload_complete_data))
	{
		$acx_slideshow_imageupload_complete_data=unserialize($acx_slideshow_imageupload_complete_data);
	}
	?>
<script type="text/javascript">
function acx_generate()
{
	var acx_gallery_name = document.getElementById("acx_shortcode_gallery").value;
	var acx_height = document.getElementById("acx_shortcode_gall_height").value;
	var acx_width = document.getElementById("acx_shortcode_gall_width").value;
	var acx_height_type = document.getElementById("acx_height_type").value;
	var acx_width_type =  document.getElementById("acx_width_type").value;
console.log(acx_gallery_name);
	if(acx_gallery_name!="")
	{
		if(!isNaN(document.getElementById("acx_shortcode_gall_height").value))
		{
			acx_height = document.getElementById("acx_shortcode_gall_height").value;
		} 
		else
		{
			acx_height = "";
			document.getElementById('Shortcode_validatation').style.display='block';
			document.getElementById('Shortcode_validatation').innerHTML='<?php _e('Height needs to be a number','simple-slideshow-manager'); ?>';
			setTimeout(function(){
			jQuery('#Shortcode_validatation').fadeOut('slow');
			}, 2000);
		}
		if(!isNaN(document.getElementById("acx_shortcode_gall_width").value))
		{
			acx_width = document.getElementById("acx_shortcode_gall_width").value;
		}
		 else
		{
			acx_width = "";
			document.getElementById('Shortcode_validatation').style.display='block';
			document.getElementById('Shortcode_validatation').innerHTML='<?php _e('Width needs to be a number','simple-slideshow-manager'); ?>';
			setTimeout(function(){
			jQuery('#Shortcode_validatation').fadeOut('slow');
			}, 2000);

		}
		jQuery("#acx_shortcode").show();
		if(acx_height == "")
		{
			shortcode_ht = "";
		} 
		else
		{
			shortcode_ht = " height=\""+acx_height+acx_height_type+"\"";
		}
		if(acx_width == "")
		{
			shortcode_wth = "";
		} 
		else
		{
			shortcode_wth = " width=\""+acx_width+acx_width_type+"\"";
		}
		
		var shortcode_cnt = "[acx_slideshow name=\""+acx_gallery_name+"\""+shortcode_wth+shortcode_ht+"]";
		document.getElementById("acx_shortcode_display").value = shortcode_cnt;	
		
		
		var php_shortcode_cnt = "<?php echo '<?php ';?>"+"echo do_shortcode('"+shortcode_cnt+"');<?php echo ' ?>'; ?>";
		
		document.getElementById("acx_shortcode_display_2").value = php_shortcode_cnt;
	}
	else
	{
		document.getElementById('Shortcode_validatation').style.display='block';
		document.getElementById('Shortcode_validatation').innerHTML='<?php _e('There is no gallery exist.','simple-slideshow-manager'); ?>';
		setTimeout(function(){
		jQuery('#Shortcode_validatation').fadeOut('slow');
		}, 2000);

	}
}
</script>
<?php
}
add_action('acx_slideshow_hook_option_above_ifpost_manage_generate','acx_slideshow_manage_gallery_fun_generate');

/*
	generate code page ends here
*/

//misc page settings starts here


function acx_slideshow_addgallery_1_misc()
{
	global $acx_slideshow_misc_acx_service_banners,$acx_slideshow_misc_hide_advert,$acx_slideshow_misc_user_level;
	if($acx_slideshow_misc_acx_service_banners=="")
	{
		$acx_slideshow_misc_acx_service_banners="yes";
	}
	if($acx_slideshow_misc_hide_advert=="")
	{
		$acx_slideshow_misc_hide_advert ="no";
	}
	if($acx_slideshow_misc_user_level=="")
	{
		$acx_slideshow_misc_user_level ="manage_options";
	}
	print_acx_slideshow_option_block_start("");
	do_action('acx_slideshow_misc_function');
	print_acx_slideshow_option_block_end();
	echo "<input type='submit' name='Submit' class='button button-primary' value='".__('Save Settings', 'simple-slideshow-manager' )."'/>";

}
add_action('acx_slideshow_hook_option_fields_manage_misc','acx_slideshow_addgallery_1_misc',100);

function acx_slideshow_addgallery_1_misc_html_1()
{
	global $acx_slideshow_misc_acx_service_banners;
	echo "<span class='label'>".__('Acurax Service Banners: ','simple-slideshow-manager')."</span>";
	echo "<select name='acx_slideshow_misc_acx_service_banners'>";
	echo "<option value='yes'"; if ($acx_slideshow_misc_acx_service_banners == "yes") { echo "selected='selected'"; } echo">".__('Yes, Show Them','simple-slideshow-manager')." </option>";
	echo "<option value='no'"; if ($acx_slideshow_misc_acx_service_banners == "no") { echo "selected='selected'"; } echo">".__('No, Hide Them','simple-slideshow-manager')." </option>";
	echo "</select>";
	echo "<span class='note'>".__('Show Acurax Service Banners On Plugin Settings Page? ','simple-slideshow-manager')."</span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_misc_function','acx_slideshow_addgallery_1_misc_html_1',10);

function acx_slideshow_addgallery_1_ifpost_misc_1()
{
	global $acx_slideshow_misc_acx_service_banners;
	$acx_slideshow_misc_acx_service_banners=acx_slideshow_post_isset_check('acx_slideshow_misc_acx_service_banners');
	$acx_slideshow_misc_acx_service_banners = sanitize_text_field($acx_slideshow_misc_acx_service_banners);
	update_option('acx_slideshow_misc_acx_service_banners', $acx_slideshow_misc_acx_service_banners);
}
add_action('acx_slideshow_hook_option_onpost_manage_misc','acx_slideshow_addgallery_1_ifpost_misc_1');

function acx_slideshow_addgallery_1_else_misc_1()
{
	global $acx_slideshow_misc_acx_service_banners;
	$acx_slideshow_misc_acx_service_banners = get_option('acx_slideshow_misc_acx_service_banners');
	if($acx_slideshow_misc_acx_service_banners=="")
	{
		$acx_slideshow_misc_acx_service_banners="yes";
	}
}
add_action('acx_slideshow_hook_option_postelse_manage_misc','acx_slideshow_addgallery_1_else_misc_1');

function acx_slideshow_addgallery_1_after_else_misc_1()
{
	global $acx_slideshow_misc_acx_service_banners;
	$acx_slideshow_misc_acx_service_banners = get_option('acx_slideshow_misc_acx_service_banners');
	if($acx_slideshow_misc_acx_service_banners=="")
	{
		$acx_slideshow_misc_acx_service_banners="yes";
	}
}
add_action('acx_slideshow_hook_option_after_else_manage_misc','acx_slideshow_addgallery_1_after_else_misc_1');


function acx_slideshow_addgallery_1_misc_html_2()
{
	global $acx_slideshow_misc_user_level;
	echo "<span class='label'>".__('Who can Manage This: ','simple-slideshow-manager')."</span>";
	echo "<select name='acx_slideshow_misc_user_level'>";
	echo "<option value='manage_options'";if ($acx_slideshow_misc_user_level == "manage_options"||$acx_slideshow_misc_user_level=="") { echo "selected='selected'"; } echo ">".__('Administrator','simple-slideshow-manager')." </option>";
	echo "<option value='delete_others_pages'"; if ($acx_slideshow_misc_user_level == "delete_others_pages") { echo "selected='selected'"; } echo ">".__('Editor','simple-slideshow-manager')."</option>";
	echo "<option value='delete_published_posts'"; if ($acx_slideshow_misc_user_level == "delete_published_posts") { echo "selected='selected'"; } echo ">".__('Author','simple-slideshow-manager')." </option>";
	echo "</select>";
	echo "<span class='note'>".__('Select The User Level Who Can Manage This Plugin','simple-slideshow-manager')."</span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_misc_function','acx_slideshow_addgallery_1_misc_html_2',20);

function acx_slideshow_addgallery_1_ifpost_misc_2()
{
	global $acx_slideshow_misc_user_level;
	$acx_slideshow_misc_user_level=acx_slideshow_post_isset_check('acx_slideshow_misc_user_level');
	$acx_slideshow_misc_user_level = sanitize_text_field($acx_slideshow_misc_user_level);
	update_option('acx_slideshow_misc_user_level', $acx_slideshow_misc_user_level);
}
add_action('acx_slideshow_hook_option_onpost_manage_misc','acx_slideshow_addgallery_1_ifpost_misc_2');

function acx_slideshow_addgallery_1_else_misc_2()
{
	global $acx_slideshow_misc_user_level;
	$acx_slideshow_misc_user_level = get_option('acx_slideshow_misc_user_level');
	if($acx_slideshow_misc_user_level=="")
	{
		$acx_slideshow_misc_user_level="manage_options";
	}
}
add_action('acx_slideshow_hook_option_postelse_manage_misc','acx_slideshow_addgallery_1_else_misc_2');

function acx_slideshow_addgallery_1_after_else_misc_2()
{
	global $acx_slideshow_misc_user_level;
	$acx_slideshow_misc_user_level = get_option('acx_slideshow_misc_user_level');
	if($acx_slideshow_misc_user_level=="")
	{
		$acx_slideshow_misc_user_level="manage_options";
	}
}
add_action('acx_slideshow_hook_option_after_else_manage_misc','acx_slideshow_addgallery_1_after_else_misc_2');

function acx_slideshow_addgallery_1_misc_html_3()
{
	global $acx_slideshow_misc_hide_advert;
	echo "<span class='label'>".__('Hide Premium Version Adverts: ','simple-slideshow-manager')."</span>";
	echo "<select name='acx_slideshow_misc_hide_advert'>";
	echo "<option value='yes'"; if ($acx_slideshow_misc_hide_advert == "yes") { echo "selected='selected'"; } echo ">".__('Yes','simple-slideshow-manager')." </option>";
	echo "<option value='no'"; if ($acx_slideshow_misc_hide_advert == "no") { echo 'selected="selected"'; } echo ">".__('No','simple-slideshow-manager')." </option>";
	echo "</select>";
	echo "<span class='note'>".__('Would you like to hide the feature comparison advertisement of basic and premium version from plugin settings pages?','simple-slideshow-manager')."</span>";
	echo "<span class='acx_slideshow_q_sep'></span>";
}
add_action('acx_slideshow_misc_function','acx_slideshow_addgallery_1_misc_html_3',30);

function acx_slideshow_addgallery_1_ifpost_misc_3()
{
	global $acx_slideshow_misc_hide_advert;
	$acx_slideshow_misc_hide_advert=acx_slideshow_post_isset_check('acx_slideshow_misc_hide_advert');
	$acx_slideshow_misc_hide_advert = sanitize_text_field($acx_slideshow_misc_hide_advert);
	update_option('acx_slideshow_misc_hide_advert', $acx_slideshow_misc_hide_advert);
}
add_action('acx_slideshow_hook_option_onpost_manage_misc','acx_slideshow_addgallery_1_ifpost_misc_3');

function acx_slideshow_addgallery_1_else_misc_3()
{
	global $acx_slideshow_misc_user_level;
	$acx_slideshow_misc_hide_advert = get_option('acx_slideshow_misc_hide_advert');
	if($acx_slideshow_misc_hide_advert=="")
	{
		$acx_slideshow_misc_hide_advert ="no";
	}
}
add_action('acx_slideshow_hook_option_postelse_manage_misc','acx_slideshow_addgallery_1_else_misc_3');
function acx_slideshow_addgallery_1_after_else_misc_3()
{
	global $acx_slideshow_misc_hide_advert;
	$acx_slideshow_misc_hide_advert = get_option('acx_slideshow_misc_hide_advert');
	if($acx_slideshow_misc_hide_advert=="")
	{
		$acx_slideshow_misc_hide_advert ="no";
	}
}
add_action('acx_slideshow_hook_option_after_else_manage_misc','acx_slideshow_addgallery_1_after_else_misc_3');
/*
	Misc page ends here
*/
//help page  starts here
function acx_slideshow_addgallery_1_help()
{
	?>
	<p><?php _e('Thank you for using Simple Slideshow Manager For Your Wordpress Slideshow Need.','simple-slideshow-manager'); ?></p>

	<h3><a href="<?php echo esc_url('http://clients.acurax.com/link.php?id=13'); ?>" target="_blank"><?php _e('Click here to open the FAQ and Help Page','simple-slideshow-manager'); ?></a></h3>
	<?php
}  add_action('acx_slideshow_hook_option_fields_manage_help','acx_slideshow_addgallery_1_help',100);
/*
	help page ends here
*/
/* Addon Page */
function acx_slideshow_addon_list_section()
{
	$slideshow_addons_intro = array();
	$slideshow_addons_intro[] = array(
							'name' => __('Advanced Slideshow Manager','simple-slideshow-manager'),
							'img' => plugins_url('/images/asm_addon.jpg',dirname(__FILE__)),
							'desc' => __('Simply the best Responsive Slideshow Plugin, Where you can have unlimited slideshows, Display slideshow using Widget, Shortcodes, PHP Code.An Easy to use slideshow plugin which help you to include multi device friendly slideshows in your wordpress website or blog.','simple-slideshow-manager'),
							'url' => 'http://www.acurax.com/products/simple-slideshow-manager/',
							'button' => __('View Details','simple-slideshow-manager')
							);
							?>
<div id="slideshow_addons_intro_holder">
<?php
foreach($slideshow_addons_intro as $key => $value)
{
?>
<div class="slideshow_addons_intro" onclick="window.open('<?php echo $value['url']; ?>'); return false;">
<img src="<?php echo $value['img']; ?>">
<h3><?php echo $value['name']; ?></h3>
<p>
<?php echo $value['desc']; ?>
</p>
<a class="slideshow_addon_button" href="<?php echo $value['url']; ?>" target="_blank"><?php echo $value['button']; ?></a>
</div> <!-- slideshow_addons_intro -->
<?php } ?>
</div> <!-- slideshow_addons_intro_holder -->
<?php
}
add_action("acx_slideshow_addon_hook_option_field_content","acx_slideshow_addon_list_section",10);
/* Addon Page */
?>