<?php
/**
 * Created by PhpStorm.
 * User: ricblt
 * Date: 17/02/14
 * Time: 11:44
 */
class Product
{
    public $product_id;
    public $category_id;
    public $product_name;
    public $price;
    protected $pvm;
    public function calculateVat()
    {
        if ($this->pvm === null) {
            $this->pvm = round($this->price * 21 / 121, 2);
        }
        return $this->pvm;
    }
}