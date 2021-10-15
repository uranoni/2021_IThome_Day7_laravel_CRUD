<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Point;
use App\Models\User;

use App\Models\Trade;
use Faker\Core\Version;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = $request->all();
        $user = Auth::user();
        $skill_id = $request->query('skill_id');
        $user_id = $request->query('user_id');
        $target_user_id = $request->query('target_user_id');
        $myskills = Skill::where('user_id', $user->id)->get();
        // dd($myskills);
        return view('trade.index', [
            'skill_id' => $skill_id,
            'user_id' => $user_id,
            'target_user_id' => $target_user_id,
            'myskills' => $myskills
        ]);
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

        $targetPoint = Point::find($request->point_id);
        $myskillsPoint = Point::query()->where('skill_id', $request->my_skill_id)->get()->first();
        $ScoreGap = abs($myskillsPoint->point - $targetPoint['point']);

        $datenow = date('YmdHis');
        $OrderNo = "A$datenow" . "1";
        $Amount = $ScoreGap * 1000;

        $result = Http::post('http://localhost:8888/createOrder', [
            'OrderNo' => $OrderNo,
            'Amount' => $Amount * 100,
        ]);
        if ($result['Version'] == "1.0.0") {
            $trade = Trade::create([
                'target_user_id' => $targetPoint['user_id'],
                'user_id' => $myskillsPoint->user_id,
                'skill_id' => $targetPoint['skill_id'],
                'my_skill_id' => $myskillsPoint->skill_id, 'shopNo' => $OrderNo, 'amount' => $Amount
            ]);
            return response(['trade' => $trade, 'nonce' =>  $result['Nonce'], 'msg' => $result['Message']]);
            // return response($response);
        }
        // dd($response);
        return "交易失敗";
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
    public function record(Request $request)
    {
        if (!Auth::check()) {
            return view('user.login');
        }
        $user = Auth::user();

        $myresult = DB::table('trades')
            ->join('users', 'trades.target_user_id', '=', 'users.id')
            ->join('skills', 'skills.id', '=', 'trades.skill_id')
            ->where('trades.user_id', $user->id)->select('trades')
            ->select(
                'users.name as target_user_name',
                'skills.title as tatget_skill_title',
                'ShopNo',
                'amount',
                'trades.created_at'
            )
            ->get();
        // $target_user_id = $myresult['target_user_id'];

        // $target_user = User::find($target_user_id);

        return view('trade.record', ['result' => $myresult]);
    }
}
