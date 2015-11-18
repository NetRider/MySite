<?php
/**
 * Project Controller File
 *
 * Questo file contiene il project controller
 *
 * @package Controller
 * @author Matteo Polsinelli
 */
class ProjectController extends Controller {

    /**
	 * Smista le richieste in arrivo dall'ArticleView.
	 */
    public function executeTask()
    {
        switch($this->view->getTask())
        {
            case 'addNewProject':
                return $this->addNewProject();
            break;

            case 'getProjectView':
                return $this->getProjectView();
            break;

            case 'getProjectsCardsPage':
                return $this->getProjectsCardsPage();
            break;

            case 'getProjectsCardsByPage':
                return $this->getProjectsCardsByPage();
            break;

            case 'deleteProject':
                return $this->deleteProject();
            break;
        }
    }

    /**
     * Crea la struttura della pagina che conterrà le cards di tutti i progetti
     *
     * @return string Ritorna il template costruito con smarty
     */
    private function getProjectsCardsPage()
    {
        $this->view->setTemplate('projectsCards');
        return $this->view->getContent();
    }

    /**
     * Costruisce un matrice dove su ogni riga è presente un progetto.
     * Su ogni colonna si trova il titolo, descrizione, id e immagine.
     * I progetti con cui si popolano la matrice dipende dal numero di pagina,
     * fornito dalla view. Si va da un massimo di 10 progetti per pagina a un minimo di 0
     */
    private function getProjectsCardsByPage()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $userMapper = new UserMapper($databaseAdapter);
        $pageNumber = $this->view->getPageNumber();

        $bottomLimit = ($pageNumber - 1) * 10;

        $projects = $projectMapper->getProjectsCardsByPageNumber(array($bottomLimit, 10));

        $data = array();

        if($projects)
        {
            foreach ($projects as $project)
            {
                array_push($data, array("image"=>$project->getImage(), "title"=>$project->getTitle(), "description"=>$project->getDescription(), "id"=>$project->getId()));
            }
        }

        $this->view->responseAjaxCall(json_encode($data));
    }

    /**
     * Crea la pagina adibita per la lettura di un progetto.
     *
     * @return string Ritorna il template costruito con smarty
     */
    private function getProjectView()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $articleMapper = new ArticleMapper($databaseAdapter);
        $commentMapper = new CommentMapper($databaseAdapter);
        $userMapper = new UserMapper($databaseAdapter);

        error_log($this->view->getProjectId());
        $project = $projectMapper->getProjectById($this->view->getProjectId());
        error_log(print_r($project,true));
        $comments = $commentMapper->getCommentsByProjectId($project->getId());
        $projectAuthor = $userMapper->getUserById($project->getAuthorId());

        $dataComments = array();

        if($comments)
        {
            if(is_array($comments))
            {
                foreach ($comments as $comment)
                {
                    $user = $userMapper->getUserByID($comment->getUserId());
                    array_push($dataComments, array("author"=>$user->getUsername(), "image"=>$user->getImage(), "text"=>$comment->getText(), "authorId"=>$user->getId(), "date"=>$comment->getDate()));
                }
            }else {
                $user = $userMapper->getUserByID($comments->getUserId());
                array_push($dataComments, array("author"=>$user->getUsername(), "image"=>$user->getImage(), "text"=>$comments->getText(), "authorId"=>$user->getId(), "date"=>$comments->getDate()));
            }

        }

        $dependencies = $articleMapper->getArticlesDependenciesByProjectId($project->getId());
        $this->view->assignProjectData($project->getId(), $project->getTitle(), $project->getText(), $projectAuthor->getUsername(), $project->getImage(), $project->getDate(), $dataComments, $dependencies);
        $this->view->setTemplate('projectViewer');
        return $this->view->getContent();
    }

    /**
     * Memorizza un progetto nel database
     *
     * Istanzia un progetto con i dati in upload e prova ad inserirlo nel database
     *
     */
    private function addNewProject()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $session = Singleton::getInstance("Session");
        $image = $this->Upload();
        if($image)
        {
            $project = new ProjectEntity($session->getUserId(), $this->view->getProjectTitle(), $this->view->getProjectDescription(), $this->view->getProjectText(), date('o-m-d H:i:s'), $image);
            $dependencies = $this->view->getProjectDependencies();
            $this->view->responseAjaxCall($projectMapper->insertProject($project, $dependencies));
        }
        else
        {
            $this->view->responseAjaxCall(false);
        }
    }

    /**
     * Cancella un progetto dal database
     *
     * Cancella un progetto dal database attraverso l'id. Se l'immagine associata non
     * è quella di default la rimuove dal server
     */
    private function deleteProject()
    {
        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $file = $projectMapper->getProjectImageById($this->view->getProjectToRemove());
        if($file && $file != "Data/projects_images/default_project_image.jpg")
            unlink("/Applications/XAMPP/xamppfiles/htdocs/MySite/".$file);
        $this->view->responseAjaxCall($projectMapper->removeProjectById($this->view->getProjectToRemove()));
    }

    /**
     * Gestisce upload immagine progetto
     *
     * @return string Ritorna il path dell'immagine se tutto è andato bene
     */
    private function Upload()
    {
        $imageUploaded = $this->view->getProjectImage();
        $extensions = array("image/jpeg", "image/jpg", "image/gif", "image/png");
        $type = $imageUploaded['type'];
        $name = $imageUploaded['name'];
        $size = $imageUploaded['size'];

        if(is_uploaded_file($imageUploaded['tmp_name']))
		{
            if($size <= 262144 && in_array($type, $extensions))
            {
                $image = basename($name);
                $target_file = "Data/projects_images/" . date('o-m-d H:i:s') . $image;
                move_uploaded_file($imageUploaded['tmp_name'], $target_file);
    			return $target_file;
            }
            else {
                return false;
            }
        }else
		{
			return "Data/projects_images/default_project_image.jpg";
		}
    }
}
