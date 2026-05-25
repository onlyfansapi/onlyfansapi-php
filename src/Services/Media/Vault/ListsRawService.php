<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Media\Vault;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Media\Vault\Lists\ListCreateParams;
use OnlyFansAPI\Media\Vault\Lists\ListDeleteParams;
use OnlyFansAPI\Media\Vault\Lists\ListDeleteResponse;
use OnlyFansAPI\Media\Vault\Lists\ListGetResponse;
use OnlyFansAPI\Media\Vault\Lists\ListListParams;
use OnlyFansAPI\Media\Vault\Lists\ListListResponse;
use OnlyFansAPI\Media\Vault\Lists\ListNewResponse;
use OnlyFansAPI\Media\Vault\Lists\ListRetrieveParams;
use OnlyFansAPI\Media\Vault\Lists\ListUpdateParams;
use OnlyFansAPI\Media\Vault\Lists\ListUpdateResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Media\Vault\ListsRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ListsRawService implements ListsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Vault list.
     *
     * @param string $account The Account ID
     * @param array{name: string}|ListCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|ListCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/media/vault/lists', $account],
            body: (object) $parsed,
            options: $options,
            convert: ListNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Show a Vault list.
     *
     * @param string $listID The ID of the list
     * @param array{account: string}|ListRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $listID,
        array|ListRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/media/vault/lists/%2$s', $account, $listID],
            options: $options,
            convert: ListGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Rename a Vault list.
     *
     * @param string $listID The ID of the list
     * @param array{account: string}|ListUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $listID,
        array|ListUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['api/%1$s/media/vault/lists/%2$s', $account, $listID],
            options: $options,
            convert: ListUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List your Vault lists (categories).
     *
     * @param string $account The Account ID
     * @param array{limit?: int, offset?: int, query?: string}|ListListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|ListListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/media/vault/lists', $account],
            query: $parsed,
            options: $options,
            convert: ListListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Vault list.
     *
     * @param string $listID The ID of the list
     * @param array{account: string}|ListDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $listID,
        array|ListDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ListDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/media/vault/lists/%2$s', $account, $listID],
            options: $options,
            convert: ListDeleteResponse::class,
        );
    }
}
