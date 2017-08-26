<?php
//主题配置文件
require_once ( get_template_directory() . '/includes/theme-options.php' );

//禁用前端管理栏
add_filter( 'show_admin_bar', '__return_false' );

//开启缩略图功能
if ( function_exists( 'add_theme_support' ) )   
    add_theme_support( 'post-thumbnails' ); 

//文章数目设置
function custom_posts_per_page($query){
    if(is_category(5)){
        $query->set('posts_per_page',12);
    }
}
add_action('pre_get_posts','custom_posts_per_page');

//计算运行天数
function calculate_days(){
    $now_day = strtotime(date("Y-m-d"));
    $start_day = strtotime("2017-01-02");
    if ($now_day < $start_day) {
        return ($start_day - $now_day) / 86400;
    }   
    else return ($now_day - $start_day) / 86400;
}

//展示个人介绍
function mochi_profile_show() {
    $option = get_option('mochi_theme_options');
    $current_user = get_currentuserinfo();
    if($option['if_author_profile']==1):
?>
    <div class="g-about">
        <div class="g-about-avatar">
            <img src="<?php echo $option['my_avatar'];?>"/>
        </div>

        <div class="g-about-profile">
            <p class="g-profile-name"><i class="fa fa-venus" aria-hidden="true"></i><?php echo $current_user->display_name;?></p>
            <p class="g-profile-des">未来程序猿  /  J-POP乐迷  /  处女座</br>做一点设计  /  拍拍照  /  说点日语</p>
        </div>
    </div>  
<?php 
    endif;
}

//展示banner部分
function mochi_banner_show() {
    $option = get_option('mochi_theme_options');
    foreach ($option['banner'] as $key => $url) {
        echo "<li style='background-image:url(".$url.")'>";
        echo "<span class='g-banner-text'><a href='".$option['banner_link'][$key]."'>".$option['banner_text'][$key]."</a></span></li>";         
    }
}

//展示friendlink
function mochi_friends_show() {
    $option = get_option('mochi_theme_options');
    foreach ($option['friend'] as $key => $name) {
        echo "<li><a href='".$option['friend_link'][$key]."' target='_blanked'>".$name."</a></li>";
    }        
}

//获取分页
function mochi_page_show( $range = 5 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo "<div class='u-page-num'><ul>"; 
        if( !$paged ){
            $paged = 1;
        }
        if( $paged != 1 ) {
            echo "<li><a href='".get_pagenum_link(1) ."'>首页</a></li>";
        }
        echo "<li>";
        previous_posts_link('上页');
        echo "</li><li>";
        next_posts_link('下页');
        echo "</li>";
        if($paged != $max_page){
            echo "<li><a href='".get_pagenum_link($max_page) ."'>尾页</a></li>";
        }
        echo '</ul><div class="clearfix"></div>';
        echo "</div>";  
    }
}
//调用分类下的标签
function mochi_get_category_tags($args) {
    global $wpdb;
    $tags = $wpdb->get_results
    ("
        SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name
        FROM
            $wpdb->posts as p1
            LEFT JOIN $wpdb->term_relationships as r1 ON p1.ID = r1.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms1 ON t1.term_id = terms1.term_id,
            $wpdb->posts as p2
            LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id
        WHERE
            t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id IN (".$args['categories'].") AND
            t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
            AND p1.ID = p2.ID
        ORDER by tag_name
    ");
    $count = 0;
    if($tags) {
      foreach ($tags as $tag) {
        $mytag[$count] = get_term_by('id', $tag->tag_id, 'post_tag');
        $count++;
      }
    }
    else {
      $mytag = NULL;
    }
    return $mytag;
}


//评论输出
function zero_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; 
?>
   <div class='u-comment-box' id='li-comment-<?php comment_ID(); ?>'>
		<div class='g-comment-info'>
			<div class='g-comment-avatar u-left'>
				<?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?>
			</div>

			<div class='g-comment-detail u-left'>
				<?php printf(__('<p class="g-comment-author">%s</p>'), get_comment_author_link()); ?>
				<p class='g-comment-time'><?php echo get_comment_time('Y-m-d H:i'); ?></p>	
			</div>
							
			<p class='g-comment-reply u-right'><a href=''>回复</a></p>
			<?php edit_comment_link('修改','<p  class="g-comment-reply u-right">','</p>'); ?></a>
			<div class='u-clearfix'></div>
		</div>
		<div class='g-comment-content' id='comment-<?php comment_ID(); ?>'>
			<?php if ($comment->comment_approved == '0') : ?>
					<em>你的评论正在审核，稍后会显示出来！</em><br />
      		<?php endif; ?>
			<?php comment_text(); ?>
		</div>
	</div>
<?php }


//获取分类下的标签
function get_category_tags($args) {
    global $wpdb;
    $tags = $wpdb->get_results
    ("
        SELECT DISTINCT terms2.term_id as tag_id, terms2.name as tag_name
        FROM
            $wpdb->posts as p1
            LEFT JOIN $wpdb->term_relationships as r1 ON p1.ID = r1.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t1 ON r1.term_taxonomy_id = t1.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms1 ON t1.term_id = terms1.term_id,
            $wpdb->posts as p2
            LEFT JOIN $wpdb->term_relationships as r2 ON p2.ID = r2.object_ID
            LEFT JOIN $wpdb->term_taxonomy as t2 ON r2.term_taxonomy_id = t2.term_taxonomy_id
            LEFT JOIN $wpdb->terms as terms2 ON t2.term_id = terms2.term_id
        WHERE
            t1.taxonomy = 'category' AND p1.post_status = 'publish' AND terms1.term_id IN (".$args['categories'].") AND
            t2.taxonomy = 'post_tag' AND p2.post_status = 'publish'
            AND p1.ID = p2.ID
        ORDER by tag_name
    ");
    $count = 0;
    if($tags) {
        foreach ($tags as $tag) {
            $mytag[$count] = get_term_by('id', $tag->tag_id, 'post_tag');
            $count++;
        }
    } else {
      $mytag = NULL;
    }
    return $mytag;
}

?>