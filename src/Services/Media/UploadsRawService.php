<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Media;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Uploads\UploadGetStatusParams;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember0;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember1;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember2;
use Onlyfansapi\Media\Uploads\UploadGetStatusResponse\UnionMember3;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Media\UploadsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
