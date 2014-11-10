$(document).ready(function(){
    /**
     *
     * @param $btn
     * @param $content
     */
    $(function() {
        var home_slideheader = $('#home-slideheader');
        if(home_slideheader.length > 0){
            home_slideheader.owlCarousel({

                itemsDesktop : [1599,1],
                itemsDesktopSmall : [980,1],
                navigation : true,
                pagination : false,
                responsive: true,
                autoPlay : 3000,
//                slideSpeed : 2000,

//                paginationSpeed : 3000,
//                goToFirstSpeed : 3000,
                singleItem : true,
                autoHeight : true,
                transitionStyle:"fade"
            });
        }

    });

    $(function() {
        var footerslide = $('#footer-slide');
        if(footerslide.length > 0){
            footerslide.owlCarousel({

                itemsDesktop : [1700,7],
                itemsDesktopSmall : [980,7],
                navigation : true,
                pagination : false,
//                responsive: true,
                autoPlay : 3000,
                slideSpeed : 2000,
//
//                paginationSpeed : 3000,
//                goToFirstSpeed : 3000,
//                singleItem : true,
//                autoHeight : true,
                transitionStyle:"fade"
            });
        }

    });

    $('.openpopover').popover({
        trigger: 'focus',
        html: true
    })

    $("* [rel='tooltiptop']").tooltip({
       html: true, 
       placement: 'top'
    }); 

    $("* [rel='tooltipbottom']").tooltip({
       html: true, 
       placement: 'bottom'
    }); 
    
    $("* [rel='tooltipleft']").tooltip({
       html: true, 
       placement: 'left'
    });
    
    $("* [rel='tooltipright']").tooltip({
       html: true, 
       placement: 'right'
    });


    $(window).on('load', function () {
        $('.selectpicker').selectpicker({
            'selectedText': 'cat'
        });
    });

    $(function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker2" ).datepicker();
    });




    
      
}); 

