<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\SmartLinks\SmartLinkCreateParams;
use OnlyFansAPI\SmartLinks\SmartLinkDeleteResponse;
use OnlyFansAPI\SmartLinks\SmartLinkGetResponse;
use OnlyFansAPI\SmartLinks\SmartLinkGetStatsResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListClicksParams;
use OnlyFansAPI\SmartLinks\SmartLinkListClicksResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListConversionsParams;
use OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListFansParams;
use OnlyFansAPI\SmartLinks\SmartLinkListFansResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListParams;
use OnlyFansAPI\SmartLinks\SmartLinkListResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListSpendersParams;
use OnlyFansAPI\SmartLinks\SmartLinkListSpendersResponse;
use OnlyFansAPI\SmartLinks\SmartLinkNewResponse;
use OnlyFansAPI\SmartLinks\SmartLinkRetrieveCohortArpsParams;
use OnlyFansAPI\SmartLinks\SmartLinkRetrieveStatsParams;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
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
