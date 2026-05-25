<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media\Vault;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Core\FileParam;

/**
 * Upload a media file directly to your vault.
 *
 * @see OnlyFansAPI\Services\Media\VaultService::upload()
 *
 * @phpstan-type VaultUploadParamsShape = array{
 *   async?: bool|null, file?: string|null|FileParam, fileURL?: string|null
 * }
 */
final class VaultUploadParams implements BaseModel
{
    /** @use SdkModel<VaultUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Set to `true` to process uploads in the background. Returns a `polling_url` to check status. Recommended for large files.
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
        ?bool $async = null,
        string|FileParam|null $file = null,
        ?string $fileURL = null
    ): self {
        $self = new self;

        null !== $async && $self['async'] = $async;
        null !== $file && $self['file'] = $file;
        null !== $fileURL && $self['fileURL'] = $fileURL;

        return $self;
    }

    /**
     * Set to `true` to process uploads in the background. Returns a `polling_url` to check status. Recommended for large files.
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
}
