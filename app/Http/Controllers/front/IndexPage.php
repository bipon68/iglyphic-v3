<?php

namespace App\Http\Controllers\front;

use Sourav\SelectQuery;

class IndexPage
{

    function __construct()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(0);
    }

    function index()
    {
        return view('index');
    }

    function contact(): string
    {
        $select = new SelectQuery("setting");
        $select->setQuery("select * from setting where 1");
        $settingAr = $select->getQueues('type');

        return view('contact', ['settingAr' => $settingAr]);
    }

    function about(): string
    {
        $select = new SelectQuery("setting");
        $select->setQuery("select * from setting where 1");
        $settingAr = $select->getQueues('type');

        return view('about', ['settingAr' => $settingAr]);
    }

    function productDetail($id): string
    {
        $select = new SelectQuery("products");
        $select->setQuery("select * from products where `id`=" . $id . "");
        $productAr = $select->getQueue();

        $categoryAr = [];
        if ($productAr['category_id']) {
            $select = new SelectQuery("category_list");
            $select->setQuery("select * from category_list where `id`=" . $productAr['category_id'] . "");
            $categoryAr = $select->getQueue();
        }

        return view('product-detail', ['productAr' => $productAr, 'categoryAr' => $categoryAr]);
    }

    function blogDetail($id): string
    {
        $select = new SelectQuery("blogs");
        $select->setQuery("
        select * from blogs where `id`=" . $id . "");
        $blogAr = $select->getQueue();

        return view('blog-detail', ['blogAr' => $blogAr]);
    }

    function productList(): string
    {
        $sql_ar3 = [];
        if ($_GET['type']) {
            $sql_ar3[] = "`type`='" . $_GET['type'] . "'" . "";
        }
        if ($_GET['cat']) {
            $sql_ar3[] = "`category_id`='" . $_GET['cat'] . "'" . "";
        }

        $select = new SelectQuery("products");
        $select->setQuery("
        select * from products
        WHERE " . ($sql_ar3 ? implode(" AND ", $sql_ar3) : 1) . "
        ");
        $productAr = $select->getQueues();

        $select = new SelectQuery("category_list");
        $select->setQuery("select * from category_list where 1");
        $categoryAr = $select->getQueues('id');

        return view('product-list', [
            'productAr' => $productAr,
            'categoryAr' => $categoryAr,
        ]);
    }

    function blogList(): string
    {
        $select = new SelectQuery("blogs");
        $select->setQuery("select * from blogs where 1 ORDER BY `publish_date`");
        $blogsAllAr = $select->getQueues();

        return view('blog',[
            'blogsAllAr'=>$blogsAllAr
        ]);
    }
}
