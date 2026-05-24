<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Media;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\FileParam;
use Onlyfansapi\Media\Vault\VaultDeleteParams;
use Onlyfansapi\Media\Vault\VaultDeleteResponse;
use Onlyfansapi\Media\Vault\VaultGetResponse;
use Onlyfansapi\Media\Vault\VaultListParams;
use Onlyfansapi\Media\Vault\VaultListParams\Field;
use Onlyfansapi\Media\Vault\VaultListParams\Sort;
use Onlyfansapi\Media\Vault\VaultListParams\Type;
use Onlyfansapi\Media\Vault\VaultListResponse;
use Onlyfansapi\Media\Vault\VaultRetrieveParams;
use Onlyfansapi\Media\Vault\VaultUploadParams;
use Onlyfansapi\Media\Vault\VaultUploadResponse;
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
     * Retrieve details about a specific media item in your vault.
     *
     * @param int $mediaID the ID of the media item to retrieve
     * @param array{account: string}|VaultRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VaultGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        int $mediaID,
        array|VaultRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VaultRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/media/vault/%2$s', $account, $mediaID],
            options: $options,
            convert: VaultGetResponse::class,
        );
    }

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
     *   query?: string|null,
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

    /**
     * @api
     *
     * Upload a media file directly to your vault.
     *
     * @param string $account The Account ID
     * @param array{
     *   async?: bool, file?: string|FileParam, fileURL?: string
     * }|VaultUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<VaultUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        string $account,
        array|VaultUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = VaultUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/media/vault', $account],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: VaultUploadResponse::class,
        );
    }
}
