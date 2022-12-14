<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home', [
           'title' => 'Trang Quản Trị Admin'
        ]);
    }

    public function statistical()
    {
        $monday = date('Y-m-d', strtotime('monday this week'));
        $saturday = date('Y-m-d', strtotime('sunday this week'));
        $weeks = Cart::where('created_at', '>', $monday)->where('created_at', '<', $saturday)->get();
        $totalWeek = 0;
        foreach ($weeks as $wk) {
            $totalWeek += (int)$wk->price*(int)$wk->pty;
        }

        $first = date("Y-m-d", strtotime("first day of this month"));
        $last = date("Y-m-d", strtotime("last day of this month"));
        $month = Cart::where('created_at', '>', $first)->where('created_at', '<', $last)->get();
        $totalMonth = 0;
        foreach ($month as $wk) {
            $totalMonth += (int)$wk->price*(int)$wk->pty;
        }

        $firstY = date("Y-m-d", strtotime("first day of january this year"));
        $lastY = date("Y-m-d", strtotime("last day of december this month"));
        $year = Cart::where('created_at', '>', $firstY)->where('created_at', '<', $lastY)->get();
        $totalYear = 0;
        foreach ($year as $wk) {
            $totalYear += (int)$wk->price*(int)$wk->pty;
        }
        

        return view('admin.statistical.list', [
           'title' => 'Thống Kê',
           'totalDay' => $totalDay,
           'totalWeek' => $totalWeek,
           'totalMonth' => $totalMonth,
           'totalYear' => $totalYear
        ]);
    }
}
