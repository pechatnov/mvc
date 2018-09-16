<?

class CatalogController
{
    public function actionIndex()
    {
        $sections = array();
        $sections = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Products::getLatesProducts();

        require_once(ROOT.'/views/catalog/index.php');

        return true;
    }

    public function actionCategory($sectionId, $page = 1)
    {
        $sections = array();
        $sections = Category::getCategoriesList();

        $sectionsProducts = array();
        $sectionsProducts = Products::getProductsListBySection($sectionId, $page);

        $total = Products::getTotalProductsInSection($sectionId);
        $pagination = new Pagination($total, $page, Products::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/catalog/section.php');

        return true;
    }
}