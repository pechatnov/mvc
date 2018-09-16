<? include_once(ROOT . '/views/layouts/header.php') ?>

    <section><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">

                <?if($result){?>
                    <p>Сообщение отправленно!</p>
                <?}else{?>
                    <?if(isset($errors) && is_array($errors)){?>
                        <ul>
                            <?foreach($errors as $error){?>
                                <li> - <?=$error?></li>
                            <?}?>
                        </ul>
                    <?}?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Обратная связь</h2>
                        <p>Есть вопрос? Напишите нам</p>
                        <form action="#" method="post">
                            <p>Email</p>
                            <input type="email" name="userEmail" placeholder="Email Address" value="<?=$userEmail?>">
                            <p>Send</p>
                            <input type="text" name="userText" placeholder="Send" value="<?=$userText?>">
                            <input type="submit" name="submit" value="Отправить" class="btn btn-default" style="background: #FE980F;color: #fff;">
                            <!--<button class="btn btn-default">fgsgs</button>-->
                        </form>
                    </div><!--/sign up form-->
                <?}?>

                </div>
            </div>
        </div>
    </section>

<?include_once(ROOT.'/views/layouts/footer.php')?>