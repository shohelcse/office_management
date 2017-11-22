<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class trackingController extends Controller
{
    
public function testfunction(Request $request){
     
 $this->validate($request,[
        'session'=> 'required',
        'semester'=> 'required'
    ]);
 
 

 $result = DB::table('courses')->where('session',$request->input('session'))->where('semester',$request->input('semester'))
->join('teachers','courses.id','=','teachers.course_id')
//->join('users','users.id','=','teachers.course_id')
->get();
 //var_dump($result);

return view('layouts.courseTracking',compact('result'));
    }


}
