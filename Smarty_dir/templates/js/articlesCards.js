$(document).ready( function() {

    var page = 1;
    var template;
    var scrollable = true;

    /*Inizializzo il div che conterrà le cards con l'oggetto mansoryLayout
    itemSelector sono i div che il mansory andrà ad incastrare, in particolare quindi
    tutti quelli con la classe ".grid-itme". Il grid-sizer è un div che mi da la larghezza
    colonna. In questo posso fare un design responsive.
     */
    var $container = $('#mansoryContainer').masonry({
      itemSelector: '.grid-item',
      columnWidth: '.grid-sizer',
      gutter: 20,
      percentPosition: true
    });

    //Tiro giù il template dal server delle cards
    $.ajax({
        url: "HandlebarsTemplates/articlecard.handlebars",
        type: 'POST',
    }).done(function(data) {
        //lo compilo con Handlebars e lo metto nella variabile template che poi utilizzerò
        //per associare i dati
        template = Handlebars.compile(data);
        //a questo punto mi servono i dati delle cards. Quindi devo sapere a che pagina mi trovo
        //e passarla alla funzione come parametro. Passo alla funzione anche il template. La
        //funzione ritorna una promise quindi posso applicare la funzione then per aspettare che
        //tutti i dati sono arrivati dal server
        aggiungiCards(page, template).then(function(cards){
            $container.masonryImagesReveal(cards);
        });
    });

    $(window).scroll(function() {
        //Ogni volta che l'utente fa uno scroll controlla se è "quasi" arrivato alla fine della
        //pagina. In questo modo un attimo prima aggiunge le ulteriori cards. Se l'ultima volta
        //che ho fatto una richiesta di dati non ho ricevuto nulla disattiva questa funzione.
        if(scrollable)
        {
            if($(window).scrollTop() + $(window).height() > $(document).height() - 150) {
                //Se sono arrivato alla fine vuol dire che voglio altre cards, quelle di una "immaginaria"
                //pagina successiva
                page = page + 1;
                console.log(page);
                aggiungiCards(page, template).then(function(cards){
                    //a questo punto devo controllare se ci sono effetteviamente altre cards
                    if(cards)
                        $container.masonryImagesReveal(cards);
                    else
                    {
                        scrollable = false;

                    }
                });
            }
        }
    });
});

function aggiungiCards(page, template) {
    //ho iniziato il calcolo mostro lo spinner
    //$("#spinner").show();
    //istanzio una Promise e la ritorno.
    return new Promise(function(resolve, reject) {
        var cards = "";
        //tiro giù ti dati dal server
        return $.ajax({
            url: "index.php?controller=Article&task=getArticlesCardsByPage&page=" + page,
            type: 'POST',
        }).done(function(data) {
            var cardsData = JSON.parse(data);
            //potrei non avere più cards da far vedere
            if(!jQuery.isEmptyObject(cardsData))
            {
                //creo la stringa html completa per tutte cards
                $.each(cardsData, function(i, cardData) {
                    var html = template(cardData);
                    cards += html;
                });
                resolve(cards);
            }
            else
                resolve(false);
        });
    });
}

$.fn.masonryImagesReveal = function(cards) {
    //accedo al div che conterrà le cards a cui è stato associato un oggetto "masonry".
    //Mi servirà in seguito perché oltre ad aggiungere le cards al div contenitore le
    //aggiungo anche all'oggetto msnry che sarà poi responsabile del posizionamento.
    var msnry = this.data('masonry');
    //selezionio tutti gli elementi che hanno la classe div .grid-item, cioè il div
    //che contiene la card vera e propria
    var itemSelector = msnry.options.itemSelector;
    //trasformo la stringa cards in un oggetto JQuery.
    cards = $(cards);
    //nascondo le cards per default perché devo ancora caricare le imamgini
    cards.hide();
    //le appendo al container (non visibili)
    this.append( cards );
    //la funzione imagesLoaded() va applicata al container con le immagini
    cards.imagesLoaded().progress( function( imgLoad, image ) {
        document.getElementById("spinner").style.display = "block";

        console.log("progress");
        // get item
        // image is imagesLoaded class, not <img>, <img> is image.img
        var $card= $( image.img ).parents( itemSelector );
        // un-hide item
        $card.show();
        //Le aggiungo anche all'oggetto msnry. In questo modo l'immagine è stata caricata
        //quindi il mansory layout può fare i calcoli sulle vere dimensioni della cards
        //e non ho più i problemi di overlapping
        msnry.appended( $card );
    })
    .always(function() {
        console.log("always");
        //non capirò mai perché con jquery.hide non funzionava
        document.getElementById("spinner").style.display = "none";
    });
    return this;
};
