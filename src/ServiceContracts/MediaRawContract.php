<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\MediaScrapeParams;
use Onlyfansapi\Media\MediaScrapeResponse;
use Onlyfansapi\Media\MediaUploadParams;
use Onlyfansapi\Media\MediaUploadResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface MediaRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|MediaScrapeParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|MediaUploadParams $params
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
    ): BaseResponse;
}
