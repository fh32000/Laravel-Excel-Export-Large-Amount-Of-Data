<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Jobs\UpdateExportStatusToCompleted;
use App\Models\Export;
use App\Models\User;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate($request->per_page ?? 10);

        return view('pages.users.index', compact('users'));
    }


    /**
     * download a Excel Export for all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        $user = User::inRandomOrder()->first();
        $data = Carbon::now()->format('Y-m-d H:i:s.u');
        $export_file_name = "user-$user->id-export-users-at-$data.xlsx";
        $export= $user->exports()->create([
            'path'=>$export_file_name,
        ]);

        (new UsersExport($export))->queue($export_file_name)->allOnQueue('exports')->chain([
            new UpdateExportStatusToCompleted($export),
        ]);

        return back()->withSuccess("$export_file_name Export started!");


    }

    /**
     * Display a listing of the exports resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exports()
    {
        $exports = Export::paginate($request->per_page ?? 10);

        return view('pages.exports.index', compact('exports'));

    }
    /**
     * download export file.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($export_id)
    {
        $export = Export::whereId($export_id)->first();
       return Storage::download($export->path);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
