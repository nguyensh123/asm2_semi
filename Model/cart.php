<?php
namespace murach\cart {
// Add an item to the cart
function add_item(&$cart, $key, $quantity) {
    global $p;
    if ($quantity < 1) return;
    if (isset($cart[$key])) {

        $quantity += $cart[$key]['qty'];
        update_item($cart, $key, $quantity);
        
        }

    // Add item
    $price = $p->getPrice();
    $total = $price * $quantity;
    $item = array(
        'name' => $p->getProduct_name(),
        'brandId' => $p->getBrand_id(),
        'price' => $price,
        'qty'  => $quantity,
        'total' => $total
    );
    $cart[$key] = $item;
    return $cart;
}

// Update an item in the cart
function update_item(&$cart,$key, $quantity) {
    $quantity = (int) $quantity;
if (isset($cart[$key])) {
    if ($quantity <= 0) {
    unset($cart[$key]);
    } else {
    $cart[$key]['qty'] = $quantity;
    $total = $cart[$key]['price'] *$cart[$key]['qty'];
    $cart[$key]['total'] = $total;
            }
    }
    }
// Get cart subtotal
function get_subtotal ($cart) {
    $subtotal = 0;
foreach ($cart as $item) {
    $subtotal += $item['total'];
    }
    return $subtotal; 
    }
}
?>