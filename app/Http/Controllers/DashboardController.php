<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PicModel;
use App\Models\AppModel;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/index', [
            'title' => 'Dashboard',
            'pic' => PicModel::all()->count(),
            'app' => AppModel::all()->count()
        ]);
    }
}
