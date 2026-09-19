<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListClicksResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChartShape = array{clicks?: int|null, timestamp?: string|null}
 */
final class Chart implements BaseModel
{
    /** @use SdkModel<ChartShape> */
    use SdkModel;

    #[Optional]
    public ?int $clicks;

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
        ?int $clicks = null,
        ?string $timestamp = null
    ): self {
        $self = new self;

        null !== $clicks && $self['clicks'] = $clicks;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    public function withClicks(int $clicks): self
    {
        $self = clone $this;
        $self['clicks'] = $clicks;

        return $self;
    }

    public function withTimestamp(string $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
