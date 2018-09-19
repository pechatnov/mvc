<?include_once(ROOT.'/views/layouts/header.php')?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?foreach($sections as $item){?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?=$item['id']?>"><?=$item['name']?></a>
                                    </h4>
                                </div>
                            </div>
                        <?}?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Корзина</h2>

                    <?if($result){?>
                        <p>Заказ оформлен. Мы вам перезвоним.</p>
                    <?}else{?>

                        <p>Выбранно товаров: <?=$totalQuantity?>, на сумму: <?=$totalPrice?>, $</p>

                        <?if(isset($errors) && is_array($errors)){?>
                            <ul>
                                <?foreach($errors as $error){?>
                                    <li> - <?=$error?></li>
                                <?}?>
                            </ul>
                        <?}?>

                        <p>Для оформления заказа заполните форму. Мы свяжемся с вами.</p>

                        <div class="signup-form"><!--sign up form-->
                            <form action="#" method="post">
                                <p>Name</p>
                                <input type="text" name="userName" placeholder="Name" value="<?=$userName?>">
                                <p>Phone</p>
                                <input type="text" name="userPhone" placeholder="Phone" value="<?=$userPhone?>">
                                <p>Send</p>
                                <input type="text" name="userSend" placeholder="Send" value="<?=$userSend?>">
                                <input type="submit" name="submit" value="Оформить" class="btn btn-default" style="background: #FE980F;color: #fff;">
                            </form>
                        </div><!--/sign up form-->
                    <?}?>
                </div><!--features_items-->

            </div>
        </div>
    </div>
</section>


<?include_once(ROOT.'/views/layouts/footer.php')?>