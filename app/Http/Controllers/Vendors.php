<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class Vendors extends Controller
{
      public function show()
    {
        return view('dashboard.vendor',[
             "vendors"=>Vendor::all()
        ]);
       
    }     
      public function index()
    {
        return view('dashboard.vendor.index');
       
    }   
   public function store(Request $request)
    {
        $validateData =  $request->validate([
            'file'=> 'mimes:doc,docx,pdf,xls,xlsx',
            'goods_gty'=> 'required'
        ]);
        // $name = 
        $nama_dokumen = $request->file('file')->getClientOriginalName();
        
        $paths = 'document/'.$nama_dokumen;
        $now = Carbon::now();
    
   

        Vendor::create([
            'filename' =>  $nama_dokumen,
            'path' => $paths,
            'goods_gty' => $request->goods_gty,
            'upload_date' => $now
        ]);
        $path = $request->file('file')->move('document',$nama_dokumen);

       
       
        return redirect('/vendor')->with('succes','Insert document name '.$nama_dokumen.' succesfull');
    }
}
