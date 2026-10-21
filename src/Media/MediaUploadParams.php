<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Core\FileParam;
use OnlyFansAPI\Media\MediaUploadParams\Type;

/**
 * The response can be used **only once** to manually include media in a post or message. This endpoint does not upload media to the Vault. You must provide either `file` or `file_url`.
 *
 * @see OnlyFansAPI\Services\MediaService::upload()
 *
 * @phpstan-type MediaUploadParamsShape = array{
 *   async?: bool|null,
 *   file?: string|null|FileParam,
 *   fileURL?: string|null,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class MediaUploadParams implements BaseModel
{
    /** @use SdkModel<MediaUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set to `true` to process uploads in the background. Returns a `polling_url` to check status. Recommended for large files. Instead of polling, you can subscribe to the `media_uploads.completed` and `media_uploads.failed` webhook events — they only fire for async uploads.
     */
    #[Optional]
    public ?bool $async;

    /**
     * The file to upload. Required if `file_url` is not provided. Maximum file size: 100 MB (limited by Cloudflare).
     */
    #[Optional]
    public ?string $file;

    /**
     * A URL to download the file from. Required if `file` is not provided. Maximum file size depends on the subscription configuration.
     */
    #[Optional('file_url')]
    public ?string $fileURL;

    /**
     * Set to `avatar` if this file will be used as a profile picture, `header` for a profile banner, or keep empty if this file will be for anything else.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

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
    public static function with(
        ?bool $async = null,
        string|FileParam|null $file = null,
        ?string $fileURL = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $async && $self['async'] = $async;
        null !== $file && $self['file'] = $file;
        null !== $fileURL && $self['fileURL'] = $fileURL;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Set to `true` to process uploads in the background. Returns a `polling_url` to check status. Recommended for large files. Instead of polling, you can subscribe to the `media_uploads.completed` and `media_uploads.failed` webhook events — they only fire for async uploads.
     */
    public function withAsync(bool $async): self
    {
        $self = clone $this;
        $self['async'] = $async;

        return $self;
    }

    /**
     * The file to upload. Required if `file_url` is not provided. Maximum file size: 100 MB (limited by Cloudflare).
     */
    public function withFile(string|FileParam $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * A URL to download the file from. Required if `file` is not provided. Maximum file size depends on the subscription configuration.
     */
    public function withFileURL(string $fileURL): self
    {
        $self = clone $this;
        $self['fileURL'] = $fileURL;

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
