<?php

declare(strict_types=1);

namespace OnlyFansAPI\Promotions;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Promotions\PromotionCreateParams\Type;

/**
 * Create a new promotion for the account.
 *
 * @see OnlyFansAPI\Services\PromotionsService::create()
 *
 * @phpstan-type PromotionCreateParamsShape = array{
 *   discount: int,
 *   expirationDays: int,
 *   offerLimit: int,
 *   type: Type|value-of<Type>,
 *   freeTrialDays?: int|null,
 *   message?: string|null,
 * }
 */
final class PromotionCreateParams implements BaseModel
{
    /** @use SdkModel<PromotionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The discount percentage for the promotion's first month. Set to 100 to make this promotion a Free Trial.
     */
    #[Required]
    public int $discount;

    /**
     * In how many days this offer will expire. Set to 0 to make this promotion infinite.
     */
    #[Required]
    public int $expirationDays;

    /**
     * Limit how many people can claim this offer. Set to 0 for no limits.
     */
    #[Required]
    public int $offerLimit;

    /**
     * Whether this promotion should apply to new subscribers, expired subscribers, or both. **IMPORTANT: when set to new_and_expired, the OF will create two separate promotions.**.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Required only when discount is 100. Sets the duration (in days) of the free trial. Accepted 1-30.
     */
    #[Optional]
    public ?int $freeTrialDays;

    /**
     * Optionally, provide a message for this promotion.
     */
    #[Optional]
    public ?string $message;

    /**
     * `new PromotionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PromotionCreateParams::with(
     *   discount: ..., expirationDays: ..., offerLimit: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PromotionCreateParams)
     *   ->withDiscount(...)
     *   ->withExpirationDays(...)
     *   ->withOfferLimit(...)
     *   ->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $discount,
        int $expirationDays,
        int $offerLimit,
        Type|string $type,
        ?int $freeTrialDays = null,
        ?string $message = null,
    ): self {
        $self = new self;

        $self['discount'] = $discount;
        $self['expirationDays'] = $expirationDays;
        $self['offerLimit'] = $offerLimit;
        $self['type'] = $type;

        null !== $freeTrialDays && $self['freeTrialDays'] = $freeTrialDays;
        null !== $message && $self['message'] = $message;

        return $self;
    }

    /**
     * The discount percentage for the promotion's first month. Set to 100 to make this promotion a Free Trial.
     */
    public function withDiscount(int $discount): self
    {
        $self = clone $this;
        $self['discount'] = $discount;

        return $self;
    }

    /**
     * In how many days this offer will expire. Set to 0 to make this promotion infinite.
     */
    public function withExpirationDays(int $expirationDays): self
    {
        $self = clone $this;
        $self['expirationDays'] = $expirationDays;

        return $self;
    }

    /**
     * Limit how many people can claim this offer. Set to 0 for no limits.
     */
    public function withOfferLimit(int $offerLimit): self
    {
        $self = clone $this;
        $self['offerLimit'] = $offerLimit;

        return $self;
    }

    /**
     * Whether this promotion should apply to new subscribers, expired subscribers, or both. **IMPORTANT: when set to new_and_expired, the OF will create two separate promotions.**.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Required only when discount is 100. Sets the duration (in days) of the free trial. Accepted 1-30.
     */
    public function withFreeTrialDays(int $freeTrialDays): self
    {
        $self = clone $this;
        $self['freeTrialDays'] = $freeTrialDays;

        return $self;
    }

    /**
     * Optionally, provide a message for this promotion.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }
}
