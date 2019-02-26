<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $model = Category::class;
    protected $route = 'api/adm/categorias/';

    public function index() {
        $categorias = $this->model::orderBy('id', 'desc')->paginate(20);

        return view('admin-panel.categorias', [
            'categorias' => $categorias
        ]);
    }

    public function store(Request $request)
    {
        $item = new Category([
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
