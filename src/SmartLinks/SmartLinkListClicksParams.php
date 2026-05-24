<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Query smart link clicks in a date range with optional bot/duplicate filtering.
 *
 * @see Onlyfansapi\Services\SmartLinksService::listClicks()
 *
 * @phpstan-type SmartLinkListClicksParamsShape = array{
 *   dateEnd?: string|null,
 *   dateStart?: string|null,
 *   includeBots?: bool|null,
 *   includeDuplicates?: bool|null,
 *   limit?: int|null,
 *   offset?: int|null,
 * }
 */
final class SmartLinkListClicksParams implements BaseModel
{
    /** @use SdkModel<SmartLinkListClicksParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional report range end date.
     */
    #[Optional]
    public ?string $dateEnd;

    /**
     * Optional report range start date.
     */
    #[Optional]
    public ?string $dateStart;

    /**
     * Include clicks marked as bots. Default `true`.
     */
    #[Optional]
    public ?bool $includeBots;

    /**
     * Include duplicate clicks. Default `true`.
     */
    #[Optional]
    public ?bool $includeDuplicates;

    /**
     * Rows per page. Default `100`.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Offset for pagination. Default `0`.
     */
    #[Optional]
    public ?int $offset;

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
        ?string $dateEnd = null,
        ?string $dateStart = null,
        ?bool $includeBots = null,
        ?bool $includeDuplicates = null,
        ?int $limit = null,
        ?int $offset = null,
    ): self {
        $self = new self;

        null !== $dateEnd && $self['dateEnd'] = $dateEnd;
        null !== $dateStart && $self['dateStart'] = $dateStart;
        null !== $includeBots && $self['includeBots'] = $includeBots;
        null !== $includeDuplicates && $self['includeDuplicates'] = $includeDuplicates;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    /**
     * Optional report range end date.
     */
    public function withDateEnd(string $dateEnd): self
    {
        $self = clone $this;
        $self['dateEnd'] = $dateEnd;

        return $self;
    }

    /**
     * Optional report range start date.
     */
    public function withDateStart(string $dateStart): self
    {
        $self = clone $this;
        $self['dateStart'] = $dateStart;

        return $self;
    }

    /**
     * Include clicks marked as bots. Default `true`.
     */
    public function withIncludeBots(bool $includeBots): self
    {
        $self = clone $this;
        $self['includeBots'] = $includeBots;

        return $self;
    }

    /**
     * Include duplicate clicks. Default `true`.
     */
    public function withIncludeDuplicates(bool $includeDuplicates): self
    {
        $self = clone $this;
        $self['includeDuplicates'] = $includeDuplicates;

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
     * Offset for pagination. Default `0`.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
