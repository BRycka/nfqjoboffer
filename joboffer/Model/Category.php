<?php
/**
 * Created by PhpStorm.
 * User: ricblt
 * Date: 26/02/14
 * Time: 11:49
 */

namespace joboffer\Model;


use joboffer\Core\Db;

require_once('Model/Entity/Category.php');

class Category
{
    public function findCategories()
    {
        $db = Db::getDefaultInstance();
        $sql =
            "SELECT category.*,
            (SELECT COUNT(1) FROM product WHERE product.category_id = category.category_id) AS products_count
        FROM category";
        return $db->fetchAll($sql, 'joboffer\Model\Entity\Category');
    }
}
