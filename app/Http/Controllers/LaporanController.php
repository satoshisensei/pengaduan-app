<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Laporan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.laporan.index',[
            'laporans' => Laporan::latest()->with(['masyarakat','rt'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.laporan.create',[
            'masyarakats' => Masyarakat::get(),
            'rts' => Rt::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'masyarakat_id' => 'required',
            'rt_id' => 'required',
            'tujuan' => 'required|max:255',
            'anggaran' => 'required|max:255',
            'rincian' => 'required|max:255',
            'total' => 'required|max:255',
        ]);

        $rules = [
            'file' => 'nullable'
        ];

        if($request->file == null){
            $rules;
        }

        if($request->file != null){
            $validate['file'] = 'required';
            $request->file('file')->store('laporan-file');
        }

        $validate['user_id'] = auth()->user()->id;

        Laporan::create($validate);
        return redirect('/laporan')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        return view('dashboard.laporan.edit',[
            'laporans' => Laporan::find($laporan),
            'rts' => Rt::get()->all(),
            'masyarakats' => Masyarakat::get()->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        $rules = [
            'masyarakat_id' => 'required',
            'rt_id' => 'required',
            'tujuan' => 'required|max:255',
            'anggaran' => 'required|max:255',
            'rincian' => 'required|max:255',
            'total' => 'required|max:255',
        ];

        if($request->file == null){
            $rules['file'] = 'nullable';
        }

        if($request->file != null){
            $rules['file'] = 'required';
            $request->file('file')->store('laporan-file');
        }

        $validate['user_id'] = auth()->user()->id;
        $validate = $request->validate($rules);

        Laporan::where('id',$laporan->id)->update($validate);
        return redirect('/laporan')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        Laporan::destroy($laporan->id);

        return redirect('/laporan')->with('success','Deleted Successfully!');
    }

    public function data()
    {
        return Datatables::of(Laporan::query())->make(true);
    }
}
