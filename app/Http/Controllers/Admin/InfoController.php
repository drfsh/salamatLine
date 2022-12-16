<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoPage;
use Illuminate\Http\Request;

use Session;
use Image;
use Video;
use Storage;
use File;

class InfoController extends Controller
{
    public function index()
    {
        return view('admin.info.main');
    }

    public function getData()
    {
        $img1 = InfoPage::find(1);
        $img2 = InfoPage::find(2);

        $b1 = InfoPage::find(3);
        $b2 = InfoPage::find(4);
        $b3 = InfoPage::find(5);
        $b4 = InfoPage::find(6);
        $b5 = InfoPage::find(7);
        $images = InfoPage::where('name','images')->first();

        $users = InfoPage::where([['id','!=', 1], ['id','!=', 2], ['id','!=', 3], ['id', '!=',4],
            ['id','!=', 5], ['id','!=', 6], ['id', '!=',7],['name','!=','images']])->get();

        $data['img1'] = $img1->img;
        $data['img2'] = $img2->img;
        $data['b1'] = $b1;
        $data['b2'] = $b2;
        $data['b3'] = $b3;
        $data['b4'] = $b4;
        $data['b5'] = $b5;
        $data['users'] = $users;
        $data['images'] = json_decode($images->info);



        return response()->json($data);
    }

    public function updateImg(Request $request)
    {

        $img1 = InfoPage::find(1);
        $img2 = InfoPage::find(2);

        if ($request->hasFile('img1')) {
            $image = $request->file('img1');
            $extension = $image->getClientOriginalName();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('video/page/');
//            Video::make($image)->save($location);
            $image->move($location,$fileNameToStore);
            $img1->img = $fileNameToStore;
            $img1->save();
        }
        if ($request->hasFile('img2')) {
            $image = $request->file('img2');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->save($location);
            $img2->img = $fileNameToStore;
            $img2->save();
        }

        return response()->json(['true' => true]);
    }

    public function uodateicon(Request $request)
    {

        $img1 = InfoPage::find(3);
        $img2 = InfoPage::find(4);
        $img3 = InfoPage::find(5);
        $img4 = InfoPage::find(6);
        $img5 = InfoPage::find(7);

        if ($request->hasFile('b1')) {
            $image = $request->file('b1');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->save($location);
            $img1->img = $fileNameToStore;
        }
        if ($request->hasFile('b2')) {
            $image = $request->file('b2');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_2' . time() . '.' . $extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->save($location);
            $img2->img = $fileNameToStore;
        }
        if ($request->hasFile('b3')) {
            $image = $request->file('b3');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_3' . time() . '.' . $extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->save($location);
            $img3->img = $fileNameToStore;
        }
        if ($request->hasFile('b4')) {
            $image = $request->file('b4');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_4' . time() . '.' . $extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->save($location);
            $img4->img = $fileNameToStore;
        }
        if ($request->hasFile('b5')) {
            $image = $request->file('b5');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_5' . time() . '.' . $extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->save($location);
            $img5->img = $fileNameToStore;
        }

        $img1->info = $request->infob1;
        $img1->save();
        $img2->info = $request->infob2;
        $img2->save();
        $img3->info = $request->infob3;
        $img3->save();
        $img4->info = $request->infob4;
        $img4->save();
        $img5->info = $request->infob5;
        $img5->save();

        return response()->json(['true' => true]);
    }

    public function newUser(Request $request){

        $user = new InfoPage();
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->save($location);
            $user->img = $fileNameToStore;
        }

        $user->name = $request->name;
        $user->info = $request->info;
        $user->save();

        return response()->json(['true'=>true]);
    }
    public function editUser(Request $request){

        $user = InfoPage::find($request->id);
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $filenameWithExt = $image->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $fileNameToStore = $request->title . '_' . time() . '.' . $extension;
            $location = public_path('img/page/' . $fileNameToStore);
            Image::make($image)->save($location);
            $user->img = $fileNameToStore;
        }

        $user->name = $request->name;
        $user->info = $request->info;
        $user->save();

        return response()->json(['true'=>true]);
    }

    public function deleteUser($id){
        InfoPage::find($id)->delete();
        return response()->json(['true'=>true]);
    }
    public function changeImages(Request $request){

        $images = json_decode($request->images);
        $infoPage = InfoPage::where('name','images')->first();
        $newImage = [];
         foreach($images as $k => $img){
             if (isset($img->path)) $newImage[$k] = ['path'=>$img->path];
             if (!isset($img->name)) continue;
            if ($request->hasFile($img->name)) {
                $image = $request->file($img->name);
                $filenameWithExt = $image->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                $fileNameToStore = $request->title .'_'.$k.'_' . time() . '.' . $extension;
                $location = public_path('img/page/' . $fileNameToStore);
                Image::make($image)->save($location);
                $newImage[$k] = ['path'=>'/img/page/' . $fileNameToStore];
            }
        }
         $infoPage->info = json_encode($newImage);
         $infoPage->save();

         return 'true';
    }
}
