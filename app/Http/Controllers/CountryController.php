<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    public function getCountries(Request $request): JsonResponse
    {
        $request->validate([
            'order' => 'in:name,population',
            'sort' => 'in:desc,asc',
        ]);

        $data = Country::select()
                ->when($request->query('name'), function ($query) use ($request) {
                    return $query->where('name', 'LIKE', '%'.$request->query('name').'%');
                })
                ->orderBy($request->query('order', 'name'), $request->query('sort', 'asc'))
                ->get();

        return response()->json(CountryResource::collection($data));
    }
}
