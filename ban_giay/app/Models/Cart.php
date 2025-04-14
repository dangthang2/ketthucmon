<?php
namespace App\Models;

class Cart
{
    public $items = [];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart = null)
    {
        if ($oldCart) {
            $this->items = $oldCart->items ?? [];
            $this->totalQty = $oldCart->totalQty ?? 0;
            $this->totalPrice = $oldCart->totalPrice ?? 0;
        }
    }

    public function add($item, $id, $qty = 1, $size = null, $color = null)
    {
        $storedItem = ['qty' => 0, 'price' => $item->gia, 'item' => $item, 'size' => $size, 'color' => $color];

        if (isset($this->items[$id])) {
            $storedItem = $this->items[$id];
        }

        $storedItem['qty'] += $qty;
        $storedItem['price'] = $storedItem['qty'] * $item->gia;

        $this->items[$id] = $storedItem;
        $this->totalQty += $qty;
        $this->totalPrice += $qty * $item->gia;
    }

    public function remove($id)
    {
        if (isset($this->items[$id])) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }
}
