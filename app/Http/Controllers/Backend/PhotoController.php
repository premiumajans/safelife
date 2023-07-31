<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\PhotoPhotos;
use App\Models\PhotoTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    public function index()
    {
        check_permission('photo index');
        $photos = Photo::with('photos')->get();
        return view('backend.photo.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('photo create');
        return view('backend.photo.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('photo create');
        try {
            $photo = new Photo();
            $photo->photo = upload('photo', $request->file('photo'));
            $photo->save();
            foreach (active_langs() as $lang) {
                $translation = new PhotoTranslation();
                $translation->locale = $lang->code;
                $translation->photo_id = $photo->id;
                $translation->name = $request->name[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.photo.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.photo.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('photo edit');
        $photo = Photo::where('id', $id)->with('photos')->first();
        return view('backend.photo.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('photo edit');
        try {
            $photo = Photo::where('id', $id)->with('photos')->first();
            DB::transaction(function () use ($request, $photo) {
                if ($request->hasFile('photo')) {
                    if (file_exists($photo->photo)) {
                        unlink(public_path($photo->photo));
                    }
                    $photo->photo = upload('photo', $request->file('photo'));
                }
                foreach (active_langs() as $lang) {
                    $photo->translate($lang->code)->name = $request->name[$lang->code];
                }
                $photo->save();
            });
            alert()->success(__('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect()->back();
        }
    }

    public function photos($id)
    {
        check_permission('photo index');
        $photos = Photo::where('id', $id)->with('photos')->first();
        return view('backend.photo.photos', get_defined_vars());
    }

    public function upload(Request $request)
    {
        check_permission('photo create');
        $gallery = Photo::where('id',$request->photo_id)->with('photos')->first();
        foreach (multi_upload('gallery', $request->file('photos')) as $photo) {
            $galleryPhoto = new PhotoPhotos();
            $galleryPhoto->photo = $photo;
            $gallery->photos()->save($galleryPhoto);
        }
        return redirect()->back();
    }

    public function status(string $id)
    {
        check_permission('photo edit');
        return CRUDHelper::status('\App\Models\Photo', $id);
    }

    public function delete(string $id)
    {
        check_permission('photo delete');
        return CRUDHelper::remove_item('\App\Models\Photo', $id);
    }
}
