//Add this in your wordpress functions.php

function shapeSpace_plugin_notice() {
	
	global $current_user;
	
	$user_id = $current_user->ID;
	
	if (!get_user_meta($user_id, 'dickensos_plugin_notice_ignore')) {
		
		echo '<div class="updated notice"><p>'. __('This is a notice!') .' <a href="?my-plugin-ignore-notice">Dismiss</a></p></div>';
		
	}
	
}
add_action('admin_notices', 'shapeSpace_plugin_notice');
	
function dickensos_plugin_notice_ignore() {
	
	global $current_user;
	
	$user_id = $current_user->ID;
	
	if (isset($_GET['my-plugin-ignore-notice'])) {
		
		add_user_meta($user_id, 'dickensos_plugin_notice_ignore', 'true', true);
		
	}
	
}
add_action('admin_init', 'dickensos_plugin_notice_ignore');
