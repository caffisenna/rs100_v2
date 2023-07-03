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
 * @method static \Database\Factories\AdminConfigFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminConfig withoutTrashed()
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
 * @method static \Database\Factories\BuddylistFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist query()
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Buddylist withoutTrashed()
 */
	class Buddylist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \App\Models\elearning|null $elearning
 * @property-read \App\Models\entryForm|null $entryform
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * Class elearning
 *
 * @package App\Models
 * @version August 24, 2021, 11:52 pm JST
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\elearningFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|elearning newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|elearning newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|elearning onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|elearning query()
 * @method static \Illuminate\Database\Eloquent\Builder|elearning withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|elearning withoutTrashed()
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
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\entryFormFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm query()
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|entryForm withoutTrashed()
 */
	class entryForm extends \Eloquent {}
}

