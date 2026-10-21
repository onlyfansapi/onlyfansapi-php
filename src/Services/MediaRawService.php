<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\FileParam;
use OnlyFansAPI\Media\MediaDownloadParams;
use OnlyFansAPI\Media\MediaScrapeParams;
use OnlyFansAPI\Media\MediaScrapeParams\FileType;
use OnlyFansAPI\Media\MediaScrapeResponse;
use OnlyFansAPI\Media\MediaUploadParams;
use OnlyFansAPI\Media\MediaUploadParams\Type;
use OnlyFansAPI\Media\MediaUploadResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\MediaRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class MediaRawService implements MediaRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Downloads a file from a `https://cdn*.onlyfans.com/*` URL through a `302` redirect. Follow redirects (`curl -L`). Cached `cdn.fansapi.com` files are free; otherwise `dl.fansapi.com` streams through the account proxy. Send one `Range: bytes=start-end` header to request a chunk for playback or a preview. A supported range returns `206`, `Content-Range`, and the chunk Content-Length; an upstream that ignores Range can return a full `200`, so check the response. Each nonempty transfer costs 3 credits per decimal MB streamed (minimum 1 credit). Credits for the selected response are reserved before streaming; unused reserved credits are released on completion, including an interrupted transfer. HEAD follows the same redirects and returns metadata without a body or download charge. HEAD does not populate the media cache. This regular endpoint does not decrypt DRM media.
     *
     * @param string $cdnURL Optional parameter. The CDN URL to scrape. **Keep in mind that these URLs expire in approx. 20 minutes.** So for example, if you fetched Media Vault Items at 01:00pm, the URLs will expire at around 01:20pm
     * @param array{account: string}|MediaDownloadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function download(
        string $cdnURL,
        array|MediaDownloadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaDownloadParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/media/download/%2$s', $account, $cdnURL],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * **⚠️ This is a deprecated endpoint. Please use the new "Download media from the OnlyFans CDN" endpoint!** Scrapes a `https://cdn*.onlyfans.com/*` URL *or* Vault Media ID, and uploads it to the OnlyFans API CDN, where you can view or download the file. **Max file size is 500MB**
     *
     * @param string $account The Account ID
     * @param array{
     *   expirationDate?: string|null,
     *   fileType?: FileType|value-of<FileType>|null,
     *   mediaID?: int|null,
     *   public?: bool|null,
     *   url?: string|null,
     * }|MediaScrapeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaScrapeResponse>
     *
     * @throws APIException
     */
    public function scrape(
        string $account,
        array|MediaScrapeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaScrapeParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/media/scrape', $account],
            body: (object) $parsed,
            options: $options,
            convert: MediaScrapeResponse::class,
        );
    }

    /**
     * @api
     *
     * The response can be used **only once** to manually include media in a post or message. This endpoint does not upload media to the Vault. You must provide either `file` or `file_url`.
     *
     * @param string $account The Account ID
     * @param array{
     *   async?: bool,
     *   file?: string|FileParam,
     *   fileURL?: string,
     *   type?: Type|value-of<Type>,
     * }|MediaUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        string $account,
        array|MediaUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/media/upload', $account],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: MediaUploadResponse::class,
        );
    }
}
