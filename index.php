<?php get_header();?>
<body class="g-main-page">
	<!-- header begin -->
	<div class="g-header">
		<div class="u-container">
			<!-- logo begin --> 
			<div class="g-logo">
				<a href="<?php bloginfo('url'); ?>" class="s-normal-a-hover"><?php bloginfo('name'); ?></a>
			</div>

			<!-- nav begin -->
			<nav>
				<a class="g-hmg-nav" href="#">
					<i class="g-line"></i>
					<i class="g-line"></i>
					<i class="g-line"></i>
				</a>
				<?php
					if(function_exists('wp_nav_menu')) {
					wp_nav_menu(array('theme_location'=>'','menu_class'=>'g-main-nav','container'=>'div'));
				}
				?>
				<div class="u-clearfix"></div>
			</nav>			
		</div>
	</div>

	<div class="u-container">
		<div class="g-left u-left">
			<!-- banner部分 -->
			<?php 
				if($option['if_bg_on'] == 1):
			?>
			<div class="g-banner">
				<ul class="g-banner-img">
					<?php mochi_banner_show();?>				
				</ul>

				<ul class="g-banner-btn">
				</ul>
			</div>
			<?php endif; ?>
			
			<!-- 最新文章 -->
			<div class="g-text-article">
				<?php if(have_posts()) :?>
				<?php while(have_posts()) :the_post();?>

				<div class="g-article-box">
					<div class="g-article-info">
						<a href="<?php the_permalink(); ?>" class="u-left g-article-title"><?php the_title();?></a>
						<p class="u-right g-article-time"><i class="fa fa-clock-o" aria-hidden="true"></i><?php the_time('Y年n月j日') ?></p>
						<div class="u-clearfix"></div>
					</div>
					
					<div class="g-article-abstract">
						<?php the_content(); ?>
					</div>

					<div class="g-article-itrct">
						<div class="g-comment-num u-left">
							<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i>0</a>
						</div>
						<div class="g-like-num u-left">
							<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i><?php comments_popup_link('0', '1', '% Comments'); ?></a>	
						</div>

						<div class="g-check-more u-right">
							<a href="<?php the_permalink(); ?>">更多</a>	
						</div>

						<div class="u-clearfix"></div>
					</div>
				</div>

				<?php endwhile;?>
				<?php endif; ?>
			</div>

			<div class="g-more-article">
				<ul>
					<span>更多文章：</span>
					<li><a href="#"><i class="fa fa-code" aria-hidden="true"></i>技术</a></li>
					<li><a href="#"><i class="fa fa-download" aria-hidden="true"></i>素材</a></li>
					<li><a href="#"><i class="fa fa-camera" aria-hidden="true"></i>摄影</a></li>
					<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>生活</a></li>
				</ul>
			</div>
		</div>

		<div class="g-right u-right">
			<!--个人信息-->			
			<?php mochi_profile_show();?>			

			<!--文章标签-->
			<div class="g-tags">
				<p class="u-section-title"><i class="fa fa-tags" aria-hidden="true"></i>标签</p>
				<ul>
					<li><?php wp_tag_cloud('smallest=8&largest=22'); ?></li>
				</ul>
			</div>
			
			<!--后院档案-->
			<div class="g-site-info">
				<p class="u-section-title"><i class="fa fa-area-chart" aria-hidden="true"></i>统计</p>
				<ul>
					<li><p><span><?php echo calculate_days();?></span></br>Run</p></li>
					<li><p><span><?php $count_posts = wp_count_posts(); echo $published_posts =$count_posts->publish;?></span></br>Articles</p></li>
					<li><p><span><?php $total_comments = get_comment_count(); echo $total_comments['approved'];?></span></br>Comments</p></li>
				</ul>
				<div class="u-clearfix"></div>			
			</div>

			<?php if($option['if_friendlink']==1):?>
			<!-- 友情链接 -->
			<div class="g-footer">
				<ul class="g-friends">
					<?php mochi_friends_show()?>
				</ul>
			</div>
			<?php endif;?>
			<p class="g-copyright">MOCHIKO &copy; 2017</p>

		</div>		
	</div>
<?php get_footer(); ?>