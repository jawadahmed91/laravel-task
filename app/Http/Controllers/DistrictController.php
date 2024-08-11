<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::with('division.province')->get();
        return view('districts.index', compact('districts'));
    }

    public function create()
    {
        $divisions = Division::with('province')->get();
        return view('districts.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'division_id' => 'required|exists:divisions,id',
        ]);

        District::create($request->all());
        return redirect()->route('districts.index')->with('success', 'District created successfully.');
    }

    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }

    public function edit(District $district)
    {
        $divisions = Division::with('province')->get();
        return view('districts.edit', compact('district', 'divisions'));
    }

    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required',
            'division_id' => 'required|exists:divisions,id',
        ]);

        $district->update($request->all());
        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }

    public function destroy(District $district)
    {
        $district->delete();
        return redirect()->route('districts.index')->with('success', 'District deleted successfully.');
    }
}
