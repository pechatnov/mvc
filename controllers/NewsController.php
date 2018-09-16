<?

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();

        require_once(ROOT.'/views/news/index.php');

        return true;
    }

    public function actionView($id)
    {
//        $category
        if($id){
            $newsItem = News::getNewsItemById($id);

            require_once(ROOT.'/views/news/detail.php');
        }


        return true;
    }
}