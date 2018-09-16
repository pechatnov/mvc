<?

class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkName($name)){
                $errors[] = 'Имя короче 2 символов';
            }
            if(!User::checkEmail($email)){
                $errors[] = 'Неверный email';
            }
            if(!User::checkPassword($password)){
                $errors[] = 'Пароль короче 6 символов';
            }

            if(User::checkEmailExists($email)){
                $errors[] = 'Email используется';
            }

            if($errors == false){
                $result = User::register($name, $email, $password);
            }
        }

        require_once(ROOT.'/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkEmail($email)){
                $errors[] = 'Неверный email';
            }
            if(!User::checkPassword($password)){
                $errors[] = 'Пароль короче 6 символов';
            }

            $userId = User::checkUserData($email, $password);

            if($userId == false){
                $errors[] = 'Неправильные данные';
            }else{
                User::auth($userId);

                header('Location: /cabinet/');
            }
        }

        require_once(ROOT.'/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}