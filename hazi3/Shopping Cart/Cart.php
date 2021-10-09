<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties
    /**
     * Get the value of items
     *
     * @return  CartItem[]
     */ 
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set the value of items
     *
     * @param  array  $items
     *
     * @return  self
     */ 
    public function setItems(array $items)
    {
        $this->items = $items;

        return $this;
    }

    private function getItem (Product $product)
    {
        foreach($this->items as $item){
            if($item->getProduct() == $product){
                return $item;
            }
        }

        return null;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        $cartItem = $this->getItem($product);

        if($cartItem){
            $cartItem->increaseQuantity();
            return $cartItem;
        }

        $cartItem = new CartItem($product, $quantity);
        array_push($this->items, $cartItem);
        return $cartItem;        
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        $cartKey = null;

        foreach($this->items as $key=>$item){
            if($item->getProduct() == $product){
                $cartKey = $key;
            }
        }
        if($cartKey !== null){
            unset($this->items[$cartKey]);
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $total = 0;

        foreach($this->items as $item){
            $total += $item->getQuantity();
        }

        return $total;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $totalSum = 0.0;

        foreach($this->items as $item){
            $totalSum += $item->getQuantity() * $item->getProduct()->getPrice();
        }

        return $totalSum;
    }

    
}