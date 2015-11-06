$(document).ready( function() {

    var page = 1;
    var template;

    var $container = $('.grid').masonry({
      itemSelector: '.grid-item',
      columnWidth: '.grid-sizer',
      gutter: 20,
      percentPosition: true
    });

    $.ajax({
        url: "HandlebarsTemplates/articlecard.handlebars",
        type: 'POST',
    }).done(function(data) {
        template = Handlebars.compile(data);
        aggiungiCards(page, template).then(function(cards){
            $container.masonryImagesReveal(cards);
        });
    });

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
            page = page + 1;
            aggiungiCards(page, template).then(function(cards){
                if(cards.length > 0)
                    $container.masonryImagesReveal(cards);
            });
        }
    });
});

function aggiungiCards(page, template) {
    
    console.log("faccio aggiungiCards");
    //qui scarico i dati di 10 articoli. Ripeto la stessa funzione ogni volta che
    //l'utente fa lo scroll verso il basso e arriva quasi fino al bottom del documento
    return new Promise(function(resolve, reject) {
        var cards = "";
        return $.ajax({
            url: "index.php?controller=Article&task=getArticlesCardsByPage&page=" + page,
            type: 'POST',
        }).done(function(data) {
            var cardsData = JSON.parse(data);
            if(!jQuery.isEmptyObject(cardsData))
            {
                $.each(cardsData, function(i, cardData) {
                    var html = template(cardData);
                    cards += html;
                });
                resolve(cards);
            }
        });
    });
}


$.fn.masonryImagesReveal = function(cards) {
    console.log("masonryImagesReveal");
    var msnry = this.data('masonry');
    var itemSelector = msnry.options.itemSelector;
    cards = $(cards);
    // hide by default
    cards.hide();
    // append to container
    this.append( cards );
    cards.imagesLoaded().progress( function( imgLoad, image ) {
        // get item
        // image is imagesLoaded class, not <img>, <img> is image.img
        console.log(image.img);
        var $card= $( image.img ).parents( itemSelector );
        // un-hide item
        $card.show();
        // masonry does its thing
        msnry.appended( $card );
    });
    return this;
};
