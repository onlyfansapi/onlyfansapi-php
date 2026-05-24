<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Media\Vault;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Media\Vault\Lists\ListCreateParams;
use Onlyfansapi\Media\Vault\Lists\ListDeleteParams;
use Onlyfansapi\Media\Vault\Lists\ListDeleteResponse;
use Onlyfansapi\Media\Vault\Lists\ListGetResponse;
use Onlyfansapi\Media\Vault\Lists\ListListParams;
use Onlyfansapi\Media\Vault\Lists\ListListResponse;
use Onlyfansapi\Media\Vault\Lists\ListNewResponse;
use Onlyfansapi\Media\Vault\Lists\ListRetrieveParams;
use Onlyfansapi\Media\Vault\Lists\ListUpdateParams;
use Onlyfansapi\Media\Vault\Lists\ListUpdateResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface ListsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ListCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID The ID of the list
     * @param array<string,mixed>|ListRetrieveParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID The ID of the list
     * @param array<string,mixed>|ListUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ListListParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $listID The ID of the list
     * @param array<string,mixed>|ListDeleteParams $params
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
    ): BaseResponse;
}
