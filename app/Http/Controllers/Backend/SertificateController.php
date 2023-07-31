<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\SertificatePhotos;
use App\Models\SertificateTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Sertificate;
use Illuminate\Support\Facades\DB;

class SertificateController extends Controller
{
    public function index()
    {
        check_permission('sertificate index');
        $sertificates = Sertificate::all();
        return view('backend.sertificate.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('sertificate create');
        return view('backend.sertificate.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('sertificate create');
        try {
            $sertificate = new Sertificate();
            $sertificate->photo = upload('sertificate', $request->file('photo'));
            $sertificate->save();
            foreach (active_langs() as $lang) {
                $translation = new SertificateTranslation();
                $translation->locale = $lang->code;
                $translation->sertificate_id = $sertificate->id;
                $translation->name = $request->name[$lang->code];
                $translation->description = $request->description[$lang->code];
                $translation->save();
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.sertificate.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.sertificate.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('sertificate edit');
        $sertificate = Sertificate::find($id);
        return view('backend.sertificate.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('sertificate edit');
        try {
            $sertificate = Sertificate::find($id);
            DB::transaction(function () use ($request, $sertificate) {
                if ($request->hasFile('photo')) {
                    if (file_exists($sertificate->photo)) {
                        unlink(public_path($sertificate->photo));
                    }
                    $sertificate->photo = upload('sertificate', $request->file('photo'));
                }
                foreach (active_langs() as $lang) {
                    $sertificate->translate($lang->code)->name = $request->name[$lang->code];
                    $sertificate->translate($lang->code)->description = $request->description[$lang->code];
                }
                $sertificate->save();
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
        check_permission('sertificate edit');
        return CRUDHelper::status('\App\Models\Sertificate', $id);
    }

    public function delete(string $id)
    {
        check_permission('sertificate delete');
        return CRUDHelper::remove_item('\App\Models\Sertificate', $id);
    }
}
