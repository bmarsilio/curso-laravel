<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 13/08/2015
 * Time: 23:55
 */

namespace CodeCommerce;


use Illuminate\Support\Facades\Session;

class Cart
{

    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price)
    {
        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $price,
                'name' => $name
            ]
        ];

        return $this->items;
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        ksort($this->items);

        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item['qtd'] * $item['price'];
        }

        return $total;
    }

    public function adjustItemQuantity($id, $name, $price, $type, $qtd)
    {
        $this->remove($id);


        if($type == 'add') {
            $qtd++;
        } else {
            $qtd--;
        }

        if($qtd == 0) {
            return false;
        }

        $this->items += [
            $id => [
                'qtd' => $qtd,
                'price' => $price,
                'name' => $name
            ]
        ];

        return $this->items;
    }

    public function clear()
    {
        $this->items = [];
        Session::set('cart', null);
    }

}