<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Payouts\PayoutGetBalancesResponse;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse;
use Onlyfansapi\Payouts\PayoutGetEligibilityResponse;
use Onlyfansapi\Payouts\PayoutListPayoutRequestsParams;
use Onlyfansapi\Payouts\PayoutListPayoutRequestsResponse;
use Onlyfansapi\Payouts\PayoutListTransactionsParams;
use Onlyfansapi\Payouts\PayoutListTransactionsResponse;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalParams;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1;
use Onlyfansapi\Payouts\PayoutRetrieveEarningStatisticsParams;
use Onlyfansapi\Payouts\PayoutUpdatePayoutFrequencyParams;
use Onlyfansapi\Payouts\PayoutUpdatePayoutFrequencyResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface PayoutsRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PayoutListPayoutRequestsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayoutListPayoutRequestsResponse>
     *
     * @throws APIException
     */
    public function listPayoutRequests(
        string $account,
        array|PayoutListPayoutRequestsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|PayoutListTransactionsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayoutListTransactionsResponse>
     *
     * @throws APIException
     */
    public function listTransactions(
        string $account,
        array|PayoutListTransactionsParams $params,
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
     * @param array<string,mixed>|PayoutUpdatePayoutFrequencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PayoutUpdatePayoutFrequencyResponse>
     *
     * @throws APIException
     */
    public function updatePayoutFrequency(
        string $account,
        array|PayoutUpdatePayoutFrequencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
