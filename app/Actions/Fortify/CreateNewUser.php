<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'nomor_hp' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date','date_format:m/d/Y'],
            'alamat' => ['required', 'string'],
            'pekerjaan' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string',Rule::in(['Laki-laki', 'Perempuan'])],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'no_hp'=>$input['nomor_hp'],
            'tempat_lahir'=>$input['tempat_lahir'],
            'tanggal_lahir'=>date('Y-m-d',strtotime($input['tanggal_lahir'])),
            'alamat'=>$input['alamat'],
            'pekerjaan' => $input['pekerjaan'],
            'jenis_kelamin' => $input['jenis_kelamin'],
        ]);
    }
}
