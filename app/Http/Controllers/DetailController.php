<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\archive;
use Illuminate\Support\Facades\Storage;


class DetailController extends Controller
{
    public function download(Request $request, $file)
    {
        $path = Storage::disk('local')->path("upload/" . $file);
        return response()->download($path);
    }

    public function view(Request $request, $file)
    {
        $path = Storage::disk('local')->path("upload/" . $file);
        $content = file_get_contents($path);
        return response($content)->withHeaders(['Content-Type' => mime_content_type($path)]);
    }

    public function edit(Request $request, archive $file)
    {
        $rules = [
            'FileName' => 'required|max:255',
        ];

        $validateData = $request->validate($rules);
        // $renamefile = $;
        archive::where('id', $file->id)
            ->update($validateData);

        Storage::disk('local')->move('upload/' . $file->FileName, 'upload/' . $validateData['FileName']);
        return redirect('/admin/penyimpanan')->with("success", "Berkas berhasil di edit");
        // dd($renamefile);
    }

    public function destroy(archive $archive)
    {
        // delete data in Database
        archive::destroy($archive->id);

        // delete file in storage
        Storage::disk('local')->delete('upload/' . $archive->FileName);
        return redirect('/admin/penyimpanan')->with("success", "File berhasil dihapus");
    }
}
