<?php

namespace App\Http\Controllers;

use App\Models\TestLaravel;
use Illuminate\Http\Request;

class TestLaravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = TestLaravel::latest()->paginate(5);
        return view("records.index", compact("records"))->with("i", (request()->input("page", 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("records.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(["name"=>"required"]);
        TestLaravel::create($request->all());
        return redirect()->route("records.index")->with("succes", "Created");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TestLaravel $testLaravel
     * @return \Illuminate\Http\Response
     */
    public function show(TestLaravel $testLaravel)
    {
        return view("recoreds.show", compact("record"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TestLaravel $testLaravel
     * @return \Illuminate\Http\Response
     */
    public function edit(TestLaravel $testLaravel)
    {
        return view("records.edit", compact("record"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TestLaravel $testLaravel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestLaravel $testLaravel)
    {
        $request->validate(["name"=>"required"]);
        $testLaravel->update($request->all());
        return redirect()->route("records.index")->with("success","Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TestLaravel $testLaravel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestLaravel $testLaravel)
    {
        $testLaravel->delete();
        return redirect()->route("records.index")->with("success", "Deleted");
    }
}
