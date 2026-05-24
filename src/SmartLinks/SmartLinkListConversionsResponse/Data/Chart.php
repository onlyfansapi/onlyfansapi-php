<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChartShape = array{
 *   conversions?: int|null, timestamp?: string|null
 * }
 */
final class Chart implements BaseModel
{
    /** @use SdkModel<ChartShape> */
    use SdkModel;

    #[Optional]
    public ?int $conversions;

    #[Optional]
    public ?string $timestamp;

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
        ?int $conversions = null,
        ?string $timestamp = null
    ): self {
        $self = new self;

        null !== $conversions && $self['conversions'] = $conversions;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withConversions(int $conversions): self
    {
        $self = clone $this;
        $self['conversions'] = $conversions;

        return $self;
    }

    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
