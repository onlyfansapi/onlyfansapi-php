<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Media;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Vault\VaultDeleteParams;
use Onlyfansapi\Media\Vault\VaultDeleteResponse;
use Onlyfansapi\Media\Vault\VaultGetResponse;
use Onlyfansapi\Media\Vault\VaultListParams;
use Onlyfansapi\Media\Vault\VaultListResponse;
use Onlyfansapi\Media\Vault\VaultRetrieveParams;
use Onlyfansapi\Media\Vault\VaultUploadParams;
use Onlyfansapi\Media\Vault\VaultUploadResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
