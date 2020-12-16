<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function list()
    {
        $list = SocialMedia::all();

        return view('admin.social_media_list', compact('list'));
    }

    public function addShow(Request $request)
    {
        $socialMedia = null;
        $socialMediaID = $request->socialMediaID;
        if ($socialMediaID)
        {
            $socialMedia = SocialMedia::find($socialMediaID);
        }

        return view('admin.social_media_add', compact('socialMedia'));
    }

    public function add(Request $request)
    {
        $data = [
            'name' => $request->name,
            'link' => $request->link,
            'order' => $request->order,
            'icon' => $request->icon
        ];

        if ($request->status)
        {
            $data['status'] = 1;
        }

        $socialMediaID = $request->socialMediaID;

        if ($socialMediaID)
        {
            SocialMedia::where('id', $socialMediaID)->update($data);
            alert()->success('Başarılı', "Sosyal Medya hesabınız düzenlendi.")
                ->showConfirmButton('Tamam', '#3085d6')
                ->persistent(true, true);
        }
        else
        {
            SocialMedia::create($data);

            alert()->success('Başarılı', "Sosyal Medya hesabınız eklendi.")
                ->showConfirmButton('Tamam', '#3085d6')
                ->persistent(true, true);
        }

        return redirect()->route('admin.socialMedia.list');
    }

    public function delete(Request $request)
    {
        $socialMediaID = $request->socialMediaID;

        SocialMedia::where('id', $socialMediaID)->delete();

        return response()->json(['message' => 'Başarılı'], 200);
    }

    public function changeStatus(Request $request)
    {
        $socialMediaID = $request->socialMediaID;

        $socialMedia = SocialMedia::find($socialMediaID);
        $status = $socialMedia->status;
        $socialMedia->status = $status ? 0 : 1;
        $socialMedia->save();

        return response()->json([
            'newStatus' => $socialMedia->status == 1 ? "Aktif" : "Pasif",
            'socialMediaID' => $socialMediaID,
            'status' => $socialMedia->status
        ], 200);
    }
}
