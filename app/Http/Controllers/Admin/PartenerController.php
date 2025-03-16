<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
class PartenerController extends Controller
{
    private $route;
    private $view;
    protected $object;
    function __construct(Partner $object)
    {
        $this->object = $object;
        $this->route = 'partner';
        $this->view = 'partner';
    }

    public function index()
    {
        $rows=$this->object::orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows',));
    }


    public function create()
    {

        return view("{$this->view}.add");
    }

    public function store(Request $request)
    {
        $request->validate(['partner_name' => 'required|string|max:255']);

        $input = $request->except(['_token','partner_logo_url']);
        $input['active'] = 1;
        if ($request->hasFile('partner_logo_url')) {
            $attach_image = $request->file('partner_logo_url');

            $input['partner_logo_url'] = $this->UplaodImage($attach_image);
        }
        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row=$this->object::findOrFail($id);

        return view("{$this->view}.edit", compact('row'));
    }

    public function update(Request $request,  $id)
    {
        $request->validate(['partner_name' => 'required|string|max:255']);
        $row=$this->object::findOrFail($id);
        $input = $request->except(['_token','partner_logo_url']);
        $input['active'] = 1;
        if ($request->hasFile('partner_logo_url')) {
            $attach_image = $request->file('partner_logo_url');

            $input['partner_logo_url'] = $this->UplaodImage($attach_image);
        }


        $row->update($input);

        return redirect()->route("{$this->route}.index")->with('success', ' update Sucees.');
    }

    public function destroy($id)
    {
        $row=$this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' delete Sucess.');
    }
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/partners');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}

