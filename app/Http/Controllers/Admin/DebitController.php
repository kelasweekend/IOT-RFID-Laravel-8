<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\System\Debit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class DebitController extends Controller
{
    public function __construct()
    {
        $this->debit = new Debit();
    }
    public function index()
    {
        $user = User::all(['id', 'name']);
        return view('admin.debit.index', compact('user'));
    }

    public function AddDebit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'code' => 'required|unique:users',
            'user' => 'required',
            'saldo' => 'required',
            'limit' => 'required',
            'pin' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        Debit::create([
            'user_id' => $request->user,
            'code' => "DS13A13",
            'security' => Hash::make($request->pin),
            'amount' => $request->saldo,
            'limit' => $request->limit,
        ]);
        return response()->json(['success' => 'Debit Hass Been Added']);
    }

    public function getData(Request $request)
    {
        $data = $this->debit->getData();
        if ($request->ajax()) {
            # jika ada ajak maka
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn_1 =  ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('admin.debit.edit', $row->id) . '" class="btn btn-info btn-sm shadow-sm pinItem"><i class="fas fa-lock"></i> PIN</a>';
                    $actionBtn_2 =  ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('admin.debit.edit', $row->id) . '" class="btn btn-secondary btn-sm shadow-sm editItem"><i class="fas fa-edit"></i> Change</a>';
                    $actionBtn  = $actionBtn_1 . $actionBtn_2 . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('admin.debit.hapus', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm shadow-sm deleteItem"><i class="fas fa-trash"></i> Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.debit.list');
    }

    public function editData($id)
    {
        $data = $this->debit->find($id);
        return response()->json($data);
    }

    public function pinData(Request $request)
    {
        $data = $this->debit->find($request->Pin_id);
        $validator = Validator::make($request->all(), [
            'pin_before' => 'required',
            'pin_after' => 'required',
            'admin' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if ($request->admin == '12345') {
            # password admin benar maka lanjutkan
            if (Hash::check($request->pin_before, $data->security)) {
                // jika password benar 
                $data->update([
                    'security' => Hash::make($request->pin_after)
                ]);
                return response()->json(['success' => 'Pin Debit Hass Been Update']);
            } else {
                // jika password salah
                return response()->json(['error' => 'Wrong Your Pin']);
            }
        } else {
            # password admin salah
            return response()->json(['error' => 'Wroing Pin Admin, Try Again !']);
        }
    }

    public function updateData(Request $request)
    {
        $data = $this->debit->find($request->Update_id);
        $validator = Validator::make($request->all(), [
            'saldo' => 'required',
            'limit' => 'required',
            'admin' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if ($request->admin == '12345') {
            # password admin benar maka lanjutkan
            $data->update([
                'amount' => $request->saldo,
                'limit' => $request->limit
            ]);
            return response()->json(['success' => 'Debit hass Been Update']);
        } else {
            # password admin salah
            return response()->json(['error' => 'Wroing Pin Admin, Try Again !']);
        }
    }

    public function deleteData($id)
    {
        $this->debit->find($id)->delete();
        return response()->json(['success' => 'Debit hass Been Deleted']);
    }
}
