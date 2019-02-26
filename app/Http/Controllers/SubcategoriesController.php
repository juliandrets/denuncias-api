<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    protected $model = Subcategory::class;
    protected $route = 'api/adm/subcategorias/';

    public function index() {
        $categorias = $this->model::orderBy('id', 'desc')->paginate(20);
        $categories = Category::orderBy('id', 'desc')->paginate(100);

        return view('admin-panel.subcategorias', [
            'categorias' => $categorias,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $item = new Subcategory([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
        ]);

        $item->save();

        return redirect($this->route.'?event=created');
    }

    public function update(Request $request, $id)
    {
        $model = $this->model::find($id);
        $model->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect($this->route.'?event=update');
    }
}
