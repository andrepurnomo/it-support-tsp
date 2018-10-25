<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Model\Service;

class DashboardController extends Controller
{
    //
    public function server() 
    {
        $res = file_get_contents('https://server-status-tsp.firebaseapp.com/status');
        $servers = json_decode($res);

        return view('pages.dashboard.server', compact('servers'));
    }

    public function task()
    {
        $services = User::find(Auth::user()->id)->services()->where('state', '=', 'process')->paginate(10);

        return view('pages.home.index', compact('services'));
    }

    public function report()
    {
        return view('pages.dashboard.report_form');
    }

    public function report_result(Request $request)
    {
        $services = Service::where('created_at', '>=', $request->input('date_start'))
                            ->where('created_at', '<=', $request->input('date_end'))
                            ->paginate(10);
        $services->appends([
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end')
        ]);

        return view('pages.home.index', compact('services'));
    }
}
