<?php

namespace App\Traits;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderDetail;

use Cart;
// use Log;

trait InvoiceGenerator {
    public function CreateInvoice($userId,$ad,$address_id,$delivery_time,$shipping,$type_send) {

        // $cartCollection = Cart::session($userId)->getContent();
        // $cart = json_decode( $cartCollection->toJson(), true );

        $total = Cart::session($userId)->getTotal();
        $sub = Cart::session($userId)->getSubTotal();
        $CartItems = Cart::session($userId)->getContent();


        $invoice = new Invoice;
        $invoice->user_id = $userId;
        $invoice->address_id = $address_id;
        $invoice->client_address = $ad;
        $invoice->shipping = round($shipping);
        $invoice->sub_total = round($sub);
        $invoice->grand_total = round($sub);
        $invoice->due_date = $delivery_time;
        $invoice->type_send = $type_send;

        $invoice->situation = 'paid'; ///////////////////////////////////////////////////////////

        $invoice->save();

        foreach($CartItems as $item){

            $order = new Order;
            $order->product_id = $item->attributes['pid'];
            $order->qty = $item->quantity;
            $order->price = $item->price;
            $order->total = $item->price * $item->quantity;
            $order->save();
            $invoice->orders()->save($order);

            if ($item->attributes['mid'] != 0 || $item->attributes['fid'] != 0 || $item->attributes['discount_id']) {
                $detail = new OrderDetail;

                if ($item->attributes['discount_id']) {
                    $detail->discount = $item->attributes['discount_price'];
                    $detail->discount_id = $item->attributes['discount_id'];
                }

                if ($item->attributes['mid'] != 0) {
                    $detail->price_id = $item->attributes['mid'];
                }

                if ($item->attributes['fid'] != 0) {
                    $detail->feature_id = $item->attributes['fid'];
                }

                if ($item->attributes['feature'] && $item->attributes['price_des']) {
                    $detail->content = $item->attributes['feature'].' - '.$item->attributes['price_des'];
                }elseif ($item->attributes['feature'] && !$item->attributes['price_des']) {
                    $detail->content = $item->attributes['feature'];
                }elseif (!$item->attributes['feature'] && $item->attributes['price_des']) {
                    $detail->content = $item->attributes['price_des'];
                }

                $order->detail()->save($detail);
            }
        }


        // $products = collect($cart)->transform(function($product) {
        //     $product['product_id'] = $product['associatedModel']['id'];
        //     $product['qty'] = $product['quantity'];
        //     $product['total'] = $product['quantity'] * $product['price'];
        //     $product['price'] = $product['price'];
        //     // $product['discount'] = $product['attributes']['discount'];
        //     // $product['dis_id'] = $product['attributes']['discount_id'];
        //     // $product['content'] = $product['attributes']['feature'].' - '.$product['attributes']['price_des'];
        //     return new Order($product);
        // });
        // $data['user_id'] = $userId;
        // $data['client_address'] = $ad;
        // $data['address_id'] = $address_id;
        // // $data['discount'] = 0;
        // // $data['coupon_id'] = null;
        // $data['due_date'] = $delivery_time;
        // $data['sub_total'] = round($total);
        // $data['grand_total'] = round($total + 150000);
        // $invoice = Invoice::create($data);
        // $invoice->orders()->saveMany($products);

        return $invoice;
    }
}
