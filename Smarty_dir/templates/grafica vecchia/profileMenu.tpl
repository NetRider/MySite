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
              <form id="articleForm" enctype="multipart/form-data" method="POST" action="index.php?controller=Article&task=addNewArticle">
                <paper-input name="title" label="Titolo" required></paper-input>
                <paper-input name="description" class="inputDescription" label="Aggiungi una descrizione" char-counter maxlength="50" required></paper-input>
                <textarea name="articleText" id="editor1" rows="10" cols="80">
                  Inizia a scrivere
                </textarea>
                <input type="text" name="userID" value="{$userid}" hidden>
                <input type="file" name="image">
                <paper-button class="paperButtonConfirm profileSave" onclick="saveArticle()">Save</paper-button>
                <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                </script>
              </form>
          </paper-scroll-header-panel>
        </neon-animatable>

        <neon-animatable class="layout vertical">
          <paper-scroll-header-panel class="flex">
            <paper-toolbar class="writeToolbar">
              <div>Scrivi il tuo progetto</div>
            </paper-toolbar>
            <div class="vertical layout">
            </div>
            <form id="projectForm" enctype="multipart/form-data">
              <paper-input name="title" label="Titolo"></paper-input>
              <paper-input name="description" class="inputDescription" label="Aggiungi una descrizione" char-counter maxlength="50" required></paper-input>
              <textarea name="textProject" id="editor2" rows="10" cols="80">Inizia a scrivere</textarea>
              <input type="text" name="userID" value="{$userid}" hidden>
              <input type="file" name="image">
              <paper-button class="paperButtonAction" dialog="dependenciesDialog" onclick="gestioneClick(event)">Gestisci Dipendenze</paper-button>
              <paper-button class="paperButtonAction" dialog="componentsDialog" onclick="gestioneClick(event)">Gestisci Componenti</paper-button>
              <paper-button class="paperButtonConfirm profileSave" onclick="saveProject()">Save</paper-button>
              <script>
              // Replace the <textarea id="editor2"> with a CKEditor
              // instance, using default configuration.
              CKEDITOR.replace('editor2');
              </script>
            </form>
          </paper-scroll-header-panel>
        </neon-animatable>

        <neon-animatable class="layout vertical">
            <paper-scroll-header-panel class="flex">
          <paper-toolbar class="writeToolbar">
            <div>I tuoi lavori</div>
          </paper-toolbar>
          <div id="userWorks" class="vertical layout">
              <h2>I tuoi articoli</h2>
              {foreach $articles as $article}
                <paper-item>
                    <span class="flex">{{$article.title}}</span>
                    <paper-icon-button icon="delete" value={{$article.idArticle}} onclick="deleteArticle(event)"></paper-icon-button>
                </paper-item>
                {/foreach}

                <h2>I tuoi progetti</h2>
                {foreach $projects as $project}
                <paper-item>
                    <span class="flex">{{$project.title}}</span>
                    <paper-icon-button icon="delete" value={{$project.idProject}} onclick="deleteProject(event)"></paper-icon-button>
                </paper-item>
                {/foreach}
            </paper-scroll-header-panel>
        </div>
        </neon-animatable>

      </neon-animated-pages>
    </template>
  </div>
</paper-drawer-panel>

<paper-dialog id="dependenciesDialog" modal>
    <div id="header">
        <h2>Gestisci le dipendenze</h2>
    </div>
    <div class="horizontal layout">
        <paper-header-panel mode="waterfall">
            <div class="paper-header">Lista articoli</div>
            <div class="content fit" id="listArticles">
                {foreach $articlesDependencies as $articleDependency}
                    <paper-item value="{{$articleDependency.id}}" onclick="addDependencies(event)">
                        {{$articleDependency.title}}
                    </paper-item>
                {/foreach}
            </div>
        </paper-header-panel>

        <paper-header-panel mode="waterfall">
            <div class="paper-header">Articoli del progetto</div>
            <div class="content fit" id="articlesAddedToDipendency">
            </div>
        </paper-header-panel>
    </div>
    <div class="buttons">
        <paper-button class="paperButtonConfirm" dialog-confirm>Ho Finito</paper-button>
    </div>
</paper-dialog>

<paper-dialog id="componentsDialog" modal>
    <div id="header">
        <h2>Gestisci i componenti</h2>
    </div>

    <div class="horizontal layout">

        <paper-header-panel mode="waterfall">
            <div class="paper-header">Lista componenti</div>
            <div class="content fit">
            </div>
        </paper-header-panel>

        <paper-header-panel mode="waterfall">
            <div class="paper-header">Componenti del progetto</div>
            <div class="content fit">
            </div>
        </paper-header-panel>

    </div>
    <div class="buttons">
        <paper-button class="paperButtonConfirm" dialog-confirm>Ho Finito</paper-button>
    </div>
</paper-dialog>

<script src="Smarty_dir/templates/javascript/profileMenu.js"></script>
