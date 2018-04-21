<?php

namespace App\Http\Controllers;

use App\TransactionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TransactionLogController extends Controller
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
        $results = DB::table('transaction_logs')
            ->where('sender', '=', $user->name)
            ->orWhere('receiver', '=', $user->name)
            ->get();
        return view('backend.transferlog', compact('results'));
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
        //validation
        $data = $request->validate([
            "receiver" => "required|array|min:1",
            "receiver.*" => "required|string|distinct",
            "number"   => "required|array|min:1",
            "number.*"   => "required|integer",
        ]);

        $sender = json_decode($request->sender);

        //sender, receiver[], number[]
        //check sender vc number to see whether he has enough vc to send
        $totalSendingNumber = 0;
        foreach ($request->number as $num){
            $totalSendingNumber += $num;
        }

        if($sender->virtual_currency >= $totalSendingNumber){
            $input = array();
            $input['sender'] = $sender->name;
            $len = count($request->receiver);
            for($i=0;$i<$len;$i++){
                $input['receiver'] = $request->receiver[$i];
                $input['number'] = $request->number[$i];
                TransactionLog::create($input);
                //decrease sender vc number
                DB::table('users')->where('name', '=', $input['sender'])->decrement('virtual_currency', $input['number']);
                //increase receiver vc number
                DB::table('users')->where('name', '=', $input['receiver'])->increment('virtual_currency', $input['number']);
            }
            return redirect('/home');
        }else{
            Session::flash('failed_transfer','you don\'t have enough VC');

            return redirect('/transferVC');

        }

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
