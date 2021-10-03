<?php

namespace App\Http\Controllers;

use App\Cabor;
use App\Kelas_cabor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CaborController extends Controller
{
    public function index(Request $request) 
    { 
        $data['module']['name'] = "Cabang Olahraga";
        $data['currentAdminMenu'] = 'cabor';
        $cabors = Cabor::all();
        $kelas_cabors = Kelas_cabor::join('cabors', 'kelas_cabors.cabor_id', '=', 'cabors.id')
            ->select(['kelas_cabors.id', 'cabors.cabor', 'kelas_cabors.kelas']);
        if ($request->ajax()) {
            return DataTables::of($kelas_cabors)
            ->addColumn('action', 'uiButton')
            ->toJson();
        }
        
        return view('pages.cabor.index', compact('cabors', 'kelas_cabors'),['data' => $data]); 
    }

    public function data()
    {
        $columns = [
            'id',
            'cabor',
            'kelas',
            'action'    
        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = Kelas_cabor::join('cabors', 'kelas_cabors.cabor_id', '=', 'cabors.id')
        ->select(['kelas_cabors.id', 'cabors.cabor', 'kelas_cabors.kelas']);

        if (request()->input("search.value")) {
            $data = $data->where(function($query){
                $query->whereRaw('LOWER(cabor) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(kelas) like ?', ['%'.strtolower(request()->input("search.value")).'%']);
            });
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
    public function addModal()
    {
        $data['module']['name'] = "Cabang Olahraga";
        $data['currentAdminMenu'] = 'cabor';  
        return view('pages.cabor.add',['data' => $data]);
    }
    public function create()
    {
        $data['module']['name'] = "Cabang Olahraga";
        $data['currentAdminMenu'] = 'cabor';
        $kelas_cabors = Kelas_cabor::all();
        $cabors = Cabor::all();  
        return view('pages.cabor.create', compact('kelas_cabors', 'cabors'), ['data' => $data]);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'cabor_id' => 'required',
            'kelas' => 'required|max:255'
        ]);

        Kelas_cabor::create($validateData);
        // // dd(Kelas_cabor::created($request->all()));
        return redirect('/cabor')->with('success', 'Data berhasil ditambahkan');  
    }
    public function modalStore(Request $request)
    {
        Cabor::create($request->all());
        // dd(Cabor::created($request->all()));
        
        return back();
    }
    public function uiEdit()
    {
        $kelas_cabors = Kelas_cabor::all();
        return view('uiButton', compact('kelas_cabors'));
    }
    public function edit($id)
    {
        $data['module']['name'] = "Cabang Olahraga";
        $data['currentAdminMenu'] = 'cabor';
        $cabors = Cabor::all();
        $kelas_cabors = Kelas_cabor::findOrFail($id);
        return view('pages.cabor.edit', compact('kelas_cabors', 'cabors'), ['data' =>$data]);
    }
    public function update(Request $request, $id)
    {
        Kelas_cabor::findOrFail($id)->update($request->all());
        return redirect('/cabor');
    }
    public function delete($id)
    {
        Kelas_cabor::destroy($id);
        return back()->with('danger', 'Data berhasil dihapus');
    }

    public function addModal()
    {
        $data['module']['name'] = "Cabang Olahraga";
        $data['currentAdminMenu'] = 'cabor';  
        return view('pages.cabor.add',['data' => $data]);
    }
}