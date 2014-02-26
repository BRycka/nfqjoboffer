<?php

namespace joboffer\Controller;

use joboffer\Core\Request;
use joboffer\Model\Category;
use joboffer\Model\Product;

require_once('Model/Category.php');
require_once('Model/Product.php');
require_once('Core/Request.php');

class InputController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * display categories
     *
     * @return array
     */
    public function getCategories()
    {
        $model = new Category();
        $categories = $model->findCategories();
        return array('categories' => $categories);
    }

    /**
     * display products
     *
     * @return array
     */
    public function getProducts()
    {
        $model = new Product();
        $products = $model->findProducts($this->request->getParam('catid'));
        return array('products' => $products);
    }
}
