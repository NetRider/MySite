<!-- Page Content -->
<div class="container">
    <!-- Page Header -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista Articoli</h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Cards Row -->
    <div class="grid">
        <div class="grid-sizer"></div>
        {foreach $articlesCards as $articleCard}
            <div class="grid-item">
                    <div class="thumbnail">
                    <img class="media-object cardImage" src="{$articleCard.image}" alt="">
                    <div class="caption">
                        <h3>{$articleCard.title}</h3>
                        <p>{$articleCard.description}</p>
                        <p>
                            <a href="index.php?controller=Article&task=getArticleView&Id={$articleCard.id}" class="btn btn-primary">Leggi!</a>
                        </p>
                    </div>
                </div>
            </div>
        {/foreach}
    </div>
    <hr>
</div>
<script>
$(document).ready( function() {

  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    gutter: 20,
    percentPosition: true
  });

});
</script>
