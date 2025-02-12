
jQuery(($) => {
   
    if($('.slides').length > 0) {
        const numSlides = $('.slide').length - 1;
        
        let currentSlide = 0;

        $('.slide').eq(currentSlide).addClass('active');

        setInterval(() => {
            currentSlide ++;
            
            if(currentSlide == numSlides) {
                currentSlide = 0;
            }

            $('.active').removeClass('active');
            $('.slide').eq(currentSlide).addClass('active');
        },10000)
    }
} )





