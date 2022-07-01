<?php
/**
 * Plugin Name: Zuidplugin
 * Plugin URI:
 * Description:
 * Version: 0.0.1
 * Author:
 * Author URI:
 * License: GPL2
 */

/**
 * Register option page parent and sub
 * @ https://developer.wordpress.org/reference/functions/add_menu_page/
 * @ https://developer.wordpress.org/reference/functions/add_submenu_page/
 */



// include custom jQuery
function shapeSpace_include_custom_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');


add_action( 'wp_head', 'thim_lazy_ajax', 0, 0 );
function thim_lazy_ajax() {
 ?>
 <script type="text/javascript">
 if (typeof ajaxurl === 'undefined') {
 /* <![CDATA[ */
 var ajaxurl = "<?php echo esc_js( admin_url( 'admin-ajax.php' ) ); ?>";
 /* ]]> */
 }
 </script>
 <?php
}



function zuid_register_option_page() {
    add_menu_page(
        'Custom menu title',
        'ZUID settings',
        'manage_options',
        'zuidplugin/zuid.php',
        '',
        'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAUCAYAAABbLMdoAAAA6ElEQVQ4T5WSjRHBQBCF93VABagAFaADHaACdKCEqIASdEAqQAc6QAXPvPzNZWfNcDOZJJcvu9+8W5DMzGxo5epXV/Xauu1B8mJmk+ir2/sLHv9a+Q5gJHhnZtOkpbx7TmELIIN3Jbk0s4Pb7wJ4RfAtSUf/5ACKzi2YZMfMnpFCBEcKAwCPCPYKRQp1p0aDpDavTmEF4BjBOvZ1Ar919EohguWV5rsHsEk7FRokFc3ZKcwAaG6aVcPyWji4zBbIq4L9GvYK0RDmmo0oha+wT+HbaBeVf1EoZ4Sk4pkn5XSKWtLTc32Cpw+QfWbaacGUSQAAAABJRU5ErkJggg==',
        999
    );

    // add_submenu_page(
    //     'zuidplugin/zuid.php',
    //     'My Custom Submenu Page',
    //     '301',
    //     'manage_options',
    //     'zuidplugin/301.php'
    // );

    // add_submenu_page(
    //     'zuidplugin/zuid.php',
    //     'My Custom Submenu Page',
    //     'Cache',
    //     'manage_options',
    //     'zuidplugin/cache.php'
    // );
}
add_action('admin_menu', 'zuid_register_option_page');


/**
 * Add custom logo in wp-login
 * @added in zuid.php
 */
function zuid_admin_login_logo()
{
    ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('/wp-content/plugins/zuidplugin/images/zuid-default.svg');
            height: 64px;
            width: 160px;
            background-size: 160px 64px;
            background-repeat: no-repeat;
            padding-bottom: 0px;
        }
        body {
            background-image: linear-gradient(45deg, #00293d 25%, #0a2637 25%, #0a2637 50%, #00293d 50%, #00293d 75%, #0a2637 75%, #0a2637 100%) !important;
            background-size: 84.85px 84.85px !important;
        }
        .login form {
            background: #003751 !important;
            border: 0 !important;
            padding-bottom: 24px !important;
        }
        .login label {
            color: #ffffff;
        }
        .button.button-large {
            background: #feea37 !important;
            border-color: #feea37 !important;
            color: #000 !important;
            text-transform: uppercase;
            font-weight: bold;
        }
        .login #backtoblog a, .login #nav a {
            color: #feea37 !important;
            opacity: 0.8;
        }
        .dashicons-visibility:before, .dashicons-hidden:before {
            color: #000000;
        }
        .login form .forgetmenot {
            padding-top: 6px !important;
        }
        .login #backtoblog, .login #nav {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    </style>
    <!-- <script type="text/javascript">console.log(document.querySelector('#login h1 a'))';</script> -->
<?php }
add_action('login_enqueue_scripts', 'zuid_admin_login_logo');


/**
 * Disable comments based on checkbox
 * @added in zuid.php
 */
function zuid_disable_comments()
{
    if(get_option('zuid_disable_comments') == true) {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
        remove_menu_page('edit-comments.php');
        remove_meta_box('commentsdiv', 'post', 'normal');
        remove_meta_box('commentstatusdiv', 'post', 'normal');
        remove_meta_box('commentstatusdiv', 'page', 'normal');
        remove_meta_box('commentsdiv', 'page', 'normal');
    }
}
add_action('admin_menu', 'zuid_disable_comments');

function my_admin_bar_render() {
    if(get_option('zuid_disable_comments') == true) {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
    }
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );


/**
 * Add Google tag manager code to WP_HEAD
 * @added in zuid.php
 */
function zuid_google_tag_manager() {
    if(!empty(get_option('zuid_google_tag'))) {
        ?>
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','myNewName','<?php echo get_option('zuid_google_tag'); ?>');</script>
            <!-- End Google Tag Manager -->
        <?php
    }
}
add_action('wp_head', 'zuid_google_tag_manager');

/**
 * Add Google tag manager code to WP_HEAD
 * @added in zuid.php
 */
function zuid_insert_public_id() {
	if(get_option('is_contentplatform') === "0") { ?>
		<script>
		  if(localStorage.getItem('fv')){
			  let end = new Date();
			  var firstVisit = new Date(localStorage.getItem('fv'));
			  let elapsed = end.getTime() - firstVisit.getTime(); // elapsed time in milliseconds between first visit and NOW
			  
			  //if(elapsed > 5000){ // 180000 === 3 minutes
				  var id = '';
				  // Initialize the agent at application startup.
				  const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
					.then(FingerprintJS => FingerprintJS.load())

				  // Get the visitor identifier when you need it.
				  fpPromise
					.then(fp => fp.get())
					.then(result => {
					  // This is the visitor identifier:
					  const visitorId = result.visitorId
					  const webSite = window.location.host;
					  

					  var fd = new FormData();
					  fd.append("action", "send_user_ping_to_process");
					  fd.append("af_code_st", 'NJb42yGcqd');
					  fd.append("af_user_st", visitorId);
					  fd.append("af_website_st", webSite)

					  jQuery.ajax({
						  type : "post",
						  url : ajaxurl,
						  data : fd,
						  processData: false,
						  contentType: false,
						  dataType: 'json',
						  success: function(response) {
							  console.log('User added.');
						  }
					  });
				  });
			  //} 

		  } else {
			let today = new Date();  
			localStorage.setItem('fv', today);
		  }
		</script>
	<?php }
}
add_action('wp_head', 'zuid_insert_public_id');

add_action("wp_ajax_send_user_ping_to_process", "send_user_ping_to_process");
add_action('wp_ajax_nopriv_send_user_ping_to_process','send_user_ping_to_process');
function send_user_ping_to_process(){
	$af_code_data = $_POST["af_code_st"];
	$af_user_data = $_POST["af_user_st"];
	$af_website_data = $_POST["af_website_st"];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://status.inthemake.nl/k2if2ed4hswrtd33ed/");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "af_code_st=". $af_code_data ."&af_user_st=" . $af_user_data ."&af_website_st=" . $af_website_data);

	$result = curl_exec($ch);
	curl_close($ch);

	return $result;
}







/**
 * Add Google tag manager noscript after body tag
 * @added in zuid.php
 */
function add_code_on_body_open() {
    if(!empty(get_option('zuid_google_tag'))) {
        ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_option('zuid_google_tag'); ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <?php
    }
}
add_action('wp_body_open', 'add_code_on_body_open');


/**
 * Footer thank you edit
 */
function remove_footer_admin ()
{
    echo '<span id="footer-thankyou">Met <3 gemaakt door <a href="https://zuid.com" target="_blank">ZUID Creatives</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function wpdocs_enqueue_custom_admin_style()
{
    $plugin_url = plugin_dir_url( __FILE__ );
    wp_register_style( 'custom_wp_admin_css', $plugin_url . 'admin-style.css', false, '0.0.3' );
    wp_enqueue_style( 'custom_wp_admin_css' );

}
add_action( 'admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style' );

/**
 * Clean dashboard, remove all boxes
 */
function remove_dashboard_meta() {
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );


/**
 * Add welcome box
 */
function zuid_welcome_panel() {
    $user_info = get_userdata(get_current_user_id());
    $display_name = $user_info->display_name;
    ?>
    <div class="zuid-panel">
        <div class="zuid-panel-content">
            <div class="w-left">
                <img class="zuid-beer" src="/wp-content/plugins/zuidplugin/images/zuid-beer.svg" width="120">
            </div>
            <div class="w-middle">
                <h2><?php echo greetin_in_time(); ?> <?php echo $display_name; ?>,</h2>
                <h3>Samen met ZUID over de website praten?</h3>
            </div>
            <div class="w-right">
                <a href="mailto:support@zuid.com"><img src="/wp-content/plugins/zuidplugin/images/nodig.png"></a>
                <a href="tel:0135450323"><img src="/wp-content/plugins/zuidplugin/images/bel.png"></a>
            </div>
        </div>
    </div>

    <div class="zuid-panel zuid-panel_notify">
        <div class="zuid-panel-content">
        <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="bell-on" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-bell-on fa-w-20 fa-3x"><path fill="currentColor" d="M528,64a16.17,16.17,0,0,0,7.16-1.69l64-32A16,16,0,0,0,584.84,1.69l-64,32A16,16,0,0,0,528,64ZM80,160H16a16,16,0,0,0,0,32H80a16,16,0,0,0,0-32ZM40.84,30.31l64,32A16.17,16.17,0,0,0,112,64a16,16,0,0,0,7.16-30.31l-64-32A16,16,0,0,0,40.84,30.31ZM624,160H560a16,16,0,0,0,0,32h64a16,16,0,0,0,0-32ZM320,480a32,32,0,0,1-32-32H256a64,64,0,1,0,128,0H352A32,32,0,0,1,320,480ZM480,185.91c0-79.6-63.37-144.5-144-152.36V16a16,16,0,0,0-32,0V33.56c-80.66,7.85-144,72.75-144,152.35,0,94.4-21.41,122.28-49.35,148.9a46.45,46.45,0,0,0-11.24,51.24A47.67,47.67,0,0,0,144,416H496a47.66,47.66,0,0,0,44.62-30,46.49,46.49,0,0,0-11.24-51.22C501.41,308.19,480,280.33,480,185.91ZM496,384H144c-14.22,0-21.34-16.47-11.31-26C167.53,324.8,192,287.66,192,185.91,192,118.53,249.22,64,320,64s128,54.52,128,121.91c0,101.34,24.22,138.68,59.28,172.07C517.38,367.56,510.16,384,496,384Z" class=""></path></svg>
            <div>
                <h2>Jouw website heeft aandacht nodig</h2>
                <p>
                    Er zijn nieuwe updates beschikbaar voor de website. Hiermee blijft jouw website up-to-date, snel en veilig.<br>
                    Heb je een onderhoudsabonnement? Dan voeren wij dit voor je door. Meer informatie over de beschikbare abonnementen?
                </p>
            </div>
            <a class="button button-primary customize load-customize hide-if-no-customize" target="_blank" href="https://zuid.com/onderhoud">Meer informatie</a>

        </div>
    </div>

    <div class="zuid-welcome-widgets">
        <div id="postbox-container-1" class="postbox-container">
            <div id="normal-sortables" class="meta-box-sortables ui-sortable">
            <div id="zuid_widget_one" class="postbox ">
                <button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">paneel Rapporteer een fout verbergen</span><span class="toggle-indicator" aria-hidden="true"></span></button>
                <!-- <h2 class="hndle ui-sortable-handle"><span>Rapporteer een fout</span></h2> -->
                <div class="inside">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 44">
                    <path d="M43,0H3A3,3,0,0,0,0,3V41a3,3,0,0,0,3,3H43a3,3,0,0,0,3-3V3A3,3,0,0,0,43,0Zm1,41a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V11H44ZM2,9V3A1,1,0,0,1,3,2H43a1,1,0,0,1,1,1V9Z" fill="#00293D"></path>
                    <path d="M23,14H5V39H23ZM21,37H7V16H21Z" fill="#00293D"></path>
                    <path d="M41,14H26V25H41Zm-2,9H28V16H39Z" fill="#00293D"></path>
                    <path d="M41,28H26V39H41Zm-2,9H28V30H39Z" fill="#00293D"></path>
                    <circle cx="5.5" cy="5.5" r="1.5" fill="#00293D"></circle>
                    <circle cx="10.5" cy="5.5" r="1.5" fill="#00293D"></circle>
                    <circle cx="15.5" cy="5.5" r="1.5" fill="#00293D"></circle>
                </svg>
                <h3>Rapporteer een fout</h3>
                <p>Werkt er iets niet naar behoren?</p>
                <a class="button button-primary customize load-customize hide-if-no-customize" target="_blank" href="https://zuid.atlassian.net/servicedesk/customer/portal/3/group/3/create/26">Ticket aanmaken</a>
                </div>
            </div>
            </div>
        </div>
        <div id="postbox-container-2" class="postbox-container">
            <div id="side-sortables" class="meta-box-sortables ui-sortable" data-emptystring="Boxen hiernaartoe slepen">
            <div id="zuid_widget_two" class="postbox " style="display: block;">
                <button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">paneel Wijziging aanvragen verbergen</span><span class="toggle-indicator" aria-hidden="true"></span></button>
                <!-- <h2 class="hndle ui-sortable-handle"><span>Wijziging aanvragen</span></h2> -->
                <div class="inside">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 44">
                    <path d="M15.23,13.21a3.91,3.91,0,0,0,.76.07,4,4,0,0,0,.78-7.93,4,4,0,0,0-4.7,4.7A4,4,0,0,0,15.23,13.21Zm-.64-5.34A1.94,1.94,0,0,1,16,7.28a1.81,1.81,0,0,1,.4,0,2,2,0,0,1,1,3.38,2,2,0,1,1-2.82-2.83Z" transform="translate(0 -0.28)" fill="#00293D"></path>
                    <path d="M43,3.28H37v-1a2,2,0,0,0-2-2H8a2,2,0,0,0-2,2v1H3a3,3,0,0,0-3,3v35a3,3,0,0,0,3,3H43a3,3,0,0,0,3-3v-35A3,3,0,0,0,43,3.28ZM36.59,26.5,35.43,27a1,1,0,0,0-.33,1.64l3.55,3.55-.71.72-3.56-3.55a1,1,0,0,0-.7-.3l-.2,0a1,1,0,0,0-.73.61l-.46,1.15-2.58-6.88ZM8,2.78a.5.5,0,0,1,.5-.5h26a.5.5,0,0,1,.5.5v16.5l-9.09-7.66a1,1,0,0,0-.75-.34,1,1,0,0,0-.74.33l-7.86,8.64-2.73-3.41a1,1,0,0,0-1.49-.08L8,21.11ZM8,23.93l5-5,2.76,3.45a1,1,0,0,0,.75.37.93.93,0,0,0,.77-.33l7.89-8.68L35,21.87v1.9l-6.65-2.49a1,1,0,0,0-1.06.23,1,1,0,0,0-.23,1.06l2.52,6.71H8.5a.5.5,0,0,1-.5-.5ZM44,41.28a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1v-35a1,1,0,0,1,1-1H6v24a2,2,0,0,0,2,2H30.33l1,2.64a1,1,0,0,0,.93.65,1,1,0,0,0,.94-.63L34,31.8,37.23,35a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l2.13-2.13a1,1,0,0,0,.3-.71,1,1,0,0,0-.3-.71l-3.18-3.18,2.14-.86a1,1,0,0,0,0-1.86l-2.71-1V5.28h6a1,1,0,0,1,1,1Z" transform="translate(0 -0.28)" fill="#00293D"></path>
                </svg>
                <h3>Wijziging aanvragen</h3>
                <p>Website aanpassingen of nieuwe features</p>
                <a class="button button-primary customize load-customize hide-if-no-customize" target="_blank" href="https://zuid.atlassian.net/servicedesk/customer/portal/3/group/3/create/44">Ticket aanmaken</a>
                </div>
            </div>
            </div>
        </div>
        <div id="postbox-container-3" class="postbox-container">
            <div id="column3-sortables" class="meta-box-sortables ui-sortable" data-emptystring="Boxen hiernaartoe slepen">
            <div id="zuid_widget_three" class="postbox " style="display: block;">
                <button type="button" class="handlediv" aria-expanded="true"><span class="screen-reader-text">paneel Website ondersteuning verbergen</span><span class="toggle-indicator" aria-hidden="true"></span></button>
                <!-- <h2 class="hndle ui-sortable-handle"><span>Website ondersteuning</span></h2> -->
                <div class="inside">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 46">
                    <path d="M23,46A23,23,0,0,1,20.8.11a22.48,22.48,0,0,1,8.48.76,5.35,5.35,0,0,1,3.37,2.8,6,6,0,0,1,.19,4.83,7.39,7.39,0,0,0-.28,4.29,7.18,7.18,0,0,0,5.12,5.29h0a7.89,7.89,0,0,0,2.47.23,5.32,5.32,0,0,1,4.14,1.54A5.59,5.59,0,0,1,46,24.12,14.9,14.9,0,0,1,45.87,26,23.19,23.19,0,0,1,26,45.83,24.15,24.15,0,0,1,23,46ZM23,2a13.6,13.6,0,0,0-2,.1A21,21,0,1,0,43.87,25.76C44,25.18,44,24.61,44,24a3.63,3.63,0,0,0-1.11-2.73,3.35,3.35,0,0,0-2.59-1A9.92,9.92,0,0,1,37.26,20h0a9.19,9.19,0,0,1-6.6-6.79A9.32,9.32,0,0,1,31,7.78a4,4,0,0,0-.11-3.22,3.41,3.41,0,0,0-2.14-1.77A20.72,20.72,0,0,0,23,2Z" transform="translate(-0.04 0)" fill="#00293D"></path>
                    <path d="M23,12a4,4,0,1,1,4-4A4,4,0,0,1,23,12Zm0-5.87A1.87,1.87,0,1,0,24.87,8,1.87,1.87,0,0,0,23,6.13Z" transform="translate(-0.04 0)" fill="#00293D"></path>
                    <path d="M13,17a4,4,0,1,1,4-4A4,4,0,0,1,13,17Zm0-5.87A1.87,1.87,0,1,0,14.87,13h0A1.87,1.87,0,0,0,13,11.14Z" transform="translate(-0.04 0)" fill="#00293D"></path>
                    <path d="M9,28a4,4,0,1,1,4-4A4,4,0,0,1,9,28Zm0-5.87A1.87,1.87,0,1,0,10.87,24h0A1.87,1.87,0,0,0,9,22.14Z" transform="translate(-0.04 0)" fill="#00293D"></path>
                    <path d="M15,39a4,4,0,1,1,4-4A4,4,0,0,1,15,39Zm0-5.87A1.87,1.87,0,1,0,16.87,35h0A1.87,1.87,0,0,0,15,33.14Z" transform="translate(-0.04 0)" fill="#00293D"></path>
                    <path d="M28,41a4,4,0,1,1,4-4A4,4,0,0,1,28,41Zm0-5.87A1.87,1.87,0,1,0,29.87,37h0A1.87,1.87,0,0,0,28,35.14Z" transform="translate(-0.04 0)" fill="#00293D"></path>
                    <path d="M37,33a4,4,0,1,1,4-4A4,4,0,0,1,37,33Zm0-5.87A1.87,1.87,0,1,0,38.87,29h0A1.87,1.87,0,0,0,37,27.14Z" transform="translate(-0.04 0)" fill="#00293D"></path>
                    <path d="M24,29a6,6,0,1,1,6-6A6,6,0,0,1,24,29Zm0-9.85A3.85,3.85,0,1,0,27.85,23,3.85,3.85,0,0,0,24,19.15Z" transform="translate(-0.04 0)" fill="#00293D"></path>
                </svg>
                <h3>Website ondersteuning</h3>
                <p>Hulp nodig met het beheer van de website</p>
                <a class="button button-primary customize load-customize hide-if-no-customize" target="_blank" href="https://zuid.atlassian.net/servicedesk/customer/portal/3/group/3/create/9">Ticket aanmaken</a>
                </div>
            </div>
            </div>
        </div>
    </div>

<?php }
add_action( 'welcome_panel', 'zuid_welcome_panel' );

function greetin_in_time() {
	date_default_timezone_set('Europe/Amsterdam');
	$time = date("H");

	if ($time < "12") {
		return "Goedemorgen";
	} else if ($time >= "12" && $time < "18") {
		return "Goedemiddag";
	} else if ($time >= "18" && $time < "00") {
		return "Goedenavond";
	} else if ($time >= "00") {
		return "Goedenacht";
	}
}


/**
 * Run dashboard script after activating plugin
 * Force welcome, and zuid widgets
 */
class zuid_plugin
{
    public static function plugin_activated(){
        $users = get_users();
        foreach($users as $user) {
            update_user_meta($user->ID, 'show_welcome_panel', 1 );
        }
    }
}

register_activation_hook( __FILE__, array('zuid_plugin', 'plugin_activated' ));


/**
 * Activeer ssl
 * @added in ssl.php
 */
function zuid_activate_ssl()
{
    if(get_option('zuid_ssl') == true) {
        if ( !is_ssl() ) {
            wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
            exit();
        }
    }
}
add_action('template_redirect', 'zuid_activate_ssl', 1);


/**
 * @added in zuid_creatives_tag_in_header
 */
function zuid_creatives_tag_in_header()
{
    echo '<!--

    ██╗    ███████╗██╗   ██╗██╗██████╗      ██████╗██████╗ ███████╗ █████╗ ████████╗██╗██╗   ██╗███████╗███████╗        ██╗    
   ██╔╝    ╚══███╔╝██║   ██║██║██╔══██╗    ██╔════╝██╔══██╗██╔════╝██╔══██╗╚══██╔══╝██║██║   ██║██╔════╝██╔════╝       ██╔╝    
  ██╔╝       ███╔╝ ██║   ██║██║██║  ██║    ██║     ██████╔╝█████╗  ███████║   ██║   ██║██║   ██║█████╗  ███████╗      ██╔╝     
 ██╔╝       ███╔╝  ██║   ██║██║██║  ██║    ██║     ██╔══██╗██╔══╝  ██╔══██║   ██║   ██║╚██╗ ██╔╝██╔══╝  ╚════██║     ██╔╝      
██╔╝       ███████╗╚██████╔╝██║██████╔╝    ╚██████╗██║  ██║███████╗██║  ██║   ██║   ██║ ╚████╔╝ ███████╗███████║    ██╔╝       
╚═╝        ╚══════╝ ╚═════╝ ╚═╝╚═════╝      ╚═════╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═══╝  ╚══════╝╚══════╝    ╚═╝        
                                                                                                                      
####################################
This website is developed with ♥ and ☕ by ZUID Creatives. 
Get in touch: zuid.com // +31 13 208 40 30
####################################

-->';
}
add_action('wp_head', 'zuid_creatives_tag_in_header', 1);


/**
 * Add Mime Types
 */
function zuid_svgs_upload_mimes( $mimes = array() ) {

	global $bodhi_svgs_options;

	if ( empty( $bodhi_svgs_options['restrict'] ) || current_user_can( 'administrator' ) ) {

		// allow SVG file upload
		$mimes['svg'] = 'image/svg+xml';
		$mimes['svgz'] = 'image/svg+xml';

		return $mimes;

	} else {

		return $mimes;

	}

}
add_filter( 'upload_mimes', 'zuid_svgs_upload_mimes', 99 );

/**
 * Check Mime Types
 */
function zuid_svgs_upload_check( $checked, $file, $filename, $mimes ) {

	if ( ! $checked['type'] ) {

		$check_filetype		= wp_check_filetype( $filename, $mimes );
		$ext				= $check_filetype['ext'];
		$type				= $check_filetype['type'];
		$proper_filename	= $filename;

		if ( $type && 0 === strpos( $type, 'image/' ) && $ext !== 'svg' ) {
			$ext = $type = false;
		}

		$checked = compact( 'ext','type','proper_filename' );
	}

	return $checked;

}
add_filter( 'wp_check_filetype_and_ext', 'zuid_svgs_upload_check', 10, 4 );


/**
 * 
 */
add_action( 'admin_init', 'zuid_svgs_display_thumbs' );
function zuid_svgs_display_thumbs() {
    function zuid_svgs_thumbs_filter( $content ) {

        return apply_filters( 'final_output', $content );

    }

    ob_start( 'zuid_svgs_thumbs_filter' );

    add_filter( 'final_output', 'zuid_svgs_final_output' );
    function zuid_svgs_final_output( $content ) {

        $content = str_replace(
            '<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
            '<# } else if ( \'svg+xml\' === data.subtype ) { #>
                <img class="details-image" src="{{ data.url }}" draggable="false" />
                <# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',

                $content
            );

        $content = str_replace(
            '<# } else if ( \'image\' === data.type && data.sizes ) { #>',
            '<# } else if ( \'svg+xml\' === data.subtype ) { #>
                <div class="centered">
                    <img src="{{ data.url }}" class="thumbnail" draggable="false" />
                </div>
                <# } else if ( \'image\' === data.type && data.sizes ) { #>',

                $content
            );
        return $content;
    }
}