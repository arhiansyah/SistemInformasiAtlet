<?php

namespace App\Http\Controllers;

use App\Cabor;
use App\Instansi;
use App\Jenjang;
use App\Lomba;
use App\Pelatih;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PelatihController extends Controller 
{
    public function index(Request $request) 
    { 
        $data['module']['name'] = "Pelatih";
        $data['currentAdminMenu'] = 'pelatih';
        $instansis = Instansi::all();
        $lombas = Lomba::all();
        $jenjangs = Jenjang::all();
        $cabors = Cabor::all();
        $pelatihs = Pelatih::join('jenjangs', 'jenjangs.id', '=', 'pelatihs.jenjang_id')
        ->join('lombas', 'lombas.id', '=', 'pelatihs.lomba_id')
        ->join('instansis', 'instansis.id', '=', 'pelatihs.instansi_id')
        ->join('cabors', 'cabors.id', '=', 'pelatihs.cabor_id')
        ->select(['pelatihs.id', 'pelatihs.nama', 'instansis.instansi', 'lombas.nama_lomba', 'jenjangs.jenjang', 'cabors.cabor']);
        
        if ($request->ajax()) {
            return DataTables::of($pelatihs)
            ->addColumn('action', 'uiButton')
            ->toJson();
        }
        return view('pages.pelatih.index', compact('instansis', 'cabors', 'pelatihs', 'lombas', 'jenjangs'), ['data' => $data]); 
    }
    public function data()
    {
        $columns = [
            'id',
            'nama',
            'instansi',
            'nama_lomba',
            'jenjang',
            'cabor',
            'action'    
        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = Pelatih::join('instansis', 'pelatihs.instansi_id', '=', 'instansis.id')
        ->join('lombas', 'pelatihs.lomba_id', '=', 'lombas.id')
        ->join('jenjangs', 'pelatihs.jenjang_id', '=', 'jenjangs.id')
        ->join('cabors', 'pelatihs.cabor_id', '=', 'cabors.id')
        ->select(['pelatihs.id', 'pelatihs.nama', 'instansis.instansi', 'lombas.nama_lomba', 'jenjangs.jenjang', 'cabors.cabor']);

        if (request()->input("search.value")) {
            $data = $data->where(function($query){
                $query->whereRaw('LOWER(nama) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(instansi) like ?', ['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(nama_lomba) like ?', ['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(jenjang) like ?', ['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(cabor) like ?', ['%'.strtolower(request()->input("search.value")).'%']);
            });
        }

        if (request()->input('instansi_nama')!=null) {
            $data = $data->where('instansi_id', request()->instansi_nama);
        }
        if (request()->input('lomba_nama')!=null) {
            $data = $data->where('lomba_id', request()->lomba_nama);
        }
        if (request()->input('jenjang_nama')!=null) {
            $data = $data->where('jenjang_id', request()->jenjang_nama);
        }
        if (request()->input('cabor_nama')!=null) {
            $data = $data->where('cabor_id', request()->cabor_nama);
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
        dd(request()->all());
    }    
    public function create()
    {
        $data['module']['name'] = "Pelatih";
        $data['currentAdminMenu'] = 'pelatih';
        $instansis = Instansi::all();
        $pelatihs = Pelatih::all();
        $lombas = Lomba::all();
        $jenjangs = Jenjang::all();
        $cabor = Cabor::all();
        return view('pages.pelatih.create', compact('instansis', 'cabor', 'pelatihs', 'lombas', 'jenjangs'), ['data' => $data]); 
    }
    public function store(Request $request)
    {
        Pelatih::create($request->all());
        return redirect('/pelatih',);  
    }
    public function edit($id)
    {
        $data['module']['name'] = "Pelatih";
        $data['currentAdminMenu'] = 'pelatih';
        $instansis = Instansi::all();
        $lombas = Lomba::all();
        $jenjangs = Jenjang::all();
        $cabors = Cabor::all();
        $pelatihs = Pelatih::findOrFail($id);
        return view('pages.pelatih.edit', compact('pelatihs', 'instansis', 'cabors', 'jenjangs', 'lombas'), ['data' =>$data]);
    }
    public function update(Request $request, $id)
    {
        Pelatih::findOrFail($id)->update($request->all());
        return redirect('/pelatih');
    }
    public function delete($id)
    {
        Pelatih::destroy($id);
        return redirect('/pelatih');
    }

}