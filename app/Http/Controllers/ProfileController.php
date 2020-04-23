<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{

    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(50)
        ]);
    }

    public function store(User $user)
    {
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('profiles.edit', compact('user'));
    }

    public function update(ProfileRequest $request, User $user)
    {

        $user->update($request->validated());

        return redirect($user->profile());
    }
}