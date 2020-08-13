<?php

// Do not allow directly accessing this file.
if ( !defined('ABSPATH') ) {
	exit('Direct script access denied.');
}

class DFWPTheme {
	public $plugin_file=__FILE__;
	public $responseObj;
	public $licenseMessage;
	public $showMessage=false;
	public $slug="rocket";
	
	function __construct() {
        update_option("DF_WPTheme_lic_Key","B5E0B5F8-DD8689E6-ACA49DD6-E6E1A930");
        update_option( "DF_WPTheme_lic_email","full@gplready.com");
		$licenseKey=get_option("DF_WPTheme_lic_Key","");
		$liceEmail=get_option( "DF_WPTheme_lic_email","");
		
		

		// Activated
		add_action( 'admin_menu', [$this,'ActiveAdminMenu'],99999);
		add_action( 'admin_post_DFWPTheme_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
			//$this->licenselMessage=$this->mess;
			//***Write you plugin's code here***

	}

	function ActiveAdminMenu(){
		add_menu_page( "License Info", "License Info", "activate_plugins", $this->slug, [$this,"Activated"], " dashicons-admin-network ", 2 );
	}

	function InactiveMenu() {
		add_menu_page( "Theme Activation", "Activation", 'activate_plugins', $this->slug,  [$this,"LicenseForm"], " dashicons-admin-network ", 2 );
	}

	function action_activate_license(){
		check_admin_referer( 'el-license' );
		$licenseKey=!empty($_POST['el_license_key'])?$_POST['el_license_key']:"";
		$licenseEmail=!empty($_POST['el_license_email'])?$_POST['el_license_email']:"";
		update_option("DF_WPTheme_lic_Key",$licenseKey) || add_option("DF_WPTheme_lic_Key",$licenseKey);
		update_option("DF_WPTheme_lic_email",$licenseEmail) || add_option("DF_WPTheme_lic_email",$licenseEmail);
		wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
	}

	function action_deactivate_license() {
		check_admin_referer( 'el-license' );
		$message="";
		if ( DFWPThemeActivationBase::RemoveLicenseKey(__FILE__,$message) ) {
			update_option("DF_WPTheme_lic_Key","") || add_option("DF_WPTheme_lic_Key","");
		}
		wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
	}
	
	// Activated
	function Activated(){
		$theme         = df_get_theme_info();
		$theme_name    = $theme['name'];
		$theme_version = $theme['v'];
		$theme_slug    = $theme['slug'];
	?>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="DFWPTheme_el_deactivate_license"/>
			
			<div class="wrap about-wrap df-about-wrap">

				<div class="clearfix">
					<h1><?php printf( esc_html__('%s is activated!', $theme_slug), $theme_name ); ?></h1>
					<div class="about-text">
						<?php printf( esc_html__( '%s is now activated and ready to use! Get ready to build something beautiful. Now you can get automatic theme updates. Check additional information about your license below. We hope you enjoy using the theme!', $theme_slug ), $theme_name ); ?>
					</div>
					<div class="wp-badge wp-badge--theme"><?php esc_html_e( 'Version', $theme_slug ); ?> <?php echo esc_html( $theme_version ); ?></div>
				</div>

				<div class="welcome-panel welcome-panel--df welcome-panel--df-activated">

					<div class="el-license-container">
						<ul class="el-license-info">
							<li>
								<div>
									<span class="el-license-info-title"><?php _e("Status",$this->slug);?></span>
									<span class="el-license-valid"><?php _e("Valid",$this->slug);?></span>
								</div>
							</li>

							<li>
								<div>
									<span class="el-license-info-title"><?php _e("License Type",$this->slug);?></span>
									<?php echo $this->responseObj->license_title; ?>
								</div>
							</li>

							<li>
								<div>
									<span class="el-license-info-title"><?php _e("License Expired on",$this->slug);?></span>
									<?php echo $this->responseObj->expire_date; ?>
								</div>
							</li>

							<li>
								<div>
									<span class="el-license-info-title"><?php _e("Support Expired on",$this->slug);?></span>
									<?php echo $this->responseObj->support_end; ?>
								</div>
							</li>

							<li>
								<div>
									<span class="el-license-info-title"><?php _e("Your License Key",$this->slug);?></span>
									<span class="el-license-key"><?php echo esc_attr( substr($this->responseObj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->responseObj->license_key,-9) ); ?></span>
								</div>
							</li>
						</ul>

						<div class="el-license-active-btn">
							<?php wp_nonce_field( 'el-license' ); ?>
							<?php submit_button('Deactivate', 'button button-secondary button-hero button--df-activation'); ?>
						</div>

					</div>

					
				</div>

			</div>

		</form>
	<?php
	}

	// Not activated
	function LicenseForm() {
		$theme         = df_get_theme_info();
		$theme_name    = $theme['name'];
		$theme_version = $theme['v'];
		$theme_slug    = $theme['slug'];

		?>
		<form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
			<input type="hidden" name="action" value="DFWPTheme_el_activate_license"/>

			<div class="wrap about-wrap df-about-wrap">

				<div class="clearfix">
					<h1><?php printf( esc_html__('Welcome to %s!', $theme_slug), $theme_name ); ?></h1>
					<div class="about-text">
						<?php printf( esc_html__( '%s theme is now successfully installed! Would you like to activate your version of Rocket theme to receive live updates & get premium support? Read below for additional information about theme activation process.', $theme_slug ), $theme_name ); ?><br>
					</div>
					<div class="wp-badge wp-badge--theme"><?php esc_html_e( 'Version', $theme_slug ); ?> <?php echo esc_html( $theme_version ); ?></div>
				</div>

				<div class="welcome-panel welcome-panel--df">

					<div class="el-license-container">
						
						<?php if ( !empty($this->showMessage) && !empty($this->licenseMessage) ) : ?>
						<div class="notice notice-error is-dismissible">
							<p><?php echo $this->licenseMessage; ?></p>
						</div>
						<?php endif; ?>

						<p class="welcome-panel__lead"><?php esc_html_e( 'Please enter your Purchase Code and Email Address (optional) to activate the theme and enable theme auto updates. If you do not know where to find your Purchase Code check instruction below.', $theme_slug ); ?></p>
						<div class="el-license-field">
							<label for="el_license_key"><strong><?php esc_html_e( 'Purchase code *', $theme_slug);?></strong></label>
							<input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
						</div>
						<div class="el-license-field">
							<label for="el_license_key"><strong><?php esc_html_e( 'Email Address (optional)', $theme_slug ); ?></strong></label>
							<?php $purchaseEmail = get_option( "DF_WPTheme_lic_email", get_bloginfo( 'admin_email' )); ?>
							<input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo $purchaseEmail; ?>" placeholder="">
						</div>
						<div class="el-license-active-btn">
							<?php wp_nonce_field( 'el-license' ); ?>
							<?php submit_button('Activate', 'button button-primary button-hero button--df-activation'); ?>
						</div>
						<p><em><?php esc_html_e( 'The activation process is optional and not needed if the theme downloaded from Envato Elements. In this case you will need to update the theme manually and support is not provided.', $theme_slug ); ?></em></p>
					</div>

					<hr>
					<h3><?php esc_html_e( 'How to find your purchase code', $theme_slug ); ?></h3>
					<ol>
						<li>
							<?php
							$item_url   = 'https://1.envato.market/q3VnO';
							printf(
								esc_html__( 'Make sure you purchased %1$s on Envato Market.', $theme_slug ),
								sprintf(
									'<a href="%s" target="_blank">%s</a>',
									$item_url,
									esc_html__( 'the theme', $theme_slug )
								)
							);
							?>
						</li>
						<li><?php esc_html_e( 'Log into your Envato Market account.', $theme_slug ); ?></li>
						<li><?php esc_html_e( 'Hover the mouse over your username at the top of the screen.', $theme_slug ); ?></li>
						<li><?php esc_html_e( 'Click ‘Downloads’ from the drop-down menu.', $theme_slug ); ?></li>
						<li><?php esc_html_e( 'Click ‘License certificate & purchase code’ (available as PDF or text file).', $theme_slug ); ?></li>
					</ol>
					<p>
						<?php
						$video_url   = 'https://www.youtube.com/watch?v=srghr25uBgc';
						$article_url = 'https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-';
						printf(
							esc_html__( 'Watch %1$s or check %2$s for more information.', $theme_slug ),
							sprintf(
								'<a href="%s" target="_blank" rel="nofollow">%s</a>',
								$video_url,
								esc_html__( 'this short video', $theme_slug )
							),
							sprintf(
								'<a href="%s" target="_blank" rel="nofollow">%s</a>',
								$article_url,
								esc_html__( 'this article', $theme_slug )
							)
						);
						?>
					</p>
				</div>

			</div>
		</form>
	<?php
	}
}

new DFWPTheme();
