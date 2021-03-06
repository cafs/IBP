<?php
/**
 * @file
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $submitted: Themed submission information output from
 *   theme_node_submitted().
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $build_mode: Build mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $build_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * The following variable is deprecated and will be removed in Drupal 7:
 * - $picture: This variable has been renamed $user_picture in Drupal 7.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess()
 * @see zen_preprocess_node()
 * @see zen_process()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="node <?php print $classes; ?> clearfix">

<!-- 
	<?php print theme('image', path_to_theme() .'/images/front-image.jpg','','',array('usemap'=>'#front-map')); ?>
	<map name="front-map" id="front-map">
		<area shape="rect" coords="25,25,266,285" href="<?php print url("node/166"); ?>" title="Go to Crop Information" />
		<area shape="rect" coords="266,25,496,285" href="<?php print url("node/82"); ?>" title="Go to Breeding activities" />
		<area shape="rect" coords="496,25,727,285" href="<?php print url("node/149"); ?>" title="Go to Capacity building" />
		<area shape="rect" coords="727,25,968,285" href="<?php print url("community"); ?>" title="Go to Crop networks" />
	</map>
 -->
	
	<div class="front-map">
	  <div class="map-area crop-info">
	    <h3><?php echo l(t('crop INFORMATION'), 'crop-information', array('html' => true)); ?></h3>
	    <ul>
	      <li><?php echo t('access to data'); ?></li>
	      <li><?php echo t('data management'); ?></li>
	      <li><?php echo t('trait dictionaries'); ?></li>
	    </ul>
	  </div>
	  <div class="map-area breeding">
	    <h3><?php echo l(t('breeding ACTIVITIES'), 'breeding-activities', array('html' => true)); ?></h3>
	    <ul>
	      <li><?php echo t('improved germplasm'); ?></li>
	      <li><?php echo t('tools'); ?></li>
	      <li><?php echo t('services'); ?></li>
	    </ul>
	  </div>
	  <div class="map-area capacity">
	    <h3><?php echo l(t('capacity BUILDING'), 'capacity-building', array('html' => true)); ?></h3>
	    <ul>
	      <li><?php echo t('learning & development'); ?></li>
	      <li><?php echo t('support services'); ?></li>
	      <li><?php echo t('information & resources'); ?></li>
	    </ul>
	  </div>
	  <div class="map-area community">
	    <h3><?php echo l(t('crop COMMUNITIES'), 'community', array('html' => true)); ?></h3>
	    <ul>
	      <li><?php echo t('shared solutions'); ?></li>
	      <li><?php echo t('communities of practice'); ?></li>
	      <li><?php echo t('knowledge sharing'); ?></li>
	    </ul>
	  </div>
	</div>
	
	<div class="content-wrapper">  
		<div class="content-main">
			<div class="getting-started-wrapper">
				<div class="content">
					<div class="inner">
						<?php
							print $content;
							print l(t('Learn more'), "node/122", array('attributes' => array('class' => 'button learn-more')));
						?>
					</div>
				</div>
				<div class="getting-started">
					<div class="inner">
						<?php if ($logged_in) { ?>
							<?php
								if (module_exists('content_profile')) {
									$profile = content_profile_load('profile', $user->uid);
								}
							?>
							<p>
								<?php
									$name = $profile ? check_plain($profile->field_profile_first_name[0]['value'] . ' ' . $profile->field_profile_last_name[0]['value']) : $user->name;
									echo t('Welcome, @name!', array('@name' => $name));
								?>
							</p>
							<?php print l(t('Go to My Communities'), 'community', array('attributes' => array('class' => 'button'))); ?>
						<?php } else { ?>
							<p>
								<?php print t('Get started today by registering for a free account.'); ?>
							</p>
							<?php print l(t('Register for an account'), 'user/register', array('attributes' => array('class' => 'button'))); ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

  <?php print $links; ?>
  <?php print $terms; ?>
</div><!-- /.node -->
