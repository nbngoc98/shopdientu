<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminThongKeController extends Controller
{
    public function day()
    {
//        $transactions = $this->transactions->paginate(9);
        return view('admin.thongke.day',
            array(
//                'transactions' => $transactions,
            )
        );
    }
    public function month()
    {
//        $transactions = $this->transactions->paginate(9);
        return view('admin.thongke.month',
            array(
//                'transactions' => $transactions,
            )
        );
    }
    public function year()
    {
//        $transactions = $this->transactions->paginate(9);
        return view('admin.thongke.year',
            array(
//                'transactions' => $transactions,
            )
        );
    }
}
