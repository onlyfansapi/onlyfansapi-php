<?php

declare(strict_types=1);

namespace Onlyfansapi\Following\FollowingListExpiredParams;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Following\FollowingListExpiredParams\Filter\Online;
use Onlyfansapi\Following\FollowingListExpiredParams\Filter\Paid;

/**
 * @phpstan-type FilterShape = array{
 *   online?: null|Online|value-of<Online>, paid?: null|Paid|value-of<Paid>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by online status (1 for online, 0 for offline, null for all).
     *
     * @var value-of<Online>|null $online
     */
    #[Optional(enum: Online::class, nullable: true)]
    public ?int $online;

    /**
     * Filter by paid status (1 for paid, 0 for free, null for all).
     *
     * @var value-of<Paid>|null $paid
     */
    #[Optional(enum: Paid::class, nullable: true)]
    public ?int $paid;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Online|value-of<Online>|null $online
     * @param Paid|value-of<Paid>|null $paid
     */
    public static function with(
        Online|int|null $online = null,
        Paid|int|null $paid = null
    ): self {
        $self = new self;

        null !== $online && $self['online'] = $online;
        null !== $paid && $self['paid'] = $paid;

        return $self;
    }

    /**
     * Filter by online status (1 for online, 0 for offline, null for all).
     *
     * @param Online|value-of<Online>|null $online
     */
    public function withOnline(Online|int|null $online): self
    {
        $self = clone $this;
        $self['online'] = $online;

        return $self;
    }

    /**
     * Filter by paid status (1 for paid, 0 for free, null for all).
     *
     * @param Paid|value-of<Paid>|null $paid
     */
    public function withPaid(Paid|int|null $paid): self
    {
        $self = clone $this;
        $self['paid'] = $paid;

        return $self;
    }
}
