<?php $gtmId = GriffithSettings::get('gtm_id') ?>
<?php if ($gtmId): ?>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php echo $gtmId ?>" width="0" height="0" style="display: none; visibility: hidden"></iframe></noscript>
	<script>
		var dataLayer = [];
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php echo $gtmId ?>');
	</script>
	
	<script>
		window.optimizely = window.optimizely || [];
		window.optimizely.push(['trackEvent', 'form.submission.enquiry']);
	</script>
<?php endif ?>