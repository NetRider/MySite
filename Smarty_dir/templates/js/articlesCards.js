$(document).ready( function() {


  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    gutter: 20,
    percentPosition: true
  });

});

$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
       alert("near bottom!");
   }
});
