<?php

namespace App\Http\Controllers;

use App\Models\Restourant;
use Illuminate\Http\Request;
use App\Http\traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\SanctumAuthController;


class RestourantController extends Controller
{     use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resturants=Restourant::all();
       if( $resturants->isEmpty())
       {
       return  $this->notFoundResponse('not fount restourants');
       }
         return $this->apiResponse($resturants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restourant  $restourant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {      $resturant=Resturant::find($id);
        $input=$request->all();
        $validator=Validator::make($input,['name'=>'requried|string',
        'cusine_type'=>'requried|string|min:6',
        'address'=>'requried|string|min:8'
        ]);
        if(is_null($resturant)){
      
          return  $this->notFoundResponse('not fount this  restourant');
      
        }
           return $this->apiResponse($resturant);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restourant  $restourant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restourant $restourant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restourant  $restourant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resturant $resturant)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restourant  $restourant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant)
    {
       
    }
    public function search(Request $request)
    {
      $validate = Validator::make($request->all(), [
        "address"=> "required|string|min:8",
        "cusine_type"=> "required|string|min:6"
      ]);
    if($validate->fails()){
      return $this-> requiredField($validate->errors()->first());
    }
    $restourants=Restourant::where("address",$request->address)->where("cusine_type",$request->cusine_type)->get();
    // if($restourants->isEmpty())
    // {
    // return  $this->notFoundResponse('not fount restourants');
    // }
      return $this->apiResponse($restourants);
 }
  
  }

