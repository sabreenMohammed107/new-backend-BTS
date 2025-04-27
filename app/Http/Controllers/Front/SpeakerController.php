<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SpeakerController extends Controller
{
    public function showForm()
    {
        return view('front-design-pages.join-us-speaker');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'salutation' => 'nullable|string|max:20',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'address' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'other_data' => 'nullable|string',
            'expertise' => 'nullable|array',
            'expertise.*' => 'string',
            'cv_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'supporting_docs' => 'nullable|file|mimes:pdf,doc,docx,zip|max:10240',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle CV file upload
        $cvPath = null;
        if ($request->hasFile('cv_file')) {
            $cvFile = $request->file('cv_file');
            $cvFileName = time() . '_cv_' . $cvFile->getClientOriginalName();
            $cvPath = $cvFile->storeAs('uploads/speakers', $cvFileName, 'public');
        }

        // Handle supporting docs upload
        $docPath = null;
        if ($request->hasFile('supporting_docs')) {
            $docFile = $request->file('supporting_docs');
            $docFileName = time() . '_docs_' . $docFile->getClientOriginalName();
            $docPath = $docFile->storeAs('uploads/speakers', $docFileName, 'public');
        }

        // Create speaker application record
        Speaker::create([
            'salutation' => $request->salutation,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'other_data' => $request->other_data,
            'expertise' => $request->expertise,
            'cv_path' => $cvPath,
            'doc_path' => $docPath,
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully.');
    }
}
