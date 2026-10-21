<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields;

use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Bic\Label;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LabelShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Bic\Label
 *
 * @phpstan-type BicShape = array{
 *   label?: null|Label|LabelShape,
 *   maxlength?: int|null,
 *   required?: bool|null,
 *   value?: string|null,
 * }
 */
final class Bic implements BaseModel
{
    /** @use SdkModel<BicShape> */
    use SdkModel;

    #[Optional]
    public ?Label $label;

    #[Optional]
    public ?int $maxlength;

    #[Optional]
    public ?bool $required;

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
        ?int $maxlength = null,
        ?bool $required = null,
        ?string $value = null,
    ): self {
        $self = new self;

        null !== $label && $self['label'] = $label;
        null !== $maxlength && $self['maxlength'] = $maxlength;
        null !== $required && $self['required'] = $required;
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

    public function withMaxlength(int $maxlength): self
    {
        $self = clone $this;
        $self['maxlength'] = $maxlength;

        return $self;
    }

    public function withRequired(bool $required): self
    {
        $self = clone $this;
        $self['required'] = $required;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
