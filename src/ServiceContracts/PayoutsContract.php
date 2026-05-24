<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Payouts\PayoutGetBalancesResponse;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse;
use Onlyfansapi\Payouts\PayoutGetEligibilityResponse;
use Onlyfansapi\Payouts\PayoutListRequestsResponse;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1;
use Onlyfansapi\Payouts\PayoutUpdateFrequencyParams\Frequency;
use Onlyfansapi\Payouts\PayoutUpdateFrequencyResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface PayoutsContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $limit Number of payout requests to return
     * @param string $offset Number of payout requests to skip for pagination
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listRequests(
        string $account,
        ?string $limit = null,
        ?string $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): PayoutListRequestsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $amount The amount to withdraw. Amount may not be higher than the current balance.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function requestManualWithdrawal(
        string $account,
        int $amount,
        RequestOptions|array|null $requestOptions = null,
    ): UnionMember0|UnionMember1;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveBalances(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): PayoutGetBalancesResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string|null $endDate The end date for earning statistics. Keep empty to get all earnings.
     * @param string|null $startDate The start date for earning statistics. Keep empty to get all earnings.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveEarningStatistics(
        string $account,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): PayoutGetEarningStatisticsResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveEligibility(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): PayoutGetEligibilityResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Frequency|value-of<Frequency> $frequency The new payout frequency
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateFrequency(
        string $account,
        Frequency|string $frequency,
        RequestOptions|array|null $requestOptions = null,
    ): PayoutUpdateFrequencyResponse;
}
