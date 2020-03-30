<?php

namespace App\Http\Controllers;

use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        return Subject::with(['subject_detail','grade_detail','user'])->has('subject_detail')->get();
    }
    public function create()
    {

    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'uid'=>'required',
            'grade_detail.*'=>'required',
            'teacher.*'=>'required',
            'subject.*'=>'required',
            'subject_details.*'=>'required',
            'description'=>'required',
        ]);
        $store = new Subject();
        $store->grade_detail_id = $validData['grade_detail']['value'];
        $store->user_id = $validData['teacher']['value'];
        $store->name = $validData['subject']['label'];
        $store->description = $validData['description'];
        $store->save();
        foreach($validData['subject_details'] as $item){
            DB::table('subject_details')->insert([
                'subject_id'=>$store->id,
                'order'=>$item['order'],
                'title'=>$item['title'],
                'url'=>$item['video'],
                'note'=>$item['note'],
                'attachment'=>$item['attachment'],
                'published'=>$item['publish']['value'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                ]);
        }
        return Subject::with(['subject_detail','grade_detail','user'])->where('id',$store->id)->has('subject_detail')->first();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $validData = $request->validate([
            'uid'=>'required',
            'grade_detail.*'=>'required',
            'teacher.*'=>'required',
            'subject.*'=>'required',
            'subject_details.*'=>'required',
            'description'=>'required',
        ]);
        $store = Subject::findOrFail($id);
        $store->grade_detail_id = $validData['grade_detail']['value'];
        $store->user_id = $validData['teacher']['value'];
        $store->name = $validData['subject']['label'];
        $store->description = $validData['description'];
        $store->save();
        $store->subject_detail()->delete();
        foreach($validData['subject_details'] as $item){
            DB::table('subject_details')->insert([
                'subject_id'=>$store->id,
                'order'=>$item['order'],
                'title'=>$item['title'],
                'url'=>$item['video'],
                'note'=>$item['note'],
                'attachment'=>$item['attachment'],
                'published'=>$item['publish']['value'],
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
//        return Subject::with(['subject_detail','grade_detail','user'])->where('id',$store->id)->has('subject_detail')->first();
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)->subject_detail()->delete();
    }
}
