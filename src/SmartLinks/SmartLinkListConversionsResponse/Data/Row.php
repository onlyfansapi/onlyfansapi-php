<?php

declare(strict_types=1);

namespace OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data\Row\Click;
use OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data\Row\Fan;

/**
 * @phpstan-import-type ClickShape from \OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data\Row\Click
 * @phpstan-import-type FanShape from \OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse\Data\Row\Fan
 *
 * @phpstan-type RowShape = array{
 *   id?: string|null,
 *   amountGross?: float|null,
 *   amountNet?: float|null,
 *   click?: null|Click|ClickShape,
 *   conversionAt?: string|null,
 *   conversionType?: string|null,
 *   fan?: null|Fan|FanShape,
 *   fanOnlyfansID?: string|null,
 * }
 */
final class Row implements BaseModel
{
    /** @use SdkModel<RowShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('amount_gross')]
    public ?float $amountGross;

    #[Optional('amount_net')]
    public ?float $amountNet;

    #[Optional]
    public ?Click $click;

    #[Optional('conversion_at')]
    public ?string $conversionAt;

    #[Optional('conversion_type')]
    public ?string $conversionType;

    #[Optional]
    public ?Fan $fan;

    #[Optional('fan_onlyfans_id')]
    public ?string $fanOnlyfansID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Click|ClickShape|null $click
     * @param Fan|FanShape|null $fan
     */
    public static function with(
        ?string $id = null,
        ?float $amountGross = null,
        ?float $amountNet = null,
        Click|array|null $click = null,
        ?string $conversionAt = null,
        ?string $conversionType = null,
        Fan|array|null $fan = null,
        ?string $fanOnlyfansID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $amountGross && $self['amountGross'] = $amountGross;
        null !== $amountNet && $self['amountNet'] = $amountNet;
        null !== $click && $self['click'] = $click;
        null !== $conversionAt && $self['conversionAt'] = $conversionAt;
        null !== $conversionType && $self['conversionType'] = $conversionType;
        null !== $fan && $self['fan'] = $fan;
        null !== $fanOnlyfansID && $self['fanOnlyfansID'] = $fanOnlyfansID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAmountGross(float $amountGross): self
    {
        $self = clone $this;
        $self['amountGross'] = $amountGross;

        return $self;
    }

    public function withAmountNet(float $amountNet): self
    {
        $self = clone $this;
        $self['amountNet'] = $amountNet;

        return $self;
    }

    /**
     * @param Click|ClickShape $click
     */
    public function withClick(Click|array $click): self
    {
        $self = clone $this;
        $self['click'] = $click;

        return $self;
    }

    public function withConversionAt(string $conversionAt): self
    {
        $self = clone $this;
        $self['conversionAt'] = $conversionAt;

        return $self;
    }

    public function withConversionType(string $conversionType): self
    {
        $self = clone $this;
        $self['conversionType'] = $conversionType;

        return $self;
    }

    /**
     * @param Fan|FanShape $fan
     */
    public function withFan(Fan|array $fan): self
    {
        $self = clone $this;
        $self['fan'] = $fan;

        return $self;
    }

    public function withFanOnlyfansID(string $fanOnlyfansID): self
    {
        $self = clone $this;
        $self['fanOnlyfansID'] = $fanOnlyfansID;

        return $self;
    }
}
