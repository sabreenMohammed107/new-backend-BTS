<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\CareerEnqueryNotification;
use App\Models\Career;
use App\Models\careerLevel;
use App\Models\CareersApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class JobApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'career_id' => 'required|exists:careers,id',
            'carrer_level_id' => 'required|exists:career_levels,id',
            'expected_salary' => 'required|string|max:50',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'mobile' => 'required|string|max:20',
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
            $cvPath = $cvFile->storeAs('uploads/applicant', $cvFileName, 'public');
        }

        // Handle supporting docs upload
        $docPath = null;
        if ($request->hasFile('supporting_docs')) {
            $docFile = $request->file('supporting_docs');
            $docFileName = time() . '_docs_' . $docFile->getClientOriginalName();
            $docPath = $docFile->storeAs('uploads/applicant', $docFileName, 'public');
        }

        // Create application record
        $career=CareersApplicant::create([
            'career_id' => $request->career_id,
            'carrer_level_id' => $request->carrer_level_id,
            'expected_salary' => $request->expected_salary,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'cv_path' => $cvPath,
            'doc_path' => $docPath,
        ]);
        $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];
        Mail::to($emails)->send(new CareerEnqueryNotification($career));
        return redirect()->back()->with('success', 'Your application has been submitted successfully.');
    }

    public function showForm()
    {
        try {
            $careers = Career::where('active', 1)->get();
        } catch (\Exception $e) {
            $careers = Career::all();
        }

        try {
            $careerLevels = careerLevel::where('active', 1)->get();
        } catch (\Exception $e) {
            $careerLevels = careerLevel::all();
        }

        return view('front-design-pages.join-team', compact('careers', 'careerLevels'));
    }
}
