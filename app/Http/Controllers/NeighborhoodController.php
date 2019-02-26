<?php

namespace App\Http\Controllers;

use App\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    protected $model = Neighborhood::class;
    protected $route = 'api/adm/barrios/';

    public function index() {
        $barrios = $this->model::orderBy('id', 'desc')->paginate(20);

        return view('admin-panel.barrios', [
            'barrios' => $barrios
        ]);
    }

    public function store(Request $request)
    {
        $item = new Neighborhood([
            'name' => $request->input('name'),
        ]);

        $item->save();

        return redirect($this->route.'?event=created');
    }

    public function update(Request $request, $id)
    {
        $model = $this->model::find($id);
        $model->update([
            'name' => $request->input('name'),
        ]);

        return redirect($this->route.'?event=update');
    }
}
