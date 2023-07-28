<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\ProjectPhotos;
use App\Models\ProjectTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        check_permission('project index');
        $projects = Project::all();
        return view('backend.project.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('project create');
        return view('backend.project.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('project create');
        try {
            $project = new Project();
            $project->photo = upload('project', $request->file('photo'));
            $project->save();
            foreach (active_langs() as $lang) {
                $translation = new ProjectTranslation();
                $translation->locale = $lang->code;
                $translation->project_id = $project->id;
                $translation->name = $request->name[$lang->code];
                $translation->description = $request->description[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.project.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.project.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('project edit');
        $project = Project::find($id);
        return view('backend.project.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('project edit');
        try {
            $project = Project::where('id', $id)->with('photos')->first();
            DB::transaction(function () use ($request, $project) {
                if ($request->hasFile('photo')) {
                    if (file_exists($project->photo)) {
                        unlink(public_path($project->photo));
                    }
                    $project->photo = upload('project', $request->file('photo'));
                }
                foreach (active_langs() as $lang) {
                    $project->translate($lang->code)->name = $request->name[$lang->code];
                    $project->translate($lang->code)->description = $request->description[$lang->code];
                }
                $project->save();
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
        check_permission('project edit');
        return CRUDHelper::status('\App\Models\Project', $id);
    }

    public function delete(string $id)
    {
        check_permission('project delete');
        return CRUDHelper::remove_item('\App\Models\Project', $id);
    }
}
