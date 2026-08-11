<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Media;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember3;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Media\UploadsContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
     * Instead of polling, you can subscribe to the `media_uploads.completed` and `media_uploads.failed` webhook events. They carry the same fields as this endpoint and are only sent for async (`async=true`) uploads — synchronous uploads return their result directly.
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
