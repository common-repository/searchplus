<?php
/*
 This program is free software; you can redistribute it and/or
 modify it under the terms of the GNU General Public License
 as published by the Free Software Foundation; either version 2
 of the License, or (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.
 
 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 
 Copyright 2012-2027 Soundex Ltd.
 */
?>
<div id="notification_bar" class="alert alert-success" role="alert" style="position: fixed; left: 40%; top: 50px; z-index: 10; display:none">
  	<i class="bi bi-info-circle"></i>&nbsp;<span id="notification_text">The token was saved!</span>
</div>
<div class="page-header">
	<h1>
		<b>Search+</b> plugin configuration page <br />
	</h1>
</div>
<div class="alert alert-info alert-dismissible fade show" role="alert">
		<i class="fa fa-info-circle"></i>&nbsp;
		<ul>
			<li>Please, visit the <a href="https://searchplus.pro/customer?m=s" target="_blank">
			 	settings page</a> in order to choose a microphone image, suitable for your web site design
			 	and eventually tune the alignment of the various elements of the service.</li>
		</ul>
</div>
<div id="div_account" class="card" <?php if(searchplus_account_exists () == 0) {?>style="display: none" <?php }?>>
	<div class="card-body">
	<h5 class="card-title">Account</h5>
		<br/>
		<table style="padding-top: 10pt; border-spacing: 10px; border-collapse: collapse;">
			<tr>
				<td><label for="input_name">You are logged in as</label>
				<div class="input-group">
					<input id="input_name" type="text" style="width: 280pt;"
						class="form-control" placeholder="Enter your name here"
						aria-describedby="basic-addon2"
						value="<?php echo dym_account_name(); ?>" disabled/>
				</div>
				</td>
			</tr>
			<tr>
				<td><label for="input_token">API key</label>
					<div class="input-group">
					<input id="input_token" type="text" style="width: 280pt;"
						class="form-control" placeholder="Paste your personal key here"
						aria-describedby="basic-addon2"
						value="<?php echo dym_account_token(); ?>" disabled/>
				</div></td>
			</tr>
		</table>

		<br /> <br />
		<p>
			<a class="btn btn-default btn-success" role="button"
				href="javascript:dym_save_token_javascript()" style="display: none;">Save</a>
			<a id="a_settings" class="btn btn-primary" role="button"
				href="https://searchplus.pro/customer/?m=s" target="_blanc">Go to settings</a>
			&nbsp;&nbsp;&nbsp;
			<a class="btn btn-danger" role="button"
				href="javascript:dym_account_reset_javascript()">Log out</a>
		</p>
	</div>
</div>
<table id="div_register" <?php if(searchplus_account_exists () == 1) {?>style="display: none" <?php }?>>
<tr>
<td>
<div class="card">
	<div class="card-body">
	<h5 class="card-title">I am new to the service</h5>
		<br/>
		<table style="padding-top: 10pt; border-spacing: 10px; border-collapse: collapse;">
			<tr>
				<td>
					<label for="input_register_email">Email:</label>
					<div class="input-group">
    					<input id="input_register_email" type="email" style="width: 280pt;"
    						class="form-control" placeholder="me@mydomain.com"
    						aria-describedby="basic-addon2"
    						value="<?php echo wp_get_current_user()->user_email;?>"/>
					</div>
				</td>
			</tr>
			<tr id="tr_register_here">
				<td>
					<label for="input_register_website">Website:</label>
					<div class="input-group">
    					<input id="input_register_website" type="text" style="width: 280pt;"
    						class="form-control" placeholder="https://..."
    						aria-describedby="basic-addon2"
    						value="<?php echo get_site_url() ?>"/>
					</div>
					<input id="input_register_generate_passwords" type="checkbox" checked>Generate the password and send an email to me<br/>
    				<div id="div_register_passwords" style="display: none;">
    					<label class="password" for="input_register_password">Password:</label>
    					<div class="input-group">
        					<input id="input_register_password" type="password" style="width: 280pt;"
        						class="form-control" 
        						aria-describedby="basic-addon2"
        						value=""/>
    					</div>
    					<label for="input_register_confirm">Confirm:</label>
    					<div class="input-group">
        					<input id="input_register_confirm" type="password" style="width: 280pt;"
        						class="form-control" 
        						aria-describedby="basic-addon2"
        						value=""/>
    					</div>
					</div>
					<br /> <br />
					<p>
						<button id="button_activate" class="btn btn-success" role="button">Register</button>
					</p>
				</td>
			</tr>
		</table>
	</div>
</div>
</td>
<td>
	<div id="div_register" class="card" <?php if(searchplus_account_exists () == 1) {?>style="display: none" <?php }?>>
		<div class="card-body">
		<h5 class="card-title">I have an account</h5>
		<br/>
		<table style="padding-top: 10pt; border-spacing: 10px; border-collapse: collapse;">
			<tr>
				<td>
					<label for="input_bind_email">Email:</label>
					<div class="input-group">
    					<input id="input_bind_email" type="email" style="width: 280pt;"
    						class="form-control" placeholder="https://..."
    						aria-describedby="basic-addon2"
    						value="<?php echo wp_get_current_user()->user_email;?>"/>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="input_bind_password">Password:</label>
					<div class="input-group">
    					<input id="input_bind_password" type="password" style="width: 280pt;"
    						class="form-control" aria-describedby="basic-addon2"/>
					</div>
					<div style="height: 72px">
						<a href="javascript:dym_password_reset();">Forgot your password?</a>
					</div>
					<p>
						<button id="button_bind" class="btn btn-primary" role="button">Bind the account to this site</button>
					</p>
				</td>
			</tr>
		</table>
		</div>
		</div>
	</td>
</tr>
</table>
<div id="working" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p>
                    <img src="<?php echo plugin_dir_url( __DIR__ ).'assets/img/working.gif';?>" />&nbsp;<span id="span_working">Working...</span>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php

/**
 * Outputs "disabled" if the account field should be disabled
 */
function account_field_disabled()
{
    if (searchplus_account_exists() == 1)
        echo 'disabled';
}

add_action('admin_footer', 'searchplus_account_actions_javascript');

/**
 * Outputs the button actions javascripts
 */
function searchplus_account_actions_javascript()
{
?>
<script type="text/javascript">
	const dym_url = 'https://api.searchplus.pro/services/'; // 'http://localhost:8081/services';
	const web_url = 'https://searchplus.pro/customer/'; // 'http://localhost/didyoumean-ui-customer/';
	
	// Resets the account field
	function dym_account_reset_javascript() {
		console.log('DYM: dym_account_reset_javascript');
		var data = {
			'action': 'dym_reset_token'
		};
			
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			 //location.reload();				
		});

		// clear the input
		jQuery("#input_token").val('');
		jQuery("#input_name").val('');

		jQuery("#div_register").toggle("slow");
		jQuery("#div_account").toggle("slow");
	}

	// saves the account token
	function dym_save_token_javascript() {
 		console.log('DYM: dym_save_token_javascript');
 		
		// show the modal
		var token = jQuery('#input_token');
		var name = jQuery('#input_name');
		
		var data = {
			'action': 'dym_save_token',
			'token': token.val(),
			'name': name.val()
		};

		// var ajaxurl = 'admin-ajax.php';
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			dym_notify('The service has been initialized!');
			
 			console.log('DYM: Got this from the server - "' + response + '"');
		});
	};

	function dym_notify(message) {
		jQuery('#notification_text').html(message);
		jQuery('#notification_bar').fadeIn('slow', function() {
			 setTimeout(function () {
				 jQuery('#notification_bar').fadeOut('slow');
			    }, 2000);
			
		});
	}

	// reads the saved token
	function dym_account_token_javascript() {
		console.log('DYM: dym_account_token_javascript');
		
		var box = jQuery('#input_token');
		var box_val = box.val();

		var data = {
			'action': 'dym_account_token',
			'name': box_val
		};

		jQuery.post(ajaxurl, data, function(response) {
			console.log('DYM: Got this from the server - "' + response + '"');

			box.val(response);
		});
	};

	function dym_register_here () {
		jQuery("#tr_register_here").toggle('slow');
	};

	function dym_register(name, password, email, comment, plan, period, method, website, seller, callback) {
		var args = new Array();
		args.push(name);
		args.push(password);
		args.push(email);
		args.push(comment);
		args.push(plan);
		args.push(period);
		args.push(method);
		args.push(website);
		args.push(seller);

		jQuery("#working").modal();
		dym_call(dym_url, 'dym', 'register', JSON.stringify(args), function(outcome) {
			console.log('closing working..');
			jQuery("#working").modal('hide');
			if(outcome.code == 200) {
				jQuery("#input_token").val(outcome.payload.token);
				jQuery("#input_name").val(name);
				
				dym_save_token_javascript();
				dym_point_settings(outcome.payload.session);
				
				jQuery("#div_register").toggle("slow");
				jQuery("#div_account").toggle("slow");
			}
			else
				alert(outcome.message);
		});
	}

	function dym_password_reset() {
		var email = jQuery('#input_bind_email').val();
		
		var args = new Array();
		args.push(email);

		dym_call(dym_url, 'dym.csc', 'requestCustomerPasswordReset', JSON.stringify(args), function(outcome) {
			if(outcome.code == 200) {
				alert('An email with instruction has been sent to this address.');
			}
			else
				alert(outcome.message);
		});
	}

	function dym_bind(name, password) {
		var args = new Array();
		args.push(name);
		args.push(password);

		jQuery("#working").modal();
		dym_call(dym_url, 'dym.csc', 'bind', JSON.stringify(args), function(outcome) {
			jQuery("#working").modal('hide');
			if(outcome.code == 200) {
				jQuery("#input_token").val(outcome.payload.token);
				jQuery("#input_name").val(name);
				
				dym_save_token_javascript();
				dym_point_settings(outcome.payload.session);
				
				jQuery("#div_register").toggle("slow");
				jQuery("#div_account").toggle("slow");
			}
			else
				alert(outcome.message);
		});
	}

	function dym_point_settings(session) {
		jQuery('#a_settings').attr('href', 'https://searchplus.pro/customer/?s='+session+'&m=s');
	}
	
	function dym_call(url, service, method, json, callback, error_callback) {
		// check if the callback is function
		var getType = {};
		var cisf = callback
			&& getType.toString.call(callback) === '[object Function]';

		// build request
		var requestUrl = url + "/" + service + "/" + method;// + "?json=[" + json +
		// "]";

		if (!cisf) {
			requestUrl = requestUrl + "?padding=" + callback;
		}

		// #8650
		if (Array.isArray(json)) {
			json = JSON.stringify(json);
		} else { // legacy
			if (!(json.startsWith('[') && json.endsWith(']'))) {
				// alert('adding bracets to: |'+json+'|');
				json = '[' + json + ']';
			}

		}

		console.log("DYM: json(p): " + url + ", " + service + ", " + method + ", "
			+ json + " -> [" + (cisf ? 'local' : +callback) + "]");

		// call
		jQuery.ajax({
			url: requestUrl,
			timeout: 30000,
			dataType: (cisf ? "json" : "jsonp"),
			data: 'json=' + json,
			method: "POST",
			// contentType : "application/x-www-form-urlencoded; charset=utf-8",
			success: function(data, textStatus, XMLHttpRequest) {
				if (cisf) {
					callback(data);
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				if (!(typeof variable === 'undefined' || variable === null))
					callback_error(textStatus);
			},
			complete: function(xhr, textStatus) {
				if (xhr.status >= 200 && xhr.status < 300) {
					// alert("network request ok");
				} else if (xhr.status == 0) {
					if (!(typeof variable === 'undefined' || variable === null))
						callback_error(textStatus);
				} else {
					if (!(typeof variable === 'undefined' || variable === null))
						callback_error(textStatus);
				}
			},
			beforeSend: function(xhr) {
				var username = 'cpil';
				var password = 'U8ba7btFMDjekquf';
				xhr.setRequestHeader("Authorization", "Basic "
					+ btoa(username + ":" + password));
			},
			processData: false
		});
	}
	
	jQuery(document).ready(function() {
		jQuery("#button_activate").click(function() {
			var website = jQuery('#input_register_website').val();
			var email = jQuery('#input_register_email').val();
			var password = jQuery('#input_register_password').val();
			var confirm = jQuery('#input_register_confirm').val();
			var autopwd = jQuery('#input_register_generate_passwords').prop('checked');

			if(autopwd) {
				password = null;
			} else if(password != confirm) {
				alert('The passwords supplied do not match!');
			}
			
			dym_register(email, password, email, null, 1, 1, 'free', website, 1, function(data) {
				alert('activated!');
			});
		});

		jQuery("#button_bind").click(function() {
			var email = jQuery('#input_bind_email').val();
			var password = jQuery('#input_bind_password').val();
			
			dym_bind(email, password)
		});

		jQuery("#input_register_generate_passwords").change(function() {
			jQuery("#div_register_passwords").toggle('slow');
		});

	<?php if(searchplus_account_exists() == 0) {?>
		dym_account_token_javascript();
	<?php }?>
	});
</script>
<?php
}
?>  