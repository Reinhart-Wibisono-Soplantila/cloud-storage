<?php

namespace App\Http\Controllers;

use App\Models\archive;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = archive::all();
        return view('MainWebsite.Dashboard.StoragePage', [
            "datas" => $datas
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('File');
        $size = $request->file("File")->getSize();
        $name = $file->getClientOriginalName();
        $name = explode(".", $name);  //name of data file 

        // Change File SIze to human readable
        $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];

        for ($i = 0; $size > 1024; $i++) {
            $size /= 1024;
        }

        $size = round($size, 2) . ' ' . $units[$i];

        $extension = $file->getClientOriginalExtension();

        $archive = new archive();
        $archive->FileName = $name[0];
        $archive->FileSize = $size;
        $archive->FileType = $extension;

        // $datas = array($archive->FileName, $archive->FileSize, $archive->FileType);
        archive::create([
            'FileName' => $archive->FileName,
            'FileSize' => $archive->FileSize,
            'FileType' => Str::upper($archive->FileType)
        ]);
        $request->file('File')->storeAs('upload', $name[0]);
        return redirect('/admin/penyimpanan')->with('status', "File Berhasil di Upload");
        // return $request;

        // return redirect('/admin/archive')->with('failed', "File gagal di Upload");
        // return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function show(archive $archive)
    {
        // $user = archive::findOrFail($archive);
        return view('MainWebsite.Dashboard.DetailPage', [
            "datas" => $archive
        ]);
        // dd($archive);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function edit(archive $archive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, archive $archive)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\archive  $archive
     * @return \Illuminate\Http\Response
     */
    public function destroy(archive $archive)
    {
        // delete data in Database
        archive::destroy($archive->id);

        // delete file in storage
        Storage::disk('local')->delete('upload/' . $archive->FileName);
        return redirect('/admin/penyimpanan')->with("success", "File berhasil dihapus");
    }
}
