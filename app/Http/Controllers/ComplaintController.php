<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    protected $model = Complaint::class;

    public function index()
    {
        $response = $this->model::all();
        return $this->response($response);
    }

    public function store(Request $request)
    {
        if (!$request->input('picture')) {
            $picture = 'nopic.jpg';
        }

        $item = new Complaint([
            'address' => $request->input('address'),
            'address_number' => $request->input('address_number'),
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'neighborhood_id' => $request->input('neighborhood_id'),
            'picture' => $picture,
        ]);

        $item->save();
    }
}
