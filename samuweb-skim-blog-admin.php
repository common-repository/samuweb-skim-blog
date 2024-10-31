<?php 
if(isset($_POST['submit'])):
	$nonce = $_REQUEST['_wpnonce'];
	if (!wp_verify_nonce( $nonce, 'samuweb_skim_blog_nonce')):
	    // This nonce is not valid.
	    die('An error has ocurred');
	else:
        update_option('samuweb_skim_blog_primary_element', $_POST['samuweb_skim_blog_primary_element']);
        update_option('samuweb_skim_blog_secondary_element', $_POST['samuweb_skim_blog_secondary_element']);
        update_option('samuweb_skim_blog_scroll_speed', $_POST['samuweb_skim_blog_scroll_speed']);
        update_option('samuweb_skim_blog_text', $_POST['samuweb_skim_blog_text']);
        ?>
		<div class="updated">
			<p><strong>Good job! Settings are updated!</strong></p>
		</div>
        <?php
	endif;
endif;
?>

<div class="wrap">
	<h2>Samuweb Skim Blog settings</h2>
	<div class="tool-box">
		<p>This is a pretty simple plugin. It scrolls your page automatically and highlights the titles and subtitles so the user can skim thru your page in just a few seconds and decide if she wants to read it word by word.</p>
		<p><a href="http://uxmyths.com/post/647473628/myth-people-read-on-the-web" target="_blank">Here you can see</a> that people on internet ALREADY DO SKIM THE PAGES. If you lend them a hand, chances are they'll READ MORE from your posts.</p>
	</div>



    <form name="samuweb_skim_blog_form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<?php wp_nonce_field('samuweb_skim_blog_nonce','_wpnonce'); ?>



	    <h3>Elements to highlight</h3>
		<table cellspacing="0" class="form-table">
			<tbody>
				<tr>
					<th width="25%" scope="row"><label for="samuweb_skim_blog_primary_element">Primary highlight element</label></th>
					<td width="5%"></td>
					<td align="left">
						<input type="text" class="regular-text" id="samuweb_skim_blog_primary_element" name="samuweb_skim_blog_primary_element" value="<?php echo get_option('samuweb_skim_blog_primary_element')?>">
					    <p class="description">It can be any tag, class or id, just like you'd put inside a jQuery parentheses, for example <strong>#content h1.skim-blog</strong></p>
					</td>
				</tr>
				<tr>
					<th width="25%" scope="row"><label for="samuweb_skim_blog_secondary_element">Secondary highlight element</label></th>
					<td width="5%"></td>
					<td align="left">
						<input type="text" class="regular-text" id="samuweb_skim_blog_secondary_element" name="samuweb_skim_blog_secondary_element" value="<?php echo get_option('samuweb_skim_blog_secondary_element')?>">
					    <p class="description">You can select the subtitles here.</p>
					</td>
				</tr>
			</tbody>
		</table>



	    <h3>Text of the button</h3>
		<table cellspacing="0" class="form-table">
			<tbody>
				<tr>
					<th width="25%" scope="row"><label for="samuweb_skim_blog_text">Text of the button</label></th>
					<td width="5%"></td>
					<td align="left">
						<input type="text" cl ass="regular-text" id="samuweb_skim_blog_text" name="samuweb_skim_blog_text" value="<?php echo get_option('samuweb_skim_blog_text')?>">
					</td>
				</tr>
			</tbody>
		</table>



	    <h3>Speed of scroll</h3>
		<table cellspacing="0" class="form-table">
			<tbody>
				<tr>
					<th width="25%" scope="row"><label for="samuweb_skim_blog_scroll_speed">Scroll speed (ms)</label></th>
					<td width="5%"></td>
					<td align="left">
						<input type="text" cl ass="regular-text" id="samuweb_skim_blog_scroll_speed" name="samuweb_skim_blog_scroll_speed" value="<?php echo get_option('samuweb_skim_blog_scroll_speed')?>">
					    <p class="description">How many miliseconds it will take to get from one highlight to the next<br>
					    Default value is <strong>2500</strong><br>
					    If you create posts with very few subtitles, consider increasing this number</p>
					</td>
				</tr>
			</tbody>
		</table>


		<p class="submit">
			<input type="submit" class="button button-primary" id="submit" name="submit" value="Save Changes">
		</p>

    </form>
</div>
