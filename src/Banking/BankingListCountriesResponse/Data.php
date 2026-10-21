<?php

declare(strict_types=1);

namespace OnlyFansAPI\Banking\BankingListCountriesResponse;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: int|null,
 *   canHasW9Form?: bool|null,
 *   canPay?: bool|null,
 *   code?: string|null,
 *   hasStates?: bool|null,
 *   hasZip?: bool|null,
 *   name?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?int $id;

    #[Optional]
    public ?bool $canHasW9Form;

    #[Optional]
    public ?bool $canPay;

    #[Optional]
    public ?string $code;

    #[Optional]
    public ?bool $hasStates;

    #[Optional]
    public ?bool $hasZip;

    #[Optional]
    public ?string $name;

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
        ?int $id = null,
        ?bool $canHasW9Form = null,
        ?bool $canPay = null,
        ?string $code = null,
        ?bool $hasStates = null,
        ?bool $hasZip = null,
        ?string $name = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $canHasW9Form && $self['canHasW9Form'] = $canHasW9Form;
        null !== $canPay && $self['canPay'] = $canPay;
        null !== $code && $self['code'] = $code;
        null !== $hasStates && $self['hasStates'] = $hasStates;
        null !== $hasZip && $self['hasZip'] = $hasZip;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCanHasW9Form(bool $canHasW9Form): self
    {
        $self = clone $this;
        $self['canHasW9Form'] = $canHasW9Form;

        return $self;
    }

    public function withCanPay(bool $canPay): self
    {
        $self = clone $this;
        $self['canPay'] = $canPay;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withHasStates(bool $hasStates): self
    {
        $self = clone $this;
        $self['hasStates'] = $hasStates;

        return $self;
    }

    public function withHasZip(bool $hasZip): self
    {
        $self = clone $this;
        $self['hasZip'] = $hasZip;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
