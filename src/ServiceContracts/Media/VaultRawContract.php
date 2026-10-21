<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Media;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Media\Vault\VaultDeleteParams;
use OnlyFansAPI\Media\Vault\VaultDeleteResponse;
use OnlyFansAPI\Media\Vault\VaultGetResponse;
use OnlyFansAPI\Media\Vault\VaultListParams;
use OnlyFansAPI\Media\Vault\VaultListResponse;
use OnlyFansAPI\Media\Vault\VaultRetrieveParams;
use OnlyFansAPI\Media\Vault\VaultUploadParams;
use OnlyFansAPI\Media\Vault\VaultUploadResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface VaultRawContract
{
    /**
     * @api
     *
     * @param int $mediaID the ID of the media item to retrieve
     * @param array<string,mixed>|VaultRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|VaultListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|VaultDeleteParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|VaultUploadParams $params
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
    ): BaseResponse;
}
