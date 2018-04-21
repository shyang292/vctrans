<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $notifications = $user->notifications;
        $resArr = array();
        foreach ($notifications as $notification){
            if($notification->viewed == 0){
                array_push($resArr, $notification);
//                $notification->viewed = 1;
//                Notification::findOrFail($notification->id)->update($notification);
                DB::table('notifications')
                    ->where('id', $notification->id)
                    ->update(['viewed' => 1]);
            }
        }
        return view('backend.index', compact('user', 'resArr'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function transferInterface(){

        $user = Auth::user();
        $receiverNumber = 10;

        return view('backend.transInterface', compact('user', 'receiverNumber'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function transferVC(Request $request){
//        //dd($request->receiver);
//        $len = count($request->receiver);
//        for ($i=0;$i<$len; $i++){
//        }
//    }

//    private function transferOneTime($sender, $receiver, $number){
//        //save to transaction log table
//        DB::table('transaction_logs')->insert(
//            ['from' => $sender,
//                'to' => $receiver,
//                'number'=> $number,
//                'created_at' => Carbon::now()
//            ]
//        );
//        //decrease sender vc number
//        DB::table('users')->where('name', '=', $sender)->decrement('virtual_currency', $number);
//        //increase receiver vc number
//        DB::table('users')->where('name', '=', $receiver)->increment('virtual_currency', $number);
//
//    }
}
