<?php

declare(strict_types=1);

namespace Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data;

use Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields;
use Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping;
use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FieldsShape from \Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\Fields
 * @phpstan-import-type UiMappingShape from \Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse\Data\Payout\UiMapping
 *
 * @phpstan-type PayoutShape = array{
 *   code?: string|null,
 *   description?: string|null,
 *   fields?: null|Fields|FieldsShape,
 *   fieldsOrder?: list<string>|null,
 *   minPayoutSumm?: int|null,
 *   payoutTime?: string|null,
 *   subtitle?: string|null,
 *   title?: string|null,
 *   uiMapping?: null|UiMapping|UiMappingShape,
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
    public ?Fields $fields;

    /** @var list<string>|null $fieldsOrder */
    #[Optional(list: 'string')]
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
    public ?UiMapping $uiMapping;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Fields|FieldsShape|null $fields
     * @param list<string>|null $fieldsOrder
     * @param UiMapping|UiMappingShape|null $uiMapping
     */
    public static function with(
        ?string $code = null,
        ?string $description = null,
        Fields|array|null $fields = null,
        ?array $fieldsOrder = null,
        ?int $minPayoutSumm = null,
        ?string $payoutTime = null,
        ?string $subtitle = null,
        ?string $title = null,
        UiMapping|array|null $uiMapping = null,
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
     * @param Fields|FieldsShape $fields
     */
    public function withFields(Fields|array $fields): self
    {
        $self = clone $this;
        $self['fields'] = $fields;

        return $self;
    }

    /**
     * @param list<string> $fieldsOrder
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
     * @param UiMapping|UiMappingShape $uiMapping
     */
    public function withUiMapping(UiMapping|array $uiMapping): self
    {
        $self = clone $this;
        $self['uiMapping'] = $uiMapping;

        return $self;
    }
}
