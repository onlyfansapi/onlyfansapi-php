<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Media;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Media\UploadsContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class UploadsService implements UploadsContract
{
    /**
     * @api
     */
    public UploadsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new UploadsRawService($client);
    }

    /**
     * @api
     *
     * Check the status of a media upload. Poll this endpoint until status is `completed` or `failed`. This endpoint is free and does not cost any credits.
     *
     * **Possible statuses:**
     * - `pending` — Upload is queued
     * - `processing` — Download/upload in progress
     * - `completed` — Upload finished, `media` and `credits_used` are included
     * - `failed` — Upload failed, `error` is included
     *
     * @param string $upload the prefixed ID of the upload
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatus(
        string $upload,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): UnionMember0|UnionMember1|UnionMember2|UnionMember3 {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getStatus($upload, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
