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
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property string $prefix
 * @property string $direction
 * @property int $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language wherePrefix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 */
	class Language extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Media
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property string|null $uuid
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string|null $mime_type
 * @property string $disk
 * @property string|null $conversions_disk
 * @property int $size
 * @property array $manipulations
 * @property array $custom_properties
 * @property array $generated_conversions
 * @property array $responsive_images
 * @property int|null $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $extension
 * @property-read string $human_readable_size
 * @property-read string $type
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|static[] all($columns = ['*'])
 * @method static \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Media newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Media ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|Media query()
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCollectionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereConversionsDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereCustomProperties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereGeneratedConversions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereManipulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereOrderColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereResponsiveImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Media whereUuid($value)
 */
	class Media extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Translate
 *
 * @property int $id
 * @property int $language_id
 * @property string $translateable_type
 * @property string $translateable_id
 * @property string $key
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Language $language
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $translateable
 * @method static \Illuminate\Database\Eloquent\Builder|Translate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereTranslateableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereTranslateableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translate whereValue($value)
 */
	class Translate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $phone
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $gender
 * @property string|null $account_status
 * @property string|null $credit
 * @property string|null $whatsapp_number
 * @property string|null $provider
 * @property string|null $provider_id
 * @property string|null $loyalty_points
 * @property int|null $country_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Client\Entities\ClientAddress[] $addresses
 * @property-read int|null $addresses_count
 * @property-read string $profile_photo_url
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User filter($data)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAccountStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsNot($role)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoyaltyPoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWhatsappNumber($value)
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Client\Entities{
/**
 * Modules\Client\Entities\ClientAddress
 *
 * @property int $id
 * @property array $title
 * @property int $client_id
 * @property int $area_id
 * @property string|null $phone
 * @property string|null $block
 * @property string|null $avenue
 * @property string|null $street
 * @property string|null $building
 * @property string|null $floor
 * @property string|null $flat
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Locations\Entities\Area $area
 * @property-read \App\Models\User $client
 * @property-read array $translations
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress newQuery()
 * @method static \Illuminate\Database\Query\Builder|ClientAddress onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereAvenue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereBlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereBuilding($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereFlat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereFloor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ClientAddress withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ClientAddress withoutTrashed()
 */
	class ClientAddress extends \Eloquent {}
}

namespace Modules\Coupon\Entities{
/**
 * Modules\Coupon\Entities\Coupon
 *
 * @property int $id
 * @property string $code
 * @property string $usage_rule
 * @property string $type
 * @property int $amount
 * @property int $free_delivery
 * @property string $start_date
 * @property string $expiration_date
 * @property int $count
 * @property int $uses_per_customer
 * @property string|null $decription
 * @property int $min_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translate[] $translates
 * @property-read int|null $translates_count
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDecription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereFreeDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereMinValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUsageRule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUsesPerCustomer($value)
 */
	class Coupon extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Drivers\Entities{
/**
 * Modules\Drivers\Entities\Driver
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $lat
 * @property string|null $long
 * @property bool $status
 * @property string|null $subscription_type
 * @property int|null $subscription_value
 * @property int $vehicle_id
 * @property string $civil_id
 * @property string|null $images
 * @property string|null $profile_pic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @property-read \Modules\Drivers\Entities\Vehicle|null $vehicle
 * @method static \Illuminate\Database\Eloquent\Builder|Driver newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Driver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Driver query()
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereCivilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereLong($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereProfilePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereSubscriptionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereSubscriptionValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Driver whereVehicleId($value)
 */
	class Driver extends \Eloquent {}
}

namespace Modules\Order\Entities{
/**
 * Modules\Order\Entities\Order
 *
 * @property int $id
 * @property int|null $area_id
 * @property int $client_id
 * @property int|null $driver_id
 * @property int|null $coupon_id
 * @property int|null $branch_id
 * @property string|null $subtotal
 * @property string|null $delivery_fees
 * @property string|null $discount
 * @property string|null $total
 * @property int|null $status_id
 * @property string|null $prepared_at
 * @property string|null $handed_at
 * @property string|null $delivered_at
 * @property string|null $payment_url
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Order\Entities\OrderStatus|null $status
 * @method static \Modules\Order\Database\factories\OrderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Query\Builder|Order onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeliveryFees($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereHandedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePreparedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Order withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Order withoutTrashed()
 */
	class Order extends \Eloquent {}
}

namespace Modules\Order\Entities{
/**
 * Modules\Order\Entities\OrderProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $order_id
 * @property float $qty
 * @property float $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Order\Entities\OrderProductAttribute[] $orderProductAttribute
 * @property-read int|null $order_product_attribute_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProduct whereUpdatedAt($value)
 */
	class OrderProduct extends \Eloquent {}
}

namespace Modules\Order\Entities{
/**
 * Modules\Order\Entities\OrderProductAttribute
 *
 * @property int $id
 * @property int $order_product_id
 * @property int $product_attribute_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Order\Entities\OrderProductAttributeChoices[] $orderProductAttributeChoices
 * @property-read int|null $order_product_attribute_choices_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttribute whereOrderProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttribute whereProductAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttribute whereUpdatedAt($value)
 */
	class OrderProductAttribute extends \Eloquent {}
}

namespace Modules\Order\Entities{
/**
 * Modules\Order\Entities\OrderProductAttributeChoices
 *
 * @property int $id
 * @property int $order_product_attribute_id
 * @property int|null $product_attribute_choice_id
 * @property float|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Order\Entities\OrderProductAttribute $orderProductAttribute
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices whereOrderProductAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices whereProductAttributeChoiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderProductAttributeChoices whereUpdatedAt($value)
 */
	class OrderProductAttributeChoices extends \Eloquent {}
}

namespace Modules\Order\Entities{
/**
 * Modules\Order\Entities\OrderStatus
 *
 * @property int $id
 * @property array $name
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Order\Entities\Order[] $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newQuery()
 * @method static \Illuminate\Database\Query\Builder|OrderStatus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|OrderStatus withTrashed()
 * @method static \Illuminate\Database\Query\Builder|OrderStatus withoutTrashed()
 */
	class OrderStatus extends \Eloquent {}
}

namespace Modules\Product\Entities{
/**
 * Modules\Product\Entities\Product
 *
 * @property int $id
 * @property array $name
 * @property int $cat_id
 * @property int $branch_id
 * @property string $price
 * @property int $is_active
 * @property float $overall_rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Product\Entities\ProductCategory $category
 * @property-read string $photo
 * @property-read array $translations
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Product\Entities\ProductAttribute[] $productAttributes
 * @property-read int|null $product_attributes_count
 * @method static \Modules\Product\Database\factories\ProductFactoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOverallRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Product\Entities{
/**
 * Modules\Product\Entities\ProductAttribute
 *
 * @property int $id
 * @property array $name
 * @property string $type
 * @property int $min
 * @property int $max
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Product\Entities\ProductAttributeChoise[] $choices
 * @property-read int|null $choices_count
 * @property-read array $translations
 * @property-read \Modules\Product\Entities\Product $product
 * @method static \Modules\Product\Database\factories\ProductAttributeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttribute whereUpdatedAt($value)
 */
	class ProductAttribute extends \Eloquent {}
}

namespace Modules\Product\Entities{
/**
 * Modules\Product\Entities\ProductAttributeChoise
 *
 * @property int $id
 * @property array $name
 * @property int $attribute_id
 * @property string|null $additional_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Product\Entities\ProductAttribute $attribute
 * @property-read array $translations
 * @method static \Modules\Product\Database\factories\ProductAttributeChoicesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise whereAdditionalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeChoise whereUpdatedAt($value)
 */
	class ProductAttributeChoise extends \Eloquent {}
}

namespace Modules\Product\Entities{
/**
 * Modules\Product\Entities\ProductCategory
 *
 * @property int $id
 * @property array $name
 * @property int $ordering
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read array $translations
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Product\Entities\Product[] $products
 * @property-read int|null $products_count
 * @method static \Modules\Product\Database\factories\ProductCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductCategory whereUpdatedAt($value)
 */
	class ProductCategory extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace Modules\Slides\Entities{
/**
 * Modules\Slides\Entities\Slide
 *
 * @property int $id
 * @property int $created_by
 * @property string|null $button_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Translate[] $translates
 * @property-read int|null $translates_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereButtonLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slide whereUpdatedAt($value)
 */
	class Slide extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

