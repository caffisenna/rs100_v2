<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class AdminConfig
 *
 * @package App\Models
 * @version August 16, 2021, 8:33 pm JST
 * @property string $create_account
 * @property string $create_application
 * @property string $elearning
 * @property string $healthcheck
 * @property string $user_edit
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\AdminConfigFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig newQuery()
 * @method static \Illuminate\Database\Query\Builder|AdminConfig onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereCreateAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereCreateApplication($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereElearning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereHealthcheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig whereUserEdit($value)
 * @method static \Illuminate\Database\Query\Builder|AdminConfig withTrashed()
 * @method static \Illuminate\Database\Query\Builder|AdminConfig withoutTrashed()
 */
	class AdminConfig extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Buddylist
 *
 * @package App\Models
 * @version September 30, 2022, 3:21 pm JST
 * @property integer $person1
 * @property integer $person2
 * @property integer $person3
 * @property integer $person4
 * @property integer $person5
 * @property string $confirmed
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Database\Factories\BuddylistFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist newQuery()
 * @method static \Illuminate\Database\Query\Builder|Buddylist onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist whereConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist wherePerson1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist wherePerson2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist wherePerson3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist wherePerson4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist wherePerson5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Buddylist withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Buddylist withoutTrashed()
 */
	class Buddylist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $is_admin
 * @property int $is_staff
 * @property string|null $is_commi
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $last_login_at
 * @property-read \App\Models\elearning|null $elearning
 * @property-read \App\Models\entryForm|null $entryform
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsCommi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsStaff($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * Class elearning
 *
 * @package App\Models
 * @version August 24, 2021, 11:52 pm JST
 * @property int $id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\elearningFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|elearning newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|elearning newQuery()
 * @method static \Illuminate\Database\Query\Builder|elearning onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|elearning query()
 * @method static \Illuminate\Database\Eloquent\Builder|elearning whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|elearning whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|elearning whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|elearning whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|elearning whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|elearning withTrashed()
 * @method static \Illuminate\Database\Query\Builder|elearning withoutTrashed()
 */
	class elearning extends \Eloquent {}
}

namespace App\Models{
/**
 * Class entryForm
 *
 * @package App\Models
 * @version August 24, 2021, 9:13 pm JST
 * @property string $furigana
 * @property string $bs_id
 * @property string $prefecture
 * @property string $district
 * @property string $dan_name
 * @property string $birth_day
 * @property string $gender
 * @property string $zip
 * @property string $address
 * @property string $telephone
 * @property string $cellphone
 * @property string $50km_exp
 * @property string $parent_name
 * @property string $parent_name_furigana
 * @property string $parent_relation
 * @property string $emer_phone
 * @property string $sm_name
 * @property string $sm_position
 * @property string $memo
 * @property int $id
 * @property int|null $user_id
 * @property int|null $zekken
 * @property string $bs_gs
 * @property string $exp_50km
 * @property string|null $captain
 * @property string|null $sm_confirmation
 * @property string|null $commi_ok
 * @property string|null $buddy_ok
 * @property string|null $buddy_match
 * @property string|null $buddy_type
 * @property string|null $buddy1_name
 * @property string|null $buddy1_dan
 * @property string|null $buddy2_name
 * @property string|null $buddy2_dan
 * @property string|null $fee_checked_at
 * @property string|null $registration_checked_at
 * @property string|null $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\entryFormFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm newQuery()
 * @method static \Illuminate\Database\Query\Builder|entryForm onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm query()
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBirthDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBsGs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBuddy1Dan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBuddy1Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBuddy2Dan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBuddy2Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBuddyMatch($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBuddyOk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereBuddyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereCaptain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereCellphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereCommiOk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereDanName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereEmerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereExp50km($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereFeeCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereFurigana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereMemo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereParentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereParentNameFurigana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereParentRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm wherePrefecture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereRegistrationCheckedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereSmConfirmation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereSmName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereSmPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereTelephone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereZekken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm whereZip($value)
 * @method static \Illuminate\Database\Query\Builder|entryForm withTrashed()
 * @method static \Illuminate\Database\Query\Builder|entryForm withoutTrashed()
 */
	class entryForm extends \Eloquent {}
}

