<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\UnitMachine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.machines.index');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function data(Request $request){
        $machine = Machine::with('units');

        return datatables($machine)
            ->addIndexColumn()
            ->addColumn('options', function ($row){
                $act['edit'] = route('machines.edit',['machine' => $row->id]);
                $act['delete'] = route('machines.destroy', ['machine' => $row->id]);
                $act['data'] = $row;

                return view('pages.machines.options', $act)->render();
            })
            ->editColumn('unit_id', function($row){
                return $row->units->unit_name;
            })
            ->editColumn('status', function ($row){
                $status = $row->status ? 'Aktif' : 'Nonaktif';
                $color = $row->status ? 'success' : 'danger';
                return '<span class="badge bg-' . $color . '">' . $status . '</span>';
            })
            ->escapeColumns([])
            ->make(true);
    }

    public function create()
    {
        $units = UnitMachine::all();
        return view('pages.machines.create',compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'unit_id' => 'required|exists:unit_machines,id',
                    'machine_code' => 'required|string|max:50',
                    'machine_type' => 'required|string|max:100',
                    'status' => 'required|in:aktif,nonaktif',
                    'location' => 'required|string|max:255',
                ]
                );
            Machine::create([
                'unit_id' => $request->unit_id,
                'machine_code' => strtoupper($request->machine_code), // Pastikan huruf besar
                'machine_type' => $request->machine_type,
                'status' => $request->status,
                'location' => $request->location,
            ]);

            return redirect()->route('machines.index')->with('toast_success', 'Data mesin berhasil disimpan!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $machine = Machine::findOrFail($id);
        $units = UnitMachine::all();

        return view('pages.machines.edit', compact('machine','units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate(
                [
                    'unit_id' => 'required|exists:unit_machines,id',
                    'machine_code' => 'required|string|max:50',
                    'machine_type' => 'required|string|max:100',
                    'status' => 'required|in:aktif,nonaktif',
                    'location' => 'required|string|max:255',
                ]
                );
            $machine = Machine::findOrFail($id);
            $machine->update([
                'unit_id' => $request->unit_id,
                'machine_code' => strtoupper($request->machine_code), // Pastikan huruf besar
                'machine_type' => $request->machine_type,
                'status' => $request->status,
                'location' => $request->location,
            ]);

            return redirect()->route('machines.index')->with('toast_success', 'Data mesin berhasil diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $machine = Machine::find($id);
        $machine->delete();
        return redirect()->route('machines.index');
    }
}
