<?

class SiteController
{
    public function actionIndex()
    {
        $sections = array();
        $sections = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Products::getLatesProducts(5);

        require_once(ROOT.'/views/site/index.php');

        return true;
    }

    public function actionContacts()
    {
        $userEmail = '';
        $userText = '';
        $result = false;

        if(isset($_POST['submit'])){

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if(!User::checkEmail($userEmail)){
                $errors[] = 'Неправильный email';
            }

            if($errors == false){
                $adminEmail = 'test@test.ru';
                $subject = 'Тема письма';
                $message = "Текст: {$userText}. От {$userEmail}";
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        require_once(ROOT.'/views/site/contacts.php');

        return true;
    }
}