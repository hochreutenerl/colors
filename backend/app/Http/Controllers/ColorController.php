<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ColorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Lists all colors in the database
     * @return Color[]|Collection
     */
    public function index()
    {
        return Color::all();
    }

    /**
     * Store a new color in the database
     * @param Request $request
     * @return Color
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'hex' => 'required|string|size:7'
        ]);
        $color = new Color($request->all());
        $color->save();
        return $color;
    }

    /**
     * Delete a color from the database
     * @param $colorId
     * @return mixed
     */
    public function destroy($colorId)
    {
        $color = Color::findOrFail($colorId);
        $color->delete();
        return $color;
    }

}
