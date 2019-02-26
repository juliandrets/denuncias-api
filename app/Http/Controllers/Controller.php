<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $model;
    protected $route;

    public function destroy($id)
    {
        $this->model::find($id)->delete();
        return redirect($this->route.'?event=delete');
    }

    public function response($data)
    {
        return response()->json($data , $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
    }

    public function getAll()
    {
        $response = $this->model::all();
        return $this->response($response);
    }
}
