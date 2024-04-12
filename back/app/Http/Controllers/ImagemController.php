<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagemController extends Controller
{
    public function index(Request $request)
    {
        $imovel_id = $request->input('imovel_id');
        $images = Image::where('imovel_id', $imovel_id)->ordered()->get();

        return view('images.index', compact('imovel_id', 'images'));
    }

    public function store(Request $request)
    {
        $imovel_id = $request->input('imovel_id');
        $files = $request->file('images');

        foreach ($files as $file) {
            $filename = $file->hashName();
            $file->storeAs('public/images', $filename);

            $image = new Image([
                'imovel_id' => $imovel_id,
                'filename' => $filename,
            ]);
            $image->save();
        }

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        $image->is_featured = $request->input('is_featured') == '1';
        $image->order = $request->input('order');
        $image->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        Storage::delete('public/images/' . $image->filename);
        $image->delete();

        return redirect()->back();
    }
}
