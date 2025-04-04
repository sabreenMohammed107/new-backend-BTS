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
                "details4" => $request->input("details5"),
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
    public function inHouseTrainingViewUpdate(Request $request) {
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
}
