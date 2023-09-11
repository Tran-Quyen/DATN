<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index(){

        return view('admin.chart.index');
    }

    public function chart(Request $request) {
        $group = $request->query('group', 'month');
        $query = Order::select([
            DB::raw('SUM(total) as total'),
            DB::raw('COUNT(*) as count'),
        ])
        ->where('status_message', 'completed')
        ->orWhere('payment_id', '<>', null)
        ->groupBy([
            'label'
        ])
        ->orderBy('label');
        switch($group) {
            case 'day':
                $query->addSelect(DB::raw('DATE(created_at) as label')) ;
                $query->whereDate('created_at', '>=', Carbon::now()->startOfMonth());
                $query->whereDate('created_at', '<=', Carbon::now()->endOfMonth());
                break;
            case 'week':
                $query->addSelect(DB::raw('DATE(created_at) as label')) ;
                $query->whereDate('created_at', '>=', Carbon::now()->startOfWeek());
                $query->whereDate('created_at', '<=', Carbon::now()->endOfWeek());
                break;
            case 'year':
                $query->addSelect(DB::raw('YEAR(created_at) as label')) ;
                $query->whereYear('created_at', '>=', Carbon::now()->subYears(2)->year);
                $query->whereYear('created_at', '<=', Carbon::now()->addYears(2)->year);
                break;
            case 'month':
                $query->addSelect(DB::raw('Month(created_at) as label')) ;
                $query->whereDate('created_at', '>=', Carbon::now()->startOfYear());
                $query->whereDate('created_at', '<=', Carbon::now()->endOfYear());
                break;

            default:

        }
        $datas = $query->get();
        $labels = $total = $count = [];
        foreach($datas as $data){
            $labels[] = $data->label;
            $total[$data->label] = $data->total;
            $count[$data->label] = $data->count;
        }
        return [
            'group' => $group,
            'labels' => array_values($labels),
            'datasets' => [
                [
                    'label' => 'Total Sales $',
                    'data' => array_values($total),
                ],
                [
                    'label' => 'Order #',
                    'data' => array_values($count),
                ],
            ]
        ];
    }
}
