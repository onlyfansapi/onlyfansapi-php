<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Media\Vault\Lists;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Vault\Lists\Media\MediaAddParams;
use Onlyfansapi\Media\Vault\Lists\Media\MediaAddResponse;
use Onlyfansapi\Media\Vault\Lists\Media\MediaRemoveParams;
use Onlyfansapi\Media\Vault\Lists\Media\MediaRemoveResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Media\Vault\Lists\MediaRawContract;

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
