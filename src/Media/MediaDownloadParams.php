<?php

declare(strict_types=1);

namespace OnlyFansAPI\Media;

use OnlyFansAPI\Core\Attributes\Required;
use OnlyFansAPI\Core\Concerns\SdkModel;
use OnlyFansAPI\Core\Concerns\SdkParams;
use OnlyFansAPI\Core\Contracts\BaseModel;

/**
 * Downloads a file from a `https://cdn*.onlyfans.com/*` URL through a `302` redirect. Follow redirects (`curl -L`). Cached `cdn.fansapi.com` files are free; otherwise `dl.fansapi.com` streams through the account proxy. Send one `Range: bytes=start-end` header to request a chunk for playback or a preview. A supported range returns `206`, `Content-Range`, and the chunk Content-Length; an upstream that ignores Range can return a full `200`, so check the response. Each nonempty transfer costs 3 credits per decimal MB streamed (minimum 1 credit). Credits for the selected response are reserved before streaming; unused reserved credits are released on completion, including an interrupted transfer. HEAD follows the same redirects and returns metadata without a body or download charge. HEAD does not populate the media cache. This regular endpoint does not decrypt DRM media.
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
