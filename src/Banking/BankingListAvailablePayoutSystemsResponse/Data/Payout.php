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
 *   fields?: mixed,
 *   fieldsOrder?: list<mixed>|null,
 *   minPayoutSumm?: int|null,
 *   payoutTime?: string|null,
 *   subtitle?: string|null,
 *   title?: string|null,
 *   uiMapping?: mixed,
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

    #[Optional]
    public mixed $fields;

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

    #[Optional]
    public mixed $uiMapping;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|null $fieldsOrder
     */
    public static function with(
        ?string $code = null,
        ?string $description = null,
        mixed $fields = null,
        ?array $fieldsOrder = null,
        ?int $minPayoutSumm = null,
        ?string $payoutTime = null,
        ?string $subtitle = null,
        ?string $title = null,
        mixed $uiMapping = null,
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

    public function withFields(mixed $fields): self
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

    public function withUiMapping(mixed $uiMapping): self
    {
        $self = clone $this;
        $self['uiMapping'] = $uiMapping;

        return $self;
    }
}
