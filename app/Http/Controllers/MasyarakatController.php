<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.masyarakat.index',[
            'masyarakats' => Masyarakat::latest()->with(['rt'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.masyarakat.create',[
            'rts' => Rt::get()->all()
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
            'nama' => 'required|max:255',
            'nik' => 'required|max:255|unique:masyarakats',
            'alamat' => 'required|max:255',
        ]);

        $validate['user_id'] = auth()->user()->id;
        $validate['rt_id'] = 'required';

        Masyarakat::create($validate);
        return redirect('/masyarakat')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Masyarakat $masyarakat)
    {
        return view('dashboard.masyarakat.edit',[
            'masyarakats' => Masyarakat::find($masyarakat),
            'rts' => Rt::get()->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        $rules = [
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
        ];

        if($request->nik != $masyarakat->nik){
            $rules['nik'] = 'required|max:255|unique:masyarakats';
        }

        if($request->rt_id != $masyarakat->rt_id){
            $rules['rt_id'] = 'required';
        }

        $validate = $request->validate($rules);

        Masyarakat::where('id', $masyarakat->id)->update($validate);
        return redirect('/masyarakat')->with('success','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $masyarakat)
    {
        Masyarakat::destroy($masyarakat->id);

        return redirect('/masyarakat')->with('success','Deleted Successfully!');
    }

    public function data()
    {
        return Datatables::of(Masyarakat::query())->make(true);
    }
}
