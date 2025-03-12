<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048', // Example validation rules
        ]);
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
        File::create([
            'name' => $fileName,
            'path' => $filePath,
        ]);
        return redirect()->back()->with('message', 'File uploaded successfully.');
    }

}

