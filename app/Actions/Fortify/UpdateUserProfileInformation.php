<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
	        'phone' => ['', 'max:10'],
            'month' => ['max:2'],
            'day' => ['max:2'],
            'year' => ['max:4'],
	        'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:5120'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
            $user->metas()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => $input['phone'],
                    'dob' => $input['month'] . "/" . $input['day'] . "/" . $input['year']
                ]
            );
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();
        $user->metas()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'phone' => $input['phone'],
                'dob' => $input['month'] . "/" . $input['day'] . "/" . $input['year']
            ]
        );

        $user->sendEmailVerificationNotification();
    }
}
