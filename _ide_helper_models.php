<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Rpgo\Models{
/**
 * Rpgo\Models\User
 *
 * @property string $id 
 * @property string $name 
 * @property string $email 
 * @property string $password 
 * @property string $remember_token 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|World[] $createdWorlds 
 * @property-read \Illuminate\Database\Eloquent\Collection|Member[] $memberships 
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\User whereUpdatedAt($value)
 */
	class User {}
}

namespace Rpgo\Models{
/**
 * Rpgo\Models\Member
 *
 * @property string $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $name 
 * @property string $slug 
 * @property string $world_id 
 * @property string $user_id 
 * @property-read User $user 
 * @property-read World $world 
 * @property-read \Illuminate\Database\Eloquent\Collection|Location[] $createdLocations 
 * @property-read \Illuminate\Database\Eloquent\Collection|Role[] $roles 
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Member whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Member whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Member whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Member whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Member whereWorldId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Member whereUserId($value)
 * @method static \Rpgo\Models\Member ofWorld($world)
 * @method static \Rpgo\Models\Member ofWorldAndUser($world, $user)
 * @method static \Rpgo\Models\Member ofType($type)
 */
	class Member {}
}

namespace Rpgo\Models{
/**
 * Rpgo\Models\Character
 *
 * @property string $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $name 
 * @property string $slug 
 * @property string $creator_id 
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Character whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Character whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Character whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Character whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Character whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Character whereCreatorId($value)
 */
	class Character {}
}

namespace Rpgo\Models{
/**
 * Rpgo\Models\Location
 *
 * @property string $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $name 
 * @property string $slug 
 * @property string $creator_id 
 * @property-read \Illuminate\Database\Eloquent\Collection|World[] $worlds 
 * @property-read \Illuminate\Database\Eloquent\Collection|self[] $supralocations 
 * @property-read \Illuminate\Database\Eloquent\Collection|self[] $sublocations 
 * @property-read Member $creator 
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Location whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Location whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Location whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Location whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Location whereCreatorId($value)
 * @method static \Rpgo\Models\Location ofWorldAndWithSlug($world, $slug)
 */
	class Location {}
}

namespace Rpgo\Models{
/**
 * Rpgo\Models\Type
 *
 * @property string $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $label 
 * @property string $name_group 
 * @property string $name_solo 
 * @property string $description 
 * @property string $slug 
 * @property boolean $secret 
 * @property-read \Illuminate\Database\Eloquent\Collection|Role[] $roles 
 * @property-read \Illuminate\Database\Eloquent\Collection|Permission[] $permissions 
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereLabel($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereNameGroup($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereNameSolo($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Type whereSecret($value)
 * @method static \Rpgo\Models\Type nonSecret()
 */
	class Type {}
}

namespace Rpgo\Models{
/**
 * Rpgo\Models\Role
 *
 * @property string $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $name_group 
 * @property string $name_solo 
 * @property string $slug 
 * @property boolean $secret 
 * @property string $description 
 * @property string $world_id 
 * @property string $type_id 
 * @property-read \Illuminate\Database\Eloquent\Collection|Member[] $members 
 * @property-read \Illuminate\Database\Eloquent\Collection|Permission[] $permissions 
 * @property-read World $world 
 * @property-read Type $type 
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereNameGroup($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereNameSolo($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereSecret($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereWorldId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Role whereTypeId($value)
 * @method static \Rpgo\Models\Role ofType($type)
 * @method static \Rpgo\Models\Role ofWorld($world)
 */
	class Role {}
}

namespace Rpgo\Models{
/**
 * Rpgo\Models\Eloquent
 *
 */
	class Eloquent {}
}

namespace Rpgo\Models{
/**
 * Rpgo\Models\Permission
 *
 * @property string $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $key 
 * @property string $name 
 * @property string $description 
 * @property-read \Illuminate\Database\Eloquent\Collection|Role[] $roles 
 * @property-read \Illuminate\Database\Eloquent\Collection|Type[] $types 
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Permission whereKey($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\Permission whereDescription($value)
 */
	class Permission {}
}

namespace Rpgo\Models{
/**
 * Rpgo\Models\World
 *
 * @property string $id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property string $name 
 * @property string $slug 
 * @property string $brand 
 * @property string $creator_id 
 * @property string $published_at 
 * @property-read User $creator 
 * @property-read \Illuminate\Database\Eloquent\Collection|Member[] $members 
 * @property-read \Illuminate\Database\Eloquent\Collection|Location[] $locations 
 * @property-read \Illuminate\Database\Eloquent\Collection|Role[] $roles 
 * @property-read \Illuminate\Database\Eloquent\Collection|Type[] $types 
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\World whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\World whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\World whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\World whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\World whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\World whereBrand($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\World whereCreatorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Rpgo\Models\World wherePublishedAt($value)
 * @method static \Rpgo\Models\World published()
 */
	class World {}
}

