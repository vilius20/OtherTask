<?php
include './api/common.php';

class Category extends APICommon{
    private static $endpoint = 'category/';

    public static function getAll(array $user){
        return json_decode(APICommon::get(Category::$endpoint, null, $user['user'], $user['pass']));
    }
}

class Product extends APICommon {
    public static function getAll(int $categoryId, array $user){
        return json_decode(APICommon::get("category/$categoryId/product/", null, $user['user'], $user['pass']));
    }

}

class Order extends APICommon {
    public static function getAll(int $user_id){
        require 'db.php';
        $q= $db->query("SELECT * FROM orders WHERE user_id = $user_id");
        return $q->fetch_all(MYSQLI_ASSOC);
    }
    public static function save(array $data, array $user){
        $product_id = $data['product_id'];
        $body = [
            'product_id' => $data['product_id'],
            'domain' => $data['domain'],
            'cycle' => $data['cycle'],
            'pay_method' => '1'
        ];
        $response = json_decode(APICommon::post("order/$product_id/", $body, $user['user'], $user['pass']));

        if ($response) {
            require 'db.php';
            $user_id = (int)$data['user_id'];
            $order_number = (int)$response->order_num;
            $order_id = 0;
            $invoice_id = (int)$response->invoice_id;
            $product_id = (int)$data['product_id'];
            $service_type = $data['service_type'];
            $service_name = $data['service_name'];
            $total_price = (int)$response->total;


            $q = $db->prepare("INSERT INTO orders(user_id, order_number, order_id, invoice_id, product_id, service_type, service_name, total_price)  VALUES  (?,?,?,?,?,?,?,?)");  
            $q->bind_param('iiiiissi', $user_id, $order_number, $order_id, $invoice_id, $product_id, $service_type, $service_name, $total_price);
            return $q->execute();
        }
    }
}