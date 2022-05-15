<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
class ordersAdminController extends Controller
{
    public function index(request $request){

$order = order::query();

$order = $order->where('id',$request->id);

$order = $order->where('billing_name',$request->billing_name);

$order = $order->where('billing_number',$request->billing_number);

$order = $order->

    }
}
