<?php

namespace App\Http\Controllers;

use App\Models\UnionCouncil;
use App\Models\Tehsil;
use Illuminate\Http\Request;

class UnionCouncilController extends Controller
{
    public function index()
    {
        $unionCouncils = UnionCouncil::with('tehsil.district.division.province')->get();
        return view('union-councils.index', compact('unionCouncils'));
    }

    public function create()
    {
        $tehsils = Tehsil::with('district.division.province')->get();
        return view('union-councils.create', compact('tehsils'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tehsil_id' => 'required|exists:tehsils,id',
        ]);

        UnionCouncil::create($request->all());
        return redirect()->route('union-councils.index')->with('success', 'Union Council created successfully.');
    }

    public function show(UnionCouncil $unionCouncil)
    {
        return view('union-councils.show', compact('unionCouncil'));
    }

    public function edit(UnionCouncil $unionCouncil)
    {
        $tehsils = Tehsil::with('district.division.province')->get();
        return view('union-councils.edit', compact('unionCouncil', 'tehsils'));
    }

    public function update(Request $request, UnionCouncil $unionCouncil)
    {
        $request->validate([
            'name' => 'required',
            'tehsil_id' => 'required|exists:tehsils,id',
        ]);

        $unionCouncil->update($request->all());
        return redirect()->route('union-councils.index')->with('success', 'Union Council updated successfully.');
    }

    public function destroy(UnionCouncil $unionCouncil)
    {
        $unionCouncil->delete();
        return redirect()->route('union-councils.index')->with('success', 'Union Council deleted successfully.');
    }
}
