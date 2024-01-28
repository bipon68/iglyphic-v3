<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Accounts\models\ModelAccountFind;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sourav\FileUpload;
use Sourav\InsertQuery;
use Sourav\SelectQuery;
use Sourav\UpdateQuery;

class ProductsManage
{

    function __construct()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(0);
    }

    function productsManageInfo()
    {
        if (!Auth::id()) {
            return redirect("/login");
        }
        $select = new SelectQuery("products");
        $select->setQuery("select * from products where 1");
        $productsAllAr = $select->getQueues();

        $select = new SelectQuery("category_list");
        $select->setQuery("select * from category_list where `type`='product'");
        $categoryAllAr = $select->getQueues('id');

        return view('products', ['productsAllAr' => $productsAllAr, 'categoryAllAr' => $categoryAllAr]);
    }

    function productsManageCreate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'image_url' => '',
            'sub_title' => '',
            'category' => '',
            'price' => '',
            'demo_link' => '',
            'github_link' => '',
            'release_date' => '',
            'last_update_date' => '',
            'current_version' => '',
            'technology' => '',
            'tags' => '',
            'description' => '',
        ]);

        if ($request->file('image_url')) {
            $file = $request->file('image_url');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('cloud_upload'), $fileName);
            $fileUrl = "/public/cloud_upload/" . $fileName;
        } else {
            $fileUrl = "";
        }

        $insert = new InsertQuery("products");
        $insert->addRow([
            'title' => $request['title'],
            'type' => $request['type'],
            'sub_title' => $request['sub_title'],
            'category_id' => $request['category'],
            'price' => $request['price'],
            'demo_link' => $request['demo_link'],
            'github_link' => $request['github_link'],
            'release_date' => strtotime($request['release_date']),
            'last_update_date' => strtotime($request['last_update_date']),
            'current_version' => $request['current_version'],
            'technology' => $request['technology'],
            'tags' => $request['tags'],
            'description' => $request['description'],
            'image_url' => $fileUrl,
            'status' => "active",
        ]);
        $insert->submit();

        //header('Location: /products');
        return redirect()->back()->with('success', 'File uploaded successfully!');

    }

    function productsManageJson($id)
    {
        $select = new SelectQuery("products");
        $select->setQuery("select * from products where `id`=" . $id . "");
        $productAr = $select->getQueue();
        $productAr['release_date']=date("Y-m-d",$productAr['release_date']);
        $productAr['last_update_date']=date("Y-m-d",$productAr['last_update_date']);
        return json_encode($productAr);
    }

    function productsManageRemove($id)
    {
        $select = new SelectQuery("products");
        $select->setQuery("select * from products where `id`=" . $id . "");
        $productAr = $select->getQueue();

        $update = new UpdateQuery("products");
        $update->updateRow($productAr, [
            'deleted_at' => getTimeStamp(),
            'status' => 'deleted',
        ]);
        $update->submit();

        return json_encode(
            [
                'error' => $update->getError(),
                'message' => $update->getMessage(),
                'location' => "location.reload()"
            ]
        );
    }

    function productsManageUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'image_url' => '',
            'sub_title' => '',
            'category' => '',
            'price' => '',
            'demo_link' => '',
            'github_link' => '',
            'release_date' => '',
            'last_update_date' => '',
            'current_version' => '',
            'technology' => '',
            'tags' => '',
            'description' => '',
        ]);

        $select = new SelectQuery("products");
        $select->setQuery("select * from products where `id`=" . $id . "");
        $productAr = $select->getQueue();

        if ($request->file('image_url')) {
            $file = $request->file('image_url');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('cloud_upload'), $fileName);
            $fileUrl = "/public/cloud_upload/" . $fileName;
        } else {
            $fileUrl = $productAr['image_url'];
        }

        $update = new UpdateQuery("products");
        $update->updateRow($productAr, [
            'title' => $request['title'],
            'type' => $request['type'],
            'sub_title' => $request['sub_title'],
            'category_id' => $request['category'],
            'price' => $request['price'],
            'demo_link' => $request['demo_link'],
            'github_link' => $request['github_link'],
            'release_date' => strtotime($request['release_date']),
            'last_update_date' => strtotime($request['last_update_date']),
            'current_version' => $request['current_version'],
            'technology' => $request['technology'],
            'tags' => $request['tags'],
            'description' => $request['description'],
            'image_url' => $fileUrl,
        ]);
        $update->submit();

        return redirect()->back()->with('success', 'File uploaded successfully!');

    }

}
