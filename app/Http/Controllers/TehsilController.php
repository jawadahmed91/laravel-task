<?php

namespace App\Http\Controllers;

use App\Models\Tehsil;
use App\Models\District;
use Illuminate\Http\Request;

class TehsilController extends Controller
{
    public function index()
    {
        $tehsils = Tehsil::with('district.division.province')->get();
        return view('tehsils.index', compact('tehsils'));
    }

    public function create()
    {
        $districts = District::with('division.province')->get();
        return view('tehsils.create', compact('districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'district_id' => 'required|exists:districts,id',
        ]);

        Tehsil::create($request->all());
        return redirect()->route('tehsils.index')->with('success', 'Tehsil created successfully.');
    }

    public function show(Tehsil $tehsil)
    {
        return view('tehsils.show', compact('tehsil'));
    }

    public function edit(Tehsil $tehsil)
    {
        $districts = District::with('division.province')->get();
        return view('tehsils.edit', compact('tehsil', 'districts'));
    }

    public function update(Request $request, Tehsil $tehsil)
    {
        $request->validate([
            'name' => 'required',
            'district_id' => 'required|exists:districts,id',
        ]);

        $tehsil->update($request->all());
        return redirect()->route('tehsils.index')->with('success', 'Tehsil updated successfully.');
    }

    public function destroy(Tehsil $tehsil)
    {
        $tehsil->delete();
        return redirect()->route('tehsils.index')->with('success', 'Tehsil deleted successfully.');
    }
}
