<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields;

use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Iban\Label;
use OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Iban\Regex;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type LabelShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Iban\Label
 * @phpstan-import-type RegexShape from \OnlyFansAPI\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields\Iban\Regex
 *
 * @phpstan-type IbanShape = array{
 *   label?: null|Label|LabelShape,
 *   regex?: null|Regex|RegexShape,
 *   required?: bool|null,
 *   value?: string|null,
 * }
 */
final class Iban implements BaseModel
{
    /** @use SdkModel<IbanShape> */
    use SdkModel;

    #[Optional]
    public ?Label $label;

    #[Optional]
    public ?Regex $regex;

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
     * @param Regex|RegexShape|null $regex
     */
    public static function with(
        Label|array|null $label = null,
        Regex|array|null $regex = null,
        ?bool $required = null,
        ?string $value = null,
    ): self {
        $self = new self;

        null !== $label && $self['label'] = $label;
        null !== $regex && $self['regex'] = $regex;
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

    /**
     * @param Regex|RegexShape $regex
     */
    public function withRegex(Regex|array $regex): self
    {
        $self = clone $this;
        $self['regex'] = $regex;

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
