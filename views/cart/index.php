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

                        <?if($productsInCart){?>
                            <p>Товары в корзине:</p>
                            <div class="table-responsive cart_info">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr class="cart_menu">
                                        <th>Код товара</th>
                                        <th>Название</th>
                                        <th>Стоимость</th>
                                        <th>Количество</th>
                                        <th>Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?foreach($products as $item){?>
                                            <tr>
                                                <td><?=$item['code']?></td>
                                                <td>
                                                    <a href="/product/<?=$item['id']?>"><?=$item['name']?></a>
                                                </td>
                                                <td><?=$item['price']?></td>
                                                <td><?=$productsInCart[$item['id']]?></td>
                                                <td><a data-id="<?=$item['id']?>" class="del-to-cart" href="/cart/del/<?=$item['id']?>" style="cursor: pointer;">x</a></td>
                                            </tr>
                                        <?}?>
                                        <tr>
                                            <td colspan="3">Общая стоимость:</td>
                                            <td id="totalPrice"><?=$totalPrice?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p><a href="/cart/checkout/">Оформить заказ</a></p>
                            </div>
                        <?}?>
                    </div><!--features_items-->

                </div>
            </div>
        </div>
    </section>


<?include_once(ROOT.'/views/layouts/footer.php')?>