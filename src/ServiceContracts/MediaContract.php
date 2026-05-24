<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\MediaScrapeResponse;
use Onlyfansapi\Media\MediaUploadParams\Type;
use Onlyfansapi\Media\MediaUploadResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MediaContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $url The CDN URL to scrape. **Keep in mind that these URLs expire fast.**
     * @param string|null $expirationDate The expiration date of our returned `temporary_url`. Default of 5 minutes.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function scrape(
        string $account,
        string $url,
        ?string $expirationDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaScrapeResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $file the file to upload
     * @param Type|value-of<Type> $type set to `avatar` if this file will be used as a profile picture, `header` for a profile banner, or keep empty if this file will be for anything else
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        string $account,
        string $file,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): MediaUploadResponse;
}
