<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Payouts\PayoutGetBalancesResponse;
use OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse;
use OnlyFansAPI\Payouts\PayoutGetEligibilityResponse;
use OnlyFansAPI\Payouts\PayoutListRequestsParams;
use OnlyFansAPI\Payouts\PayoutListRequestsResponse;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalParams;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1;
use OnlyFansAPI\Payouts\PayoutRetrieveEarningStatisticsParams;
use OnlyFansAPI\Payouts\PayoutUpdateFrequencyParams;
use OnlyFansAPI\Payouts\PayoutUpdateFrequencyResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface PayoutsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PayoutListRequestsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayoutListRequestsResponse>
     *
     * @throws APIException
     */
    public function listRequests(
        string $account,
        array|PayoutListRequestsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PayoutRequestManualWithdrawalParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnionMember0|UnionMember1>
     *
     * @throws APIException
     */
    public function requestManualWithdrawal(
        string $account,
        array|PayoutRequestManualWithdrawalParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayoutGetBalancesResponse>
     *
     * @throws APIException
     */
    public function retrieveBalances(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PayoutRetrieveEarningStatisticsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayoutGetEarningStatisticsResponse>
     *
     * @throws APIException
     */
    public function retrieveEarningStatistics(
        string $account,
        array|PayoutRetrieveEarningStatisticsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayoutGetEligibilityResponse>
     *
     * @throws APIException
     */
    public function retrieveEligibility(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PayoutUpdateFrequencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayoutUpdateFrequencyResponse>
     *
     * @throws APIException
     */
    public function updateFrequency(
        string $account,
        array|PayoutUpdateFrequencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
