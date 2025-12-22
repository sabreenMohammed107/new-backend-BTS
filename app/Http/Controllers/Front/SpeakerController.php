<?php

namespace App\Http\Controllers\Front;

use App\Mail\SpeakerEnqueryNotification;
use App\Models\Speaker;
use Illuminate\Http\Request;
use App\Models\ApplicantSalut;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SpeakerController extends Controller
{
    public function showForm()
    {
        $salutations = ApplicantSalut::all();
        $countries = DB::table('countries')->get();
        $cities = DB::table('venues')->get();
        return view('front-design-pages.join-us-speaker', compact('salutations', 'countries', 'cities'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'salut_id' => 'required|exists:applicant_saluts,id',
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

            // Create directories if they don't exist
            $cvDirectory = public_path('uploads/speakers/cvs');
            if (!file_exists($cvDirectory)) {
                mkdir($cvDirectory, 0755, true);
            }

            // Move the file
            if ($cvFile->move($cvDirectory, $cvFileName)) {
                $cvPath = 'uploads/speakers/cvs/' . $cvFileName;
            } else {
                return redirect()->back()
                    ->withErrors(['cv_file' => 'Failed to upload CV file'])
                    ->withInput();
            }
        }

        // Handle supporting docs upload
        $docPath = null;
        if ($request->hasFile('supporting_docs')) {
            $docFile = $request->file('supporting_docs');
            $docFileName = time() . '_docs_' . $docFile->getClientOriginalName();

            // Create directories if they don't exist
            $docDirectory = public_path('uploads/speakers/docs');
            if (!file_exists($docDirectory)) {
                mkdir($docDirectory, 0755, true);
            }

            // Move the file
            if ($docFile->move($docDirectory, $docFileName)) {
                $docPath = 'uploads/speakers/docs/' . $docFileName;
            } else {
                return redirect()->back()
                    ->withErrors(['supporting_docs' => 'Failed to upload supporting documents'])
                    ->withInput();
            }
        }
        // Create speaker application record
        $speaker = Speaker::create([
            'salut_id' => $request->salut_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'country_id' => $request->country,
            'venue_id' => $request->city,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'other_data' => $request->other_data,
            'cv_path' => $cvPath,
            'doc_path' => $docPath,
        ]);

        // Attach expertises if any are selected
        if ($request->has('expertise') && is_array($request->expertise)) {
            $speaker->expertises()->attach($request->expertise);
        }

          $emails = ['senior.steps.info@gmail.com', 'info@btsconsultant.com', 'nasser@btsconsultant.com'];
        Mail::to($emails)->send(new SpeakerEnqueryNotification($speaker));

        return redirect()->back()->with('success', 'Your application has been submitted successfully.');
    }
}
