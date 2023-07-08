<?php

namespace App\Actions\Fortify;

use App\Models\Functions;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    public bool $country = false;
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            "name" => ["required", "string", "max:255"],
            "email" => [
                "required",
                "email",
                "max:255",
                Rule::unique("users")->ignore($user->id),
            ],
            "headline" => ["max:255", "string", "nullable"],
            "phone" => [
                "nullable",
                'regex:/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/',
                Rule::unique("users")->ignore($user->id),
            ],
            "photo" => ["nullable", "mimes:jpg,jpeg,png", "max:1024"],
            "city" => [
                "nullable",
                "lowercase",
                "string",
                "max:255",
                "required_with:state",
                "required_with:country",
            ],
            "state" => [
                "nullable",
                "string",
                "max:255",
                "required_with:city",
                "required_with:country",
                "in:" .
                collect(Functions::getWorldStates())
                    ->keys()
                    ->implode(","),
            ],
//            "country" => [
//                "nullable",
//                "required_with:state",
//                "string",
//                "max:255",
//                "in:" .
//                collect(Functions::COUNTRIES)
//                    ->keys()
//                    ->implode(","),
//            ],
            "linkedin_link" => [
                "nullable",
                "string",
                "url",
                "regex:/^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[A-Za-z0-9_-]+\/?$/",
            ],
            "github_link" => [
                "nullable",
                "string",
                "url",
                "regex:/github.com\/[A-Za-z0-9_-]+$/",
            ],
            "stackoverflow_link" => [
                "nullable",
                "string",
                "url",
                "regex:/stackoverflow.com\/users\/\d+\/[A-Za-z0-9-]+$/",
            ],
            'medium_link' => [
                'nullable',
                'string',
                'url',
                'regex:/^https:\/\/medium\.com\/@([A-Za-z0-9_]+)$/'
            ],

            "interest" => [
                "nullable",
                "string",
                "max:255",
                "in:" .
                collect(Functions::JOBS)
                    ->keys()
                    ->implode(","),
            ],
        ])->validateWithBag("updateProfileInformation");

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
                'interest' => $input['interest'],
                'headline' => $input['headline'],
                'phone' => $input['phone'],
                'city' => $input['city'],
                'state' => $input['state'],
//                'country' => $input['country'],
                "linkedin_link" => $input["linkedin_link"],
                "github_link" => $input["github_link"],
                "stackoverflow_link" => $input["stackoverflow_link"],
                "medium_link" => $input["medium_link"],
            ])->save();
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
            'interest' => $input['interest'],
            'headline' => $input['headline'],
            'phone' => $input['phone'],
            'city' => $input['city'],
            'state' => $input['state'],
//            'country' => $input['country'],
            'email_verified_at' => null,
            "linkedin_link" => $input["linkedin_link"],
            "github_link" => $input["github_link"],
            "stackoverflow_link" => $input["stackoverflow_link"],
            "medium_link" => $input["medium_link"],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
