<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Bill;

class AdminController extends Controller
{
    //
    public function index() {
        //month
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $revenueMonth = Bill::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('bill_status', '<>', 'Hủy đơn')
            ->sum('bill_total');


        $startSubMonth = Carbon::now()->subMonth()->startOfMonth();
        $endSuvMonth = Carbon::now()->subMonth()->endOfMonth();
    
        $revenueSubMonth = Bill::whereBetween('created_at', [$startSubMonth, $endSuvMonth])
        ->where('bill_status', '<>', 'Hủy đơn')
        ->sum('bill_total');
        if($revenueSubMonth == 0){
            $revenueMonthPercent = 1;
        }
        else{
            $revenueMonthPercent = $revenueMonth/$revenueSubMonth;
        }

        //week
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();
        $startSubWeek = Carbon::now()->subWeek()->startOfWeek();
        $endSubWeek = Carbon::now()->subWeek()->endOfWeek();
        $revenueWeek = Bill::whereBetween('created_at', [$startOfWeek, $endOfWeek])
        ->where('bill_status', '<>', 'Hủy đơn')
        ->sum('bill_total');

        $revenueSubWeek = Bill::whereBetween('created_at', [$startSubWeek, $endSubWeek])
        ->where('bill_status', '<>', 'Hủy đơn')
        ->sum('bill_total');
        if($revenueSubWeek == 0){
            $revenueWeekPercent = 1;
        }
        else{
            $revenueWeekPercent = $revenueWeek/$revenueSubWeek;
        }

        //day
        $today = Carbon::today();

        $revenueDay = Bill::whereDate('created_at', $today)
            ->where('bill_status', '<>', 'Hủy đơn')
            ->sum('bill_total');

        $yesterday = Carbon::yesterday();
        $revenueSubDay = Bill::whereDate('created_at', $yesterday)
            ->where('bill_status', '<>', 'Hủy đơn')
            ->sum('bill_total');
        if($revenueSubDay == 0){
            $revenueDayPercent = 1;
        }
        else{
            $revenueDayPercent = $revenueDay/$revenueSubDay;
        }
        return view('admin.dashboard', compact(
            'revenueWeek', 
            'revenueWeekPercent', 
            'revenueMonth',
            'revenueMonthPercent',
            'revenueDay',
            'revenueDayPercent'
        ));
    }

}
