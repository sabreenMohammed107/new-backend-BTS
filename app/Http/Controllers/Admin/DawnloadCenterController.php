<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DawnloadCenter;
use Exception;
use File;
use Illuminate\Http\Request;

class DawnloadCenterController extends Controller
{
    private $route;
    private $view;
    protected $object;
    function __construct(DawnloadCenter $object)
    {
        $this->object = $object;
        $this->route = 'dawnload-center';
        $this->view = 'dawnload-center';
    }

    public function index()
    {
        $rows = $this->object::orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {
        return view("{$this->view}.add");
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token', 'upload_file','image']);

        if ($request->hasFile('upload_file')) {
            $fileData = $this->UplaodFile($request->file('upload_file'));

            if ($fileData) {
                $input = array_merge($input, $fileData);
            }
        }
        if ($request->hasFile('image')) {
            $attach_image = $request->file('image');
            $input['image'] = $this->UplaodImage($attach_image);
        }
        $input['active'] = 1;
        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row = $this->object::findOrFail($id);
        return view("{$this->view}.edit", compact('row'));
    }

    public function update(Request $request,  $id)
    {
        $row = $this->object::findOrFail($id);
        $input = $request->except(['_token', 'upload_file','image']);
        $input['active'] = 1;
        if ($request->hasFile('upload_file')) {
            $fileData = $this->UplaodFile($request->file('upload_file'));

            if ($fileData) {
                $input = array_merge($input, $fileData);
            }
        }
        if ($request->hasFile('image')) {
            $attach_image = $request->file('image');

            $input['image'] = $this->UplaodImage($attach_image);
        }

        $row->update($input);

        return redirect()->route("{$this->route}.index")->with('success', ' update Sucees.');
    }

    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' delete Sucess.');
    }

    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/dawnload_centers');
        //$uploadPath ='C:\inetpub\vhosts\btsconsultant.com\httpdocs\BTSConsultant_Resources\public\uploads/courses';
        try {
            $file->move($uploadPath, $imageName);
        } catch (Exception $e) {
            error_log('Exception: ' . $e->getMessage());
            return $e->getMessage();
        }
        // Move The image..

        // dd($uploadPath);

        return $imageName;
    }
    /**
     * uplaud image
     */
    public function UplaodFile($file_request)
    {
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Rename the image (you can customize this)
        $imageName = $name;
        $uploadPath = public_path('uploads/dawnload_centers');

        try {
            $file->move($uploadPath, $imageName);
        } catch (Exception $e) {
            error_log('Exception: ' . $e->getMessage());
            return null;
        }

        return [
            'upload_file'   => $imageName,
            'file_size'      => $this->formatSizeUnits($size), // formatted size
            'file_extention'=> $ext,
        ];
    }
    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return '1 byte';
        } else {
            return '0 bytes';
        }
    }

}
