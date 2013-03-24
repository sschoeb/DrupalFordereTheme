<?php

variable_set ( 'menu_default_active_menus', array (
'navigation',
'management',
'user-menu',
'main-menu',
'menu-new-menu'
) );

?>
<div id="maincontainer">
	<div id="top">
		<div id="logincontainer">

			<?php
			print login_bar ();
			global $user;
			if ($user->uid == 0) {
				?>
			<div id="loginlinks">
				<a href="<?php print url('user/password');?>">Passwort vergessen</a>
				| <a href="<?php print url('user/register');?>">Registrieren</a>
			</div>
			<?php }?>
		</div>
	</div>

	<div class="mainmenue">
		<?php
		print render ( $page ['menu1'] );
		//print theme ( 'links__system_main_menu', array ('links' => $main_menu, 'attributes' => array ('id' => 'mainmenue', 'class' => array ('links', 'clearfix' ) ) ) );
		?>
	</div>
	<div id="banner" onclick="window.location=<?php print url('');?>"></div>
	<div class="submenue">
		<?php
		print render ( $page ['menu2'] );
		?>
	</div>
<?php if($page['sidebar_first']):?>
		<div id="sidebar">
		  <?php print render($page['sidebar_first']); ?>
		</div>
		<?php endif; ?>
	

		<div id="contentwrap"  <?php if($page['sidebar_first']):?> style="width:740px;" <?php endif; ?><?php if(!$page['sidebar_first']):?> style="width:1000px;" <?php endif; ?>>
			<?php print $messages; ?>
			<h1>
				<?php print $title;?>
			</h1>

			<?php if ($tabs = render($tabs)): ?>
			<div class="tabs">
				<?php print $tabs; ?>
			</div>
			<?php endif; ?>
			<?php print render($page['content']); ?>
		</div>
		

</div>




