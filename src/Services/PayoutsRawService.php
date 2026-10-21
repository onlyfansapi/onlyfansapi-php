<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Payouts\PayoutGetBalancesResponse;
use OnlyFansAPI\Payouts\PayoutGetEarningStatisticsResponse;
use OnlyFansAPI\Payouts\PayoutGetEligibilityResponse;
use OnlyFansAPI\Payouts\PayoutListRequestsParams;
use OnlyFansAPI\Payouts\PayoutListRequestsResponse;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalParams;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;
use OnlyFansAPI\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1;
use OnlyFansAPI\Payouts\PayoutRetrieveEarningStatisticsParams;
use OnlyFansAPI\Payouts\PayoutUpdateFrequencyParams;
use OnlyFansAPI\Payouts\PayoutUpdateFrequencyParams\Frequency;
use OnlyFansAPI\Payouts\PayoutUpdateFrequencyResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\PayoutsRawContract;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class PayoutsRawService implements PayoutsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all payout requests for the account.
     *
     * @param string $account The Account ID
     * @param array{limit?: string, offset?: string}|PayoutListRequestsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PayoutListRequestsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/payouts/payout-requests', $account],
            query: $parsed,
            options: $options,
            convert: PayoutListRequestsResponse::class,
        );
    }

    /**
     * @api
     *
     * Request a payout withdrawal, if the frequency is set to manual. Refer to our `/payouts/balances` endpoint to retrieve the minimum and maximum withdrawal amounts.
     *
     * @param string $account The Account ID
     * @param array{amount: int}|PayoutRequestManualWithdrawalParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PayoutRequestManualWithdrawalParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/payouts/request-manual-withdrawal', $account],
            body: (object) $parsed,
            options: $options,
            convert: PayoutRequestManualWithdrawalResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the current available and pending balances for the account.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/payouts/balances', $account],
            options: $requestOptions,
            convert: PayoutGetBalancesResponse::class,
        );
    }

    /**
     * @api
     *
     * Get total and monthly time-series earning statistics for the account.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string|null, startDate?: string|null
     * }|PayoutRetrieveEarningStatisticsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PayoutRetrieveEarningStatisticsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/payouts/earning-statistics', $account],
            query: $parsed,
            options: $options,
            convert: PayoutGetEarningStatisticsResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the eligibility details for receiving payouts.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/payouts/eligibility', $account],
            options: $requestOptions,
            convert: PayoutGetEligibilityResponse::class,
        );
    }

    /**
     * @api
     *
     * Update the payout frequency for the account (Manual, Weekly or Monthly).
     *
     * @param string $account The Account ID
     * @param array{
     *   frequency: Frequency|value-of<Frequency>
     * }|PayoutUpdateFrequencyParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PayoutUpdateFrequencyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['api/%1$s/payouts/payout-frequency', $account],
            body: (object) $parsed,
            options: $options,
            convert: PayoutUpdateFrequencyResponse::class,
        );
    }
}
