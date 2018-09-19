<?

class CartController
{
    public function actionIndex()
    {
        $sections = array();
        $sections = Category::getCategoriesList();

        $productsInCart = false;

        $productsInCart = Cart::getProducts();

        if($productsInCart){
            $productsIds = array_keys($productsInCart);
            $products = Products::getProductByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT.'/views/cart/index.php');

        return true;
    }

    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }

    public static function actionDelete($id)
    {
        Cart::delProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionDeleteAjax($id)
    {
        echo Cart::delProduct($id);
        return true;
    }

    public function actionCheckout()
    {
        $sections = array();
        $sections = Category::getCategoriesList();

        $result = false;

        //Форма отправленна?
        if(isset($_POST['submit']))
        {
            //Форма отправленна? - Да

            //Считываем данные формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userSend = $_POST['userSend'];

            //Валидация полей
            $errors = false;
            if(!User::checkName($userName)){
                $errors[] = 'Неправильное имя';
            }
            if(!User::checkPhone($userPhone)){
                $errors[] = 'Неправильный телефон';
            }

            //Форма заполненна корректно?
            if($errors == false){
                //Форма заполненна корректно? - Да
                //Сохраняем заказ в базе данных

                //Собираем информацию о заказе
                $productsInCart = Cart::getProducts();
                if(User::isGuest()){
                    $userId = false;
                }else{
                    $userId = User::checkLogger();
                }

                //Сохраняем заказ в БД
                $result = Order::save($userName, $userPhone, $userSend, $userId, $productsInCart);

                if($result){
                    //Оповещаем администратора о новом заказе
                    $adminEmail = 'test@test.ru';
                    $message = 'http://mvc:81/admin/orders/';
                    $subject = 'Новый заказ';
                    mail($adminEmail, $subject, $message);

                    //Очищаем корзину
                    Cart::clear();
                }
            }else{
                //Форма заполненна корректно? - Нет

                //Итоги: общая стоимость, количество товаров
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Products::getProductByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        }
        else
        {
            //Форма отправленна? - Нет

            //Получение данных из корзины
            $productsInCart = Cart::getProducts();

            //В корзине есть товары?
            if($productsInCart == false){
                //В корзине есть товары? - Нет
                //Редирект на главную
                header('Location: /');
            }else{
                //В корзине есть товары? - Да

                //Итоги: общая стоимость, количество товара
                $productsIds = array_keys($productsInCart);
                $products = Products::getProductByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userSend = false;

                //Пользователь авторизован?
                if(User::isGuest()){
                    //Нет
                    //Значения для формы пустые
                }else{
                    //Да, авторизован
                    //Получаем информацию о пользователе из БД по id
                    $userId = User::checkLogger();
                    $user = User::getUserById($userId);
                    //Подставляем в форму
                    $userName = $user['name'];
                }
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}