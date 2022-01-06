<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Status;
use App\Models\Balasan;
use App\Models\Laporan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class BalasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.balasan.index',[
            'balasans' => Balasan::with(['laporan'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.balasan.create',[
            'statuses' => Status::get()->all()
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
            'status_id' => 'required'
        ]);

        $validate['user_id'] = auth()->user()->id;

        Balasan::create($validate);
        return redirect('/balasan')->with('success','Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balasan  $balasan
     * @return \Illuminate\Http\Response
     */
    public function show(Balasan $balasan)
    {
        return view('dashboard.balasan.show',[
            'laporans' => Laporan::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balasan  $balasan
     * @return \Illuminate\Http\Response
     */
    public function edit(Balasan $balasan)
    {
        return view('dashboard.balasan.edit',[
            'balasans' => Balasan::find($balasan),
            'statuses' => Status::get()->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balasan  $balasan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balasan $balasan)
    {
        $rules = [
            'status_id' => 'required'
        ];

        $validate = $request->validate($rules);

        $validate['user_id'] = auth()->user()->id;

        Balasan::where('id',$balasan->id)->update($validate);
        return redirect('/balasan')->with('success','Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balasan  $balasan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balasan $balasan)
    {
        Balasan::destroy($balasan->id);

        return redirect('/balasan')->with('success','Deleted Successfully!');
    }

    public function data()
    {
        return Datatables::of(Balasan::query())->make(true);
    }

    public function getWordToPDF()
    {
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        $file = Laporan::file('file')->setPdfRenderPath($domPdfPath);
        $render = $file->setRenderName('DomPdf');

        // load file
        $content = Laporan::get()->load(public_path('laporan-file'));

        // save to PDF
        $PDFWrite = $content->createWriter($content, 'PDF');
        $PDFWrite->save(Str::random(20));
        exit;
    }
}
