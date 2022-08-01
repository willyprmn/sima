<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PicModel;
use App\Models\AppModel;

class UserController extends Controller
{
    public function index()
    {
        return view('user/dashboard', [
            'title' => 'Sistem Informasi Monitoring Aplikasi | BKKBN',
            'pic' => PicModel::all()->count(),
            'app' => AppModel::all()->count(),
            'appOld' => AppModel::where('tahunPengadaan', '<=', date('Y') - 5)->count(),
            'appOff' => AppModel::where('keterangan', 'Tidak aktif')->count(),
            'apps' => AppModel::with('pics')->get()
        ]);
    }
}
