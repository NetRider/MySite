<?php
/**
 * classe ArticleEntity
 *
 * @package Entity
 * @author Matteo Polsinelli
 */
class ArticleEntity {

	/**
	* numero intero identificativo dell'articolo gestito da Database
	*
	* @var int
	*/
	private $id;

	/**
	* numero intero identificativo dell'autore dell'articolo gestito da Databas
	* @var int
	*/
	private $userId;

	/**
	*il titolo dell'articolo
	*
	* @var string
	*/
	private $title;

	/**
	* il testo dell'articolo
	* @var string
	*/
	private $text;

	/**
	* la data di inserimento dell'articolo
	* @var string
	*/
	private $date;

	/**
	* la descrizione dell'articolo
	* @var string
	*/
	private $description;

	/**
	* il path dell'immagine all'interno del file system
	* @var string 
	*/
	private $image;

	/**
	 * Costruttore di ArticleEntity
	 *
	 * Crea un nuovo articolo
	 *
	 * @param int $userId
	 * @param string $title
	 * @param string $description
	 * @param string $text
	 * @param string $date
	 * @param string $image
	 */
	public function __construct($userId, $title, $description, $text, $date, $image) {
		$this->userId = $userId;
		$this->title = $title;
		$this->description = $description;
		$this->text = $text;
		$this->date = $date;
		$this->image = $image;
		$this->id = -1;
	}

	/**
	 * metodo getTitle
	 *
	 * ritorna il titolo dell'articolo
	 *
	 * @return string
	 */
	 public function getTitle() {
		 return $this->title;
	}

	/**
	 * metodo getText
	 *
	 * ritorna il testo dell'articolo
	 *
	 * @return string
	 */
	 public function getText() {
		return $this->text;
	}

	/**
	 * metodo getDate
	 *
	 * ritorna la data dell'articolo
	 *
	 * @return string
	 */
	 public function getDate() {
		return $this->date;
	 }

	/**
	 * metodo getId
	 *
	 * ritorna l'id dell'articolo. Se non è stato impostato ritorna il valore -1
	 *
	 * @return int
	 */
	 public function getId() {

		 return $this->id;
	 }

	 /**
 	 * metodo getAuthorId
 	 *
 	 * ritorna l'id dell'autore dell'articolo
 	 *
 	 * @return int
 	 */
	 public function getAuthorId() {
		return $this->userId;
	 }

	/**
	* metodo getDescription
	*
	* ritorna la descrizione dell'articolo
	*
	* @return string
	*/
	public function getDescription() {
		return $this->description;
	}

	/**
	* metodo getImage
	*
	* ritorna il path dell'immagine dell'articolo
	*
	* @return string
	*/
	public function getImage() {
		return $this->image;
	}

	/**
	 * metodo setTitle
	 *
	 * imposta il titolo dell'articolo
	 *
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * metodo setText
	 *
	 * imposta il testo dell'articolo
	 *
	 * @param string $title
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * metodo setDate
	 *
	 * imposta la data dell'articolo
	 *
	 * @param string $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * metodo setId
	 *
	 * imposta l'id dell'articolo gestito dal database
	 *
	 * @param int $id
	 */
	public function setId($id){
		$this->id = $id;
	}

	/**
	 * metodo setDescription
	 *
	 * imposta la descrizione dell'articolo
	 *
	 * @param string $id
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * metodo setImage
	 *
	 * imposta il path dell'immagine dell'articolo
	 *
	 * @param string $id
	 */
	public function setImage($imge) {
		$this->image = $image;
	}
}
