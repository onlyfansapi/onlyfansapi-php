<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media;

use OnlyFansAPI\Core\Attributes\Optional;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;
use OnlyFansAPI\Media\MediaScrapeParams\FileType;

/**
 * **⚠️ This is a deprecated endpoint. Please use the new "Download media from the OnlyFans CDN" endpoint!** Scrapes a `https://cdn*.onlyfans.com/*` URL *or* Vault Media ID, and uploads it to the OnlyFans API CDN, where you can view or download the file. **Max file size is 500MB**.
 *
 * @see OnlyFansAPI\Services\MediaService::scrape()
 *
 * @phpstan-type MediaScrapeParamsShape = array{
 *   expirationDate?: string|null,
 *   fileType?: null|FileType|value-of<FileType>,
 *   mediaID?: int|null,
 *   public?: bool|null,
 *   url?: string|null,
 * }
 */
final class MediaScrapeParams implements BaseModel
{
    /** @use SdkModel<MediaScrapeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The expiration date of our returned `temporary_url`. Default of 5 minutes. Must be null if `public` is true.
     */
    #[Optional('expiration_date', nullable: true)]
    public ?string $expirationDate;

    /**
     * The file type to scrape. Only allowed when using `media_id`.
     *
     * @var value-of<FileType>|null $fileType
     */
    #[Optional('file_type', enum: FileType::class, nullable: true)]
    public ?string $fileType;

    /**
     * The OnlyFans Vault Media ID. **Can be used instead of the `url`.**.
     */
    #[Optional('media_id', nullable: true)]
    public ?int $mediaID;

    /**
     * Set to true if you want to have the file uploaded to our public CDN (no signed URL needed to access). Default is false. Must be null if `expiration_date` is set.
     */
    #[Optional(nullable: true)]
    public ?bool $public;

    /**
     * The CDN URL to scrape. **Keep in mind that these URLs expire fast.**.
     */
    #[Optional(nullable: true)]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FileType|value-of<FileType>|null $fileType
     */
    public static function with(
        ?string $expirationDate = null,
        FileType|string|null $fileType = null,
        ?int $mediaID = null,
        ?bool $public = null,
        ?string $url = null,
    ): self {
        $self = new self;

        null !== $expirationDate && $self['expirationDate'] = $expirationDate;
        null !== $fileType && $self['fileType'] = $fileType;
        null !== $mediaID && $self['mediaID'] = $mediaID;
        null !== $public && $self['public'] = $public;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * The expiration date of our returned `temporary_url`. Default of 5 minutes. Must be null if `public` is true.
     */
    public function withExpirationDate(?string $expirationDate): self
    {
        $self = clone $this;
        $self['expirationDate'] = $expirationDate;

        return $self;
    }

    /**
     * The file type to scrape. Only allowed when using `media_id`.
     *
     * @param FileType|value-of<FileType>|null $fileType
     */
    public function withFileType(FileType|string|null $fileType): self
    {
        $self = clone $this;
        $self['fileType'] = $fileType;

        return $self;
    }

    /**
     * The OnlyFans Vault Media ID. **Can be used instead of the `url`.**.
     */
    public function withMediaID(?int $mediaID): self
    {
        $self = clone $this;
        $self['mediaID'] = $mediaID;

        return $self;
    }

    /**
     * Set to true if you want to have the file uploaded to our public CDN (no signed URL needed to access). Default is false. Must be null if `expiration_date` is set.
     */
    public function withPublic(?bool $public): self
    {
        $self = clone $this;
        $self['public'] = $public;

        return $self;
    }

    /**
     * The CDN URL to scrape. **Keep in mind that these URLs expire fast.**.
     */
    public function withURL(?string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
