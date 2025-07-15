/*新官网内页js*/
 

// 2020-05-18
$(function(){
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        $('.sem-section,.seo-section').each(function(){
            var offsetTop = $(this).offset().top-400;
            if(scrollTop>=offsetTop){
                $(this).addClass('active');
            } else{
                $(this).removeClass('active');
            }
        })
    });
 
})