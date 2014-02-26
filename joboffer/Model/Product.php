<?php
/**
 * Created by PhpStorm.
 * User: ricblt
 * Date: 26/02/14
 * Time: 12:12
 */

namespace joboffer\Model;

use joboffer\Core\Db;

require_once('Model/Entity/Product.php');

class Product
{
    public function findProducts($catId)
    {
        if ($catId == null) {
            return array();
        }
        $db = Db::getDefaultInstance();
        $sql = "SELECT *, ROUND(price * 21 / 121, 2) AS pvm FROM product WHERE category_id = {$catId}";
        return $db->fetchAll($sql, 'joboffer\Model\Entity\Product');
    }
}
