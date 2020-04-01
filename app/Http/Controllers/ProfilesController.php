<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user=User::findOrFail($user);
        $follows = (auth()->user()) ? auth() -> user() -> following -> contains($user->id) : false;


       // $postsCount=$user->posts->count();
       // $followersCount=$user->profile->followers->count();
      //  $followingsCount=$user->following->count();


        $postsCount=Cache::remember(
            'posts.count.'.$user->id,
             now()->addSecond(30), // addWeek,addMonths..
             function () use($user) {
            return $user->posts->count();
        });

        $followersCount= Cache::remember(
            'followers.count.'.$user->id,
             now()->addSecond(30),
             function () use($user){
                return $user->profile->followers->count();
        });

        $followingsCount = Cache::remember(
            'followings.count.'.$user->id,
            now()->addSecond(30),
            function() use($user){
                return $user->following->count();
            }
        );
        return view('profiles.index', compact('follows', 'user', 'postsCount', 'followersCount', 'followingsCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);
        $data = request()->validate([
        'title'=>'required',
        'description' => 'required',
        'url' => ['required','url'],
        'image' => '',
    ]);


        if (request('image')) {
            $imageurl = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imageurl}"))->fit(1000, 1000);
            $image->save();
            $data=array_merge($data, [
            'image' => $imageurl,
        ]);
        }
        auth()->user()->profile->update($data);
        return redirect("/profile/{$user->id}");
    }
}
