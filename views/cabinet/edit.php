<?include_once(ROOT.'/views/layouts/header.php')?>

    <section><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">

                    <?if($result){?>
                        <p>Данные отредактированны!</p>
                    <?}else{?>
                        <?if(isset($errors) && is_array($errors)){?>
                            <ul>
                                <?foreach($errors as $error){?>
                                    <li> - <?=$error?></li>
                                <?}?>
                            </ul>
                        <?}?>

                        <div class="signup-form"><!--sign up form-->
                            <h2>Редактирование данных</h2>
                            <form action="#" method="post">
                                <p>Имя:</p>
                                <input type="text" name="name" placeholder="Name" value="<?=$name?>">
                                <p>Пароль:</p>
                                <input type="password" name="password" placeholder="Password" value="<?=$password?>">
                                <input type="submit" name="submit" value="Сохранить" class="btn btn-default" style="background: #FE980F;color: #fff;">
                                <!--<button class="btn btn-default">fgsgs</button>-->
                            </form>
                        </div><!--/sign up form-->
                    <?}?>
                </div>
            </div>
        </div>
    </section>

<?include_once(ROOT.'/views/layouts/footer.php')?>