<?
include_once(ROOT.'/models/Category.php');
include_once(ROOT.'/models/Products.php');

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
}