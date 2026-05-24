<?php

declare(strict_types=1);

namespace Onlyfansapi\Media;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;
use Onlyfansapi\Media\MediaUploadParams\Type;

/**
 * The response can be used **only once** to manually include media in a post or message. This endpoint does not upload media to the Vault.
 *
 * @see Onlyfansapi\Services\MediaService::upload()
 *
 * @phpstan-type MediaUploadParamsShape = array{
 *   file: string, type?: null|Type|value-of<Type>
 * }
 */
final class MediaUploadParams implements BaseModel
{
    /** @use SdkModel<MediaUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The file to upload.
     */
    #[Required]
    public string $file;

    /**
     * Set to `avatar` if this file will be used as a profile picture, `header` for a profile banner, or keep empty if this file will be for anything else.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * `new MediaUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaUploadParams::with(file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaUploadParams)->withFile(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type>|null $type
     */
    public static function with(string $file, Type|string|null $type = null): self
    {
        $self = new self;

        $self['file'] = $file;

        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The file to upload.
     */
    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * Set to `avatar` if this file will be used as a profile picture, `header` for a profile banner, or keep empty if this file will be for anything else.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
