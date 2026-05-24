<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\FileParam;
use Onlyfansapi\Media\MediaDownloadParams;
use Onlyfansapi\Media\MediaScrapeParams;
use Onlyfansapi\Media\MediaScrapeParams\FileType;
use Onlyfansapi\Media\MediaScrapeResponse;
use Onlyfansapi\Media\MediaUploadParams;
use Onlyfansapi\Media\MediaUploadParams\Type;
use Onlyfansapi\Media\MediaUploadResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\MediaRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * Downloads a file directly from a `https://cdn*.onlyfans.com/*` URL. When the file is already cached on our CDN, this endpoint returns a `302` redirect to a `https://cdn.fansapi.com/*` URL. Most HTTP clients follow redirects automatically (`curl` requires `-L`). Otherwise, the file is streamed through our proxies and queued for caching.
     *
     * @param string $cdnURL Optional parameter. The CDN URL to scrape. **Keep in mind that these URLs expire in approx. 20 minutes.** So for example, if you fetched Media Vault Items at 01:00pm, the URLs will expire at around 01:20pm
     * @param array{account: string}|MediaDownloadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
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
            headers: ['Accept' => 'text/plain'],
            options: $options,
            convert: 'string',
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
