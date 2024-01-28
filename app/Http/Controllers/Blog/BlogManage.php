<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sourav\InsertQuery;
use Sourav\SelectQuery;
use Sourav\UpdateQuery;

class BlogManage
{
    function __construct()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(0);
    }

    function blogManageInfo()
    {
        if (!Auth::id()) {
            return redirect("/login");
        }
        $select = new SelectQuery("blogs");
        $select->setQuery("select * from blogs where 1");
        $blogsAllAr = $select->getQueues();

        $select = new SelectQuery("category_list");
        $select->setQuery("select * from category_list where `type`='blog'");
        $categoryAllAr = $select->getQueues('id');

        return view('blog-list', [
            'blogsAllAr' => $blogsAllAr,
            'categoryAllAr' => $categoryAllAr,
        ]);
    }

    function blogManageCreate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image_url' => '',
            'sub_title' => '',
            'publish_date' => '',
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

        $insert = new InsertQuery("blogs");
        $insert->addRow([
            'title' => $request['title'],
            'category' => $request['category'],
            'sub_title' => $request['sub_title'],
            'publish_date' => strtotime($request['publish_date']),
            'tags' => $request['tags'],
            'description' => $request['description'],
            'image_url' => $fileUrl,
            'status' => "active",
        ]);
        $insert->submit();

        //header('Location: /blogs');
        return redirect()->back()->with('success', 'File uploaded successfully!');

    }

    function blogManageJson($id)
    {
        $select = new SelectQuery("blogs");
        $select->setQuery("select * from blogs where `id`=" . $id . "");
        $productAr = $select->getQueue();

        $productAr['publish_date'] = date("Y-m-d", $productAr['publish_date']);

        return json_encode($productAr);
    }


    function blogManageRemove($id)
    {
        $select = new SelectQuery("blogs");
        $select->setQuery("select * from blogs where `id`=" . $id . "");
        $blogAr = $select->getQueue();

        if (!$blogAr){
            return json_encode(
                [
                    'error' => 1,
                    'message' => "Blog Not Found",
                ]
            );
        }
        $update = new UpdateQuery("blogs");
        $update->updateRow($blogAr, [
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

    function blogManageUpdate($id)
    {
        $select = new SelectQuery("blogs");
        $select->setQuery("select * from blogs where `id`=" . $id . "");
        $blogAr = $select->getQueue();
        $select = new SelectQuery("category_list");
        $select->setQuery("select * from category_list where `type`='blog'");
        $categoryAllAr = $select->getQueues('id');

        return view("blog-update", [
            'blogAr' => $blogAr,
            'categoryAllAr' => $categoryAllAr,
        ]);

    }

    function blogManageUpdatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image_url' => '',
            'sub_title' => '',
            'publish_date' => '',
            'tags' => '',
            'description' => '',
        ]);

        $select = new SelectQuery("blogs");
        $select->setQuery("select * from blogs where `id`=" . $id . "");
        $productAr = $select->getQueue();

        if ($request->file('image_url')) {
            $file = $request->file('image_url');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('cloud_upload'), $fileName);
            $fileUrl = "/public/cloud_upload/" . $fileName;
        } else {
            $fileUrl = $productAr['image_url'];
        }

        $update = new UpdateQuery("blogs");
        $update->updateRow($productAr, [
            'title' => $request['title'],
            'category' => $request['category'],
            'sub_title' => $request['sub_title'],
            'publish_date' => strtotime($request['publish_date']),
            'tags' => $request['tags'],
            'description' => $request['description'],
            'image_url' => $fileUrl,
        ]);
        $update->submit();


        return redirect()->to('/manage/blog');

    }

    function blogManageImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('cloud_upload'), $fileName);
            $fileUrl = "/public/cloud_upload/" . $fileName;

            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $fileUrl]);
        }
    }
}
