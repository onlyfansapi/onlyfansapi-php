<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Media\Vault\Lists;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Media\Vault\Lists\Media\MediaAddParams;
use OnlyFansAPI\Media\Vault\Lists\Media\MediaAddResponse;
use OnlyFansAPI\Media\Vault\Lists\Media\MediaRemoveParams;
use OnlyFansAPI\Media\Vault\Lists\Media\MediaRemoveResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Media\Vault\Lists\MediaRawContract;

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
     * Add one or multiple media to a list.
     *
     * @param string $listID path param: The ID of the list
     * @param array{account: string, mediaIDs: list<string>}|MediaAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaAddResponse>
     *
     * @throws APIException
     */
    public function add(
        string $listID,
        array|MediaAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaAddParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/media/vault/lists/%2$s/media', $account, $listID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: MediaAddResponse::class,
        );
    }

    /**
     * @api
     *
     * Remove one or multiple media from a list.
     *
     * @param string $listID path param: The ID of the list
     * @param array{account: string, mediaIDs: list<string>}|MediaRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MediaRemoveResponse>
     *
     * @throws APIException
     */
    public function remove(
        string $listID,
        array|MediaRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MediaRemoveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/media/vault/lists/%2$s/media', $account, $listID],
            body: (object) array_diff_key($parsed, array_flip(['account'])),
            options: $options,
            convert: MediaRemoveResponse::class,
        );
    }
}
