<?php
/**
 * Comment Controller File
 *
 * Questo file contiene il comment controller
 *
 * @package Controller
 * @author Matteo Polsinelli
 */

 /**
 *La classe DashboardController
 *
 * Gestisce le funzionalità di back-end del sito.
 *
 */
class DashboardController extends Controller {

    /**
	 * Instrada il task richiesto all'appropiato metodo privato.
	 * Prima di ciò controlla se l'utente che ha fatto la richiesta ha i permessi
	 * necessari. In caso negativo non esegue il task e rimanda ad una pagina
	 * di errore.
	 */
    public function executeTask()
    {
        $task = $this->view->getTask();
        $session = Singleton::getInstance("Session");
        if($session->checkPermission($task))
        {
            switch($task)
            {
                case 'getStatisticsPage':
                    return $this->getStatisticsPage();
                break;

                case 'getProfilePage':
                    return $this->getProfilePage();
                break;

                case 'getUsersPage':
                    return $this->getUsersPage();
                break;

                case 'getArticleWritingPage':
                    return $this->getArticleWritingPage();
                break;

                case 'getProjectWritingPage':
                    return $this->getProjectWritingPage();
                break;

                case 'getUserComments':
                    return $this->getUserCommentsPage();
                break;

                case 'getJobsPage':
                    return $this->getJobsPage();
                break;

                case 'getArticlesStatistics':
                    return $this->getArticlesStatistics();
                break;

                case 'getCommentsStatistics':
                    return $this->getCommentsStatistics();
                break;

                case 'getProjectsStatistics':
                    return $this->getProjectsStatistics();
            }
        }else
        {
            return $this->getPermissionDenied();
        }
    }

    /**
     * Crea la pagina relativa alle statistiche
	 *
	 * @return string Ritorna il template costruito con smarty
     */
     private function getStatisticsPage() {
         $databaseAdapter = new Database();
         $projectMapper = new ProjectMapper($databaseAdapter);
         $articleMapper = new ArticleMapper($databaseAdapter);
         $userMapper = new UserMapper($databaseAdapter);
         $commentMapper = new CommentMapper($databaseAdapter);

         $this->view->setStatisticsPage($commentMapper->getNumberOfComments()[0]["COUNT(*)"], $articleMapper->getNumberOfArticles()[0]["COUNT(*)"], $projectMapper->getNumberOfProjects()[0]["COUNT(*)"], $userMapper->getNumberOfUsers()[0]["COUNT(*)"]);
         return $this->view->getContent();
    }

    /**
     * Crea la pagina relativa alla gestione degli utenti
     *
     * @return string Ritorna il template costruito con smarty
     */
    private function getUsersPage() {

        $databaseAdapter = new Database();
        $userMapper = new UserMapper($databaseAdapter);
        $aclMapper = new ACLMapper($databaseAdapter);

        $users = $userMapper->getUsersDash();
        $roles = $aclMapper->getRolesDash();
        $this->view->assignUsers($users);
        $this->view->assignRoles($roles);
        $this->view->setUsersPage();
        return $this->view->getContent();
    }

    /**
     * Crea la pagina relativa alla gestione del profilo.
	 *
	 * @return string Ritorna il template costruito con smarty
     */
     private function getProfilePage() {

         $session = Singleton::getInstance("Session");
         $this->view->setProfilePage($session->getUsername(), $session->getUserEmail(), $session->getUserImage());
         return $this->view->getContent();
     }

     /**
     * Crea la pagina relativa alla scrittura di un articolo.
 	 *
 	 * @return string Ritorna il template costruito con smarty
     */
     private function getArticleWritingPage() {

         $this->view->setArticleWritingPage();
         return $this->view->getContent();
     }

     /**
     * Crea la pagina relativa alla scrittura di un progetto
     *
     * @return string Ritorna il template costruito con smarty
     */
     private function getProjectWritingPage() {

         $databaseAdapter = new Database();
         $articleMapper = new ArticleMapper($databaseAdapter);
         $articles = $articleMapper->getAllArticles();
         $data = array();
         foreach($articles as $article)
         {
             array_push($data, array("title"=>$article->getTitle(), "id"=>$article->getId()));
         }

         $this->view->setProjectWritingPage($data);
         return $this->view->getContent();
     }

     /**
     * Crea la pagina di accesso negato. Questo metodo viene richiamato quando un utente
     * cerca di accedere ad un parte di back-end per cui non ha l'autorizzazione.
     *
     * @return string Ritorna il template costruito con smarty
     */
     private function getPermissionDenied() {

         $this->view->setPermissionDenied();
         return $this->view->getContent();
     }

     /**
     * Crea la pagina relativa ai commenti degli utenti.
     *
     * @return string Ritorna il template costruito con smarty
     */
     private function getUserCommentsPage() {

         $databaseAdapter = new Database();
         $commentMapper = new CommentMapper($databaseAdapter);
         $session = Singleton::getInstance("Session");
         $articlesComments = $commentMapper->getCommentsArticlesByAuthorId($session->getUserId());
         $projectsComments = $commentMapper->getCommentsProjectsByAuthorId($session->getUserId());

         $this->view->setUserCommentsgPage($articlesComments, $projectsComments);
         return $this->view->getContent();
    }

    /**
    * Crea la pagina che contiene l'elenco degli articoli e dei progetti
    * presenti sul databases
    *
    * @return string Ritorna il template costruito con smarty
    */
    private function getJobsPage() {

        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $articleMapper = new ArticleMapper($databaseAdapter);
        $articles = $articleMapper->getArticlesForDash();
        $projects = $projectMapper->getProjectsForDash();

        $this->view->setJobsPage($articles, $projects);
        return $this->view->getContent();
    }

    /**
    * Fornisce i dati in formato JSON relativi alle statistiche sui
    * commenti. In particolare il numero di commenti per data
    */
    private function getCommentsStatistics() {

        $databaseAdapter = new Database();
        $commentMapper = new CommentMapper($databaseAdapter);
        $this->view->responseAjaxCall(json_encode($commentMapper->getCommentsCountedByDate()));
    }

    /**
    * Fornisce i dati in formato JSON relativi alle statistiche sugli
    * articoli. In particolare il numero di articoli per data
    */
    private function getArticlesStatistics() {

        $databaseAdapter = new Database();
        $articleMapper = new ArticleMapper($databaseAdapter);
        $this->view->responseAjaxCall(json_encode($articleMapper->getArticlesCountedByDate()));
    }

    /**
    * Fornisce i dati in formato JSON relativi alle statistiche sui
    * progetti. In particolare il numero di progetti per data
    */
    private function getProjectsStatistics() {

        $databaseAdapter = new Database();
        $projectMapper = new ProjectMapper($databaseAdapter);
        $this->view->responseAjaxCall(json_encode($projectMapper->getProjectsCountedByDate()));
    }
}
