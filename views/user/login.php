<?include_once(ROOT.'/views/layouts/header.php')?>

<section><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

                <?if(isset($errors) && is_array($errors)){?>
                    <ul>
                        <?foreach($errors as $error){?>
                            <li> - <?=$error?></li>
                        <?}?>
                    </ul>
                <?}?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Вход на сайт</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="Email Address" value="<?=$email?>">
                        <input type="password" name="password" placeholder="Password" value="<?=$password?>">
                        <input type="submit" name="submit" value="Вход" class="btn btn-default" style="background: #FE980F;color: #fff;">
                        <!--<button class="btn btn-default">fgsgs</button>-->
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section>

<?include_once(ROOT.'/views/layouts/footer.php')?>