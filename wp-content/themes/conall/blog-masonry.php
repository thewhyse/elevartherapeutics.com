<?php
    /*
    	Template Name: Blog: Masonry
    */
?>
<?php get_header(); ?>
<?php conall_edge_get_title(); ?>
<?php get_template_part('slider'); ?>


<div class="edgtf-container">
        <!-- ********************** Blog Loop ********************** -->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
        <!-- ********************** Blog Loop ********************** -->
	    <?php do_action('conall_edge_after_container_open'); ?>
	    <div class="edgtf-container-inner" >
	        <?php conall_edge_get_blog('masonry'); ?>
	    </div>
	    <?php do_action('conall_edge_before_container_close'); ?>
</div>
	<?php do_action('conall_edge_blog_list_additional_tags'); ?>
    <?php get_footer(); ?>