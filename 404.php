<?php get_header();?>
<body class="u-about-page">
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
		<div class="g-right u-left">
			<!-- 板块大标题 -->
			<div class="u-page-title">
				<h1># 404。</h1>
				<p>嘿嘿，你可能是<span>迷路</span>了吧。那来了就先不要走吧，听首曲子吧。</p>
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

		<div class="g-left u-right">	
			<div class="g-site-about" style="text-align:center">	
				<p><iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=26860734&auto=0&height=66"></iframe>
					</br>
					泥だらけよ 驯染めない都会で</br>
					同じように笑えない うつむいて歩いたの</br>
					急ぎ足で すれ违う人たち</br>
					「梦は叶いましたか?」</br>
					アタシまだモガいている</br>
					子供の顷に戻るよりも</br>
					今をうまく生きてみたいよ</br>
					怖がりは 生まれつき</br>
					阳のあたり场所に出て</br>
					両手を広げてみたなら</br>
					あの空 越えてゆけるかな?</br>
					なんて思ったんだ</br>
					飞び立つ为の翼 それは</br>
					まだ见えない</br>
					カンタンに 行かないから 生きてゆける
				</p>
			</div>
		</div>
	</div>

	<?php get_footer(); ?>
