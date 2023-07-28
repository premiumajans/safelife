<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\CRUDHelper;
use App\Models\PartnerPhotos;
use App\Models\PartnerTranslation;
use Exception;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function index()
    {
        check_permission('partner index');
        $partners = Partner::with('photos')->get();
        return view('backend.partner.index', get_defined_vars());
    }

    public function create()
    {
        check_permission('partner create');
        return view('backend.partner.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        check_permission('partner create');
        try {
            $partner = new Partner();
            $partner->photo = upload('partner', $request->file('photo'));
            $partner->save();
            foreach (active_langs() as $lang) {
                $translation = new PartnerTranslation();
                $translation->locale = $lang->code;
                $translation->partner_id = $partner->id;
                $translation->name = $request->name[$lang->code];
                $translation->description = $request->description[$lang->code];
                $translation->save();
            }
            if ($request->hasFile('photos')){
                foreach (multi_upload('partner', $request->file('photos')) as $photo) {
                    $partnerPhoto = new PartnerPhotos();
                    $partnerPhoto->photo = $photo;
                    $partner->photos()->save($partnerPhoto);
                };
            }
            alert()->success(__('messages.success'));
            return redirect(route('backend.partner.index'));
        } catch (Exception $e) {
            alert()->error(__('backend.error'));
            return redirect(route('backend.partner.index'));
        }
    }

    public function edit(string $id)
    {
        check_permission('partner edit');
        $partner = Partner::where('id', $id)->with('photos')->first();
        return view('backend.partner.edit', get_defined_vars());
    }

    public function update(Request $request, string $id)
    {
        check_permission('partner edit');
        try {
            $partner = Partner::where('id', $id)->with('photos')->first();
            DB::transaction(function () use ($request, $partner) {
                if ($request->hasFile('photo')) {
                    if (file_exists($partner->photo)) {
                        unlink(public_path($partner->photo));
                    }
                    $partner->photo = upload('partner', $request->file('photo'));
                }
                if ($request->hasFile('photos')) {
                    foreach (multi_upload('partner', $request->file('photos')) as $photo) {
                        $partnerPhoto = new PartnerPhotos();
                        $partnerPhoto->photo = $photo;
                        $partner->photos()->save($partnerPhoto);
                    }
                }
                foreach (active_langs() as $lang) {
                    $partner->translate($lang->code)->name = $request->name[$lang->code];
                    $partner->translate($lang->code)->description = $request->description[$lang->code];
                }
                $partner->save();
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
        check_permission('partner edit');
        return CRUDHelper::status('\App\Models\Partner', $id);
    }

    public function delete(string $id)
    {
        check_permission('partner delete');
        return CRUDHelper::remove_item('\App\Models\Partner', $id);
    }
}
