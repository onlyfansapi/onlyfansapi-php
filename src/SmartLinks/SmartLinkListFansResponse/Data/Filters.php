<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListFansResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FiltersShape = array{
 *   hasMessages?: string|null,
 *   limit?: int|null,
 *   minMessagesSentByFan?: string|null,
 *   minRevenueNet?: string|null,
 *   minTipsNet?: string|null,
 *   offset?: int|null,
 *   sort?: string|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    #[Optional('has_messages', nullable: true)]
    public ?string $hasMessages;

    #[Optional]
    public ?int $limit;

    #[Optional('min_messages_sent_by_fan', nullable: true)]
    public ?string $minMessagesSentByFan;

    #[Optional('min_revenue_net', nullable: true)]
    public ?string $minRevenueNet;

    #[Optional('min_tips_net', nullable: true)]
    public ?string $minTipsNet;

    #[Optional]
    public ?int $offset;

    #[Optional]
    public ?string $sort;

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
        ?string $hasMessages = null,
        ?int $limit = null,
        ?string $minMessagesSentByFan = null,
        ?string $minRevenueNet = null,
        ?string $minTipsNet = null,
        ?int $offset = null,
        ?string $sort = null,
    ): self {
        $self = new self;

        null !== $hasMessages && $self['hasMessages'] = $hasMessages;
        null !== $limit && $self['limit'] = $limit;
        null !== $minMessagesSentByFan && $self['minMessagesSentByFan'] = $minMessagesSentByFan;
        null !== $minRevenueNet && $self['minRevenueNet'] = $minRevenueNet;
        null !== $minTipsNet && $self['minTipsNet'] = $minTipsNet;
        null !== $offset && $self['offset'] = $offset;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    public function withHasMessages(?string $hasMessages): self
    {
        $self = clone $this;
        $self['hasMessages'] = $hasMessages;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withMinMessagesSentByFan(
        ?string $minMessagesSentByFan
    ): self {
        $self = clone $this;
        $self['minMessagesSentByFan'] = $minMessagesSentByFan;

        return $self;
    }

    public function withMinRevenueNet(?string $minRevenueNet): self
    {
        $self = clone $this;
        $self['minRevenueNet'] = $minRevenueNet;

        return $self;
    }

    public function withMinTipsNet(?string $minTipsNet): self
    {
        $self = clone $this;
        $self['minTipsNet'] = $minTipsNet;

        return $self;
    }

    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    public function withSort(string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
