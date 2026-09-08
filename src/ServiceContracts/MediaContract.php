<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\FileParam;
use OnlyFansAPI\Media\MediaScrapeParams\FileType;
use OnlyFansAPI\Media\MediaScrapeResponse;
use OnlyFansAPI\Media\MediaUploadParams\Type;
use OnlyFansAPI\Media\MediaUploadResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface MediaContract
{
    /**
     * @api
     *
     * @param string $cdnURL Optional parameter. The CDN URL to scrape. **Keep in mind that these URLs expire in approx. 20 minutes.** So for example, if you fetched Media Vault Items at 01:00pm, the URLs will expire at around 01:20pm
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function download(
        string $cdnURL,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string|null $expirationDate The expiration date of our returned `temporary_url`. Default of 5 minutes. Must be null if `public` is true.
     * @param FileType|value-of<FileType>|null $fileType The file type to scrape. Only allowed when using `media_id`.
     * @param int|null $mediaID The OnlyFans Vault Media ID. **Can be used instead of the `url`.**
     * @param bool|null $public Set to true if you want to have the file uploaded to our public CDN (no signed URL needed to access). Default is false. Must be null if `expiration_date` is set.
     * @param string|null $url The CDN URL to scrape. **Keep in mind that these URLs expire fast.**
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function scrape(
        string $account,
        ?string $expirationDate = null,
        FileType|string|null $fileType = null,
        ?int $mediaID = null,
        ?bool $public = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaScrapeResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param bool $async Set to `true` to process uploads in the background. Returns a `polling_url` to check status. Recommended for large files. Instead of polling, you can subscribe to the `media_uploads.completed` and `media_uploads.failed` webhook events — they only fire for async uploads.
     * @param string|FileParam $file The file to upload. Required if `file_url` is not provided. Maximum file size: 100 MB (limited by Cloudflare).
     * @param string $fileURL A URL to download the file from. Required if `file` is not provided. Maximum file size depends on the subscription configuration.
     * @param Type|value-of<Type> $type set to `avatar` if this file will be used as a profile picture, `header` for a profile banner, or keep empty if this file will be for anything else
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        string $account,
        ?bool $async = null,
        string|FileParam|null $file = null,
        ?string $fileURL = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaUploadResponse;
}
