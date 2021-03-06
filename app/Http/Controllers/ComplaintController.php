<?php

namespace App\Http\Controllers;

use App\Complaint;
use App\Neighborhood;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    protected $model = Complaint::class;
    protected $route = 'api/adm/denuncias';

    public function index()
    {
        $response = $this->model::all();

        return $this->response($response);
    }

    public function store(Request $request)
    {
//        if (!$request->input('picture')) {
//            $picture = 'nopic.jpg';
//        }

        $item = new Complaint([
            'address'           => $request->input('address'),
            'address_number'    => $request->input('address_number'),
            'user_id'           => $request->input('user_id'),
            'category_id'       => $request->input('category_id'),
            'subcategory_id'    => $request->input('subcategory_id'),
            'neighborhood_id'   => $request->input('neighborhood_id'),
            'picture'           => 'nopic.jpg',
        ]);

        if ($item->save()) {
            return $this->response($item);
        }
    }

    public function denunciasBarrio($barrio)
    {
        $barrio = Neighborhood::where('name', $barrio)->first();

        $denuncias = $this->model::where('neighborhood_id', $barrio->id)->get();

        foreach ($denuncias as $item) {
            $item->date = $item->created_at->format('d M Y');
        }

        return view('admin-panel.denuncias-barrio', [
           'barrio'     => $barrio,
           'denuncias'  => $denuncias
        ]);
    }

    public function check($id)
    {
        $denuncia = $this->model::find($id);
        $denuncia->checked = $denuncia->checked ? 0 : 1;
        $denuncia->save();
        return back();
    }

    public function destroyComplaint($id, $barrio)
    {
        $this->route = $this->route.'/'.$barrio;
        $this->model::find($id)->delete();
        return redirect($this->route.'?event=delete');
    }
}
