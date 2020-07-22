jQuery(document).ready(function(){
        jQuery(function($){
            let timer = 0 //変数名 timerを定義
            jQuery('.c-button__menu').on('click', function(){
                $("#nav_menu-2, .c-button__close").addClass("is-open");
                //$(".content").addClass("no-scroll"); 
            });
            jQuery('.c-button__close').on('click', function(){
                $("#nav_menu-2, .c-button__close").removeClass( "is-open" );
                //$(".content").removeClass("no-scroll");
            });
            $(window).on("resize", function(){
                let pcWidth = 962;
                if( timer > 0 ){
                    clearTimeout(timer);
                }
                timer = setTimeout( function() {
                    let resizeWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                    if( resizeWidth >= pcWidth){
                        $("#nav_menu-2, .c-button__close").removeClass( "is-open" );
                        //$(".content").removeClass("no-scroll");
                    }
                }, 200 );
            });
        });
})
