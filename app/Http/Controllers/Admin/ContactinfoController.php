<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contactinfo;
use App\Models\Seo;
use Session;
use Image;
use Storage;

class ContactinfoController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    public function index()
    {
        $contacts = Contactinfo::paginate(1);
        $contactcount = Contactinfo::count();
        return view('admin.contactinfo.index',compact('contacts', 'contactcount'));
    }

    public function create()
    {
        $contactcount = Contactinfo::count();
        if($contactcount < 1){
            return view('admin.contactinfo.create');
        }else{
            Session::flash('success', 'شما فقط اجازه ویرایش یک مورد را دارید و نمیتوانید مورد اطلاعات تماس دیگری ایجاد کنید');
            return redirect()->route('contactinfo.index');
        }
    }

    public function store(Request $request)
    {
        $contact = new Contactinfo;
        $contact->phone1 = $request->phone1;
        $contact->phone2 = $request->phone2;
        $contact->phone3 = $request->phone3;
        $contact->email = $request->email;
        $contact->fax = $request->fax;
        $contact->address = $request->address;
        $contact->mapurl = $request->mapurl;
        $contact->lat = $request->lat;
        $contact->long = $request->long;
        $contact->zoom = $request->zoom;
        $contact->whatsapp = $request->whatsapp;
        $contact->telegram = $request->telegram;

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = 'salmatline-contact'.'.'.$extension;
            $location = public_path('img/contact/' . $fileNameToStore);
            $location2 = public_path('img/contact/tiny/' . $fileNameToStore);
            Image::make($image)->fit(1920, 1080)->save($location);
            Image::make($image)->fit(320, 180)->save($location2);
            $contact->image = $fileNameToStore;
        }

        if ($request->hasFile('mappin_image')) {
            $image = $request->file('mappin_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = 'salmatline-map-pin'.'.'.$extension;
            $location = public_path('img/contact/' . $fileNameToStore);
            Image::make($image)->save($location);
            $contact->mappin = $fileNameToStore;
        }

        $contact->save();

        if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $contact->seo()->save($seo);
        }

        Session::flash('success', 'اطلاعات تماس ایجاد شد');
        return redirect()->route('contactinfo.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contact = Contactinfo::find($id);
        return view('admin.contactinfo.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {

        $contact = Contactinfo::find($id);
        $contact->phone1 = $request->input('phone1');
        $contact->phone2 = $request->input('phone2');
        $contact->phone3 = $request->input('phone3');
        $contact->email = $request->input('email');
        $contact->fax = $request->input('fax');
        $contact->address = $request->input('address');
        $contact->mapurl = $request->input('mapurl');
        $contact->lat = $request->input('lat');
        $contact->long = $request->input('long');
        $contact->zoom = $request->input('zoom');
        $contact->whatsapp = $request->input('whatsapp');
        $contact->telegram = $request->input('telegram');

        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = 'salamatline-contact'.'.'.$extension;
            $location = public_path('img/contact/' . $fileNameToStore);
            $location2 = public_path('img/contact/tiny/' . $fileNameToStore);
            Image::make($image)->fit(1024, 768)->save($location);
            Image::make($image)->fit(320, 180)->save($location2);
            $oldFilename = $contact->image;
            $contact->image = $fileNameToStore;

            Storage::delete('img/contact/' . $oldFilename);
            Storage::delete('img/contact/tiny/' . $oldFilename);
        }

        if($request->hasFile('mappin_image')) {
            $image = $request->file('mappin_image');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = 'salamatline-map-pin'.'.'.$extension;
            $location = public_path('img/contact/' . $fileNameToStore);
            Image::make($image)->save($location);
            $oldFilename = $contact->mappin;
            $contact->mappin = $fileNameToStore;

            Storage::delete('img/contact/' . $oldFilename);
        }

        if ($contact->seo){
            $seo = $contact->seo()->first();
            $seo->metadesc = $request->input('metadesc');
            $seo->keywords = $request->input('keywords');
            $contact->seo()->save($seo);
        } else if ($request->metadesc || $request->keywords){
            $seo = new Seo;
            $seo->metadesc = $request->metadesc;
            $seo->keywords = $request->keywords;
            $contact->seo()->save($seo);
        }

        $contact->save();
        Session::flash('success', 'اطلاعات تماس ویرایش شد');
        return redirect()->route('contactinfo.index');
    }

    public function destroy($id)
    {
        //
    }
}
