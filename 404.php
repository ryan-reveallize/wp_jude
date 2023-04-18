<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<style>
body.error404 #content{min-height:80vh !important;}
</style>

	<div id="primary" class="content-area">
		<div id="content" class="site-content mt-5" role="main" style="min-height:60vh;display:flex;align-items:center;">
		<div class="container">
<div class="row align-center justify-content-center">
	<div class="col-9 text-center">
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'twentythirteen' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
			
					<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'twentythirteen' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location.', 'twentythirteen' ); ?></p>
	    
					</div>
				</div><!-- .page-content -->
				</div>

				</div>
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>