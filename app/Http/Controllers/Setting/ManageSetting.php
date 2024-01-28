<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Sourav\InsertQuery;
use Sourav\SelectQuery;
use Sourav\UpdateQuery;

class ManageSetting
{
    function __construct()
    {
        error_reporting(E_ALL ^ E_NOTICE);
        error_reporting(0);
    }

    function manageSettingInfo()
    {
        if (!Auth::id()) {
            return redirect("/login");
        }
        $select = new SelectQuery("setting");
        $select->setQuery("select * from setting where 1");
        $settingAr = $select->getQueues('type');

        return view('setting', ['settingAr' => $settingAr]);
    }

    function manageSettingPost(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'typeValue' => '',
        ]);
        $select = new SelectQuery("setting");
        $select->setQuery("select * from setting where `type`='" . $request['type'] . "'");
        $settingAr = $select->getQueue();

        if ($settingAr['type'] == $request['type']) {
            $insert = new UpdateQuery("setting");
            $insert->updateRow($settingAr, [
                'type' => $request['type'],
                'value' => $request['typeValue']
            ]);
            $insert->submit();
        } else {
            $insert = new InsertQuery("setting");
            $insert->addRow([
                'type' => $request['type'],
                'value' => $request['typeValue']
            ]);
            $insert->submit();
        }
        return json_encode($insert->getMessage());

    }
}
