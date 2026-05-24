<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\BankingListAvailablePayoutSystemsResponse\Data;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayoutShape = array{
 *   code?: string|null,
 *   description?: string|null,
 *   fields?: array<string,mixed>|null,
 *   fieldsOrder?: list<mixed>|null,
 *   minPayoutSumm?: int|null,
 *   payoutTime?: string|null,
 *   subtitle?: string|null,
 *   title?: string|null,
 *   uiMapping?: array<string,mixed>|null,
 * }
 */
final class Payout implements BaseModel
{
    /** @use SdkModel<PayoutShape> */
    use SdkModel;

    #[Optional]
    public ?string $code;

    #[Optional]
    public ?string $description;

    /** @var array<string,mixed>|null $fields */
    #[Optional(map: 'mixed')]
    public ?array $fields;

    /** @var list<mixed>|null $fieldsOrder */
    #[Optional(list: 'mixed')]
    public ?array $fieldsOrder;

    #[Optional]
    public ?int $minPayoutSumm;

    #[Optional]
    public ?string $payoutTime;

    #[Optional]
    public ?string $subtitle;

    #[Optional]
    public ?string $title;

    /** @var array<string,mixed>|null $uiMapping */
    #[Optional(map: 'mixed')]
    public ?array $uiMapping;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $fields
     * @param list<mixed>|null $fieldsOrder
     * @param array<string,mixed>|null $uiMapping
     */
    public static function with(
        ?string $code = null,
        ?string $description = null,
        ?array $fields = null,
        ?array $fieldsOrder = null,
        ?int $minPayoutSumm = null,
        ?string $payoutTime = null,
        ?string $subtitle = null,
        ?string $title = null,
        ?array $uiMapping = null,
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $description && $self['description'] = $description;
        null !== $fields && $self['fields'] = $fields;
        null !== $fieldsOrder && $self['fieldsOrder'] = $fieldsOrder;
        null !== $minPayoutSumm && $self['minPayoutSumm'] = $minPayoutSumm;
        null !== $payoutTime && $self['payoutTime'] = $payoutTime;
        null !== $subtitle && $self['subtitle'] = $subtitle;
        null !== $title && $self['title'] = $title;
        null !== $uiMapping && $self['uiMapping'] = $uiMapping;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param array<string,mixed> $fields
     */
    public function withFields(array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * @param list<mixed> $fieldsOrder
     */
    public function withFieldsOrder(array $fieldsOrder): self
    {
        $self = clone $this;
        $self['fieldsOrder'] = $fieldsOrder;

        return $self;
    }

    public function withMinPayoutSumm(int $minPayoutSumm): self
    {
        $self = clone $this;
        $self['minPayoutSumm'] = $minPayoutSumm;

        return $self;
    }

    public function withPayoutTime(string $payoutTime): self
    {
        $self = clone $this;
        $self['payoutTime'] = $payoutTime;

        return $self;
    }

    public function withSubtitle(string $subtitle): self
    {
        $self = clone $this;
        $self['subtitle'] = $subtitle;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }

    /**
     * @param array<string,mixed> $uiMapping
     */
    public function withUiMapping(array $uiMapping): self
    {
        $self = clone $this;
        $self['uiMapping'] = $uiMapping;

        return $self;
    }
}
