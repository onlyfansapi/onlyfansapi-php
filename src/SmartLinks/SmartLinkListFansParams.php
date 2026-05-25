<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinks\SmartLinkListFansParams\Sort;

/**
 * Query attributed Smart Link fans with aggregate fan metrics and subscriber attribution metadata.
 *
 * @see OnlyFansAPI\Services\SmartLinksService::listFans()
 *
 * @phpstan-type SmartLinkListFansParamsShape = array{
 *   hasMessages?: bool|null,
 *   limit?: int|null,
 *   minMessagesSentByFan?: int|null,
 *   minRevenueNet?: float|null,
 *   minTipsNet?: float|null,
 *   offset?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 * }
 */
final class SmartLinkListFansParams implements BaseModel
{
    /** @use SdkModel<SmartLinkListFansParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional - Filter to fans with or without fan-sent messages.
     */
    #[Optional]
    public ?bool $hasMessages;

    /**
     * Rows per page. Default `100`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Optional minimum number of messages sent by fan.
     */
    #[Optional]
    public ?int $minMessagesSentByFan;

    /**
     * Optional minimum net revenue.
     */
    #[Optional]
    public ?float $minRevenueNet;

    /**
     * Optional minimum net tips.
     */
    #[Optional]
    public ?float $minTipsNet;

    /**
     * Offset for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Optional sort field. Default `-revenue_net`.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?bool $hasMessages = null,
        ?int $limit = null,
        ?int $minMessagesSentByFan = null,
        ?float $minRevenueNet = null,
        ?float $minTipsNet = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
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

    /**
     * Optional - Filter to fans with or without fan-sent messages.
     */
    public function withHasMessages(bool $hasMessages): self
    {
        $self = clone $this;
        $self['hasMessages'] = $hasMessages;

        return $self;
    }

    /**
     * Rows per page. Default `100`.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Optional minimum number of messages sent by fan.
     */
    public function withMinMessagesSentByFan(int $minMessagesSentByFan): self
    {
        $self = clone $this;
        $self['minMessagesSentByFan'] = $minMessagesSentByFan;

        return $self;
    }

    /**
     * Optional minimum net revenue.
     */
    public function withMinRevenueNet(float $minRevenueNet): self
    {
        $self = clone $this;
        $self['minRevenueNet'] = $minRevenueNet;

        return $self;
    }

    /**
     * Optional minimum net tips.
     */
    public function withMinTipsNet(float $minTipsNet): self
    {
        $self = clone $this;
        $self['minTipsNet'] = $minTipsNet;

        return $self;
    }

    /**
     * Offset for pagination. Default `0`.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Optional sort field. Default `-revenue_net`.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }
}
