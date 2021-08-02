<?php

namespace App\Http\Controllers;

use App\article;
use App\data;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $data_person = data::count();
        $data_article = article::count();
        $title = "Dashboard";
        return view('home', compact('data_person', 'data_article', 'title'));
    }

    public function addarticle()
    {
        $title = "Article";
        $article = article::paginate(10);
        return view('auth.article.index', compact('title', 'article'));
    }
    public function detailarticle($id)
    {
        $article = article::where('id', $id)->first();
        return view('auth.article.detail', compact('article'));
    }

    public function people()
    {
        $title = "People Data";
        return view('auth.people.index', compact('title'));
    }
    public function peopletable(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
        // Total records
        $totalRecords = data::select('count(*) as allcount')->count();
        $totalRecordswithFilter = data::select('count(*) as allcount')
            ->where(function ($query) use ($searchValue) {
                $query
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.name', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.tempat_lahir', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.tanggal_lahir', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.kelamin', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.gol_darah', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.alamat', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.agama', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.status_perkawinan', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.pekerjaan', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.kewarganegaraan', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.created_at', 'like', '%' . $searchValue . '%');
                    });
            })
            ->count();


        // Fetch records
        $records = data::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.name', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.tempat_lahir', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.tanggal_lahir', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.kelamin', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.gol_darah', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.alamat', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.agama', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.status_perkawinan', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.pekerjaan', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.kewarganegaraan', 'like', '%' . $searchValue . '%');
                    })
                    ->orWhere(function ($q) use ($searchValue) {
                        $q->where('data.created_at', 'like', '%' . $searchValue . '%');
                    });
            })
            ->skip($start)
            ->take($rowperpage)
            ->get();
        $data_arr = array();
        foreach ($records as $record) {
            $datetime = date('d-m-Y h:i:s', strtotime($record->created_at));
            $name = $record->name;
            $tempat_lahir = $record->tempat_lahir;
            $tanggal_lahir = $record->tanggal_lahir;
            $kelamin = $record->kelamin;
            $gol_darah = $record->gol_darah;
            $alamat = $record->alamat;
            $agama = $record->agama;
            $status_perkawinan = $record->status_perkawinan;
            $pekerjaan = $record->pekerjaan;
            $kewarganegaraan = $record->kewarganegaraan;
            $data_arr[] = array(
                "created_at" => $datetime,
                "name" => $name,
                "tempat_lahir" => $tempat_lahir,
                "tanggal_lahir" => $tanggal_lahir,
                "kelamin" => $kelamin,
                "gol_darah" => $gol_darah,
                "alamat" => $alamat,
                "agama" => $agama,
                "status_perkawinan" => $status_perkawinan,
                "pekerjaan" => $pekerjaan,
                "kewarganegaraan" => $kewarganegaraan,
                "button" => '<div class="d-flex justify-content-around"><button id="manageBtn" type="button" onclick="edit(' . $record->id . ')"class="btn btn-primary btn-sm">Edit</button><button id="manageBtn" type="button" onclick="destroy(' . $record->id . ')"class="btn btn-danger btn-sm">Delete</button></div>',
            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );
        echo json_encode($response);
        exit;
    }
    public function peopledetail($id)
    {
        $data = data::where('id', $id)->first();
        return $data;
    }
    public function peopleedit(Request $request, $id)
    {
        $data = data::where('id', $id)->first();
        $data->name = $request->namevalue;
        $data->tempat_lahir = $request->tempatlahirvalue;
        $data->tanggal_lahir = $request->tanggallahirvalue;
        $data->kelamin = $request->kelamin;
        $data->gol_darah = $request->golongandarah;
        $data->alamat = $request->alamatvalue;
        $data->agama = $request->agama;
        $data->status_perkawinan = $request->statusperkawinanvalue;
        $data->pekerjaan = $request->pekerjaanvalue;
        $data->kewarganegaraan = $request->kewarganegaraanvalue;
        $data->save();
        alert()->success('Successfully!');
        return back();
    }
    public function addpeople(Request $request)
    {
        $data = new data();
        $data->name = $request->namevalue;
        $data->tempat_lahir = $request->tempatlahirvalue;
        $data->tanggal_lahir = $request->tanggallahirvalue;
        $data->kelamin = $request->kelamin;
        $data->gol_darah = $request->golongandarah;
        $data->alamat = $request->alamatvalue;
        $data->agama = $request->agama;
        $data->status_perkawinan = $request->statusperkawinanvalue;
        $data->pekerjaan = $request->pekerjaanvalue;
        $data->kewarganegaraan = $request->kewarganegaraanvalue;
        $data->save();
        alert()->success('Successfully!');
        return back();
    }
    public function deletepeople($id)
    {
        $deletepeople = data::where('id', $id)->first();
        $deletepeople->delete();
        alert()->success('Successfully!');
        return back();
    }
}
