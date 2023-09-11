<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Mail;



class AdminOrderController extends Controller
{
    public function index(Request $request){
        // $today = Carbon::now();
        // $orders = Order::whereDate('created_at', $today)->paginate(10);
        $today = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function($q) use ($request){
                            return $q->whereDate('created_at', $request->date);
                        }, function($q) use ($today){
                            return $q->whereDate('created_at', $today);
                        })
                        ->when($request->status != null, function($q) use ($request){
                            return $q->where('status_message', $request->status);
                        })
                        ->paginate(10);
        $fullOrders = Order::paginate(20);
        return view('admin.orders.index', compact('orders', 'fullOrders'));
    }

    public function show(int $orderId){
        $order = Order::where('id', $orderId)->first();
        if($order) {
            return view('admin.orders.view', compact('order'));
        }else {
            return redirect('admin/orders')->with('message'. 'Order Not Found');
        }
    }
    public function updateOrdersStatus(int $orderId, Request $request){
        $order = Order::where('id', $orderId)->first();
        if($order) {
            $order->update([
                'status_message' => $request->order_status,
            ]);
            return redirect('admin/orders/'.$orderId)->with('message', 'Order Status updated');
        }else {
            return redirect('admin/orders/'.$orderId)->with('message'. 'Order Not Found');
        }
    }
    public function viewInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }

    public function generateInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }

    public function mailInvoice(int $orderId){
        $order = Order::findOrFail($orderId);
        try{
            Mail::to("$order->email")->queue(new InvoiceOrderMailable($order));
            return redirect()->back()->with('message', 'Invoice sended to '.$order->email);
        }catch(Exception $e){
            return redirect()->back()->with('message', 'Oops something went wrong');
        }
    }
}
