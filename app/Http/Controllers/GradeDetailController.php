<?php

namespace App\Http\Controllers;

use App\GradeDetail;
use Illuminate\Http\Request;

class GradeDetailController extends Controller
{
    public function index()
    {
        return GradeDetail::all();
    }
    public function indexWithGrade()
    {
        return GradeDetail::with('grade')->get();
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
        $store = new GradeDetail();
        $store->name = $validData['name'];
        $store->grade_id = $validData['grade']['value'];
        $store->save();
        return GradeDetail::find($store->id);
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
        GradeDetail::findOrFail($id)->delete();
    }
}
