<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\VideoPhotos;
use App\Models\VideoTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index()
    {
        check_permission('video index');
        $videos = Video::all();
        return view('backend.video.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('video create');
        return view('backend.video.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('video create');
        try {
            $video = new Video();
            $video->link = $request->link;
            $video->save();
            foreach (active_langs() as $lang) {
                $translation = new VideoTranslation();
                $translation->locale = $lang->code;
                $translation->video_id = $video->id;
                $translation->name = $request->name[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.video.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.video.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('video edit');
        $video = Video::find($id);
        return view('backend.video.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('video edit');
        try {
            $video = Video::find($id);
            DB::transaction(function () use ($request, $video) {
                $video->link = $request->link;
                foreach (active_langs() as $lang) {
                    $video->translate($lang->code)->name = $request->name[$lang->code];
                }
                $video->save();
            });
            alert()->success(__('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect()->back();
        }
    }

    public function status(string $id)
    {
        check_permission('video edit');
        return CRUDHelper::status('\App\Models\Video', $id);
    }

    public function delete(string $id)
    {
        check_permission('video delete');
        return CRUDHelper::remove_item('\App\Models\Video', $id);
    }
}
