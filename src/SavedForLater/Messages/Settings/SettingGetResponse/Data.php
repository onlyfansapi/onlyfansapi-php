<?php

declare(strict_types=1);

namespace Onlyfansapi\SavedForLater\Messages\Settings\SettingGetResponse;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   currentCode?: int|null, isEnabled?: bool|null, options?: list<int>|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $currentCode;

    #[Optional]
    public ?bool $isEnabled;

    /** @var list<int>|null $options */
    #[Optional(list: 'int')]
    public ?array $options;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $options
     */
    public static function with(
        ?int $currentCode = null,
        ?bool $isEnabled = null,
        ?array $options = null
    ): self {
        $self = new self;

        null !== $currentCode && $self['currentCode'] = $currentCode;
        null !== $isEnabled && $self['isEnabled'] = $isEnabled;
        null !== $options && $self['options'] = $options;

        return $self;
    }

    public function withCurrentCode(int $currentCode): self
    {
        $self = clone $this;
        $self['currentCode'] = $currentCode;

        return $self;
    }

    public function withIsEnabled(bool $isEnabled): self
    {
        $self = clone $this;
        $self['isEnabled'] = $isEnabled;

        return $self;
    }

    /**
     * @param list<int> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
