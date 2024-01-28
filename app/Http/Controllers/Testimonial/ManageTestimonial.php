<?php

namespace App\Http\Controllers\Testimonial;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sourav\InsertQuery;
use Sourav\SelectQuery;
use Sourav\UpdateQuery;

class ManageTestimonial
{
    function testimonialManageInfo()
    {
        if (!Auth::id()) {
            return redirect("/login");
        }
        $select = new SelectQuery("testimonial_list");
        $select->setQuery("select * from testimonial_list where 1");
        $testimonialAllAr = $select->getQueues();

        return view('testimonial', ['testimonialAllAr' => $testimonialAllAr]);
    }

    function testimonialManageCreate(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'point' => '',
            'comment' => '',
        ]);

        $insert = new InsertQuery("testimonial_list");
        $insert->addRow([
            'user_name' => $request['user_name'],
            'point' => $request['point'],
            'comment' => $request['comment'],
            'status' => "active",
        ]);
        $insert->submit();

        return redirect()->back()->with('success', 'File uploaded successfully!');

    }

    function testimonialManageJson($id)
    {
        $select = new SelectQuery("testimonial_list");
        $select->setQuery("select * from testimonial_list where `id`=" . $id . "");
        $productAr = $select->getQueue();

        return json_encode($productAr);
    }
    function testimonialManageRemove($id)
    {
        $select = new SelectQuery("testimonial_list");
        $select->setQuery("select * from testimonial_list where `id`=" . $id . "");
        $testimonialAr = $select->getQueue();

        if (!$testimonialAr){
            return json_encode(
                [
                    'error' => 1,
                    'message' => "Blog Not Found",
                ]
            );
        }
        $update = new UpdateQuery("testimonial_list");
        $update->updateRow($testimonialAr, [
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

    function testimonialManageUpdate(Request $request, $id)
    {
        $request->validate([
            'user_name' => 'required',
            'point' => '',
            'comment' => '',
        ]);

        $select = new SelectQuery("testimonial_list");
        $select->setQuery("select * from testimonial_list where `id`=" . $id . "");
        $productAr = $select->getQueue();

        $update = new UpdateQuery("testimonial_list");
        $update->updateRow($productAr, [
            'user_name' => $request['user_name'],
            'point' => $request['point'],
            'comment' => $request['comment'],
        ]);
        $update->submit();

        return redirect()->back()->with('success', 'File uploaded successfully!');

    }
}
