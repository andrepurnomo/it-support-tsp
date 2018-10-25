<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Model\Service;
use App\Model\Division;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::orderBy('id','desc')->paginate(10);

        return view('pages.home.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $divisions = Division::all();

        return view('pages.home.create', compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $service = new Service;
        $service->title         = $request->input('title');
        $service->owner         = $request->input('owner');
        $service->division_id   = $request->input('division_id');
        $service->description   = $request->input('description');
        $service->wait_at       = date("Y-m-d H:i:s");
        $service->ip_address    = $request->ip();

        if ($service->save()) {
            $status = 'Laporan Anda diterima dengan nomor '.$service->id;
        } else {
            $status = 'Terjadi kesalahan, mohon hubungi administrator';
        }
        
        return redirect('/')->with('status', $status);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $service = Service::findOrFail($id);

        return view('pages.home.detail', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $service = Service::findOrFail($id);
        $users = User::where('level', '=', 'staff')->get();

        return view('pages.home.reparator', compact(['users', 'service']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $service = Service::findOrFail($id);

        $service->users()->attach($request->input('user_ids'));

        return redirect('/home')->with('status', 'Laporan berhasil ditugaskan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $service = Service::findOrFail($id);

        if ($service->destroy()) {
            return redirect('/home')->with('status', 'Laporan berhasil dihapus');
        } else {
            return redirect('/home')->with('status', 'Terjadi kesalahan!');
        }
    }

    public function wait()
    {
        $services = Service::where('state', '=', 'wait')->orderBy('id','desc')->paginate(10);

        return view('pages.home.index', compact('services'));
    }

    public function process()
    {
        $services = Service::where('state', '=', 'process')->orderBy('id','desc')->paginate(10);

        return view('pages.home.index', compact('services'));
    }

    public function done()
    {
        $services = Service::where('state', '=', 'done')->orderBy('id','desc')->paginate(10);

        return view('pages.home.index', compact('services'));
    }

    public function search(Request $request)
    {
        $services = Service::where('id', '=', $request->input('id'))->paginate(1);

        return view('pages.home.index', compact('services'));
    }

    public function to_done($id)
    {
        $service = Service::find($id);
        if ($service->users()->where('id', '=', Auth::user()->id)->exists() or Auth::user()->level != 'staff') {
            $service->state = 'done';
            $service->done_at = date("Y-m-d H:i:s");
            $service->save();
        } else {
            return redirect('/')->with('status', 'Oopps, jangan nakal ya!');
        }

        return redirect('/')->with('status', 'Service telah diselesaikan '.$service->title);
    }
}
