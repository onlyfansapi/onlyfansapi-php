<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Media;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Vault\VaultDeleteParams;
use Onlyfansapi\Media\Vault\VaultDeleteResponse;
use Onlyfansapi\Media\Vault\VaultListParams;
use Onlyfansapi\Media\Vault\VaultListParams\Field;
use Onlyfansapi\Media\Vault\VaultListParams\Sort;
use Onlyfansapi\Media\Vault\VaultListParams\Type;
use Onlyfansapi\Media\Vault\VaultListResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Media\VaultRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class VaultRawService implements VaultRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List media items stored in your vault. See how many likes and how much tips did they get.
     *
     * @param string $account The Account ID
     * @param array{
     *   field?: Field|value-of<Field>,
     *   limit?: int,
     *   list?: int,
     *   offset?: int,
     *   query?: string,
     *   sort?: Sort|value-of<Sort>,
     *   type?: Type|value-of<Type>,
     * }|VaultListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VaultListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|VaultListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VaultListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/media/vault', $account],
            query: $parsed,
            options: $options,
            convert: VaultListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete one or multiple media from your vault.
     *
     * @param string $account The Account ID
     * @param array{mediaIDs: list<string>}|VaultDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VaultDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $account,
        array|VaultDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VaultDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/media/vault/delete-media', $account],
            body: (object) $parsed,
            options: $options,
            convert: VaultDeleteResponse::class,
        );
    }
}
