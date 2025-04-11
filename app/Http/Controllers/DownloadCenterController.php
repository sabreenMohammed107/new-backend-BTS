<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DownloadCenter;

class DownloadCenterController extends Controller
{
    public function index()
    {
        $downloadCenterData = DownloadCenter::all();
        return view('front-design-pages.download-center' , compact('downloadCenterData'));
    }
}
