<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $user = Auth::user();
//        $notifications = $user->notifications;
//        $resArr = array();
//        foreach ($notifications as $notification){
//            if($notification->viewed == 0){
//                array_push($resArr, $notification);
//            }
//        }
//        return view('')
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
        $sender = json_decode($request->sender);
        $input = array();
        $len = count($request->receiver);
        for($i=0;$i<$len;$i++){
            $results = DB::table('users')
                ->where('name', '=', $request->receiver[$i])
                ->get();
            $input['user_id'] = $results[0]->id;
            $input['message'] = $sender->name . ' send ' . $request->receiver[$i] .
                ' ' .$request->number[$i] . ' vc';
            $input['viewed'] = 0;
            Notification::create($input);
        }
        return redirect('/home');
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
}
