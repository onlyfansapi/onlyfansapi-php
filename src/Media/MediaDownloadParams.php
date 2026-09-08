<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Downloads a file directly from a `https://cdn*.onlyfans.com/*` URL. When the file is already cached on our CDN, this endpoint returns a `302` redirect to a `https://cdn.fansapi.com/*` URL. Most HTTP clients follow redirects automatically (`curl` requires `-L`). Otherwise, the file is redirected to `dl.fansapi.com`, which streams it through the account proxy and reports billing back to the API.
 *
 * @see OnlyFansAPI\Services\MediaService::download()
 *
 * @phpstan-type MediaDownloadParamsShape = array{account: string}
 */
final class MediaDownloadParams implements BaseModel
{
    /** @use SdkModel<MediaDownloadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $account;

    /**
     * `new MediaDownloadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaDownloadParams::with(account: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaDownloadParams)->withAccount(...)
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
    public static function with(string $account): self
    {
        $self = new self;

        $self['account'] = $account;

        return $self;
    }

    public function withAccount(string $account): self
    {
        $self = clone $this;
        $self['account'] = $account;

        return $self;
    }
}
