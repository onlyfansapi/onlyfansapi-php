<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Fans\FanListLatestParams\Type;

/**
 * Get a paginated list fans, filterable by total, only new subscribers, or only renewals. Newest fans are first.
 *
 * @see OnlyFansAPI\Services\FansService::listLatest()
 *
 * @phpstan-type FanListLatestParamsShape = array{
 *   endDate?: string|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   startDate?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class FanListLatestParams implements BaseModel
{
    /** @use SdkModel<FanListLatestParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * End date for filtering (required with start_date). Must be a valid date. Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $endDate;

    /**
     * Number of fans to return (1-50). Must be at least 1. Must not be greater than 50.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Number of fans to skip. Must be at least 0.
     */
    #[Optional]
    public ?int $offset;

    /**
     * Start date for filtering (required with end_date). Must be a valid date. Must not be greater than 255 characters.
     */
    #[Optional(nullable: true)]
    public ?string $startDate;

    /**
     * Filter by type: total, renew, or new.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class, nullable: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $startDate = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $endDate && $self['endDate'] = $endDate;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $startDate && $self['startDate'] = $startDate;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * End date for filtering (required with start_date). Must be a valid date. Must not be greater than 255 characters.
     */
    public function withEndDate(?string $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * Number of fans to return (1-50). Must be at least 1. Must not be greater than 50.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Number of fans to skip. Must be at least 0.
     */
    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }

    /**
     * Start date for filtering (required with end_date). Must be a valid date. Must not be greater than 255 characters.
     */
    public function withStartDate(?string $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Filter by type: total, renew, or new.
     *
     * @param Type|value-of<Type>|null $type
     */
    public function withType(Type|string|null $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
