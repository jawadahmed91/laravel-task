<?php
namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::with('province')->get();
        return view('divisions.index', compact('divisions'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('divisions.create', compact('provinces'));
    }

    public function store(StoreDivisionRequest $request)
    {
        Division::create($request->validated());
        return redirect()->route('divisions.index')->with('success', 'Division created successfully.');
    }

    public function show(Division $division)
    {
        return view('divisions.show', compact('division'));
    }

    public function edit(Division $division)
    {
        $provinces = Province::all();
        return view('divisions.edit', compact('division', 'provinces'));
    }

    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $division->update($request->validated());
        return redirect()->route('divisions.index')->with('success', 'Division updated successfully.');
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('divisions.index')->with('success', 'Division deleted successfully.');
    }
}

