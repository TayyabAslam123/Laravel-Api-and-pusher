<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Item;
use Pusher\Pusher;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return response()->json(['status'=>'Success','message'=>'Data received', 'data'=>$items], 200);
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
        $validator = Validator::make($request->all(), [
            'data_two'=>'required',
            'data_three'=>'required',
            'data_twelve'=>'required'
        ]);
        
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json(['code' => 500,'msg' => $error], 500);
         }
         
        $var = new Item();
        $var->data_two = $request->data_two;
        $var->data_three = $request->data_three;
        $var->data_twelve = $request->data_twelve;
        $var->save();

        ## Pusher Logic
        $options = array(
            'cluster' => 'ap2', 
            'encrypted' => true
        );
        //Remember to set your credentials below.
        $pusher = new Pusher(
        'afbb2d4713581f829256',
        '0d1f7215a6e3be5f69d3',
        '1459145',
        $options
        );
        $message = [
            "id"=>$var->id,
            "data_two"=>$var->data_two,
            "data_three"=>$var->data_three,
            "data_twelve"=>$var->data_twelve
        ];
        //Send a message to notify channel with an event name of  notify-event
        $pusher->trigger('my-channel', 'my-event', $message);
        
        return response()->json(['code' => 200,'msg' => 'Data saved successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::whereId($id)->first();
        if(!$item){
            return response()->json(['code' => 404,'msg' => 'No data found'], 200);
        }
        return response()->json(['status'=>'Success','message'=>'Data received', 'data'=>$item], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item=Item::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'data_two'=>'required',
            'data_three'=>'required',
            'data_twelve'=>'required'
        ]);
        
        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return response()->json(['code' => 500,'msg' => $error], 500);
        }
        $var->data_two = $request->data_two;
        $var->data_three = $request->data_three;
        $var->data_twelve = $request->data_twelve;

        if(!$item->isDirty()){
            return response()->json(['message'=>'you need to specify a diffirent value to update','data'=>$item],422);
        } 

        $item->save();
        return response()->json(['code' => 200,'msg' => 'Data Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::whereId($id)->first();

        if(!$item){
            return response()->json(['code' => 404,'msg' => 'No data found'], 200);
        }
        $item->delete();
        return response()->json(['code' => 200,'msg' => 'Data deleted successfully'], 200);
    }
}