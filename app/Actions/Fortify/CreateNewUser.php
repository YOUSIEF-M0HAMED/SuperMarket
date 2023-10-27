<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'fname'=>['required', 'min:2', 'max:20', 'alpha'],
            'lname'=>['required', 'min:2', 'max:20', 'alpha'],
            'phone' => ['required', 'digits:11','numeric'],
            'address'=>['nullable', 'min:3', 'max:20', 'string'],
            'age'=>['required','numeric', 'gt:12'],
            'gender'=>['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

       
        if(request()->hasFile('image')){

            $image = request()->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profile_photos'), $imageName);

            }

        return User::create([
            'fname' => $input['fname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'lname' => $input['lname'],
            'phone' => $input['phone'],
            'address' => $input['address'],
            'gender' => $input['gender'],
            'age' => $input['age'],
            'image'=> $imageName,

        ]);
    }
}