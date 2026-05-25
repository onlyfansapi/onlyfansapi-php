<?php

declare(strict_types=1);

namespace OnlyFansAPI\Bundles;

use OnlyFansAPI\Bundles\BundleCreateParams\Discount;
use OnlyFansAPI\Bundles\BundleCreateParams\Duration;
use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Create a new bundle for the account.
 *
 * @see OnlyFansAPI\Services\BundlesService::create()
 *
 * @phpstan-type BundleCreateParamsShape = array{
 *   discount: Discount|value-of<Discount>, duration: Duration|value-of<Duration>
 * }
 */
final class BundleCreateParams implements BaseModel
{
    /** @use SdkModel<BundleCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The bundle's discount percentage.
     *
     * @var value-of<Discount> $discount
     */
    #[Required(enum: Discount::class)]
    public int $discount;

    /**
     * The bundle's duration in months.
     *
     * @var value-of<Duration> $duration
     */
    #[Required(enum: Duration::class)]
    public int $duration;

    /**
     * `new BundleCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BundleCreateParams::with(discount: ..., duration: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BundleCreateParams)->withDiscount(...)->withDuration(...)
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
     * @param Discount|value-of<Discount> $discount
     * @param Duration|value-of<Duration> $duration
     */
    public static function with(
        Discount|int $discount,
        Duration|int $duration
    ): self {
        $self = new self;

        $self['discount'] = $discount;
        $self['duration'] = $duration;

        return $self;
    }

    /**
     * The bundle's discount percentage.
     *
     * @param Discount|value-of<Discount> $discount
     */
    public function withDiscount(Discount|int $discount): self
    {
        $self = clone $this;
        $self['discount'] = $discount;

        return $self;
    }

    /**
     * The bundle's duration in months.
     *
     * @param Duration|value-of<Duration> $duration
     */
    public function withDuration(Duration|int $duration): self
    {
        $self = clone $this;
        $self['duration'] = $duration;

        return $self;
    }
}
