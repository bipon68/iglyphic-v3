<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sourav\UpdateQuery;

class UserManage
{
    function userManageInfo()
    {
        if (!Auth::id()) {
            return redirect("/login");
        }
        return view('user');
    }

    function userManageChangePass()
    {
        if (!Auth::id()) {
            return redirect("/login");
        }
        return view('user-password');
    }

    function userManageChangePassPost(Request $request)
    {
        if (!Auth::id()) {
            return redirect("/login");
        }
        $id = Auth::id();

        $inputs = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            're_new_password' => 'required',

        ]);
        if ($inputs['new_password'] != $inputs['re_new_password']) {
            return json_encode(
                [
                    'error' => 0,
                    'message' => " Password Not Match",
                ]
            );
        }
        //Collect User
        $select = new SelectQuery("users");
        $select->setQuery("select * from users where `id`=" . $id . "");
        $userAr = $select->getQueue();

        $update = new UpdateQuery("users");
        $update->updateRow($userAr, [
            'password' => md5($inputs['new_password']),
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
}
