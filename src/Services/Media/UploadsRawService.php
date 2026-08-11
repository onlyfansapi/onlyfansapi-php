<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Media;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Media\Uploads\UploadGetStatusParams;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use OnlyFansAPI\Media\Uploads\UploadGetStatusResponse\UnionMember3;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Media\UploadsRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class UploadsRawService implements UploadsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{account: string}|UploadGetStatusParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnionMember0|UnionMember1|UnionMember2|UnionMember3>
     *
     * @throws APIException
     */
    public function getStatus(
        string $upload,
        array|UploadGetStatusParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UploadGetStatusParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/media/uploads/%2$s/status', $account, $upload],
            options: $options,
            convert: UploadGetStatusResponse::class,
        );
    }
}
