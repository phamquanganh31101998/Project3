<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\UserInfo;
use App\Http\Requests\UserFormRequest;
use DB;
use App\Feedback;
use Illuminate\Support\Facades\Auth;
class FeedbackController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth', ['except'=>[]]);
    }
    
    public function index(){
    	$feedbacks = Feedback::all();
    	return view('feedback.index', compact('feedbacks'));
    }

    public function show(Request $request){
    	$feedback = Feedback::find($request->id);
    	return view('feedback.show', compact('feedback'));
    }

    public function update(Request $request){
    	$feedback = Feedback::where('id','=',$request->id)->first();
        DB::beginTransaction();
    	try{
    		$feedback->answer = $request->answer;
    		$feedback->isApproved = $request->isApproved;
    		$feedback->save();
    	}
    	catch(Exception $e){
    		DB::rollback();
    		throw $e;
    	}
        DB::commit(); 
        return redirect()->route('feedback.show', $request->id)->with('processSuccess','Xử lý phản hồi thành công');

    }

    public function showForCustomer(Request $request){
        $feedbacks = Feedback::where('isApproved','=','1')->get();
        return view('feedback.showForCustomer', compact('feedbacks'));
    }

    public function showForm(Request $request){
        $user = User::find(Auth::user()->id);
        return view('feedback.form', compact('user'));
    }

    public function send(Request $request){
        DB::beginTransaction();
        try{
            Feedback::create([
                'user_id' => $request->id,
                'feedback' => $request->feedback,
                'isApproved' => '0'
            ]);
        }
        catch(Exception $e){
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('feedback.showForCustomer')->with('success', 'Ý kiến của bạn đã được ghi nhận');
    }
}
