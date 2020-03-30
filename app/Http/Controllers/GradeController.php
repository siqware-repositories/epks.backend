<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    public function index()
    {
        return Grade::all();
    }
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'name'=>'required'
        ]);
        $store = new Grade();
        $store->name = $validData['name'];
        $store->save();
        return Grade::find($store->id);
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
        Grade::findOrFail($id)->delete();
    }
}
