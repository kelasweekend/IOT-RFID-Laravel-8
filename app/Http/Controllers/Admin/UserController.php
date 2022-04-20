<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->user = new User();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            # jika ada ajak maka
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn_1 =  ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('admin.user.edit', $row->id) . '" class="btn btn-info btn-sm shadow-sm pinItem"><i class="fas fa-lock"></i> Password</a>';
                    $actionBtn_2 =  ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('admin.user.edit', $row->id) . '" class="btn btn-secondary btn-sm shadow-sm editItem"><i class="fas fa-edit"></i> Change</a>';
                    $actionBtn  = $actionBtn_1 . $actionBtn_2 . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('admin.user.hapus', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm shadow-sm deleteItem"><i class="fas fa-trash"></i> Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.user.index');
    }

    public function editData($id)
    {
        $data = $this->user->find($id);
        return response()->json($data);
    }

    public function passwordData(Request $request)
    {
        $data = $this->user->find($request->Pin_id);
        $validator = Validator::make($request->all(), [
            'password_before' => 'required',
            'password_after' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if (Hash::check($request->password_before, $data->password)) {
            // jika password benar 
            $data->update([
                'password' => Hash::make($request->password_after)
            ]);
            return response()->json(['success' => 'Password User Hass Been Update']);
        } else {
            // jika password salah
            return response()->json(['error' => 'Wroing Password, Try Again !']);
        }
    }

    public function updateData(Request $request)
    {
        $data = $this->user->find($request->Update_id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }
        $data->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return response()->json(['success' => 'User hass Been Update']);
    }

    public function deleteData($id)
    {
        $this->user->find($id)->delete();
        return response()->json(['success' => 'User hass Been Deleted']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['success' => 'User hass Been Added']);
    }
}
