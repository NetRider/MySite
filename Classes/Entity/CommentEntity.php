<?php
/**
 * classe CommentEntity
 *
 * @package Entity
 * @author Matteo Polsinelli
 */
class CommentEntity
{

	/**
	* numero intero identificativo del commento gestito da Database
	*
	* @var int
	*/
	private $id;

	/**
	* il testo del commento
	*
	* @var string
	*/
	private $text;

	/**
	* la data del commento
	*
	* @var string $date
	*/
    private $date;

	/**
	* numero intero identificativo dell'autore del commento
	*
	* @var int
	*/
    private $userId;

	/**
	 * Costruttore di CommentEntity
	 *
	 * Crea un nuovo commento
	 *
	 * @param string $text
	 * @param string $date
	 * @param int $userId
	 */
	public function __construct($text, $date, $userId){
		$this->id = -1;
		$this->text = $text;
        $this->date = $date;
        $this->userId = $userId;
	}

	/**
	 * metodo getId
	 *
	 * ritorna l'id del commento. Se non è stato impostato ritorna il valore -1
	 *
	 * @return int
	 */
	 public function getId() {

		 return $this->id;
	 }

	/**
	 * metodo getText
	 *
	 * ritorna il testo del commento
	 *
	 * @return string
	 */
	public function getText(){
		return $this->text;
	}

	/**
	 * metodo getDate
	 *
	 * ritorna la data del commento
	 *
	 * @return string
	 */
    public function getDate(){
        return $this->date;
    }

	/**
	 * metodo getUserId
	 *
	 * ritorna l'id dell'autore  del commento
	 *
	 * @return int
	 */
    public function getUserId(){
        return $this->userId;
    }

	/**
	 * metodo setText
	 *
	 * imposta il testo dell'articolo
	 *
	 * @param string $text
	 */
	public function setText($text){
		$this->text = $text;
	}

	/**
	 * metodo setUserId
	 *
	 * imposta l'id dell'autore del commento
	 *
	 * @param int $userId
	 */
	public function setUserId($userId)
	{
		$this->userId = $userId;
	}

	/**
	 * metodo setDate
	 *
	 * imposta la data del commento
	 *
	 * @param string $date
	 */
    public function setDate($date)
    {
       $this->date = $date;
    }

	/**
	 * metodo setId
	 *
	 * imposta l'id del commento gestito dal database
	 *
	 * @param int $id
	 */
	public function setId($id){
		$this->id = $id;
	}
}
?>
