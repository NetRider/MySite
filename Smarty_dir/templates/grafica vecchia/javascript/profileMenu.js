function gestioneClick(event) {
  	var id = event.target.parentElement.getAttribute('dialog');
  	var dialog = document.getElementById(id);
	dialog.toggle();
}

//in questo script uso congiuntamente le funzioni javascript di polymer e le funzioni di jquery
//questo perché non voglio rinunciare alla potenza grafica di polymer pure essendo buggato

//The querySelector() method returns the first element that matches a specified CSS selector(s) in the document.
var scope = document.querySelector('template[is="dom-bind"]');
scope.selected = 0;

function clickHandlerDrawer(event) {
  var toSelect = ($(Polymer.dom(event).localTarget).attr('sel'));

  if(toSelect > scope.selected) {
    scope.entryAnimation = 'slide-from-right-animation';
    scope.exitAnimation = 'slide-left-animation';
    scope.selected = toSelect;

  }else if(toSelect < scope.selected){
    scope.entryAnimation = 'slide-from-left-animation';
    scope.exitAnimation = 'slide-right-animation';
    scope.selected = toSelect;
  }
}

function saveArticle() {
    Polymer.dom(event).localTarget.parentElement.submit();
}

function saveProject() {

    var form = document.getElementById("projectForm");
    var formData = new FormData(form);
    var arrayDependency = [];

    $('#articlesAddedToDipendency').children('paper-item').each(function () {
        arrayDependency.push(this.getAttribute('value'));
    });

    formData.append("idDependencies", JSON.stringify(arrayDependency));

    $.ajax({
		    url: 'index.php?controller=Project&task=addNewProject',
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false}).done(function(data) {

	});
}

//Attraverso JQuery capisco quale elemento ho cliccato e lo aggiungo alla lista
//articlesAddedToDipendency insieme al valore dell'Id. Inoltre rimuovo il valore dalla lista
//listArticles in questo modo l'utente non può sbagliare e aggiungerli di nuovo.
function addDependencies(event) {
    var dependencyTitle = $(event.target).text();
    var dependencyId = event.target.getAttribute("value");
    $(event.target).remove();
    $('#articlesAddedToDipendency').append('<paper-item value="' + dependencyId + '"onclick="removeDependencies(event)">'+ dependencyTitle +'</paper-item>');
}

//L'utente può decidere di rimuovere l'articolo aggiunto alle dipendenze. In questo caso viene rimosso
//dalla lista articlesAddedToDipendency e riaggiunto alla lista articles
function removeDependencies(event) {
    var dependencyTitle = $(event.target).text();
    var dependencyId = event.target.getAttribute("value");
    $(event.target).remove();
    $('#listArticles').append('<paper-item value="' + dependencyId + '"onclick="removeDependencies(event)">'+ dependencyTitle +'</paper-item>');
}

function deleteArticle(event) {
    var element = Polymer.dom(event).localTarget;
    var id = element.getAttribute("value");
    var data = new FormData();
    data.append("articleId", id);
    element.parentElement.remove();

    $.ajax({
		    url: 'index.php?controller=Article&task=deleteArticle',
			type: 'POST',
			data: data,
			processData: false,
			contentType: false}).done(function(data) {
	});
}

function deleteProject(event) {
    var element = Polymer.dom(event).localTarget;
    var id = element.getAttribute("value");
    var data = new FormData();
    data.append("projectId", id);
    element.parentElement.remove();

    $.ajax({
		    url: 'index.php?controller=Project&task=deleteProject',
			type: 'POST',
			data: data,
			processData: false,
			contentType: false}).done(function(data) {
	});
}
