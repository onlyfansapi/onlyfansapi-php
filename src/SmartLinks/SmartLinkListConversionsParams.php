<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinks\SmartLinkListConversionsParams\ConversionType;

/**
 * Query smart link conversions in a date range with optional bot/duplicate and conversion type filtering.
 *
 * @see OnlyFansAPI\Services\SmartLinksService::listConversions()
 *
 * @phpstan-type SmartLinkListConversionsParamsShape = array{
 *   conversionType?: null|ConversionType|value-of<ConversionType>,
 *   dateEnd?: string|null,
 *   dateStart?: string|null,
 *   includeBots?: bool|null,
 *   includeDuplicates?: bool|null,
 *   limit?: int|null,
 *   offset?: int|null,
 *   onlyfansUserID?: string|null,
 * }
 */
final class SmartLinkListConversionsParams implements BaseModel
{
    /** @use SdkModel<SmartLinkListConversionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Optional conversion type filter.
     *
     * @var value-of<ConversionType>|null $conversionType
     */
    #[Optional(enum: ConversionType::class)]
    public ?string $conversionType;

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
     * Include conversions from clicks marked as bots. Default `true`.
     */
    #[Optional]
    public ?bool $includeBots;

    /**
     * Include conversions from duplicate clicks. Default `true`.
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

    /**
     * Optional - Search for conversions by OnlyFans User ID.
     */
    #[Optional]
    public ?string $onlyfansUserID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConversionType|value-of<ConversionType>|null $conversionType
     */
    public static function with(
        ConversionType|string|null $conversionType = null,
        ?string $dateEnd = null,
        ?string $dateStart = null,
        ?bool $includeBots = null,
        ?bool $includeDuplicates = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $onlyfansUserID = null,
    ): self {
        $self = new self;

        null !== $conversionType && $self['conversionType'] = $conversionType;
        null !== $dateEnd && $self['dateEnd'] = $dateEnd;
        null !== $dateStart && $self['dateStart'] = $dateStart;
        null !== $includeBots && $self['includeBots'] = $includeBots;
        null !== $includeDuplicates && $self['includeDuplicates'] = $includeDuplicates;
        null !== $limit && $self['limit'] = $limit;
        null !== $offset && $self['offset'] = $offset;
        null !== $onlyfansUserID && $self['onlyfansUserID'] = $onlyfansUserID;

        return $self;
    }

    /**
     * Optional conversion type filter.
     *
     * @param ConversionType|value-of<ConversionType> $conversionType
     */
    public function withConversionType(
        ConversionType|string $conversionType
    ): self {
        $self = clone $this;
        $self['conversionType'] = $conversionType;

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
     * Include conversions from clicks marked as bots. Default `true`.
     */
    public function withIncludeBots(bool $includeBots): self
    {
        $self = clone $this;
        $self['includeBots'] = $includeBots;

        return $self;
    }

    /**
     * Include conversions from duplicate clicks. Default `true`.
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

    /**
     * Optional - Search for conversions by OnlyFans User ID.
     */
    public function withOnlyfansUserID(string $onlyfansUserID): self
    {
        $self = clone $this;
        $self['onlyfansUserID'] = $onlyfansUserID;

        return $self;
    }
}
