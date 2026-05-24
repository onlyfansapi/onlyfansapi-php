<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields;

use Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\LastName\Label;
use Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\LastName\Oninput;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LabelShape from \Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\LastName\Label
 * @phpstan-import-type OninputShape from \Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\LastName\Oninput
 *
 * @phpstan-type LastNameShape = array{
 *   label?: null|Label|LabelShape,
 *   maxlength?: int|null,
 *   oninput?: null|Oninput|OninputShape,
 *   readonly?: bool|null,
 *   value?: string|null,
 * }
 */
final class LastName implements BaseModel
{
    /** @use SdkModel<LastNameShape> */
    use SdkModel;

    #[Optional]
    public ?Label $label;

    #[Optional]
    public ?int $maxlength;

    #[Optional]
    public ?Oninput $oninput;

    #[Optional]
    public ?bool $readonly;

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
     * @param Oninput|OninputShape|null $oninput
     */
    public static function with(
        Label|array|null $label = null,
        ?int $maxlength = null,
        Oninput|array|null $oninput = null,
        ?bool $readonly = null,
        ?string $value = null,
    ): self {
        $self = new self;

        null !== $label && $self['label'] = $label;
        null !== $maxlength && $self['maxlength'] = $maxlength;
        null !== $oninput && $self['oninput'] = $oninput;
        null !== $readonly && $self['readonly'] = $readonly;
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

    /**
     * @param Oninput|OninputShape $oninput
     */
    public function withOninput(Oninput|array $oninput): self
    {
        $self = clone $this;
        $self['oninput'] = $oninput;

        return $self;
    }

    public function withReadonly(bool $readonly): self
    {
        $self = clone $this;
        $self['readonly'] = $readonly;

        return $self;
    }

    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
