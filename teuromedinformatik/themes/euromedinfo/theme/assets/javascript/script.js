$(document).ready(function() {

    //carousel bas de page home
    if (document.getElementById('carouselServices')) {
        $('#carouselServices').carousel({
            interval: 10000
        });
        $('#carouselServices').on('slid.bs.carousel', function() {
            //alert("slid");
        });
    };

    //carousel page article
    if (document.getElementById('CarouselArticle')) {
        $('#CarouselArticle').carousel({
            interval: false
        })
        $('#CarouselArticle').on('slid.bs.carousel', function() {
            //alert("slid");
        });
    };
}); //ready
