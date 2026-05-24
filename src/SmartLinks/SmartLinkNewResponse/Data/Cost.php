<?php

declare(strict_types=1);

namespace Onlyfansapi\SmartLinks\SmartLinkNewResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostShape = array{
 *   clickSourceCount?: int|null,
 *   inputMode?: string|null,
 *   inputValue?: string|null,
 *   perClick?: string|null,
 *   perPromo?: string|null,
 *   perSub?: string|null,
 *   subscriberSourceCount?: int|null,
 * }
 */
final class Cost implements BaseModel
{
    /** @use SdkModel<CostShape> */
    use SdkModel;

    #[Optional]
    public ?int $clickSourceCount;

    #[Optional(nullable: true)]
    public ?string $inputMode;

    #[Optional(nullable: true)]
    public ?string $inputValue;

    #[Optional(nullable: true)]
    public ?string $perClick;

    #[Optional(nullable: true)]
    public ?string $perPromo;

    #[Optional(nullable: true)]
    public ?string $perSub;

    #[Optional]
    public ?int $subscriberSourceCount;

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
        ?int $clickSourceCount = null,
        ?string $inputMode = null,
        ?string $inputValue = null,
        ?string $perClick = null,
        ?string $perPromo = null,
        ?string $perSub = null,
        ?int $subscriberSourceCount = null,
    ): self {
        $self = new self;

        null !== $clickSourceCount && $self['clickSourceCount'] = $clickSourceCount;
        null !== $inputMode && $self['inputMode'] = $inputMode;
        null !== $inputValue && $self['inputValue'] = $inputValue;
        null !== $perClick && $self['perClick'] = $perClick;
        null !== $perPromo && $self['perPromo'] = $perPromo;
        null !== $perSub && $self['perSub'] = $perSub;
        null !== $subscriberSourceCount && $self['subscriberSourceCount'] = $subscriberSourceCount;

        return $self;
    }

    public function withClickSourceCount(int $clickSourceCount): self
    {
        $self = clone $this;
        $self['clickSourceCount'] = $clickSourceCount;

        return $self;
    }

    public function withInputMode(?string $inputMode): self
    {
        $self = clone $this;
        $self['inputMode'] = $inputMode;

        return $self;
    }

    public function withInputValue(?string $inputValue): self
    {
        $self = clone $this;
        $self['inputValue'] = $inputValue;

        return $self;
    }

    public function withPerClick(?string $perClick): self
    {
        $self = clone $this;
        $self['perClick'] = $perClick;

        return $self;
    }

    public function withPerPromo(?string $perPromo): self
    {
        $self = clone $this;
        $self['perPromo'] = $perPromo;

        return $self;
    }

    public function withPerSub(?string $perSub): self
    {
        $self = clone $this;
        $self['perSub'] = $perSub;

        return $self;
    }

    public function withSubscriberSourceCount(int $subscriberSourceCount): self
    {
        $self = clone $this;
        $self['subscriberSourceCount'] = $subscriberSourceCount;

        return $self;
    }
}
