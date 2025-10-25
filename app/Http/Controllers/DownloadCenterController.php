<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DownloadCenter;
use Illuminate\Support\Facades\Storage;

class DownloadCenterController extends Controller
{
    public function index()
    {
        $downloadCenterData = DownloadCenter::all();
        return view('front-design-pages.download-center' , compact('downloadCenterData'));
    }

    public function download($id)
    {
        $downloadItem = DownloadCenter::findOrFail($id);

        // Get the file path from the database
        $filePath = $downloadItem->upload_file;

        // Check if file exists in public directory
        if (file_exists(public_path($filePath))) {
            // Get the original filename from the path
            $fileName = basename($filePath);

            // Return the file as download
            return response()->download(public_path($filePath), $fileName);
        }

        // If file doesn't exist, redirect back with error
        return redirect()->back()->with('error', 'File not found.');
    }
}
