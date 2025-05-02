<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SpeakerController extends Controller
{
    private $route;
    private $view;
    protected $object;

    function __construct(Speaker $object)
    {
        $this->object = $object;
        $this->route = 'speaker';
        $this->view = 'speaker';
    }

    public function index()
    {
        $rows = $this->object::orderBy("created_at", "Desc")->get();
        return view("admin.{$this->view}.index", compact('rows'));
    }
    public function download($type, $id)
    {
        $speaker = $this->object::findOrFail($id);

        if ($type == 'cv' && $speaker->cv_path) {
            $path = public_path(ltrim($speaker->cv_path, '/'));
            if (file_exists($path)) {
                return response()->download($path);
            }
        } elseif ($type == 'doc' && $speaker->doc_path) {
            $path = public_path(ltrim($speaker->doc_path, '/'));
            if (file_exists($path)) {
                return response()->download($path);
            }
        }

        return back()->with('error', 'File not found.');
    }
    public function show($id)
    {
        $row = $this->object::where('id', '=', $id)->first();
        return view("admin.{$this->view}.show", compact('row'));
    }

    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);
        $cvPath = $row->cv_path;
        $docPath = $row->doc_path;

        // Delete files if they exist
        if ($cvPath) {
            $cv_file_path = public_path($cvPath);
            File::delete($cv_file_path);
        }

        if ($docPath) {
            $doc_file_path = public_path($docPath);
            File::delete($doc_file_path);
        }

        $row->delete();
        return redirect()->route("admin.{$this->route}.index")->with('success', 'Speaker application deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $row = $this->object::findOrFail($id);
        $row->status = $request->status;
        $row->save();

        return redirect()->route("admin.{$this->route}.show", $id)->with('success', 'Status updated successfully.');
    }
}
