<?php
/**
 * HomeView View File
 *
 * Questo file contiene la HomeView View
 *
 * @package View
 * @author Matteo Polsinelli
 */
class HomeView extends View {

	/**
	 * metodo assignHomeArticles
	 *
	 * @param array $homeArticles
	 * @param array $homeProjects
	 */
	public function assignHomeArticles($homeArticles, $homeProjects)
	{
		$this->assign('homeArticles', $homeArticles);
		$this->assign('homeProjects', $homeProjects);

	}

	/**
	 * metodo getContent
	 *
	 * crea la pagina html
	 *
	 * @return string Ritorna il template costruito con smarty
	 */
	public function getContent()
	{
		return $this->fetch('home.tpl');
	}
}
