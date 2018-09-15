<?

include_once(ROOT.'/models/Category.php');
include_once(ROOT.'/models/Products.php');

class CatalogController
{
    public function actionIndex()
    {
        $sections = array();
        $sections = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Products::getLatesProducts(7);

        require_once(ROOT.'/views/catalog/index.php');

        return true;
    }

    public function actionCategory($sectionId)
    {
        $sections = array();
        $sections = Category::getCategoriesList();

        $sectionsProducts = array();
        $sectionsProducts = Products::getProductsListBySection($sectionId);

        require_once(ROOT.'/views/catalog/section.php');

        return true;
    }
}