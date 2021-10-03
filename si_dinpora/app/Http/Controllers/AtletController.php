<?php

namespace App\Http\Controllers;

use App\Atlet;
use App\Cabor;
use App\Jenjang;
use App\Kelas_cabor;
use App\Lomba;
use App\Prestasi;
use App\Sekolah;
use App\Tahun;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AtletController extends Controller
{
    public function index(Request $request) 
    { 
        $data['module']['name'] = "Atlet";
        $data['currentAdminMenu'] = 'atlet';
        $tahuns = Tahun::all();
        $lomba = Lomba::all();
        $jenjangs = Jenjang::all();
        $cabors = Cabor::all();
        $prestasi = Prestasi::all();
        $atlets = Atlet::select('atlets.*')
        ->join('lombas', 'lombas.id', '=', 'atlets.lomba_id')
        ->join('sekolahs', 'sekolahs.id', '=', 'atlets.sekolah_id')
        ->join('cabors', 'cabors.id', '=', 'atlets.cabor_id')
        ->join('kelas_cabors', 'kelas_cabors.id', '=', 'atlets.kelas_cabor_id')
        ->join('tahuns', 'tahuns.id', '=', 'atlets.tahun_id')
        ->join('prestasis', 'prestasis.id', '=', 'atlets.prestasi_id');

        if ($request->ajax()) {
            return DataTables::of($atlets)
            ->addColumn('action', 'uiButton')
            ->toJson();
        }
        
        return view('pages.atlet.index', compact('atlets', 'tahuns', 'lomba', 'jenjangs', 'cabors', 'prestasi'),['data' => $data]); 
    }

    public function data()
    {
        $columns = [
            'id',
            'nama',
            'sekolah',
            'cabor',
            'kelas',
            'tahun',
            'prestasi',    
        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = Atlet::join('sekolahs', 'atlets.sekolah_id', '=', 'sekolahs.id')
        ->join('cabors', 'atlets.cabor_id', '=', 'cabors.id')
        ->join('kelas_cabors', 'atlets.kelas_cabor_id', '=', 'kelas_cabors.id')
        ->join('tahuns', 'atlets.tahun_id', '=', 'tahuns.id')
        ->join('prestasis', 'atlets.prestasi_id', '=', 'prestasis.id')
        ->select(['atlets.id', 'atlets.nama', 'sekolahs.sekolah', 'cabors.cabor', 'kelas_cabors.kelas', 'tahuns.tahun', 'prestasis.prestasi']);

        if (request()->input("search.value")) {
            $data = $data->where(function($query){
                $query->whereRaw('LOWER(nama) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(sekolah) like ?', ['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(cabor) like ?', ['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(kelas) like ?', ['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(tahun) like ?', ['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(prestasi) like ?', ['%'.strtolower(request()->input("search.value")).'%']);
            });
        }

        if (request()->input('tahun_nama')!=null) {
            $data = $data->where('tahun_id', request()->tahun_nama);
        }
        if (request()->input('lomba_nama')!=null) {
            $data = $data->where('lomba_id', request()->lomba_nama);
        }
        if (request()->input('jenjang_nama')!=null) {
            $data = $data->where('jenjang_id', request()->jenjang_nama);
        }
        if (request()->input('prestasi_nama')!=null) {
            $data = $data->where('atlets.prestasi_id', request()->prestasi_nama);
        }
        if (request()->input('cabor_nama')!=null) {
            $data = $data->where('atlets.cabor_id', request()->cabor_nama);
        }

        $recordsFiltered = $data->get()->count();
        $data = $data
        ->skip(request()->input('start'))
        ->take(request()->input('length'))
        ->orderBy($orderBy, request()->input("order.0.dir"))
        ->get()
        ;
        $recordsTotal = $data->count();

        return response()->json([
            'draw'=>request()->input('draw'),
            'recordsTotal'=>$recordsTotal,
            'recordsFiltered'=>$recordsFiltered,
            'data'=>$data,
            'all_request'=>request()->all()
        ]);
    }     
    public function findKelascaborName(Request $request)
    {
        $data = Kelas_cabor::select('kelas', 'id')->where('cabor_id',$request->id)->take(100)->get();
        return response()->json($data);
    }
    public function findSekolahName(Request $request)
    {
        $data = Sekolah::select('sekolah', 'id')->where('jenjang_id',$request->id)->take(100)->get();
        return response()->json($data);
    }
    public function create()
    {
        $cabors = Cabor::all();
        $jenjangs = Jenjang::all();
        $tahuns = Tahun::all();
        $prestasis = Prestasi::all();
        $kejuaraan = Lomba::all();
        $data['tools'] = 'create'; 
        $data['module']['name'] = "Atlet";
        $data['currentAdminMenu'] = 'atlet';
        return view('pages.atlet.create', compact('tahuns', 'kejuaraan', 'prestasis', 'cabors', 'jenjangs'), ['data' =>$data]);
    }
    public function store(Request $request)
    {
        Atlet::create($request->all());
        return redirect('/atlet',);  
    }
    public function edit($id)
    {
        $data['module']['name'] = "Atlet";
        $data['currentAdminMenu'] = 'atlet';
        $data['tools'] = 'edit';
        $cabors = Cabor::all();
        $jenjangs = Jenjang::all();
        $tahuns = Tahun::all();
        $prestasis = Prestasi::all();
        $kejuaraan = Lomba::all();
        $sekolahs = Sekolah::all();
        $atlets = Atlet::findOrFail($id);
        return view('pages.atlet.edit', compact('atlets', 'sekolahs', 'cabors', 'jenjangs', 'tahuns', 'prestasis', 'kejuaraan'), ['data' =>$data]);
    }
    public function update(Request $request, $id)
    {
        Atlet::findOrFail($id)->update($request->all());
        return redirect('/atlet');
    }
    public function delete($id)
    {
        Atlet::destroy($id);
        return back();
    }
    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        Atlet::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"Atlet have been deleted!"]);
    }
}