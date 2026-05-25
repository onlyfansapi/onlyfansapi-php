<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields;

use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Country\Label;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LabelShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Country\Label
 *
 * @phpstan-type CountryShape = array{
 *   label?: null|Label|LabelShape,
 *   readonly?: bool|null,
 *   uionly?: bool|null,
 *   value?: string|null,
 * }
 */
final class Country implements BaseModel
{
    /** @use SdkModel<CountryShape> */
    use SdkModel;

    #[Optional]
    public ?Label $label;

    #[Optional]
    public ?bool $readonly;

    #[Optional]
    public ?bool $uionly;

    #[Optional]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Label|LabelShape|null $label
     */
    public static function with(
        Label|array|null $label = null,
        ?bool $readonly = null,
        ?bool $uionly = null,
        ?string $value = null,
    ): self {
        $self = new self;

        null !== $label && $self['label'] = $label;
        null !== $readonly && $self['readonly'] = $readonly;
        null !== $uionly && $self['uionly'] = $uionly;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * @param Label|LabelShape $label
     */
    public function withLabel(Label|array $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withReadonly(bool $readonly): self
    {
        $self = clone $this;
        $self['readonly'] = $readonly;

        return $self;
    }

    public function withUionly(bool $uionly): self
    {
        $self = clone $this;
        $self['uionly'] = $uionly;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
