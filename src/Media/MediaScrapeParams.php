<?php

declare(strict_types=1);

namespace Onlyfansapi\Media;

use Onlyfansapi\Core\Attributes\Optional;
use Onlyfansapi\Core\Attributes\Required;
use Onlyfansapi\Core\Concerns\SdkModel;
use Onlyfansapi\Core\Concerns\SdkParams;
use Onlyfansapi\Core\Contracts\BaseModel;

/**
 * Scrapes a `https://cdn*.onlyfans.com/*` URL and uploads it to the OnlyFans API CDN, so that you can view or download the file. **Max file size is 500MB**.
 *
 * @see Onlyfansapi\Services\MediaService::scrape()
 *
 * @phpstan-type MediaScrapeParamsShape = array{
 *   url: string, expirationDate?: string|null
 * }
 */
final class MediaScrapeParams implements BaseModel
{
    /** @use SdkModel<MediaScrapeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The CDN URL to scrape. **Keep in mind that these URLs expire fast.**.
     */
    #[Required]
    public string $url;

    /**
     * The expiration date of our returned `temporary_url`. Default of 5 minutes.
     */
    #[Optional('expiration_date', nullable: true)]
    public ?string $expirationDate;

    /**
     * `new MediaScrapeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaScrapeParams::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaScrapeParams)->withURL(...)
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
     */
    public static function with(
        string $url,
        ?string $expirationDate = null
    ): self {
        $self = new self;

        $self['url'] = $url;

        null !== $expirationDate && $self['expirationDate'] = $expirationDate;

        return $self;
    }

    /**
     * The CDN URL to scrape. **Keep in mind that these URLs expire fast.**.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * The expiration date of our returned `temporary_url`. Default of 5 minutes.
     */
    public function withExpirationDate(?string $expirationDate): self
    {
        $self = clone $this;
        $self['expirationDate'] = $expirationDate;

        return $self;
    }
}
