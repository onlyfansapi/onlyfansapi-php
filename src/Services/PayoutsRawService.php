<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
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
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember0;
use Onlyfansapi\Payouts\PayoutRequestManualWithdrawalResponse\UnionMember1;
use Onlyfansapi\Payouts\PayoutRetrieveEarningStatisticsParams;
use Onlyfansapi\Payouts\PayoutUpdatePayoutFrequencyParams;
use Onlyfansapi\Payouts\PayoutUpdatePayoutFrequencyParams\Frequency;
use Onlyfansapi\Payouts\PayoutUpdatePayoutFrequencyResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\PayoutsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * @param array{
     *   limit?: string, offset?: string
     * }|PayoutListPayoutRequestsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PayoutListPayoutRequestsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/payouts/payout-requests', $account],
            query: $parsed,
            options: $options,
            convert: PayoutListPayoutRequestsResponse::class,
        );
    }

    /**
     * @api
     *
     * List all transactions for the account.
     *
     * @param string $account The Account ID
     * @param array{
     *   limit?: string, marker?: string
     * }|PayoutListTransactionsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PayoutListTransactionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/payouts/transactions', $account],
            query: $parsed,
            options: $options,
            convert: PayoutListTransactionsResponse::class,
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
     * }|PayoutUpdatePayoutFrequencyParams $params
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
    ): BaseResponse {
        [$parsed, $options] = PayoutUpdatePayoutFrequencyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['api/%1$s/payouts/payout-frequency', $account],
            body: (object) $parsed,
            options: $options,
            convert: PayoutUpdatePayoutFrequencyResponse::class,
        );
    }
}
