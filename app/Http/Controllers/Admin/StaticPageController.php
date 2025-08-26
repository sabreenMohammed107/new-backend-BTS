<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{

    public function homeMethodologyView() {
        $oneData = array();
        $row = StaticPage::find(1);
        return view("staticPages.homepage.methodology", compact('row'));
    }
    public function homeMethodologyUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(1);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                "details5" => $request->input("details5"),
                "details7" => $request->input("details7"),
                "details9" => $request->input("details9"),
                "details11" => $request->input("details11"),
            ];

            // Handle image uploads for methodology images
            $imageFields = [
                "details2" => "uploads/methodology/",
                "details3" => "uploads/methodology/",
                "details4" => "uploads/methodology/",
                "details6" => "uploads/methodology/",
                "details8" => "uploads/methodology/",
                "details10" => "uploads/methodology/",
                "details12" => "uploads/methodology/",
            ];

            foreach ($imageFields as $field => $path) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path($path), $filename);
                    $dataToBeUpdated[$field] = $path . $filename;
                }
            }

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }

    public function homeAccreditationView() {
        $oneData = array();
        $row = StaticPage::find(2);
        return view("staticPages.homepage.accreditation", compact('row'));
    }
    public function homeAccreditationUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(2);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                "details2" => $request->input("details2"),
            ];

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }
    public function homeTestimonialView() {
        $oneData = array();
        $row = StaticPage::find(4);
        return view("staticPages.homepage.testimonial", compact('row'));
    }
    public function homeTestimonialUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(4);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                "details2" => $request->input("details2"),
            ];

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }

    public function homeContactView() {
        $oneData = array();
        $row = StaticPage::find(3);
        return view("staticPages.homepage.contact", compact('row'));
    }
    public function homeContactUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(3);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                "details2" => $request->input("details2"),
            ];

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }
    public function publicTrainingView() {
        $oneData = array();
        $row = StaticPage::find(7);
        return view("staticPages.service.publicTraining", compact('row'));
    }
    public function publicTrainingUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(7);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                "details4" => $request->input("details4"),
            ];

            // Handle image uploads for public_training images
            $imageFields = [
                "details2" => "uploads/public_training/",
                "details3" => "uploads/public_training/",
            ];

            foreach ($imageFields as $field => $path) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path($path), $filename);
                    $dataToBeUpdated[$field] = $path . $filename;
                }
            }

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }
    public function inHouseTrainingView() {
        $oneData = array();
        $row = StaticPage::find(8);
        return view("staticPages.service.inHouseTraining", compact('row'));
    }
    public function inHouseTrainingUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(8);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
            ];

            // Handle image uploads for in_house_training images
            $imageFields = [
                "details2" => "uploads/in_house_training/",
                "details3" => "uploads/in_house_training/",
                "details4" => "uploads/in_house_training/",
            ];

            foreach ($imageFields as $field => $path) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path($path), $filename);
                    $dataToBeUpdated[$field] = $path . $filename;
                }
            }

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }
    public function consultancyView() {
        $oneData = array();
        $row = StaticPage::find(9);
        return view("staticPages.service.consultancy", compact('row'));
    }
    public function consultancyUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(9);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                 "details4" => $request->input("details4"),
            ];

            // Handle image uploads for consultancy images
            $imageFields = [
                "details2" => "uploads/consultancy/",
                "details3" => "uploads/consultancy/",
            ];

            foreach ($imageFields as $field => $path) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path($path), $filename);
                    $dataToBeUpdated[$field] = $path . $filename;
                }
            }

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }
    public function onlineCoursesView() {
        $oneData = array();
        $row = StaticPage::find(10);
        return view("staticPages.service.onlineCourses", compact('row'));
    }
    public function onlineCoursesUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(10);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                 "details4" => $request->input("details4"),
            ];

            // Handle image uploads for online_courses images
            $imageFields = [
                "details2" => "uploads/online_courses/",
                "details3" => "uploads/online_courses/",
            ];

            foreach ($imageFields as $field => $path) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path($path), $filename);
                    $dataToBeUpdated[$field] = $path . $filename;
                }
            }

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }

    public function whoWeAreView() {
        $oneData = array();
        $row = StaticPage::find(5);
        return view("staticPages.aboutUs.whoWeAre", compact('row'));
    }
    public function whoWeAreUpdate(Request $request) {
        try {
            // Validate the request
            $request->validate([
                'small_description' => 'nullable|string|max:1000',
                'details' => 'nullable|string',
                'details2' => 'nullable|string',
                'details3' => 'nullable|string',
                'video_file' => 'nullable|file|mimes:mp4,avi,mov|max:51200', // 50MB max
            ], [
                'video_file.mimes' => 'The video file must be a file of type: mp4, avi, mov.',
                'video_file.max' => 'The video file may not be greater than 50MB.',
            ]);

            $staticPage = StaticPage::find(5);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                "details2" => $request->input("details2"),
                "details3" => $request->input("details3"),
            ];

            // Handle video upload
            if ($request->hasFile('video_file')) {
                $videoFile = $request->file('video_file');

                // Validate video file
                $allowedTypes = ['video/mp4', 'video/avi', 'video/mov', 'video/quicktime'];
                $maxSize = 50 * 1024 * 1024; // 50MB

                if (!in_array($videoFile->getMimeType(), $allowedTypes)) {
                    return back()->withErrors(["Errors" => "Invalid video format. Please upload MP4, AVI, or MOV files only."]);
                }

                if ($videoFile->getSize() > $maxSize) {
                    return back()->withErrors(["Errors" => "Video file size must be less than 50MB."]);
                }

                // Create upload directory if it doesn't exist
                $uploadPath = public_path('uploads/videos');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Generate unique filename
                $filename = time() . '_' . $videoFile->getClientOriginalName();

                // Move uploaded file
                if ($videoFile->move($uploadPath, $filename)) {
                    $dataToBeUpdated["details4"] = 'uploads/videos/' . $filename;
                } else {
                    return back()->withErrors(["Errors" => "Failed to upload video file."]);
                }
            }

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }
    public function btsTargetView() {
        $oneData = array();
        $row = StaticPage::find(6);
        return view("staticPages.aboutUs.target", compact('row'));
    }
    public function btsTargetUpdate(Request $request) {
        try {
            $staticPage = StaticPage::find(6);
            if (!$staticPage) {
                return back()->withErrors(["Errors" => "Static Page not found!"]);
            }

            $dataToBeUpdated = [
                "small_description" => $request->input("small_description"),
                "details" => $request->input("details"),
                "details2" => $request->input("details2"),
                "details3" => $request->input("details3"),
                "details4" => $request->input("details4"),
                "details6" => $request->input("details6"),
                "details7" => $request->input("details7"),
                "details8" => $request->input("details8"),

            ];

            // Update the static page
            $staticPage->update($dataToBeUpdated);

            return back()->with(["Success" => "Page updated successfully"]);

        } catch (Exception $e) {
            return back()->withErrors(["Errors" => "Internal error! " . $e->getMessage()]);
        }
    }
}
