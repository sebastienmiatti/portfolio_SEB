jQuery(document).ready(function () {

    //Preloader active
    jQuery(window).load(function () {
        jQuery(".loaded").fadeOut();
        jQuery(".preloader").delay(1000).fadeOut("slow");
    });

    // sidenav navbar nav
    jQuery(".button-collapse").sideNav();


    // localScroll js
    jQuery(".navbar-desktop").localScroll();

    // Counter
    jQuery('.statistic-counter').counterUp({
        delay: 10,
        time: 2000
    });

    // Mixitube
    jQuery('#mixcontent').mixItUp({
        animation: {
            animateResizeContainer: false,
            effects: 'fade rotateX(-45deg) translateY(-10%)'
        }
    });

    // MagnificPopup
    jQuery('.gallery-img').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
    });

    // Home slider
    jQuery('.slider').slider({full_width: true});

    // client slider
    jQuery('.carousel').carousel();

    // accordion

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function () {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }

    // nav menu small menu
    jQuery(document).on("scroll", function () {
        if ($(document).scrollTop() > 120) {
            $("nav").addClass("small");
        } else {
            $("nav").removeClass("small");
        }
    });


});

 // Création de l'animation concernant les titres de compétences (personalisation depuis codepen)
var flicker = {
    /*unicode : "!\"#$%'()*+,-./0123456789:;?@`aAbBcCdDeEfFgGhHijJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ{[|\}]~^_",*/
    unicode : "█▓▒░█▓▒░█▓▒░dD░iI░░xX░░cC░▓uUyY▓▓░lL░░aA░░░rR░░░░░\\\|||░░░░//////",
    getRandomInt : function(min, max) {
        console.log(min+" "+max);
        console.log('weee');
        return Math.floor(Math.random() * (max - min + 80)) + min;
    },
    randomCharacter : function(){
        return this.unicode[Math.floor(Math.random()*this.unicode.length)];
    },
    replaceAt : function(text, character, index){
        return text.substr(0, index) + character + text.substr(index+character.length);
    },
    init : function(el,min,max, delay){

        var str = $(el).text().trim(),
        bank = [],
        done = 1,
        newStr = $(el).text().trim();


        for (var i = 0; i<str.length; i++){
            bank[i] = this.getRandomInt(min, max);
        }
        flicker.mix(el, str, newStr, done,bank, delay);

    },
    mix : function(el, str, newStr, done, bank, delay){
        for (var i = 0; i<str.length; i++){


            if (bank[i]!=0){
                done = 0;
                if (str[i]!=" "){
                    newStr = this.replaceAt(newStr,  this.randomCharacter(),
                    i);
                }else{
                    newStr = this.replaceAt(newStr,  " ",
                    i);
                }
                bank[i]--;
            }else{
                newStr = this.replaceAt(newStr, str[i],
                    i);
                }
            }

            $(el).text(newStr).fadeIn(1000);
            //console.log(bank);
            if (done==0){
                setTimeout(function(){
                    flicker.mix(el, str, newStr, done,bank, delay);
                }, delay);
            }
        }
    };



// début de l'animation .flickr au moment prédéfini
var waypoint = new Waypoint({
  element: document.getElementById('competences'),
  handler: function() {
      $.each($('.flickr'), function(){

             var cible = this
             flicker.init(cible,1,10, 50);
         })
  },
  offset:800
})

// offsetValue = 400;
// $('body').data().scrollspy.options.offset = offsetValue;
// // force scrollspy to recalculate the offsets to your targets
// $('body').data().scrollspy.process();

    // $(function(){
    //     flicker.init("h2.flickr",1,10, 50);
    //
    //
    // });

    // if ($(document).scrollTop() > 120) {
    //     $("nav").addClass("small");
    // } else {
    //     $("nav").removeClass("small");
    // }
// jQuery(document).on("scroll", function () {
//     $.each($('.flickr'), function(){
//         var posComp = $("#joinus").position().top
//         // console.log(posComp);
//         var cible = this
//         console.log($(this).scrollTop());
//         if ($(document).scrollTop() >= posComp){
//             // console.log('hello');
//             // console.log([this]);
//             flicker.init(cible,1,10, 30);
//             return;
//         }
//     })
// })
//
// document.addEventListener('DOMContentLoaded', function(){
//     let banner = document.getElementById('banner-wrapper');
//     let devLayer = banner.querySelector('.dev');
//     let delta = 0;
//
//     banner.addEventListener('mousemove', function(e){
//         delta = (e.clientX - window.innerWidth / 2) * 0.5;
//         devLayer.style.width = e.clientX + 500 + delta + 'px';
//     });
// })
