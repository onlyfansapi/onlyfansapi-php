<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopDurationUsers;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type TotalsShape = array{
 *   guests?: string|null,
 *   subscribers?: int|null,
 *   total?: int|null,
 *   users?: string|null,
 * }
 */
final class Totals implements BaseModel
{
    /** @use SdkModel<TotalsShape> */
    use SdkModel;

    #[Optional]
    public ?string $guests;

    #[Optional]
    public ?int $subscribers;

    #[Optional]
    public ?int $total;

    #[Optional]
    public ?string $users;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $guests = null,
        ?int $subscribers = null,
        ?int $total = null,
        ?string $users = null,
    ): self {
        $self = new self;

        null !== $guests && $self['guests'] = $guests;
        null !== $subscribers && $self['subscribers'] = $subscribers;
        null !== $total && $self['total'] = $total;
        null !== $users && $self['users'] = $users;

        return $self;
    }

    public function withGuests(string $guests): self
    {
        $self = clone $this;
        $self['guests'] = $guests;

        return $self;
    }

    public function withSubscribers(int $subscribers): self
    {
        $self = clone $this;
        $self['subscribers'] = $subscribers;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    public function withUsers(string $users): self
    {
        $self = clone $this;
        $self['users'] = $users;

        return $self;
    }
}
