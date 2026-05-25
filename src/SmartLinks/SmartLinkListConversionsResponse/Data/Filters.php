<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type FiltersShape = array{
 *   conversionType?: string|null,
 *   dateEnd?: string|null,
 *   dateStart?: string|null,
 *   includeBots?: bool|null,
 *   includeDuplicates?: bool|null,
 *   limit?: int|null,
 *   offset?: int|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    #[Optional('conversion_type')]
    public ?string $conversionType;

    #[Optional('date_end')]
    public ?string $dateEnd;

    #[Optional('date_start')]
    public ?string $dateStart;

    #[Optional('include_bots')]
    public ?bool $includeBots;

    #[Optional('include_duplicates')]
    public ?bool $includeDuplicates;

    #[Optional]
    public ?int $limit;

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
        ?string $conversionType = null,
        ?string $dateEnd = null,
        ?string $dateStart = null,
        ?bool $includeBots = null,
        ?bool $includeDuplicates = null,
        ?int $limit = null,
        ?int $offset = null,
    ): self {
        $self = new self;

        null !== $conversionType && $self['conversionType'] = $conversionType;
        null !== $dateEnd && $self['dateEnd'] = $dateEnd;
        null !== $dateStart && $self['dateStart'] = $dateStart;
        null !== $includeBots && $self['includeBots'] = $includeBots;
        null !== $includeDuplicates && $self['includeDuplicates'] = $includeDuplicates;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;

        return $self;
    }

    public function withConversionType(string $conversionType): self
    {
        $self = clone $this;
        $self['conversionType'] = $conversionType;

        return $self;
    }

    public function withDateEnd(string $dateEnd): self
    {
        $self = clone $this;
        $self['dateEnd'] = $dateEnd;

        return $self;
    }

    public function withDateStart(string $dateStart): self
    {
        $self = clone $this;
        $self['dateStart'] = $dateStart;

        return $self;
    }

    public function withIncludeBots(bool $includeBots): self
    {
        $self = clone $this;
        $self['includeBots'] = $includeBots;

        return $self;
    }

    public function withIncludeDuplicates(bool $includeDuplicates): self
    {
        $self = clone $this;
        $self['includeDuplicates'] = $includeDuplicates;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withOffset(int $offset): self
    {
        $self = clone $this;
        $self['offset'] = $offset;

        return $self;
    }
}
