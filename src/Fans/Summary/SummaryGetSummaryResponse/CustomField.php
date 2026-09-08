<?php

declare(strict_types=1);

namespace OnlyFansAPI\Fans\Summary\SummaryGetSummaryResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomFieldShape = array{key?: string|null, label?: string|null}
 */
final class CustomField implements BaseModel
{
    /** @use SdkModel<CustomFieldShape> */
    use SdkModel;

    #[Optional]
    public ?string $key;

    #[Optional]
    public ?string $label;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $key = null, ?string $label = null): self
    {
        $self = new self;

        null !== $key && $self['key'] = $key;
        null !== $label && $self['label'] = $label;

        return $self;
    }

    public function withKey(string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
