<?
ob_start();
if( class_exists('WSTDGetData') ) {
    global $wstd_gd_cl;
    $wstd_gd_cl = new WSTDGetData(get_the_ID());
}?>

<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title><? wp_title(); ?></title>
		<!-- Favicons start-->
			<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
			<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
			<link rel="manifest" href="/site.webmanifest">
			<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
			<meta name="msapplication-TileColor" content="#da532c">
			<meta name="theme-color" content="#ffffff">
		<!-- Favicons end-->
        <!-- Google Fonts --><link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@300;400;500;600;700;900&family=IBM+Plex+Sans:wght@300;400;500;600;700;900&family=Merriweather:wght@300;400;700;900&family=Oswald:wght@300;400;500;600;700;900&display=swap" rel="stylesheet"><!-- Google Fonts end -->
        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script><![endif]-->

        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="<?=THEME_URL?>/assets/css/libs.min.css">
        <link rel="stylesheet" type="text/css" href="<?=THEME_URL?>/assets/css/main.css">

        <?php wp_head(); ?>

        <script>
            let blocked_form_dates = undefined;
        </script>
		
		<!-- Facebook Pixel Code -->
        <script>!function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script', 'https://connect.facebook.net/en_US/fbevents.js');fbq('init', '643043372820964');fbq('track', 'PageView');</script>
        <noscript><img height="1" width="1" src="https://www.facebook.com/tr?id=643043372820964&ev=PageView&noscript=1"/></noscript>
        <!-- End Facebook Pixel Code -->		
		
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");ym(53115304, "init", {clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true});</script>
        <noscript><div><img src="https://mc.yandex.ru/watch/53115304" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

	    <meta name="yandex-verification" content="3eea012a97f8b9f6" />
        <meta name="yandex-verification" content="0d83aef4a8ea04ad" />
		
		<script type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?162",t.onload=function(){VK.Retargeting.Init("VK-RTRG-397046-4cWEu"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-397046-4cWEu" style="position:fixed; left:-999px;" alt=""/></noscript>

        <script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154021115-1"></script>
			<script>
  				window.dataLayer = window.dataLayer || [];
 				function gtag(){dataLayer.push(arguments);}
 				gtag('js', new Date());

 				gtag('config', 'UA-154021115-1');
			</script>

        <meta name="google-site-verification" content="YXCMSnuOcfx4bK-Z0jZegL7PZliduNS7MMiKlFMtKes" />
        <meta name="cmsmagazine" content="6a6be6a60b3ea182586db2cf183a6ac4" />
		<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WD6FJF7');</script>
	<!-- End Google Tag Manager -->
		
    </head>
    <body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WD6FJF7"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    <div class="page">
        <header class="header header_main">

            <?loadBlock('header_banner');?>

            <div class="container">
                <div class="header__inner">
                <a class="logo header__logo" href="/">
                       <svg width="133" height="108" viewBox="0 0 133 108" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="133" height="107.62" fill="#03556D"/>
<g clip-path="url(#clip0)">
<path d="M22.0233 48C18.7777 48 16.2957 47.0277 14.5774 45.083C12.8591 43.1191 12 40.4428 12 37.0542C12 34.8207 12.4487 32.8761 13.346 31.2202C14.2624 29.5451 15.5129 28.2551 17.0976 27.3502C18.6822 26.4452 20.4768 25.9928 22.4815 25.9928C23.3216 25.9928 24.133 26.0505 24.9157 26.1661C25.6985 26.2623 26.6245 26.3971 27.6936 26.5704C28.4955 26.7052 28.9346 26.7726 29.011 26.7726L28.696 32.722H26.0613L25.1735 28.5921C24.9635 28.3803 24.6007 28.207 24.0852 28.0722C23.5697 27.9374 22.9111 27.87 22.1092 27.87C20.4864 27.87 19.1786 28.6306 18.1858 30.1516C17.2121 31.6534 16.7253 33.8387 16.7253 36.7076C16.7253 39.4801 17.193 41.7425 18.1285 43.4946C19.064 45.2467 20.4291 46.1227 22.2238 46.1227C23.0829 46.1227 23.7416 46.0457 24.1998 45.8917C24.6771 45.7184 25.078 45.4777 25.4026 45.1697L26.6627 42.1949L29.0682 42.426L28.4955 46.9025C28.0946 46.941 27.6936 47.0181 27.2927 47.1336C26.9108 47.2298 26.6722 47.2876 26.5767 47.3069C25.8131 47.5187 25.0971 47.6823 24.4289 47.7978C23.7798 47.9326 22.9779 48 22.0233 48Z" fill="white"/>
<path d="M32.6538 26.5704L30.4773 26.1949V24.6354L35.804 24H35.8899L36.6345 24.5487L36.6631 30.9892L36.4627 33.5018C37.0545 32.9627 37.8564 32.4621 38.8683 32C39.8992 31.5379 40.9779 31.3069 42.1043 31.3069C43.3071 31.3069 44.2427 31.5379 44.9109 32C45.5791 32.4428 46.0468 33.1264 46.3141 34.0505C46.5814 34.9747 46.7151 36.207 46.7151 37.7473V45.6895L48.5479 45.9495V47.6823H41.0161V45.9495L42.6771 45.6895V37.7473C42.6771 36.7461 42.6103 35.9663 42.4766 35.4079C42.343 34.8496 42.0948 34.4356 41.7321 34.1661C41.3884 33.8965 40.8729 33.7617 40.1856 33.7617C39.5937 33.7617 38.9828 33.9061 38.3528 34.1949C37.7418 34.4645 37.1977 34.7918 36.7204 35.1769V45.6895L38.4673 45.9495V47.6823H31.0501V45.9495L32.6538 45.7184V26.5704Z" fill="white"/>
<path d="M57.7098 48C55.1897 48 53.3091 47.2587 52.0681 45.7762C50.8462 44.2744 50.2353 42.2335 50.2353 39.6534C50.2353 37.9206 50.5503 36.4188 51.1804 35.148C51.8295 33.8773 52.7363 32.9049 53.901 32.231C55.0656 31.5572 56.4116 31.2202 57.9389 31.2202C59.8481 31.2202 61.3182 31.7304 62.3492 32.7509C63.3801 33.7521 63.9147 35.1865 63.9529 37.0542C63.9529 38.3249 63.8765 39.2684 63.7238 39.8845H54.4164C54.4928 41.6366 54.9033 43.0036 55.6479 43.9856C56.3925 44.9483 57.4521 45.4296 58.8267 45.4296C59.5713 45.4296 60.335 45.3045 61.1177 45.0542C61.9196 44.8039 62.5496 44.5054 63.0078 44.1588L63.7238 45.7473C63.2083 46.3057 62.3683 46.8255 61.2036 47.3069C60.0581 47.769 58.8935 48 57.7098 48ZM59.9436 38.1516C59.9818 37.6125 60.0009 37.1986 60.0009 36.9097C60.0009 34.349 59.1513 33.0686 57.4521 33.0686C56.5166 33.0686 55.7911 33.444 55.2756 34.1949C54.7601 34.9458 54.4737 36.2647 54.4164 38.1516H59.9436Z" fill="white"/>
<path d="M67.8993 26.5704L65.7801 26.1949V24.6354L71.0782 24H71.1354L71.9087 24.5487V45.7184L73.9992 45.9495V47.6823H65.8947V45.9495L67.8993 45.6895V26.5704Z" fill="white"/>
<path d="M79.1496 45.3141C79.3023 45.5451 79.646 45.7665 80.1806 45.9783C80.7342 46.1709 81.2879 46.2671 81.8416 46.2671C82.7389 46.2671 83.4071 46.0842 83.8462 45.7184C84.3044 45.3333 84.5335 44.8327 84.5335 44.2166C84.5335 43.5812 84.2567 43.071 83.703 42.6859C83.1494 42.2816 82.2139 41.7906 80.8965 41.213L80.0947 40.8664C78.7773 40.3081 77.7941 39.6342 77.1449 38.8448C76.4958 38.0554 76.1712 37.0349 76.1712 35.7834C76.1712 34.917 76.429 34.1468 76.9445 33.4729C77.46 32.7798 78.1855 32.2407 79.121 31.8556C80.0565 31.4705 81.1352 31.278 82.3571 31.278C83.2544 31.278 84.0181 31.3357 84.6481 31.4513C85.2972 31.5668 85.975 31.7208 86.6814 31.9134C87.0632 32.0481 87.3496 32.1252 87.5405 32.1444V35.9278H85.2781L84.6195 33.7329C84.5049 33.5403 84.2472 33.367 83.8462 33.213C83.4453 33.059 82.9871 32.982 82.4716 32.982C81.6888 32.982 81.0588 33.1552 80.5815 33.5018C80.1233 33.8291 79.8942 34.2912 79.8942 34.8881C79.8942 35.4272 80.0565 35.8797 80.381 36.2455C80.7056 36.5921 81.0588 36.8616 81.4406 37.0542C81.8225 37.2467 82.5289 37.5644 83.5598 38.0072C84.5908 38.4501 85.4404 38.8736 86.1086 39.278C86.7959 39.6823 87.3592 40.2118 87.7983 40.8664C88.2565 41.5018 88.4856 42.2816 88.4856 43.2058C88.4856 44.6306 87.9319 45.7858 86.8246 46.6715C85.7172 47.5572 84.1231 48 82.042 48C81.0683 48 80.1901 47.9134 79.4073 47.7401C78.6437 47.5668 77.7559 47.3357 76.744 47.0469L76.114 46.8448V43.0325H78.4909L79.1496 45.3141Z" fill="white"/>
<path d="M98.0379 48C95.5178 48 93.6372 47.2587 92.3962 45.7762C91.1744 44.2744 90.5634 42.2335 90.5634 39.6534C90.5634 37.9206 90.8784 36.4188 91.5085 35.148C92.1576 33.8773 93.0645 32.9049 94.2291 32.231C95.3937 31.5572 96.7397 31.2202 98.267 31.2202C100.176 31.2202 101.646 31.7304 102.677 32.7509C103.708 33.7521 104.243 35.1865 104.281 37.0542C104.281 38.3249 104.205 39.2684 104.052 39.8845H94.7446C94.8209 41.6366 95.2314 43.0036 95.976 43.9856C96.7206 44.9483 97.7802 45.4296 99.1548 45.4296C99.8994 45.4296 100.663 45.3045 101.446 45.0542C102.248 44.8039 102.878 44.5054 103.336 44.1588L104.052 45.7473C103.536 46.3057 102.696 46.8255 101.532 47.3069C100.386 47.769 99.2216 48 98.0379 48ZM100.272 38.1516C100.31 37.6125 100.329 37.1986 100.329 36.9097C100.329 34.349 99.4794 33.0686 97.7802 33.0686C96.8447 33.0686 96.1192 33.444 95.6037 34.1949C95.0882 34.9458 94.8018 36.2647 94.7446 38.1516H100.272Z" fill="white"/>
<path d="M106.251 43.1769C106.251 41.4248 107.12 40.1059 108.857 39.2202C110.614 38.3345 112.876 37.8821 115.645 37.8628V37.1986C115.645 36.4091 115.559 35.793 115.387 35.3502C115.234 34.9073 114.938 34.58 114.499 34.3682C114.079 34.1372 113.459 34.0217 112.638 34.0217C111.702 34.0217 110.862 34.1468 110.118 34.3971C109.373 34.6282 108.6 34.9362 107.798 35.3213L106.91 33.4729C107.196 33.2226 107.674 32.9242 108.342 32.5776C109.029 32.231 109.841 31.9326 110.776 31.6823C111.712 31.4128 112.676 31.278 113.669 31.278C115.139 31.278 116.284 31.4705 117.105 31.8556C117.945 32.2407 118.547 32.8568 118.909 33.704C119.272 34.5511 119.454 35.6871 119.454 37.1119V45.9495H121V47.5668C120.618 47.6631 120.074 47.7593 119.368 47.8556C118.661 47.9519 118.041 48 117.506 48C116.857 48 116.418 47.9037 116.189 47.7112C115.979 47.5187 115.874 47.1239 115.874 46.5271V45.7473C115.358 46.3249 114.69 46.8448 113.869 47.3069C113.048 47.769 112.122 48 111.091 48C110.213 48 109.402 47.8171 108.657 47.4513C107.932 47.0662 107.349 46.5174 106.91 45.8051C106.471 45.0734 106.251 44.1974 106.251 43.1769ZM112.924 45.6029C113.325 45.6029 113.783 45.4874 114.299 45.2563C114.814 45.006 115.263 44.7076 115.645 44.361V39.6245C113.926 39.6245 112.638 39.923 111.779 40.5199C110.939 41.0975 110.518 41.8484 110.518 42.7726C110.518 43.6968 110.729 44.3995 111.149 44.8809C111.588 45.3622 112.179 45.6029 112.924 45.6029Z" fill="white"/>
<rect width="109" height="27.62" transform="translate(12 56)" fill="#010F14"/>
<path d="M41.7574 75.62C40.6841 75.62 39.9094 75.2887 39.4334 74.626C38.9667 73.954 38.7334 72.988 38.7334 71.728V67.92C38.7334 66.6227 38.9761 65.6473 39.4614 64.994C39.9467 64.3313 40.7821 64 41.9674 64C43.0874 64 43.8901 64.28 44.3754 64.84C44.8607 65.3907 45.1034 66.212 45.1034 67.304V67.892H43.1294V67.248C43.1294 66.8373 43.1014 66.5107 43.0454 66.268C42.9987 66.0253 42.8914 65.8387 42.7234 65.708C42.5647 65.5773 42.3221 65.512 41.9954 65.512C41.6501 65.512 41.3934 65.596 41.2254 65.764C41.0574 65.932 40.9454 66.1467 40.8894 66.408C40.8427 66.6693 40.8194 67.01 40.8194 67.43V72.176C40.8194 72.82 40.9034 73.3007 41.0714 73.618C41.2487 73.9353 41.5754 74.094 42.0514 74.094C42.5181 74.094 42.8401 73.926 43.0174 73.59C43.2041 73.254 43.2974 72.75 43.2974 72.078V71.014H42.0794V69.712H45.1594V75.466H43.8154L43.6754 74.36C43.3207 75.2 42.6814 75.62 41.7574 75.62Z" fill="white"/>
<path d="M48.1777 75.592C47.8324 75.592 47.5244 75.4987 47.2537 75.312C46.9924 75.1253 46.787 74.8873 46.6377 74.598C46.4977 74.2993 46.4277 73.9913 46.4277 73.674C46.4277 73.0487 46.5724 72.5353 46.8617 72.134C47.1604 71.7233 47.5244 71.406 47.9537 71.182C48.3924 70.958 48.971 70.7107 49.6897 70.44V69.74C49.6897 69.3667 49.643 69.096 49.5497 68.928C49.4657 68.7507 49.2977 68.662 49.0457 68.662C48.6164 68.662 48.3924 68.9607 48.3737 69.558L48.3457 70.048L46.5397 69.978C46.5677 69.0447 46.7964 68.3587 47.2257 67.92C47.6644 67.472 48.3224 67.248 49.1997 67.248C49.993 67.248 50.581 67.4673 50.9637 67.906C51.3464 68.3353 51.5377 68.9467 51.5377 69.74V73.478C51.5377 74.0567 51.5844 74.7193 51.6777 75.466H49.9697C49.8764 74.962 49.811 74.5747 49.7737 74.304C49.6617 74.668 49.4704 74.976 49.1997 75.228C48.9384 75.4707 48.5977 75.592 48.1777 75.592ZM48.8777 74.178C49.0364 74.178 49.1857 74.122 49.3257 74.01C49.475 73.898 49.5964 73.7767 49.6897 73.646V71.378C49.195 71.6673 48.8264 71.9473 48.5837 72.218C48.341 72.4793 48.2197 72.8107 48.2197 73.212C48.2197 73.5107 48.2757 73.7487 48.3877 73.926C48.509 74.094 48.6724 74.178 48.8777 74.178Z" fill="white"/>
<path d="M55.1378 75.592C54.4565 75.592 53.8965 75.41 53.4578 75.046C53.0191 74.682 52.7065 74.15 52.5198 73.45L53.9338 72.904C54.1485 73.8093 54.5405 74.262 55.1098 74.262C55.3245 74.262 55.4878 74.206 55.5998 74.094C55.7211 73.982 55.7818 73.828 55.7818 73.632C55.7818 73.4173 55.7165 73.2213 55.5858 73.044C55.4551 72.8573 55.2218 72.624 54.8858 72.344L53.9198 71.504C53.5091 71.168 53.2058 70.8413 53.0098 70.524C52.8138 70.2067 52.7158 69.8193 52.7158 69.362C52.7158 68.7273 52.9305 68.2187 53.3598 67.836C53.7985 67.444 54.3491 67.248 55.0118 67.248C55.6465 67.248 56.1645 67.4393 56.5658 67.822C56.9671 68.1953 57.2285 68.704 57.3498 69.348L56.1038 69.88C56.0291 69.5067 55.9031 69.2033 55.7258 68.97C55.5578 68.7273 55.3385 68.606 55.0678 68.606C54.8718 68.606 54.7131 68.6667 54.5918 68.788C54.4798 68.9093 54.4238 69.0633 54.4238 69.25C54.4238 69.3993 54.4891 69.558 54.6198 69.726C54.7505 69.894 54.9465 70.09 55.2078 70.314L56.1878 71.21C56.6078 71.574 56.9298 71.924 57.1538 72.26C57.3871 72.5867 57.5038 72.9833 57.5038 73.45C57.5038 74.1313 57.2798 74.6587 56.8318 75.032C56.3931 75.4053 55.8285 75.592 55.1378 75.592Z" fill="white"/>
<path d="M60.8833 75.564C60.1459 75.564 59.6233 75.3867 59.3153 75.032C59.0166 74.6773 58.8673 74.15 58.8673 73.45V68.62H58.0553V67.374H58.8673V64.952H60.7853V67.374H62.0033V68.62H60.7853V73.282C60.7853 73.5527 60.8413 73.7487 60.9533 73.87C61.0746 73.9913 61.2613 74.052 61.5133 74.052C61.7466 74.052 61.9426 74.0333 62.1013 73.996V75.466C61.7279 75.5313 61.3219 75.564 60.8833 75.564Z" fill="white"/>
<path d="M63.2357 67.374H65.1397V68.62C65.4104 68.144 65.6857 67.8033 65.9657 67.598C66.2457 67.3833 66.5584 67.276 66.9037 67.276C67.025 67.276 67.123 67.2853 67.1977 67.304V69.278C66.899 69.166 66.6377 69.11 66.4137 69.11C65.9097 69.11 65.485 69.3713 65.1397 69.894V75.466H63.2357V67.374Z" fill="white"/>
<path d="M70.5792 75.592C69.7112 75.592 69.0626 75.354 68.6332 74.878C68.2039 74.3927 67.9892 73.6927 67.9892 72.778V70.062C67.9892 69.1473 68.2039 68.452 68.6332 67.976C69.0626 67.4907 69.7112 67.248 70.5792 67.248C71.4472 67.248 72.0959 67.4907 72.5252 67.976C72.9639 68.452 73.1832 69.1473 73.1832 70.062V72.778C73.1832 73.6927 72.9639 74.3927 72.5252 74.878C72.0959 75.354 71.4472 75.592 70.5792 75.592ZM70.5932 74.276C70.8826 74.276 71.0739 74.164 71.1672 73.94C71.2606 73.7067 71.3072 73.366 71.3072 72.918V69.936C71.3072 69.488 71.2606 69.1473 71.1672 68.914C71.0739 68.6807 70.8826 68.564 70.5932 68.564C70.2946 68.564 70.0986 68.6807 70.0052 68.914C69.9119 69.1473 69.8652 69.488 69.8652 69.936V72.918C69.8652 73.366 69.9119 73.7067 70.0052 73.94C70.0986 74.164 70.2946 74.276 70.5932 74.276Z" fill="white"/>
<path d="M75.0306 64.126H78.3626C80.2946 64.126 81.2606 65.1993 81.2606 67.346C81.2606 69.3993 80.248 70.426 78.2226 70.426H77.0886V75.466H75.0306V64.126ZM77.8866 68.97C78.4466 68.97 78.8246 68.8533 79.0206 68.62C79.2166 68.3773 79.3146 67.948 79.3146 67.332C79.3146 66.884 79.282 66.5433 79.2166 66.31C79.1513 66.0673 79.016 65.8853 78.8106 65.764C78.6146 65.6427 78.3066 65.582 77.8866 65.582H77.0886V68.97H77.8866Z" fill="white"/>
<path d="M83.5894 75.592C83.1321 75.592 82.7914 75.424 82.5674 75.088C82.3434 74.752 82.2314 74.3273 82.2314 73.814V67.374H84.1214V73.464C84.1214 73.716 84.1634 73.9073 84.2474 74.038C84.3314 74.1687 84.4761 74.234 84.6814 74.234C84.8961 74.234 85.1808 74.108 85.5354 73.856V67.374H87.4394V75.466H85.5354V74.696C84.9101 75.2933 84.2614 75.592 83.5894 75.592Z" fill="white"/>
<path d="M92.3906 75.592C91.8586 75.592 91.336 75.3493 90.8226 74.864V75.466H88.9326V64.126H90.8226V67.99C91.336 67.4953 91.8866 67.248 92.4746 67.248C93.128 67.248 93.59 67.5187 93.8606 68.06C94.1313 68.6013 94.2666 69.2313 94.2666 69.95V72.694C94.2666 73.562 94.1126 74.262 93.8046 74.794C93.506 75.326 93.0346 75.592 92.3906 75.592ZM91.6626 74.262C91.9426 74.262 92.1293 74.1313 92.2226 73.87C92.316 73.6087 92.3626 73.24 92.3626 72.764V69.852C92.3626 69.4413 92.3113 69.1193 92.2086 68.886C92.106 68.6433 91.924 68.522 91.6626 68.522C91.392 68.522 91.112 68.634 90.8226 68.858V73.982C91.084 74.1687 91.364 74.262 91.6626 74.262Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0">
<rect width="109" height="59.62" fill="white" transform="translate(12 24)"/>
</clipPath>
</defs>
</svg>
                    </a>
                    <?$items = getMenuItemsByLocation('mm');
                   
                    if( !empty($items) ):?>
                        <div class="header__menu">
                            <nav class="header__nav">
                                <?foreach($items as $item):?>
                                    <a class="header__nav-item not-link" href="<?=$item['url']?>"><?=$item['title']?></a>
                                <?endforeach;?>
                            </nav>

                            <?if( $GLOBALS['theme_options']['contacts']['phone'] ):?>
                                <div class="header__contacts">
                                    <a class="header__contact" href="tel:<?=$GLOBALS['theme_options']['contacts']['phone']?>"><?=$GLOBALS['theme_options']['contacts']['phone']?></a>
                                </div>
                            <?endif;?>
                        </div>
                    <?endif;?>

                    <?$translations = pll_the_languages( array( 'raw' => 1 ) );
                    foreach( $translations as $code => $lang):
                        if( !$lang['no_translation'] ):
                            $cl = ( $lang['current_lang'] ) ? ' is-active' : '';?>
                            <?if(!$lang['current_lang']):?> <a class="header__lang" href="<?=$lang['url']?>"><?=$lang['name']?></a><?endif;?>
                        <? endif;
                    endforeach;?>


                    <button class="humburger header__humburger js-humburger" href="#">
                        <div class="humburger__open"><svg viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.333008 0H21.6663V2.66667H0.333008V0ZM5.66634 6.66667H21.6663V9.33333H5.66634V6.66667ZM12.333 13.3333H21.6663V16H12.333V13.3333Z" fill="black"/></svg></div>
                        <div class="humburger__close"><svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67391 9.00001L0.836914 15.837L2.16291 17.163L8.99991 10.326L15.8369 17.163L17.1629 15.837L10.3259 9.00001L17.1629 2.16301L15.8369 0.837006L8.99991 7.67401L2.16291 0.837006L0.836914 2.16301L7.67391 9.00001Z" fill="#010F14"/></svg></div>
                    </button>

                    <button class="button button_accent header__booking" data-modal-target="order"><?pll_e('Забронировать');?></button>

                </div>
            </div>
        </header>
        <main class="main">

            <?if( class_exists('WSTDBreadcrumbs') ) new WSTDBreadcrumbs(); ?>




