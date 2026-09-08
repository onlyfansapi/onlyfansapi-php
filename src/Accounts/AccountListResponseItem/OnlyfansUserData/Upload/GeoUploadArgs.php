<?php

declare(strict_types=1);

namespace OnlyFansAPI\Accounts\AccountListResponseItem\OnlyfansUserData\Upload;

use OnlyFansAPI\Accounts\AccountListResponseItem\OnlyfansUserData\Upload\GeoUploadArgs\Additional;
use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AdditionalShape from \OnlyFansAPI\Accounts\AccountListResponseItem\OnlyfansUserData\Upload\GeoUploadArgs\Additional
 *
 * @phpstan-type GeoUploadArgsShape = array{
 *   additional?: null|Additional|AdditionalShape,
 *   isDelay?: bool|null,
 *   needThumbs?: bool|null,
 *   preset?: string|null,
 *   presetPng?: string|null,
 *   protectedPreset?: string|null,
 * }
 */
final class GeoUploadArgs implements BaseModel
{
    /** @use SdkModel<GeoUploadArgsShape> */
    use SdkModel;

    #[Optional]
    public ?Additional $additional;

    #[Optional]
    public ?bool $isDelay;

    #[Optional]
    public ?bool $needThumbs;

    #[Optional]
    public ?string $preset;

    #[Optional('preset_png')]
    public ?string $presetPng;

    #[Optional('protected_preset')]
    public ?string $protectedPreset;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Additional|AdditionalShape|null $additional
     */
    public static function with(
        Additional|array|null $additional = null,
        ?bool $isDelay = null,
        ?bool $needThumbs = null,
        ?string $preset = null,
        ?string $presetPng = null,
        ?string $protectedPreset = null,
    ): self {
        $self = new self;

        null !== $additional && $self['additional'] = $additional;
        null !== $isDelay && $self['isDelay'] = $isDelay;
        null !== $needThumbs && $self['needThumbs'] = $needThumbs;
        null !== $preset && $self['preset'] = $preset;
        null !== $presetPng && $self['presetPng'] = $presetPng;
        null !== $protectedPreset && $self['protectedPreset'] = $protectedPreset;

        return $self;
    }

    /**
     * @param Additional|AdditionalShape $additional
     */
    public function withAdditional(Additional|array $additional): self
    {
        $self = clone $this;
        $self['additional'] = $additional;

        return $self;
    }

    public function withIsDelay(bool $isDelay): self
    {
        $self = clone $this;
        $self['isDelay'] = $isDelay;

        return $self;
    }

    public function withNeedThumbs(bool $needThumbs): self
    {
        $self = clone $this;
        $self['needThumbs'] = $needThumbs;

        return $self;
    }

    public function withPreset(string $preset): self
    {
        $self = clone $this;
        $self['preset'] = $preset;

        return $self;
    }

    public function withPresetPng(string $presetPng): self
    {
        $self = clone $this;
        $self['presetPng'] = $presetPng;

        return $self;
    }

    public function withProtectedPreset(string $protectedPreset): self
    {
        $self = clone $this;
        $self['protectedPreset'] = $protectedPreset;

        return $self;
    }
}
