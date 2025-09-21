<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccreditationClient;
use Illuminate\Http\Request;

class AccreditationClientsController extends Controller
{
    private $route;
    private $view;

    protected $object;
    public function __construct(AccreditationClient $object)
    {
        $this->object = $object;
        $this->route  = 'accreditationClient';
        $this->view   = 'accreditationClient';
    }

    public function index()
    {
        $rows = $this->object::orderBy("created_at", "Desc")->get();

        return view("{$this->view}.index", compact('rows', ));
    }

    public function create()
    {

        return view("{$this->view}.add", );
    }

    public function store(Request $request)
    {
        $request->validate(['client_name' => 'required|string|max:255']);

        $input           = $request->except(['_token', 'client_logo_url']);
        $input['active'] = 1;
        if ($request->hasFile('client_logo_url')) {
            $attach_image = $request->file('client_logo_url');

            $input['client_logo_url'] = $this->UplaodImage($attach_image);
        }

        $this->object::create($input);
        return redirect()->route("{$this->route}.index")->with('success', 'create new row.');
    }

    public function edit($id)
    {
        $row = $this->object::findOrFail($id);

        return view("{$this->view}.edit", compact('row'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['client_name' => 'required|string|max:255']);
        $row   = $this->object::findOrFail($id);
         $input = $request->except(['_token','client_logo_url']);
        $input['active'] = 1;
        if ($request->hasFile('client_logo_url')) {
            $attach_image = $request->file('client_logo_url');

            $input['client_logo_url'] = $this->UplaodImage($attach_image);
        }


        $row->update($input);

        return redirect()->route("{$this->route}.index")->with('success', ' update Sucess.');
    }

    public function destroy($id)
    {
        $row = $this->object::findOrFail($id);
        $row->delete();
        return redirect()->route("{$this->route}.index")->with('success', ' deleted Success.');
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
        $uploadPath = public_path('uploads/accreditationClient');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
