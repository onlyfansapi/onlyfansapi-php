<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SmartLinks\SmartLinkCreateParams;
use Onlyfansapi\SmartLinks\SmartLinkDeleteResponse;
use Onlyfansapi\SmartLinks\SmartLinkGetResponse;
use Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse;
use Onlyfansapi\SmartLinks\SmartLinkListClicksParams;
use Onlyfansapi\SmartLinks\SmartLinkListClicksResponse;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsParams;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse;
use Onlyfansapi\SmartLinks\SmartLinkListFansParams;
use Onlyfansapi\SmartLinks\SmartLinkListFansResponse;
use Onlyfansapi\SmartLinks\SmartLinkListParams;
use Onlyfansapi\SmartLinks\SmartLinkListResponse;
use Onlyfansapi\SmartLinks\SmartLinkListSpendersParams;
use Onlyfansapi\SmartLinks\SmartLinkListSpendersResponse;
use Onlyfansapi\SmartLinks\SmartLinkNewResponse;
use Onlyfansapi\SmartLinks\SmartLinkRetrieveCohortArpsParams;
use Onlyfansapi\SmartLinks\SmartLinkRetrieveStatsParams;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SmartLinksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SmartLinkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SmartLinkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $smartLinkID The ID of the Smart Link
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $smartLinkID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SmartLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SmartLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $smartLinkID The ID of the Smart Link
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $smartLinkID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array<string,mixed>|SmartLinkListClicksParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkListClicksResponse>
     *
     * @throws APIException
     */
    public function listClicks(
        string $smartLinkID,
        array|SmartLinkListClicksParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array<string,mixed>|SmartLinkListConversionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkListConversionsResponse>
     *
     * @throws APIException
     */
    public function listConversions(
        string $smartLinkID,
        array|SmartLinkListConversionsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array<string,mixed>|SmartLinkListFansParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkListFansResponse>
     *
     * @throws APIException
     */
    public function listFans(
        string $smartLinkID,
        array|SmartLinkListFansParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array<string,mixed>|SmartLinkListSpendersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkListSpendersResponse>
     *
     * @throws APIException
     */
    public function listSpenders(
        string $smartLinkID,
        array|SmartLinkListSpendersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array<string,mixed>|SmartLinkRetrieveCohortArpsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveCohortArps(
        string $smartLinkID,
        array|SmartLinkRetrieveCohortArpsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array<string,mixed>|SmartLinkRetrieveStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkGetStatsResponse>
     *
     * @throws APIException
     */
    public function retrieveStats(
        string $smartLinkID,
        array|SmartLinkRetrieveStatsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
