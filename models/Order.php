<?

class Order
{
    public static function save($userName, $userPhone, $userSend, $userId, $products)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_send, user_id, products) '.
               'VALUES (:user_name, :user_phone, :user_send, :user_id, :products)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_send', $userSend, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }
}