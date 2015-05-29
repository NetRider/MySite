<?php
/**
 * Created by PhpStorm.
 * User: matteopolsinelli
 * Date: 29/05/15
 * Time: 17:04
 */

namespace Foundation;
require_once 'AbstractDataMapper.php';

use Entity\Article;

class ArticleMapper extends AbstractDataMapper  {



    protected function createEntity(array $row){

        return new Article($row["nickname"], $row["email"], $row["password"]);

    }
}