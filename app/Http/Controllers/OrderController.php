<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\traits\GeneralTrait;
use App\Http\Resources\OrderResource;
use App\Models\Item_order;
use App\Http\Controllers\SanctumAuthController;

class OrderController extends Controller
{    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::all();
        return $this->apiResponse(OrderResource::collection($order));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
       // 
        $order=Order::create(['date'=>$request->date,
            'total-cost'=>0.0,
            'order_type'=>$request->order_type,
            'restourant_id'=>$id,
              'user_id'=>Auth::id(),
       ]);
       foreach($request->items as $item)
       {
         $item_order=Item_order::create(['order_id'=>$order->id,
         'item_id'=>$item,
        
    ]);
    
       }
        



        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {      $order=Order::find($id);
      
        $order->delete();
        $order=Order::create(['date'=>$request->date,
        'total-cost'=>0.0,
        'order_type'=>$request->order_type,
        'restourant_id'=>$id,
          'user_id'=>Auth::id(),
   ]);
   foreach($request->items as $item)
   {
     $item_order=Item_order::create(['order_id'=>$order->id,
     'item_id'=>$item,
   
                           ]);
            
    }
    return $this->apiResponse($order);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {    $order=Order::find($id);
         $order->delete();
        return $this->apiResponse($order);
    }
}
