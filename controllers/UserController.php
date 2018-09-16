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
}