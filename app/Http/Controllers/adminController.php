<?php

namespace App\Http\Controllers;
// import model
use App\Models\Marker;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class adminController extends Controller
{
    public function view3DTourManagement(): View {
        // Get All Marker
        // $markers = Marker::latest()->paginate(10);
        $markers = Marker::join('categories','categories.id', '=','markers.categories_id')->get();
        // ambil data kategori
        $data['categories'] = Category::all();

        
        // Return View
        return view('admin.3d-tour-management',compact('markers'),$data);
    }
       /**
     * markerUpload
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    
    public function tambah()
    {
        // ambil data kategori
        $data['categories'] = Category::all();
        return view('admin.3d-tour-management', $data);
    }
     public function createMarker(Request $request): RedirectResponse
    {
        // Validasi Form
        $request->validate(([
            'tempat' => 'required',
            'Keterangan' => 'required',
            'categories_id' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'link' => 'required'
        ]));
        
        // Buat Marker
        Marker::create([
            'tempat' => $request->tempat,
            'keterangan' => $request->keterangan,
            'categories_id' => $request->categories_id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'link' => $request->link
        ]);
        // redirect ke 3dTourManagement
        return redirect()->route('admin.3d-tour-management')->with(['success'=>'Marker Berhasil diTambahkan']);
    }
}