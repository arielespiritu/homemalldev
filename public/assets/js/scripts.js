/*
 Author: Ukieweb
 Template: Clock (Coming Soon)
 Version: 1.0
 URL: http://themeforest.net/user/UkieWeb
 */


$(document).ready(function(){

    "use strict";


    /*
     ----------------------------------------------------------------------
     Preloader
     ----------------------------------------------------------------------
     */
    $(".loader").delay(400).fadeOut();
    $(".animationload").delay(400).fadeOut("fast");


    /*
     ----------------------------------------------------------------------
     Nice scroll
     ----------------------------------------------------------------------
     */
    $("html").niceScroll({
        cursorcolor: '#fff',
        cursoropacitymin: '0',
        cursoropacitymax: '1',
        cursorwidth: '2px',
        zindex: 999999,
        horizrailenabled: false,
        enablekeyboard: false
    });


    /*
     ----------------------------------------------------------------------
     Watch
     ----------------------------------------------------------------------
     */
    if($.find('#watch')[0]) {

        $('#watch').countDown({
            targetDate: {
                'day': 		25,
                'month': 	12,
                'year': 	2016,
                'hour': 	11,
                'min': 		13,
                'sec': 		0
            },
            omitWeeks: true
        });
        //enter the count down date using the format year, month, day, time: hour, min, sec

    }






}); // End $(document).ready(function(){




















