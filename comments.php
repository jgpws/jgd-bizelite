<?php
if ( post_password_required() ) {
	echo sprintf( __( '%1$sThis post is password protected. Enter the password to view comments.%2$s', 'jgd-bizelite' ), '<p class="nocomments">', '</p>' );
	return;
}

if ( have_comments() ) : ?>
<div id="comments-area">
<h3 id="comments"><?php comments_number( __( 'No Comments', 'jgd-bizelite' ), __( 'One Comment', 'jgd-bizelite' ), __( '% Comments', 'jgd-bizelite' ) ); ?></h3>
<ul class="commentlist">
	<?php wp_list_comments('reverse_top_level=true') ?>
</ul>
<div class="navigation">
<div class="alignleft"><?php previous_comments_link(); ?></div>
<div class="alignright"><?php next_comments_link(); ?></div>
</div>
</div><!-- #comments-area -->
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) :
		// If comments are open, but there are no comments.
	else : // comments are closed
	endif;
endif;

comment_id_fields();

comment_form();
?>