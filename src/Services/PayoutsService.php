<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Payouts\PayoutGetBalancesResponse;
use Onlyfansapi\Payouts\PayoutGetEarningStatisticsResponse;
use Onlyfansapi\Payouts\PayoutGetEligibilityResponse;
use Onlyfansapi\Payouts\PayoutListRequestsResponse;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1;
use Onlyfansapi\Payouts\PayoutUpdateFrequencyParams\Frequency;
use Onlyfansapi\Payouts\PayoutUpdateFrequencyResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\PayoutsContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class PayoutsService implements PayoutsContract
{
    /**
     * @api
     */
    public PayoutsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PayoutsRawService($client);
    }

    /**
     * @api
     *
     * List all payout requests for the account.
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
    ): PayoutListRequestsResponse {
        $params = Util::removeNulls(['limit' => $limit, 'offset' => $offset]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listRequests($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Request a payout withdrawal, if the frequency is set to manual. Refer to our `/payouts/balances` endpoint to retrieve the minimum and maximum withdrawal amounts.
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
    ): UnionMember0|UnionMember1 {
        $params = Util::removeNulls(['amount' => $amount]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->requestManualWithdrawal($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the current available and pending balances for the account.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveBalances(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): PayoutGetBalancesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveBalances($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get total and monthly time-series earning statistics for the account.
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
    ): PayoutGetEarningStatisticsResponse {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveEarningStatistics($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the eligibility details for receiving payouts.
     *
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveEligibility(
        string $account,
        RequestOptions|array|null $requestOptions = null
    ): PayoutGetEligibilityResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveEligibility($account, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the payout frequency for the account (Manual, Weekly or Monthly).
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
    ): PayoutUpdateFrequencyResponse {
        $params = Util::removeNulls(['frequency' => $frequency]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateFrequency($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
