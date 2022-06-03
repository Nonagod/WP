<?//_p($GLOBALS['theme_options']);?>
            </main>

            <div class="footer">
                <div class="container">
                    <div class="footer__inner">
                        <div class="footer__top">
                            <p class="footer__logo">Chelsea GastroPub</p>
                            <div class="footer__lists">

                                <ul class="footer__list">
                                    <p><?pll_e('Меню');?></p>
                                    <li style="color: red; font-size: 24px"></li>
                                    <li><a href="/services/gril-bar-v-gastropabe-chelsi/">Гриль-бар</a></li>
                                    <li><a href="/services/stejki-v-moskve/">Стейк бар</a></li>
                                    <li><a href="/services/menu-supy-v-gastropabe-chelsi/">Супы</a></li>
                                    <li><a href="/services/goryachie-blyuda/">Горячие блюда</a></li>
                                    <li><a href="/services/biznes-lanchi/">Бизнес-ланч</a></li>
                                    <li><a href="/menu/">Барное меню</a></li>
                                    <li><a href="/services/viski-bar/">Виски-бар</a></li>
                                </ul>

                                <ul class="footer__list">
                                    <p><?pll_e('Услуги');?></p>
                                    <li style="color: red; font-size: 24px"></li>
                                    <li><a href="/services/korporativ-v-bare/">Корпоратив</a></li>
                                    <li><a href="/services/bankety-v-gastropabe-chelsi/">День рождения</a></li>
                                    <li><a href="/services/bankety-v-gastropabe-chelsi/">Банкет</a></li>
                                    <li><a href="/services/sportivnye-translyacii-v-gastropabe-chelsi/">Спортивные трансляции</a></li>
                                </ul>

                                <?$items = getMenuItemsByLocation('fau');
                                if( !empty($items) ):?>
                                    <ul class="footer__list">
                                        <p><?pll_e('О нас');?></p>
                                        <?foreach($items as $item):?>
                                            <li><a href="<?=$item['url']?>"><?=$item['title']?></a></li>
                                        <?endforeach;?>
                                    </ul>
                                <?endif;?>

                                <ul class="footer__list footer__list_contacts">
                                    <p><?pll_e('Контакты');?></p>
                                    <?if($GLOBALS['theme_options']['contacts']['phone']):?><li><a href="tel:<?=$GLOBALS['theme_options']['contacts']['phone']?>"><?=$GLOBALS['theme_options']['contacts']['phone']?></a></li><?endif;?>
                                    <?if($GLOBALS['theme_options']['contacts']['address']):?><li><?=$GLOBALS['theme_options']['contacts']['address']?></li><?endif;?>
                                    <?if($GLOBALS['theme_options']['contacts']['email']):?><li><a href="mailto:<?=$GLOBALS['theme_options']['contacts']['email']?>"><?=$GLOBALS['theme_options']['contacts']['email']?></a></li><?endif;?>

                                    <?loadBlock('footer_social');?>

                                </ul>
                            </div>
                        </div>
                        <div class="footer__bottom">
                            <p class="footer__copy">
                                <?if($GLOBALS['theme_options']['general']['copyright']):?>© <?=$GLOBALS['theme_options']['general']['copyright']?>, <?endif;?>
                                <?pll_e('Гастропаб Челси');?>
                                <?if($GLOBALS['theme_options']['general']['inn']):?> | <?pll_e('ИНН');?> <?=$GLOBALS['theme_options']['general']['inn']?><?endif;?>
                                <?if($GLOBALS['theme_options']['general']['kpp']):?> | <?pll_e('КПП');?> <?=$GLOBALS['theme_options']['general']['kpp']?><?endif;?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
		<!-- Whatsapp button -->
		<style>
			.whats-app-btn {
				position: fixed;
				right: 7.5px;
				bottom: 7.5px;
				display: flex;
				align-items: center;
				justify-content: center;
				width: 32px;
				height: 32px;
				border-radius: 50%;
				animation: pulse 2s infinite;
				z-index: 20;
				transform: scale(1);
				box-shadow: 0 0 0 0 rgba(37, 211, 102, 1);
				background: #fff;
			}
			.whats-app-btn svg {
			}
			@keyframes pulse {
				0% {
					transform: scale(0.95);
					box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
				}
				60% {
					transform: scale(1);
					box-shadow: 0 0 0 10px rgba(37, 211, 102, 0);
				}
				100% {
					transform: scale(0.95);
					box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
				}
			}
		</style>
        <a class='whats-app-btn' href="https://wa.me/79959002190">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 418.135 418.135" style="enable-background:new 0 0 418.135 418.135;" xml:space="preserve" width="32px" height="32px">
<g>
	<path style="fill:#7AD06D;" d="M198.929,0.242C88.5,5.5,1.356,97.466,1.691,208.02c0.102,33.672,8.231,65.454,22.571,93.536   L2.245,408.429c-1.191,5.781,4.023,10.843,9.766,9.483l104.723-24.811c26.905,13.402,57.125,21.143,89.108,21.631   c112.869,1.724,206.982-87.897,210.5-200.724C420.113,93.065,320.295-5.538,198.929,0.242z M323.886,322.197   c-30.669,30.669-71.446,47.559-114.818,47.559c-25.396,0-49.71-5.698-72.269-16.935l-14.584-7.265l-64.206,15.212l13.515-65.607   l-7.185-14.07c-11.711-22.935-17.649-47.736-17.649-73.713c0-43.373,16.89-84.149,47.559-114.819   c30.395-30.395,71.837-47.56,114.822-47.56C252.443,45,293.218,61.89,323.887,92.558c30.669,30.669,47.559,71.445,47.56,114.817   C371.446,250.361,354.281,291.803,323.886,322.197z"/>
	<path style="fill:#7AD06D;" d="M309.712,252.351l-40.169-11.534c-5.281-1.516-10.968-0.018-14.816,3.903l-9.823,10.008   c-4.142,4.22-10.427,5.576-15.909,3.358c-19.002-7.69-58.974-43.23-69.182-61.007c-2.945-5.128-2.458-11.539,1.158-16.218   l8.576-11.095c3.36-4.347,4.069-10.185,1.847-15.21l-16.9-38.223c-4.048-9.155-15.747-11.82-23.39-5.356   c-11.211,9.482-24.513,23.891-26.13,39.854c-2.851,28.144,9.219,63.622,54.862,106.222c52.73,49.215,94.956,55.717,122.449,49.057   c15.594-3.777,28.056-18.919,35.921-31.317C323.568,266.34,319.334,255.114,309.712,252.351z"/>
</g>
</svg>
        </a>
<!-- Delivery bag -->
<style>
.w-delivery-bag {
    position: fixed;
    bottom: 60px;
    left: 7.5px;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #d91029;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 0 3px 1px rgba(239, 35, 60, 0.3);
    z-index: 998;
	transition: 0.3s;}
.w-delivery-bag__icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
	padding: 5px;
	fill: #d91029;
	}
	.w-delivery-bag_link {
		padding: 2px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.w-delivery-bag__text {
		padding-right: 8px;
	}
	.w-delivery-bag__hidden {
		visibility: hidden;
		opacity: 0;
		width: 0;
		transition: 2s;
		display: flex;
		align-items: center;
		cursor: pointer;
	}
	.w-delivery-bag:hover .w-delivery-bag__hidden {
		visibility: visible;
		opacity: 1;
		width: auto;
	}
	@media (max-width: 768px) {
		.w-delivery-bag {
			display: none;
		}
	}
	
</style>
        <div class="w-delivery-bag w-delivery-bag_link"> <?//https://chelseapub.leclick.ru/?>
            <div class="w-delivery-bag__icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64">
                    <path d="M55.01,51.88,58,17.09A1,1,0,0,0,57,16H49V9a1.033,1.033,0,0,0-.29-.71l-6-6A1.033,1.033,0,0,0,42,2H22a1.033,1.033,0,0,0-.71.29l-6,6A1.033,1.033,0,0,0,15,9v7H7a1,1,0,0,0-1,1.09L8.99,51.88l-2.94,8.8a1,1,0,0,0,.14.9A.983.983,0,0,0,7,62H57a.983.983,0,0,0,.81-.42,1,1,0,0,0,.14-.9ZM22.41,4H41.59l4,4H18.41ZM47,10v6H43V10Zm-6,0v6H23V10ZM17,10h4v6H17ZM8.39,60l2.56-7.68a1.128,1.128,0,0,0,.05-.41L8.09,18H55.91L53,51.91a1.128,1.128,0,0,0,.05.41L55.61,60Z"></path>
                    <path d="M47,44H46V42A14.007,14.007,0,0,0,33,28.051V26h2a1,1,0,0,0,1-1h0a1,1,0,0,0-1-1H29a1,1,0,0,0-1,1h0a1,1,0,0,0,1,1h2v2.051A14.007,14.007,0,0,0,18,42v2H17a1,1,0,0,0-1,1v2a3,3,0,0,0,3,3H45a3,3,0,0,0,3-3V45A1,1,0,0,0,47,44ZM20,42a12,12,0,0,1,24,0v2H20Zm26,5a1,1,0,0,1-1,1H19a1,1,0,0,1-1-1V46H46Z"></path>
                </svg>
            </div>
            <div class="w-delivery-bag__text">Доставка</div>
	    <div class="w-delivery-bag__hidden">
		<a class="w-delivery-bag_link" target="_blank" href="https://eda.yandex.ru/restaurant/chelsea_malyj_gnezdnikovskij_pereulok_12" onclick="ym(53115304,'reachGoal','dst-yandex');return true;">
			<img src="https://chelsea-pub.ru/wp-content/uploads/2021/08/yandex_eda.png" class="w-delivery-bag__icon_delivery" height="30" >
		</a>
		<a class="w-delivery-bag_link" target="_blank" href="https://chelsea-pub-menu.ru/" onclick="ym(53115304,'reachGoal','dst-delivery');return true;">
			<img src="https://chelsea-pub.ru/wp-content/uploads/2021/08/chelsea-logo.jpg" class="w-delivery-bag__icon_delivery" height="30">
		</a>
		<!--<a class="w-delivery-bag_link" target="_blank" href="http://chelseapub.leclick.ru/" onclick="ym(53115304,'reachGoal','dst-chelsea');return true;">
			<img src="https://chelsea-pub.ru/wp-content/uploads/2021/08/chelsea-logo.jpg" class="w-delivery-bag__icon_delivery" height="30">
		</a>-->
	   </div>
	</div>

	  <a class="delivery--new w-delivery__text-link" target="_blank" href="https://chelsea-pub-menu.ru/" onclick="ym(53115304,'reachGoal','dst-delivery');return true;"><div class="w-delivery__text">
		  Доставка
		  </div>
	  </a>
		  
<!-- route start -->
<style>

</style>
        <div class="wstd-route js-routeMain">
          <div class="wstd-route__btn js-routeBtn">
            <svg class="svg-inline--fa fa-map-marker-alt fa-w-12 wstd-route__btn-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg>
            <h4 class="wstd-route__btn-title"><?=pll__('Как добраться?');?></h4>
          </div>
          <div class="wstd-route__container js-overlayLayout">
            <!-- Первый блок с выбором карт или такси -->
            <nav class="wstd-route__maps js-routeMaps">
              <a class="wstd-route__routes-item js-mapsItemYandex">
				  <svg class="svg-inline--fa fa-yandex fa-w-8 wstd-route__maps-icon wstd-route__maps-icon_yandex" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="yandex" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M153.1 315.8L65.7 512H2l96-209.8c-45.1-22.9-75.2-64.4-75.2-141.1C22.7 53.7 90.8 0 171.7 0H254v512h-55.1V315.8h-45.8zm45.8-269.3h-29.4c-44.4 0-87.4 29.4-87.4 114.6 0 82.3 39.4 108.8 87.4 108.8h29.4V46.5z"></path></svg>
                <h5 class="wstd-route__maps-title"><?=pll__('Яндекс карты');?></h5>
              </a>
              <a class="wstd-route__routes-item js-mapsItemGoogle">
                <svg class="svg-inline--fa fa-google fa-w-16 wstd-route__maps-icon wstd-route__maps-icon_google" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512" data-fa-i2svg=""><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                <h5 class="wstd-route__maps-title"><?=pll__('Google карты');?></h5>
              </a>
              <a class="wstd-route__routes-item js-mapsItemTaxi">
                <svg class="svg-inline--fa fa-taxi fa-w-16 wstd-route__maps-icon wstd-route__maps-icon_taxi" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="taxi" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M462 241.64l-22-84.84c-9.6-35.2-41.6-60.8-76.8-60.8H352V64c0-17.67-14.33-32-32-32H192c-17.67 0-32 14.33-32 32v32h-11.2c-35.2 0-67.2 25.6-76.8 60.8l-22 84.84C21.41 248.04 0 273.47 0 304v48c0 23.63 12.95 44.04 32 55.12V448c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h256v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-40.88c19.05-11.09 32-31.5 32-55.12v-48c0-30.53-21.41-55.96-50-62.36zM96 352c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm20.55-112l17.2-66.36c2.23-8.16 9.59-13.64 15.06-13.64h214.4c5.47 0 12.83 5.48 14.85 12.86L395.45 240h-278.9zM416 352c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"></path></svg>
                <h5 class="wstd-route__maps-title"><?=pll__('Такси');?></h5>
              </a>
            </nav>

            <!-- Второй блок с выбором вида направления -->
            <nav class="wstd-route__routes js-routeRoutes">
                <span class="wstd-route__back js-routeBack"><!--<i class="fas fa-arrow-left"></i>--><?=pll__('назад');?></span>
                <a class="wstd-route__routes-item js-routeCoord" data-mod-y = "auto" data-mod-g = "driving">
                  <svg class="svg-inline--fa fa-car fa-w-16 wstd-route__routes-icon wstd-route__routes-icon_car" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="car" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M499.99 176h-59.87l-16.64-41.6C406.38 91.63 365.57 64 319.5 64h-127c-46.06 0-86.88 27.63-103.99 70.4L71.87 176H12.01C4.2 176-1.53 183.34.37 190.91l6 24C7.7 220.25 12.5 224 18.01 224h20.07C24.65 235.73 16 252.78 16 272v48c0 16.12 6.16 30.67 16 41.93V416c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h256v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-54.07c9.84-11.25 16-25.8 16-41.93v-48c0-19.22-8.65-36.27-22.07-48H494c5.51 0 10.31-3.75 11.64-9.09l6-24c1.89-7.57-3.84-14.91-11.65-14.91zm-352.06-17.83c7.29-18.22 24.94-30.17 44.57-30.17h127c19.63 0 37.28 11.95 44.57 30.17L384 208H128l19.93-49.83zM96 319.8c-19.2 0-32-12.76-32-31.9S76.8 256 96 256s48 28.71 48 47.85-28.8 15.95-48 15.95zm320 0c-19.2 0-48 3.19-48-15.95S396.8 256 416 256s32 12.76 32 31.9-12.8 31.9-32 31.9z"></path></svg>
                  <h5 class="wstd-route__routes-title"><?=pll__('На личном транспорте');?></h5>
                </a>
                <a class="wstd-route__routes-item js-routeCoord" data-mod-y = "mt" data-mod-g = "transit">
                  <svg class="svg-inline--fa fa-bus fa-w-16 wstd-route__routes-icon wstd-route__routes-icon_bus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M488 128h-8V80c0-44.8-99.2-80-224-80S32 35.2 32 80v48h-8c-13.25 0-24 10.74-24 24v80c0 13.25 10.75 24 24 24h8v160c0 17.67 14.33 32 32 32v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h192v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h6.4c16 0 25.6-12.8 25.6-25.6V256h8c13.25 0 24-10.75 24-24v-80c0-13.26-10.75-24-24-24zM112 400c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm16-112c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h256c17.67 0 32 14.33 32 32v128c0 17.67-14.33 32-32 32H128zm272 112c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"></path></svg>
                  <h5 class="wstd-route__routes-title"><?=pll__('На общественном транспорте');?></h5>
                </a>
                <a class="wstd-route__routes-item js-routeCoord" data-mod-y = "pd" data-mod-g = "walking">
                  <svg class="svg-inline--fa fa-walking fa-w-10 wstd-route__routes-icon wstd-route__routes-icon_walking" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="walking" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M208 96c26.5 0 48-21.5 48-48S234.5 0 208 0s-48 21.5-48 48 21.5 48 48 48zm94.5 149.1l-23.3-11.8-9.7-29.4c-14.7-44.6-55.7-75.8-102.2-75.9-36-.1-55.9 10.1-93.3 25.2-21.6 8.7-39.3 25.2-49.7 46.2L17.6 213c-7.8 15.8-1.5 35 14.2 42.9 15.6 7.9 34.6 1.5 42.5-14.3L81 228c3.5-7 9.3-12.5 16.5-15.4l26.8-10.8-15.2 60.7c-5.2 20.8.4 42.9 14.9 58.8l59.9 65.4c7.2 7.9 12.3 17.4 14.9 27.7l18.3 73.3c4.3 17.1 21.7 27.6 38.8 23.3 17.1-4.3 27.6-21.7 23.3-38.8l-22.2-89c-2.6-10.3-7.7-19.9-14.9-27.7l-45.5-49.7 17.2-68.7 5.5 16.5c5.3 16.1 16.7 29.4 31.7 37l23.3 11.8c15.6 7.9 34.6 1.5 42.5-14.3 7.7-15.7 1.4-35.1-14.3-43zM73.6 385.8c-3.2 8.1-8 15.4-14.2 21.5l-50 50.1c-12.5 12.5-12.5 32.8 0 45.3s32.7 12.5 45.2 0l59.4-59.4c6.1-6.1 10.9-13.4 14.2-21.5l13.5-33.8c-55.3-60.3-38.7-41.8-47.4-53.7l-20.7 51.5z"></path></svg>
                  <h5 class="wstd-route__routes-title"><?=pll__('Пешком');?></h5>
                </a>
            </nav>

            <!-- Второй блок с выбором вида направления -->
            <nav class="wstd-route__taxi js-routeTaxi">
                <span class="wstd-route__back js-routeBack"><!--<i class="fas fa-arrow-left"></i>--><?=pll__('назад');?></span>
                <a class="wstd-route__routes-item js-routeCoord js-taxiYandex" target="_blank">
                  <svg class="svg-inline--fa fa-car fa-w-16 wstd-route__routes-icon wstd-route__routes-icon_car" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="car" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M499.99 176h-59.87l-16.64-41.6C406.38 91.63 365.57 64 319.5 64h-127c-46.06 0-86.88 27.63-103.99 70.4L71.87 176H12.01C4.2 176-1.53 183.34.37 190.91l6 24C7.7 220.25 12.5 224 18.01 224h20.07C24.65 235.73 16 252.78 16 272v48c0 16.12 6.16 30.67 16 41.93V416c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h256v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-54.07c9.84-11.25 16-25.8 16-41.93v-48c0-19.22-8.65-36.27-22.07-48H494c5.51 0 10.31-3.75 11.64-9.09l6-24c1.89-7.57-3.84-14.91-11.65-14.91zm-352.06-17.83c7.29-18.22 24.94-30.17 44.57-30.17h127c19.63 0 37.28 11.95 44.57 30.17L384 208H128l19.93-49.83zM96 319.8c-19.2 0-32-12.76-32-31.9S76.8 256 96 256s48 28.71 48 47.85-28.8 15.95-48 15.95zm320 0c-19.2 0-48 3.19-48-15.95S396.8 256 416 256s32 12.76 32 31.9-12.8 31.9-32 31.9z"></path></svg>
                  <h5 class="wstd-route__routes-title"><?=pll__('Яндекс');?></h5>
                </a>
                <!--<a class="wstd-route__routes-item js-routeCoord js-taxiUber" target="_blank">
                  <i class="fas fa-car wstd-route__routes-icon wstd-route__routes-icon_car"></i>
                  <h5 class="wstd-route__routes-title">Uber</h5>
                </a>
                <a class="wstd-route__routes-item js-routeCoord js-taxiGett" target="_blank">
                  <i class="fas fa-car wstd-route__routes-icon wstd-route__routes-icon_car"></i>
                  <h5 class="wstd-route__routes-title">Get</h5>
                </a>-->
                <!-- <span class="wstd-route__scroll">cкролл</span> -->
            </nav>
          </div>
        </div>
        <!-- route end -->

<style>
	.announce-popup {
	display: none;
	pointer-events: none;
	opacity: 0;
	position:fixed;
	top: 0;
	left: 0;
		bottom: 0;
	width: 100%;
	height:100%;
		max-height: 100vh;
	z-index: 99;
	padding: 16px;
	transition: all 0.2s ease-in-out;
		overflow-y: auto;
		overscroll-behavior: contain;
	}
	.announce-popup.active {
		display:grid;
		place-items:center;
		opacity: 1;
		pointer-events: all;
	}
	.announce-popup-bg {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%; 
		height:100%;
		background-color: rgba(0, 0, 0, 0.45);
		z-index: 0;
		backdrop-filter: blur(5px);
	}
.announce-popup__wrapper{
	width: 648px;
	background-color: #FFFFFF;
	padding: 40px 32px 32px;
	max-width: 100%;
    max-height: 100%;
	background-image: url(../images/modal-template-bg.jpg);
	position:relative;
	z-index:1;
}
	/*@media(max-width: 768px) {*/
	/*	.announce-popup__wrapper {*/
	/*		max-width: 43vw;*/
	/*		width: 100%;*/
	/*	}*/
	/*}*/
	@media(max-width: 720px) {
		.announce-popup__wrapper {
			max-width: 644px;
			width: 100%;
		}
	}
.announce-popup__close{
	cursor: pointer;
	position: absolute;
    top: 0;
    right: 0;
    outline: none;
}
	.announce-template__box{
		display:flex;
		flex-direction: column;
		align-items:center;
	}
	.announce-template__box .image-full_width {
		width: 100%;
		height: 40vh;
		object-fit: contain;
	}
	.announce-template__title{
	    width: 100%;
    font-family: "Oswald", sans-serif;
    font-size: 3rem;
    line-height: 1;
    font-weight: 500;
    text-align: center;
    padding: 8px 0;
    border-top: 1px solid rgba(1, 15, 20, 0.45);
    border-bottom: 1px solid rgba(1, 15, 20, 0.45);
    margin-bottom: 16px;
    text-transform: uppercase;	
	}
	@media(max-width: 1440px) {
		.announce-template__title {
			font-size: 2.5rem;
		}
	}
	.announce-template__info{
		display: flex;
		flex-direction: column;
		text-align: center;
		align-items: center;
	}
	.announce-template__subtitle{
		width: 100%;
    font-family: "Oswald", sans-serif;
    font-size: 1.375rem;
    line-height: 1;
    font-weight: 500;
    text-align: center;
    margin-bottom: 16px;
    text-transform: uppercase;
	}
	.announce-template__info-text{
		text-indent: 16px;
	margin-bottom: 24px;
	}
	.announce-template__heading{
		position: relative;
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
-webkit-box-align: center;
-ms-flex-align: center;
align-items: center;
font-family: "Merriweather", serif;
font-size: 1.125rem;
text-transform: uppercase;
	}
	.announce-template__footer{
		margin-top: 22px;
padding: 16px 0 0;
border-top: 1px solid rgba(1, 15, 20, 0.45);
text-align: right;
font-family: "Oswald", sans-serif;
font-size: 0.75rem;
font-weight: 500;
	}
	.announce-template__heading span{
	z-index: 1;	
	}
	.announce-template__heading span:last-child {
  font-size: 2rem;
		font-weight: 700;}
	
	.announce-template__heading img{
		position: absolute;
top: -24px;
left: 50%;
-webkit-transform: translateX(-50%);
-ms-transform: translateX(-50%);
transform: translateX(-50%);
	}
</style>

<div class="announce-popup" id="announcePopup">
	<div class="announce-popup-bg js-announce-popup__close"></div>
	<div class="announce-popup__wrapper">
		<button class="announce-popup__close js-announce-popup__close">
			<img alt="close" title="close" src="https://chelsea-pub.ru/wp-content/themes/chelsea/assets/images/modal-close.png">
		</button>
		<div class="announce-template__heading">
			<img alt="ChelseaPub" title="ChelseaPub" src="https://chelsea-pub.ru/wp-content/themes/chelsea/assets/images/modal-logo.svg">
			<span>the</span><span>Сhelsea Times</span>
		</div>
		<h2 class="announce-template__title">Stand Up Концерт</h2>
		<h3 class="announce-template__subtitle">Дмитрий Романов</h3>
		<div class="announce-template__box">
		<div>
			<img class="image-full_width" src="https://chelsea-pub.ru/wp-content/uploads/2022/01/Frame-68-2.png">
			<div class="announce-template__info">
			<p class="announce-template__info-text">29 января в 20:00 состоится концерт стендап комика Дмитрия Романова. Новая программа «Selfmade».</p>   
				<button class="button button_accent header__booking" data-modal-target="order-small">Забронировать</button>
		</div>
	</div>
	<div class="announce-template__footer">
		<span>Малый Гнездниковский пер. 12/27</span>
		<a href="tel:+7 495 885-71-24">+7 495 885-71-24</a>
	</div>
</div>
	</div>
<script>
	let popupAnnounce = document.getElementById("announcePopup");
	function openAnnouncePopUp() {
		popupAnnounce.classList.add("active")
	}
	
let closeAnnounceButton = document.querySelectorAll(".js-announce-popup__close");
	
closeAnnounceButton.forEach(button => {
		button.addEventListener("click", function(){
			popupAnnounce.classList.remove("active")
		})
	})
	
// if (!sessionStorage.getItem('startTime')) {
// 	openAnnouncePopUp();
//   sessionStorage.setItem('startTime', Date.now());
// }

// const enterTime = sessionStorage.getItem('startTime')

// const showPopup = () => {
//   let currentTime = Date.now()
//   let spentTime = (currentTime - enterTime) / 1000
//   if (spentTime >= 120) {
//     clearInterval(timer)
//   }
// }

// const timer = setInterval(openAnnouncePopUp, 10000)
window.onload = function () {
	if(localStorage.getItem('popState') != 'shown'){
		    setTimeout(openAnnouncePopUp,50);
		    localStorage.setItem('popState','shown')
		}
}

window.addEventListener("load", function(e){
	if (!sessionStorage.getItem('startTime')) {
		openAnnouncePopUp();
		sessionStorage.setItem('startTime', "1");
	}
})


</script>

</div> <!--.page-->
        <?wp_footer(); ?>

        <script>
            const CURRENT_LANG = "<?=CURRENT_LANG?>";
        </script>

        <?loadBlock('modals');?>

        <?loadBlock('interactive_menu_block');?>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/ru.js"></script>
        <script src="<?=THEME_URL?>/assets/js/libs.min.js"></script>
        <script src="<?=THEME_URL?>/assets/js/main.js"></script>

        <script async src="<?=THEME_URL?>/assets/js/custom.js"></script>

    </body>
</html>
<?ob_end_flush();?>
