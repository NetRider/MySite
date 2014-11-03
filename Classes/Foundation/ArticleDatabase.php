<?php
	
	namespace Foundation;
	
	use Entity\Article;

	require_once 'Database.php';
	//require_once '$_SERVER['Article.php']';
	require_once dirname(__FILE__).'/../Entity/Article.php';

	Class ArticleDatabase extends Database{

		public function __construct(){
			parent::__construct();
		}

		public function storeArticle($article){
			if($article instanceof Article)
			{
				$title = '"'.$article->getTitle().'"';
				$textArticle = '"'.$article->getText().'"'; //solo text nella query me lo dava come parola chiave 

				$query = "INSERT INTO article (title, textArticle) VALUES ($title, $textArticle)"; 

				return $this->storeData($query);
			}
			else 
				echo "Non e' un articolo quello che mi hai passato";
		}

		public function getArticle($id){
			$id = '"'.$id."'";
			$query = "SELECT title, textArticle, vote FROM article WHERE id = $id";
			return $this->executeQuery($query);
		}

		/**
		*	Ritorna gli articoli da inserire nella home.
		*
		*	Il metodo ritorna gli ultimi 3 articoli inseriti che verranno fatti apparire sulla home.
		*
		*	@return Array
		*/
		public function getHomeArticles(){
			$query = "SELECT title, textArticle FROM article ORDER BY id DESC LIMIT 3" ;
			return $this->executeQuery($query);
		}
	}
?>