<div class="share">

	<a title="facebook" target="_blank"
	href="http://www.facebook.com/share.php?u=<?php print(urlencode(the_permalink())); ?>&amp;title=<?php print(urlencode(get_the_title())); ?>">
		<i class="fa fa-facebook-f"></i>
	</a>

	<a title="twitter" target="_blank"
	href="http://twitter.com/home?status=<?php print(urlencode(the_permalink())); ?>+<?php print(urlencode(get_the_title())); ?>">
		<i class="fa fa-twitter"></i>
	</a>

	<a title="xing" href="https://www.xing-share.com/app/user?op=share;sc_p=xing-share;url=<?php echo the_permalink(); ?>&amp;title=<?php echo the_title(); ?>&amp;source=<?php echo bloginfo( 'name' ); ?>" target="_blank">
		<i class="fa fa-xing"></i>
	</a>

	<a title="linkedin" target="_blank"
	href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php print(urlencode(the_permalink())); ?>&amp;title=<?php print(urlencode(get_the_title())); ?>&amp;source=<?php print(urlencode(get_site_url())); ?>">
		<i class="fa fa-linkedin"></i>
	</a>

</div>