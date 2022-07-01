<?php
class zuid_plugin_fields {

    public function __construct() {
        $this->plugin_settings_page_content();
    }

    public function plugin_settings_page_content() {
        if(!empty($_POST['updated'])){
            $this->handle_form();
        } ?>
    	<div class="wrap">
    		<h2>Zuid basic settings</h2>
    		<form method="POST">
                <input type="hidden" name="updated" value="true" />
                <?php wp_nonce_field('zuid_update', 'zuid_form'); ?>
                <table class="form-table">
                	<tbody>
                        <tr>
                    		<th><label for="zuid_google_tag">Google Tag Manager </label></th>
                            <td>
                                <input name="zuid_google_tag" id="zuid_google_tag" type="text" id="zuid_google_tag" value="<?php echo get_option('zuid_zuid_google_tag'); ?>" placeholder="GTM-XXXX" class="regular-text"/><br>
                                <p class="description">(Afhankelijk van wp_body_open() na body tag in header.php)</p>
                            </td>
                    	</tr>
                        <tr>
                    		<th><label for="zuid_disable_comments">Comments uitschakelen</label></th>
                            <td>
                                <label><input name="zuid_disable_comments" type="checkbox" id="zuid_disable_comments" value="true" <?php if(get_option('zuid_check')): ?>checked<?php endif; ?>>Comments uitschakelen</label>
                                <p class="description">Deze optie zorgt voor een schonere backend</p>
                            </td>
                        </tr>
                        <tr>
                    		<th><label for="zuid_ssl">Forceer SSL (https)</label></th>
                            <td>
                                <label><input name="zuid_ssl" type="checkbox" id="zuid_ssl" value="true" <?php if(get_option('zuid_ssl')): ?>checked<?php endif; ?>>Activeer SSL</label>
                                <p class="description">(De website moet wel beschikken over een SSL certificaat)</p>
                            </td>
                    	</tr>
                        <tr>
                            <th><label for="blog_public">Zoekmachines blokkeren</label></th>
                            <td>
                                <label for="blog_public"><input name="blog_public" type="checkbox" id="blog_public" value="0" <?php checked( '0', get_option( 'blog_public' ) ); ?> />
                                <?php _e( 'Discourage search engines from indexing this site' ); ?></label>
                                <p class="description">Het is aan de zoekmachines of ze gehoor geven aan dit verzoek.</p>
                            </td>
                        </tr>
						<tr>
                            <th><label for="is_contentplatform">Is dit een contentplatform?</label></th>
                            <td>
                                <label for="is_contentplatform"><input name="is_contentplatform" type="checkbox" id="is_contentplatform" value="0" <?php checked( '0', get_option( 'is_contentplatform' ) ); ?> />
                                <?php _e( 'Is this a content platform?' ); ?></label>
                                <p class="description">Als dit aan staat, staat het in verbinding met de counter</p>
                            </td>
                        </tr>
                	</tbody>
                </table>
                <p class="submit">
                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Wijzigingen opslaan">
                </p>
    		</form>
    	</div> <?php
    }

    public function handle_form() {
        if(!isset($_POST['zuid_form']) || !wp_verify_nonce($_POST['zuid_form'], 'zuid_update')){ ?>
           <div class="error">
               <p>Sorry, your nonce was not correct. Please try again.</p>
           </div> <?php
           exit;
        } else {
            $zuid_google_tag = sanitize_text_field($_POST['zuid_google_tag']);
            $zuid_disable_comments = $_POST['zuid_disable_comments'];
            $zuid_ssl = $_POST['zuid_ssl'];
            $blog_public = $_POST['blog_public'];
			$isContentPlatform = $_POST['is_contentplatform'];

            update_option('zuid_google_tag', $zuid_google_tag);
            update_option('zuid_disable_comments', $zuid_disable_comments);
            update_option('zuid_ssl', $zuid_ssl);
            update_option('blog_public', $blog_public); // Native WP function
			update_option('is_contentplatform', $isContentPlatform);
            ?><div class="updated">
                <p>De wijzigingen zijn succesvol opgeslagen!</p>
            </div><?php
        }
    }
}
new zuid_plugin_fields();

