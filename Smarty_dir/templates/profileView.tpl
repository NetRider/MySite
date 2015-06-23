<style is="custom-style">
#paperDrawerPanel [main] {
  background-color: var(--google-grey-100);
  height: 100%;
}

</style>

<paper-drawer-panel id="paperDrawerPanel">
  <div drawer>
    <!-- Drawer Toolbar -->
    <paper-toolbar id="drawerToolbar">
      <span class="paper-font-title">Menu</span>
    </paper-toolbar>

    <paper-menu class="list" selected=0>

      <div sel=0 onclick="clickHandlerDrawer(event)">
        <iron-icon icon="account-circle"></iron-icon>
        <span>Profilo</span>
      </div>

      <div sel=1 onclick="clickHandlerDrawer(event)">
        <iron-icon icon="create"></iron-icon>
        <span>Scrivi Articolo</span>
      </div>

      <div sel=2 onclick="clickHandlerDrawer(event)">
        <iron-icon icon="create"></iron-icon>
        <span>Scrivi Progetto</span>
      </div>

      <div sel=3 onclick="clickHandlerDrawer(event)">
        <iron-icon icon="work"></iron-icon>
        <span>I tuoi lavori</span>
      </div>

      <div>
        <a href="index.php">
          <iron-icon src="Smarty_dir/templates/img/electronic-icons.png"></iron-icon>
          <span>HomePage</span>
        </a>
      </div>

    </paper-menu>
  </div>

  <div main class="fullbleed layout vertical">
    <template is="dom-bind">
      <neon-animated-pages id="pages" class="flex" selected="[[selected]]" entry-animation="[[entryAnimation]]" exit-animation="[[exitAnimation]]">

        <neon-animatable>
          <paper-toolbar class="writeToolbar">
            <div>Profilo</div>
          </paper-toolbar>
          <div class="vertical layout center">
            <img id="profileImg" src="Data/profile_images/{$userimage}"></img>
          </div>
        </neon-animatable>

        <neon-animatable class="fullbleed layout vertical">
          <paper-scroll-header-panel class="flex">
            <paper-toolbar class="writeToolbar">
              <div>Scrivi il tuo articolo</div>
            </paper-toolbar>
            <div class="vertical layout">
              <form id="articleForm" method="POST" action="index.php?controllerAction=ArticleController&ArticleAction=addNewArticle">
                <paper-input name="title" label="Titolo"></paper-input>
                <paper-input name="description" label="Aggiungi una descrizione"></paper-input>
                <textarea name="textArticle" id="editor1" rows="10" cols="80">
                  Inizia a scrivere
                </textarea>
                <input type="text" name="userID" value="{$userid}" hidden>
                <paper-button class="profileSave" onclick="saveArticle()">Save</paper-button>
                <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
                </script>
              </form>
            </div>
          </paper-scroll-header-panel>
        </neon-animatable>

        <neon-animatable class="layout vertical">
          <paper-scroll-header-panel class="flex">
            <paper-toolbar class="writeToolbar">
              <div>Scrivi il tuo progetto</div>
            </paper-toolbar>
            <form  id="projectForm" class="vertical layout flex"  method="POST" action="index.php?controllerAction=ProjectController&ProjectAction=addNewProject">
              <paper-input name="title" label="Titolo"></paper-input>
              <paper-input name="description" label="Aggiungi una descrizione"></paper-input>
              <textarea name="textProject" id="editor2" rows="10" cols="80">Inizia a scrivere</textarea>
              <input type="text" name="userID" value="{$userid}" hidden>
              <paper-button class="profileSave" onclick="saveProject()">Save</paper-button>
              <script>
              // Replace the <textarea id="editor1"> with a CKEditor
              // instance, using default configuration.
              CKEDITOR.replace( 'editor2' );
              </script>
            </form>
          </paper-scroll-header-panel>
        </neon-animatable>

        <neon-animatable class="layout vertical">
            <paper-scroll-header-panel class="flex">
          <paper-toolbar class="writeToolbar">
            <div>I tuoi lavori</div>
          </paper-toolbar>
          <div id="userWorks">
              <h2>I tuoi articoli</h2>
              {foreach $articles as $article}
                <paper-item>
                    <span class="flex">{{$article.title}}</span>
                    <paper-icon-button icon="delete"></paper-icon-button>
                    </paper-item>
                {/foreach}

                <h2>I tuoi progetti</h2>
                {foreach $projects as $project}
                <paper-item>
                    <span class="flex">{{$project.title}}</span>
                    <paper-icon-button icon="delete"></paper-icon-button>
                </paper-item>
                {/foreach}
            </paper-scroll-header-panel>
        </div>
        </neon-animatable>

      </neon-animated-pages>
    </template>
  </div>
</paper-drawer-panel>

<script>
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
  Polymer.dom(event).localTarget.parentElement.submit();
}

function onMenuSelect() {
  console.log("ciao")
}

function addDependencies(event) {
  var dependeciesValue = ($(Polymer.dom(event).localTarget).text());
  $('#contentDependencies').append('<paper-item onclick="removeDependencies(event)">'+ dependeciesValue +'</paper-item>');
}

function removeDependencies(event) {
  $(Polymer.dom(event).localTarget).remove();
}

</script>
