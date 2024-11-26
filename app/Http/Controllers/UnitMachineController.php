<?php

namespace App\Http\Controllers;

use App\Models\UnitMachine;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.units.index');
    }

    public function data(Request $request) {
        $unit = UnitMachine::where('id','!=',null);

        return datatables($unit)
            ->addIndexColumn()
            ->addColumn('options', function ($row) {
                $act['edit'] = route('units.edit',['unit' => $row->id]);
                $act['delete'] = route('units.destroy',['unit' => $row->id]);
                $act['data'] = $row;

                return view('pages.units.options', $act)->render();
            })
        ->escapeColumns([])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.units.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'unit_name' => 'required|string',
                ],
            );
            UnitMachine::create([
                'unit_name' => $request->unit_name,
            ]);

            return redirect()->route('units.index')->with('toast_success','Data berhasil disimpan.');
        }catch (\Throwable $th) {
            throw $th;
            return redirect()->route('units.index')->with('toast_error', 'Gagal menyimpan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitMachine $unitMachine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unit = UnitMachine::find($id);
        return view('pages.units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate(
                [
                    'unit_name' => 'required|string',
                ],
            );
            $unit = UnitMachine::findOrFail($id);
            $unit->update([
                'unit_name' => $request->unit_name,
            ]);

            return redirect()->route('units.index')->with('toast_success','Data berhasil diperbaharui.');
        }catch (\Throwable $th) {
            throw $th;
            return redirect()->route('units.index')->with('toast_error','Data gagal diperbaharui.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unit = UnitMachine::find($id);
        $unit->delete();
        return redirect()->route('units.index');
    }
}
