<?php

namespace App\Models\list;

class ListAccountCategory
{
    static public $listMainAr = [
        'liabilities' => "Liabilities",
        'assets' => "Assets",
    ];
    static public $listMainArCode = [
        'liabilities' => 10000000,
        'assets' => 20000000,
    ];
    static public $listSubAr = [
        'bank' => "Bank",
        'cash' => "Cash",
        'cheque' => "Cheque",
        'customer' => "Customer",
        'expense' => "Expense",
        'employee' => "Employee",
        'income' => "Income",
        'purchase' => "Purchase",
        'sale' => "Sale",
        'loan' => "Loan",
    ];
    static public $listSubArCode = [
        'bank' => 11,
        'cash' => 22,
        'cheque' => 33,
        'customer' => 44,
        'expense' => 55,
        'employee' => 66,
        'income' => 77,
        'purchase' => 88,
        'sale' => 99,
        'loan' => 98,
        'lc' => 100,
    ];
}
