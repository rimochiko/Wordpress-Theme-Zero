<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>

<div class="g-comment" id="comments">
	<div class="g-add-comment">
			<a href="#addcomment"></a>
			<form id="commentform" name="commentform"  action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
				<label for="c-nickname"><i class="fa fa-user-o" aria-hidden="true"></i>昵称*</label>
				<input type="text" name="author" id="author"/>
				<label for="c-email"><i class="fa fa-envelope-o" aria-hidden="true"></i>邮箱</label>
				<input type="email" name="email" id="email"/>
				<label for="c-site"><i class="fa fa-link" aria-hidden="true"></i>网站</label>
				<input type="url" name="url" id="url"/>
				<label for="c-content"><i class="fa fa-comment-o" aria-hidden="true"></i>评论内容*</label>
				<textarea id="comment" name="comment"></textarea>
				<input name="submit" type="submit" id="submit" value="发表"/>
   				<?php comment_id_fields(); ?>
    			<?php do_action('comment_form', $post->ID); ?>
			</form>
		</div>
	</div>

	<div class="g-comment-section">
	<?php 
    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
    ?>
        <p class="u-comment-tip"><a href="#addcomment">请输入密码再查看评论内容.</a></p>
    <?php 
        } else if ( !comments_open() ) {
    ?>
        <p class="u-comment-tip"><a href="#addcomment">Sorry，评论功能关闭了</a></p>
    <?php 
        } else if ( !have_comments() ) { 
    ?>
         <p class="u-comment-tip"><a href="#addcomment">还没有任何评论，你来说两句吧( •̀ ω •́ )</a></p>
    <?php 
        } else {
            wp_list_comments('type=comment&callback=zero_comment');
        }
    ?>
	</div>