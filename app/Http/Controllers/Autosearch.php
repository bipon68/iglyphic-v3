<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sourav\SelectQuery;

class Autosearch
{
    public function searchCustomer(Request $request)
    {
        $sql_ar = [];
        if ($_GET['name']) {
            $sql_ar[] = "`name` LIKE " . likeSql("%{val}%", $_GET['name']);
        }
        if ($request->ajax()) {
            $select = new SelectQuery("customer_list");
            $select->setQuery("
            select * from customer_list
            WHERE " . ($sql_ar ? implode(" AND ", $sql_ar) : 1) . "
             ");
            $data = $select->getQueues();
            $output = '';

            if (count($data) > 0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item" data-id=' . $row['id'] . '>' . $row['name'] . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No Data Found' . '</li>';
            }
            return $output;
        }
        return "";
    }

    public function searchVendor(Request $request)
    {

        $sql_ar = [];
        if ($_GET['name']) {
            $sql_ar[] = "`name` LIKE " . likeSql("%{val}%", $_GET['name']);
        }
        if ($request->ajax()) {
            $select = new SelectQuery("vendor_list");
            $select->setQuery("
            select * from
              vendor_list
            WHERE " . ($sql_ar ? implode(" AND ", $sql_ar) : 1) . "
              ");
            $data = $select->getQueues();
            $output = '';

            if (count($data) > 0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item" data-id=' . $row['id'] . '>' . $row['name'] . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No Data Found' . '</li>';
            }
            return $output;
        }
        return "";
    }

    public function searchProduct(Request $request)
    {
        $sql_ar = [];
        if ($_GET['name']) {
            $sql_ar[] = "`title` LIKE " . likeSql("%{val}%", $_GET['name']);
        }
        if ($request->ajax()) {
            $select = new SelectQuery("products");
            $select->setQuery("
            select * from products
            WHERE " . ($sql_ar ? implode(" AND ", $sql_ar) : 1) . "
            ");
            $data = $select->getQueues();
            $output = '';

            if (count($data) > 0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item" data-id=' . $row['id'] . ' data-unit-type=' . $row['unit_type'] . ' data-unit-price=' . $row['unit_price'] . '>' . $row['title'] . '</small></li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No Data Found' . '</li>';
            }
            return $output;
        }
        return "";
    }

    public function searchAccount(Request $request)
    {
        $sql_ar = [];
        if ($_GET['name']) {
            $sql_ar[] = "`title` LIKE " . likeSql("%{val}%", $_GET['name']);
        }
        if ($request->ajax()) {
            $select = new SelectQuery("accounts");
            $select->setQuery("
            select * from accounts
                WHERE " . ($sql_ar ? implode(" AND ", $sql_ar) : 1) . "
            ");
            $data = $select->getQueues();
            $output = '';

            if (count($data) > 0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    if ($row['is_show'] != 'no') {
                        $output .= '<li class="list-group-item" data-id=' . $row['account_id'] . '>' . $row['title'] . '</li>';
                    }
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No Accounts Found' . '</li>';
            }
            return $output;
        }
        return "";
    }

    public function searchAccountNotCustomer(Request $request)
    {
        $sql_ar = [];
        if ($_GET['name']) {
            $sql_ar[] = "`title` LIKE " . likeSql("%{val}%", $_GET['name']);
        }
        if ($request->ajax()) {
            $select = new SelectQuery("accounts");
            $select->setQuery("
            select * from accounts
                WHERE " . ($sql_ar ? implode(" AND ", $sql_ar) : 1) . "
                AND `sub_type`!='customer'
                AND `sub_type`!='lc'
            ");
            $data = $select->getQueues();
            $output = '';

            if (count($data) > 0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    if ($row['is_show'] != 'no') {
                        $output .= '<li class="list-group-item" data-id=' . $row['account_id'] . '>' . $row['title'] . '</li>';
                    }
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No Accounts Found' . '</li>';
            }
            return $output;
        }
        return "";
    }

    public function searchAccountCustomer(Request $request)
    {
        $sql_ar = [];
        if ($_GET['name']) {
            $sql_ar[] = "`title` LIKE " . likeSql("%{val}%", $_GET['name']);
        }
        if ($request->ajax()) {
            $select = new SelectQuery("accounts");
            $select->setQuery("
            select * from accounts
                WHERE " . ($sql_ar ? implode(" AND ", $sql_ar) : 1) . "
                AND `sub_type`='customer'
            ");
            $data = $select->getQueues();
            $output = '';

            if (count($data) > 0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    if ($row['is_show'] != 'no') {
                        $output .= '<li class="list-group-item" data-id=' . $row['account_id'] . '>' . $row['title'] . '</li>';
                    }
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No Accounts Found' . '</li>';
            }
            return $output;
        }
        return "";
    }
    public function searchAccountLC(Request $request)
    {
        $sql_ar = [];
        if ($_GET['name']) {
            $sql_ar[] = "`lc_number` LIKE " . likeSql("%{val}%", $_GET['name']);
        }
        if ($request->ajax()) {
            $select = new SelectQuery("lc_info");
            $select->setQuery("
            select * from lc_info
                WHERE " . ($sql_ar ? implode(" AND ", $sql_ar) : 1) . "
                AND `status`='running'
            ");
            $data = $select->getQueues();
            $output = '';

            if (count($data) > 0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                        $output .= '<li class="list-group-item" data-id=' . $row['id'] . '>' . $row['lc_number'] . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output .= '<li class="list-group-item">' . 'No Accounts Found' . '</li>';
            }
            return $output;
        }
        return "";
    }

}
