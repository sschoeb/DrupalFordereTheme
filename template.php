<?php
function fordere_theme_theme(&$existing, $type, $theme, $path) {
	return array ( 'user_login_block' => array ('template' => 'user--login--block', 'arguments' => array ('form' => NULL ) ) );
}

function fordere_theme_login_block($form) {
	$form ['#action'] = url ( $_GET ['q'], array ('query' => drupal_get_destination () ) );
	$form ['#id'] = 'horizontal-login-block';
	$form ['#validate'] = user_login_default_validators ();
	$form ['#submit'] [] = 'user_login_submit';
	$form ['#prefix'] = '<div id="loginbar">';
	$form ['#suffix'] = '</div>';
	$form ['name'] = array ('#type' => 'textfield', '#maxlength' => USERNAME_MAX_LENGTH, '#size' => 15, '#required' => TRUE, '#default_value' => 'Username' );
	$form ['pass'] = array ('#type' => 'password', '#maxlength' => 60, '#size' => 15, '#required' => TRUE );
	$form ['actions'] = array ('#type' => 'actions' );
	$form ['actions'] ['submit'] = array ('#type' => 'submit', '#value' => 'Login' );
	return $form;
}

//function fordere_preprocess_comment(&$vars){
//	echo $vars['template_files'][] = 'comment--' . $vars['node']->type;
//}

function login_bar() {
	global $user;
	if ($user->uid == 0) {
		$form = drupal_get_form ( 'fordere_theme_login_block' );
		return render ( $form );
	} else {
		// you can also integrate other module such as private message to show unread / read messages here
		return '<div id="loginbar"><a href="' . url ( 'user' ) . '">Mein Profil(' . ucwords ( $user->name ) . ')</a> | <a href="' . url ( 'user/logout' ) . '">Logout</a></div>';
	}
}

function fordere_theme_form_comment_form_alter(&$form, &$form_state) {
	$form ['body_field'] ['format'] ['#access'] = user_access ( 'administer filters' );
}


function fordere_filter_tips($tips, $long = FALSE, $extra = '') {
	return '';
}
function fordere_filter_tips_more_info() {
	return '';
}

function fordere_preprocess_page(&$vars, $hook) {
	// Removes a tab called 'Reviews, change with your own tab title
	fordere_removetab ( 'forum', $vars );

}

// Remove undesired local task tabs.
// Related to yourthemename_removetab() in yourthemename_preprocess_page().
function fordere_removetab($label, &$vars) {
	
	// Remove from primary tabs
	$i = 0;
	if (isset ( $vars ['tabs'] ['#primary'] ) && is_array ( $vars ['tabs'] ['#primary'] )) {
		foreach ( $vars ['tabs'] ['#primary'] as $primary_tab ) {
			if ($primary_tab ['#link'] ['tab_parent'] == $label) {
				unset ( $vars ['tabs'] ['#primary'] [$i] );
			}
			++ $i;
		}
	}
	
	// Remove from secundary tabs
	$i = 0;
	if (isset ( $vars ['tabs'] ['#secundary'] ) && is_array ( $vars ['tabs'] ['#secundary'] )) {
		foreach ( $vars ['tabs'] ['#secundary'] as $secundary_tab ) {
			if ($secundary_tab ['#link'] ['title'] == $label) {
				unset ( $vars ['tabs'] ['#secundary'] [$i] );
			}
			++ $i;
		}
	}
}
?>