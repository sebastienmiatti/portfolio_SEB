/************** Rocket like fcb **************/
.rocket_body{
    width:60px; height:60px;
    background: url('../img/rocket-sprite.png') -28px 0px no-repeat;
}
.rocket_body .fb-like{
    top:20px;
    left:-12px;
}
#rocket_dummy{
    position:absolute; left:20px; top:1000px;
    width:55px; height:55px;
}
#rocket_mobile{
    position:absolute; top:0; margin:85px 0 0 -4px;
    width:60px; height:185px;
}
#rocket_mobile.fixed{position:fixed; top:0;}

#rocket_dock{
    position:absolute; width:28px; height:28px; top:164px; left:12px;
    background:url('../img/rocket-sprite.png') 0 0 no-repeat;
}

#rocket_mobile .rocket_body{
    position:absolute; width:60px; height:60px; top:63px; left:0;
    background:url('../img/rocket-sprite.png') 0 -28px no-repeat;
}

#rocket_mobile .fire{
    position:absolute; width:35px; height:78px;
}
#rocket_mobile .fire.top{
    left:13px; top:3px;
    background:url('../img/rocket-sprite.png') -60px 0 no-repeat;
}
#rocket_mobile .fire.top.on{background-position:-95px 0;}
#rocket_mobile .fire.bottom{
    left:13px; top:104px;
    background:url('../img/rocket-sprite.png') -60px -78px no-repeat;
}
#rocket_mobile .fire.bottom.on{background-position:-95px -78px;}
/************** Rocket like fcb ***************/


<!-- Début fusée -->
<div class="visible-md-block visible-lg-block">
    <div id="rocket_dummy">
        <div id="rocket_dock"></div>
        <div id="rocket_mobile">
            <div class="fire top"></div>
            <div class="fire bottom"></div>
            <div class="rocket_body"><div class="fb-like" data-href="https://www.facebook.com/Matcherunbien/" data-layout="button_count" data-action="like" data-size="small"></div></div>
        </div>
    </div>
</div>
<!-- Fin fusée -->

<script type="text/javascript">
/**
* Animation de la fusée avec Javascript
**/
jQuery(document).ready(function($){
	// Stockage des références des différents éléments dans des variables
	rocket     = $('#rocket_mobile');
	firetop    = $('#rocket_mobile .fire.top');
	firebottom = $('#rocket_mobile .fire.bottom');
	LAST_SCROLL_OFFSET = $(window).scrollTop();
	LAST_SCROLL_TIME   = new Date().getTime();

	// Calcul de la marge entre le haut du document et #rocket_mobile
	fixedLimit = rocket.offset().top - parseFloat(rocket.css('marginTop').replace(/auto/,0));

	// On déclenche un événement scroll pour mettre à jour le positionnement au chargement de la page
	$(window).trigger('scroll');

	$(window).scroll(function(event){
		// Valeur de défilement lors du chargement de la page
		windowScroll = $(window).scrollTop();

		// Mise à jour du positionnement en fonction du scroll
		if( windowScroll >= fixedLimit ){
			rocket.addClass('fixed');
		} else {
			rocket.removeClass('fixed');
		}

		// Animation flammes
		// Allumage
		if( rocket.hasClass('fixed') ){
			if( windowScroll > LAST_SCROLL_OFFSET ){
				// DOWN
				firetop.addClass('on');
				firebottom.removeClass('on');
				LAST_SCROLL_DIRECTION = 'down';
			} else {
				// UP
				firetop.removeClass('on');
				firebottom.addClass('on');
				LAST_SCROLL_DIRECTION = 'up';
			}
		}

		// Arrêt
		setTimeout(function(){
			if( new Date().getTime() - LAST_SCROLL_TIME > 50 ){
				firetop.removeClass('on');
				firebottom.removeClass('on');
				// Animation inertie fusée
				if( rocket.hasClass('fixed') ){
					if( LAST_SCROLL_DIRECTION == 'down' ){
						rocket.animate({
							top: '+=5px'
						}, 50, function(){
							rocket.animate({
								top: '-=5px'
							}, 120);
						});
					} else {
						rocket.animate({
							top: '-=5px'
						}, 50, function(){
							rocket.animate({
								top: '+=5px'
							}, 120);
						});
					}
				}
			}
		},70);

		// Mise à jour variables
		LAST_SCROLL_OFFSET = windowScroll;
		LAST_SCROLL_TIME   = new Date().getTime();
	});
});
</script>
<script src="js/jquery.cookie.js"></script>
<script src="js/app-cookie.js"></script>
