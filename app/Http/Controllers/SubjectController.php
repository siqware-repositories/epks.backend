<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return Subject::select('name')->GroupBy('name')->get();
    }
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'name'=>'required',
            'grade.*'=>'required',
        ]);
        $store = new Subject();
        $store->name = $validData['name'];
        $store->grade_id = $validData['grade']['value'];
        $store->save();
        return Subject::find($store->id);
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        Subject::findOrFail($id)->delete();
    }
}
