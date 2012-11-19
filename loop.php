<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php query_posts($query_string . '&cat=1'); ?>
<?php while ( have_posts(array('cat' => array(1))) ) : the_post(); ?>

  <style id="s" type="text/css">
  <?php $key="css"; echo get_post_meta($post->ID, $key, true); ?>
  </style>

  <div id="pattern" class="mod group">
  			<h3 class="label">Welcome</h3> 
			  
  			<div id="pattern-wrap" class="group">
          <?php the_content(); ?>
  			</div>
  		</div>
		
  		<div class="group">
  			<div id="markup" class="mod">
  				<h3 class="label">HTML</h3> <a href="#" class="clip" title="select code for copying"><img src="<?php bloginfo('template_directory'); ?>/images/icon-copy.png" alt="copy" /></a>
  				<textarea class="mod-ta">
  <?php $key="html"; echo get_post_meta($post->ID, $key, true); ?>			
  				</textarea>
  			</div>
			
  			<div id="style" class="mod">
  				<h3 class="label">CSS</h3> <a href="#" class="clip" title="select code for copying"><img src="<?php bloginfo('template_directory'); ?>/images/icon-copy.png" alt="copy" /></a>
  				<textarea id="css-code" class="mod-ta">
  <?php $key="css"; echo get_post_meta($post->ID, $key, true); ?>
  				</textarea>
  			</div>
  		</div>
		
<?php endwhile; // End the loop. Whew. ?>
