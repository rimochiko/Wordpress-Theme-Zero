<?php get_header();?>
<body class="u-sub-page">
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
		<div class="g-right u-right">
			<!-- 板块大标题 -->
			<div class="u-page-title">
				<h1># 年糕出品。</h1>
				<p>共有<span>7</span>篇作品记录日志，希望你能喜欢我/我们所做的！</p>
			</div>

			<!-- 文章标签 -->
			<div class="g-tags">
				<p class="u-section-title"><i class="fa fa-tags" aria-hidden="true"></i>标签</p>
				<ul>
					<li><a href="#">项目</a></li>
					<li><a href="#">DEMO</a></li>
					<li><a href="#">网页</a></li>
					<li><a href="#">桌面软件</a></li>
					<li><a href="#">设计</a></li>
				</ul>
			</div>
			
			<!-- 友情链接 -->
			<div class="g-footer">
				<ul class="g-friends">
				</ul>
			</div>
			<p class="g-copyright">MOCHIKO &copy; 2017</p>
		</div>
		
		<div class="g-left u-left">	
			<!-- 文章列表 -->
			<div class="g-mix-article">
				<div class="g-article-box">
					<div class="g-article-thumb" style="background-image: url(images/n1.jpg)">
					</div>
					<div class="g-article-info">
						<a href="#" class="g-article-title u-left"># WP主题 # White Story</a>
						<p class="u-right g-article-time">2天前</p>
						<div class="u-clearfix"></div>
					</div>

					<div class="g-article-abstract">
						<p>一组很可爱的手绘图标分享~作者不知，素材来源于网络。</p>
					</div>
				</div>

				<div class="u-clearfix"></div>
			</div>

			<div class="g-mix-article">
				<div class="g-article-box">
					<div class="g-article-thumb" style="background-image: url(images/n3.jpg)">
					</div>
					<div class="g-article-info">
						<a href="#" class="g-article-title u-left"># 小组合作 # EMMM.</a>
						<p class="u-right g-article-time">2天前</p>
						<div class="u-clearfix"></div>
					</div>

					<div class="g-article-abstract">
						<p>一组很可爱的手绘图标分享~作者不知，素材来源于网络。</p>
					</div>
				</div>

				<div class="u-clearfix"></div>
			</div>

			<div class="g-mix-article">
				<div class="g-article-box">
					<div class="g-article-thumb" style="background-image: url(images/n2.jpg)">
					</div>
					<div class="g-article-info">
						<a href="#" class="g-article-title u-left"># 小组合作 # 晶网点企业网站</a>
						<p class="u-right g-article-time">2天前</p>
						<div class="u-clearfix"></div>
					</div>

					<div class="g-article-abstract">
						<p>一组很可爱的手绘图标分享~作者不知，素材来源于网络。</p>
					</div>
				</div>

				<div class="u-clearfix"></div>
			</div>			
			<!--页数-->
			<div class="u-page-num">
				<ul>
					<li><a href=""><i class="fa fa-angle-double-left" aria-hidden="true"></i>首</a></li>
					<li><a href=""><i class="fa fa-angle-left" aria-hidden="true"></i>前</a></li>
					<li><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>后</a></li>
					<li><a href=""><i class="fa fa-angle-double-right" aria-hidden="true"></i>尾</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>		
	</div>

	<div id="back-to-top">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div>

	<div class="m-loading">
		<div class="g-loading-animate">
			<span class="active"></span>
			<span></span>
			<span></span>
		</div>
	</div>
</body>
<script src="./js/jquery-1.11.1.js"></script>
<script src="./js/main.js"></script>
</html>