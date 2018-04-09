/************** Cookie **************/
.cookie{
    position:fixed;
    left: 0;
    right: 0;
    top: 0;
    padding: 20px 40px;
    color: #666;
    background-color:#f2f2f2;
    border-top:1px solid #e4e4e4;
}
.cookie a{
    text-decoration: underline;
}
.cookie a:hover{
    text-decoration: none;
}
.cookie_btn{
    display:inline;
    margin-left: 15px;
    padding: 4px 10px;
    border-radius: 3px;
    cursor: pointer;
    color: #FFF;
    background-color: #263e5f;
}

.cookie_btn-error{
    background-color: red;
}

/************** Cookies **************/


(function($){

    if( $.cookie('cookiebarre') === undefined ){
        $('body').append('<div class="cookie" id="cookie">En poursuivant votre navigation sur ce site, vous acceptez l\'utilisation de Cookies afin de faciliter et personaliser votre navigation, et d\'analyser le trafic sur ce site,  <em>cf</em> <a href="https://www.cnil.fr/fr/cookies-traceurs-que-dit-la-loi">CNIL</a>, <a href="#">En savoir plus</a><div class="cookie_btn" id="cookie_btn">OK</div></div>');

        $('#cookie_btn').click(function(e){
            e.preventDefault();
            $('#cookie').fadeOut();
            $.cookie('cookiebarre', "viewed", {expires: 30 * 13});
        });

    }

})(jQuery);
