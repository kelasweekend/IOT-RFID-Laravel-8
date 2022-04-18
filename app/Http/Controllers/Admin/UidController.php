<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Uid_reader;
use Illuminate\Http\Request;

class UidController extends Controller
{
    public function sendUID(Request $request)
    {
        Uid_reader::find(1)->update(['UIDresult' => $request->UIDresult]);
    }

    public function getUID (Request $request) 
    {
        if ($request->ajax()) {
            # pastikan hannya dapat diakses oleh ajax
            $data = Uid_reader::find(1);
            return $data->UIDresult;
        }
        return redirect()->route('admin');
    }
}
