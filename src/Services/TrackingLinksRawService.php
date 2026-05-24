<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\TrackingLinksRawContract;
use Onlyfansapi\TrackingLinks\TrackingLinkCreateParams;
use Onlyfansapi\TrackingLinks\TrackingLinkDeleteParams;
use Onlyfansapi\TrackingLinks\TrackingLinkDeleteResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkGetCohortArpsParams;
use Onlyfansapi\TrackingLinks\TrackingLinkGetCohortArpsParams\RevenueBasis;
use Onlyfansapi\TrackingLinks\TrackingLinkGetResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkGetStatsParams;
use Onlyfansapi\TrackingLinks\TrackingLinkGetStatsResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListParams;
use Onlyfansapi\TrackingLinks\TrackingLinkListParams\Sort;
use Onlyfansapi\TrackingLinks\TrackingLinkListParams\Sortby;
use Onlyfansapi\TrackingLinks\TrackingLinkListResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListSpendersParams;
use Onlyfansapi\TrackingLinks\TrackingLinkListSpendersResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkListSubscribersParams;
use Onlyfansapi\TrackingLinks\TrackingLinkListSubscribersResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkNewResponse;
use Onlyfansapi\TrackingLinks\TrackingLinkRetrieveParams;

/**
 * APIs for managing tracking links.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class TrackingLinksRawService implements TrackingLinksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Tracking Link for the account
     *
     * @param string $account The Account ID
     * @param array{name: string, tags?: list<string>}|TrackingLinkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|TrackingLinkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackingLinkCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/tracking-links', $account],
            body: (object) $parsed,
            options: $options,
            convert: TrackingLinkNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get individual Tracking Link details and it's revenue data
     *
     * @param string $trackingLinkID the ID of the tracking link
     * @param array{account: string}|TrackingLinkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $trackingLinkID,
        array|TrackingLinkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackingLinkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/tracking-links/%2$s', $account, $trackingLinkID],
            options: $options,
            convert: TrackingLinkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all tracking links for the account and revenue data
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate?: string|null,
     *   limit?: int|null,
     *   offset?: int|null,
     *   sort?: Sort|value-of<Sort>|null,
     *   sortby?: Sortby|value-of<Sortby>|null,
     *   startDate?: string|null,
     *   synchronous?: bool|null,
     *   withDeleted?: bool|null,
     * }|TrackingLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|TrackingLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackingLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/tracking-links', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['withDeleted' => 'with_deleted']
            ),
            options: $options,
            convert: TrackingLinkListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Tracking Link
     *
     * @param string $trackingLinkID the ID of the tracking link
     * @param array{account: string}|TrackingLinkDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $trackingLinkID,
        array|TrackingLinkDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackingLinkDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/tracking-links/%2$s', $account, $trackingLinkID],
            options: $options,
            convert: TrackingLinkDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Get per-link time-to-profit cohort ARPS windows for a specific Tracking Link
     *
     * @param string $trackingLinkID path param: The ID of the tracking link
     * @param array{
     *   account: string,
     *   acquisitionEnd?: string,
     *   acquisitionStart?: string,
     *   revenueBasis?: RevenueBasis|value-of<RevenueBasis>,
     * }|TrackingLinkGetCohortArpsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getCohortArps(
        string $trackingLinkID,
        array|TrackingLinkGetCohortArpsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackingLinkGetCohortArpsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'api/%1$s/tracking-links/%2$s/cohort-arps', $account, $trackingLinkID,
            ],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'acquisitionEnd' => 'acquisition_end',
                    'acquisitionStart' => 'acquisition_start',
                    'revenueBasis' => 'revenue_basis',
                ],
            ),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * @param string $trackingLinkID path param: The ID of the tracking link
     * @param array{
     *   account: string, dateEnd?: string, dateStart?: string
     * }|TrackingLinkGetStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkGetStatsResponse>
     *
     * @throws APIException
     */
    public function getStats(
        string $trackingLinkID,
        array|TrackingLinkGetStatsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackingLinkGetStatsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/tracking-links/%2$s/stats', $account, $trackingLinkID],
            query: Util::array_transform_keys(
                $parsed,
                ['dateEnd' => 'date_end', 'dateStart' => 'date_start']
            ),
            options: $options,
            convert: TrackingLinkGetStatsResponse::class,
        );
    }

    /**
     * @api
     *
     * Get list of spenders who made purchases through a Tracking Link
     *
     * @param string $trackingLinkID Path param: The ID of the Tracking Link. Can be retrieved from the above store and list endpoints.
     * @param array{
     *   account: string, limit?: int, minSpend?: float, offset?: int
     * }|TrackingLinkListSpendersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkListSpendersResponse>
     *
     * @throws APIException
     */
    public function listSpenders(
        string $trackingLinkID,
        array|TrackingLinkListSpendersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackingLinkListSpendersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'api/%1$s/tracking-links/%2$s/spenders', $account, $trackingLinkID,
            ],
            query: $parsed,
            options: $options,
            convert: TrackingLinkListSpendersResponse::class,
        );
    }

    /**
     * @api
     *
     * Get list of subscribers who joined through a Tracking Link
     *
     * @param string $trackingLinkID Path param: The ID of the Tracking Link. Can be retrieved from the above store and list endpoints.
     * @param array{
     *   account: string, limit: int, offset: int
     * }|TrackingLinkListSubscribersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrackingLinkListSubscribersResponse>
     *
     * @throws APIException
     */
    public function listSubscribers(
        string $trackingLinkID,
        array|TrackingLinkListSubscribersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrackingLinkListSubscribersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'api/%1$s/tracking-links/%2$s/subscribers', $account, $trackingLinkID,
            ],
            query: $parsed,
            options: $options,
            convert: TrackingLinkListSubscribersResponse::class,
        );
    }
}
