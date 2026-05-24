<?php

declare(strict_types=1);

namespace Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0\Data\TopCountries\Row;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ViewsCountShape = array{
 *   guests?: int|null, subscribers?: int|null, total?: int|null, users?: int|null
 * }
 */
final class ViewsCount implements BaseModel
{
    /** @use SdkModel<ViewsCountShape> */
    use SdkModel;

    #[Optional]
    public ?int $guests;

    #[Optional]
    public ?int $subscribers;

    #[Optional]
    public ?int $total;

    #[Optional]
    public ?int $users;

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
        ?int $guests = null,
        ?int $subscribers = null,
        ?int $total = null,
        ?int $users = null,
    ): self {
        $self = new self;

        null !== $guests && $self['guests'] = $guests;
        null !== $subscribers && $self['subscribers'] = $subscribers;
        null !== $total && $self['total'] = $total;
        null !== $users && $self['users'] = $users;

        return $self;
    }

    public function withGuests(int $guests): self
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

    public function withUsers(int $users): self
    {
        $self = clone $this;
        $self['users'] = $users;

        return $self;
    }
}
