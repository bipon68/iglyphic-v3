<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sourav\InsertQuery;
use Sourav\SelectQuery;
use Sourav\UpdateQuery;

class CategoryManage
{
    function categoryManageInfo()
    {
        if (!Auth::id()) {
            return redirect("/login");
        }
        $select = new SelectQuery("category_list");
        $select->setQuery("select * from category_list where 1");
        $categoryAllAr = $select->getQueues();

        return view('category', ['categoryAllAr' => $categoryAllAr]);
    }

    function categoryManageCreate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'description' => '',
            'image_url' => '',
        ]);
        if ($request->file('image_url')) {
            $file = $request->file('image_url');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('cloud_upload'), $fileName);
            $fileUrl = "/public/cloud_upload/" . $fileName;
        } else {
            $fileUrl = "";
        }

        $insert = new InsertQuery("category_list");
        $insert->addRow([
            'title' => $request['title'],
            'type' => $request['type'],
            'description' => $request['description'],
            'image_url' => $fileUrl,
            'status' => "active",
        ]);
        $insert->submit();

        return redirect()->back()->with('success', 'File uploaded successfully!');

    }

    function categoryManageJson($id)
    {
        $select = new SelectQuery("category_list");
        $select->setQuery("select * from category_list where `id`=" . $id . "");
        $productAr = $select->getQueue();

        return json_encode($productAr);
    }

    function categoryManageUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'description' => '',
            'image_url' => '',
        ]);

        $select = new SelectQuery("category_list");
        $select->setQuery("select * from category_list where `id`=" . $id . "");
        $productAr = $select->getQueue();
        if ($request->file('image_url')) {
            $file = $request->file('image_url');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('cloud_upload'), $fileName);
            $fileUrl = "/public/cloud_upload/" . $fileName;
        } else {
            $fileUrl = $productAr['image_url'];
        }
        $update = new UpdateQuery("category_list");
        $update->updateRow($productAr, [
            'title' => $request['title'],
            'type' => $request['type'],
            'description' => $request['description'],
            'image_url' => $fileUrl,
        ]);
        $update->submit();

        return redirect()->back()->with('success', 'File uploaded successfully!');

    }
}
