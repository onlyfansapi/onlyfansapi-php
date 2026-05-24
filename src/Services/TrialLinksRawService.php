<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\TrialLinksRawContract;
use Onlyfansapi\TrialLinks\TrialLinkCreateParams;
use Onlyfansapi\TrialLinks\TrialLinkCreateParams\Duration;
use Onlyfansapi\TrialLinks\TrialLinkCreateParams\OfferLimit;
use Onlyfansapi\TrialLinks\TrialLinkDeleteParams;
use Onlyfansapi\TrialLinks\TrialLinkDeleteResponse;
use Onlyfansapi\TrialLinks\TrialLinkGetResponse;
use Onlyfansapi\TrialLinks\TrialLinkGetStatsResponse;
use Onlyfansapi\TrialLinks\TrialLinkListParams;
use Onlyfansapi\TrialLinks\TrialLinkListParams\Field;
use Onlyfansapi\TrialLinks\TrialLinkListParams\Sort;
use Onlyfansapi\TrialLinks\TrialLinkListResponse;
use Onlyfansapi\TrialLinks\TrialLinkListSpendersParams;
use Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse;
use Onlyfansapi\TrialLinks\TrialLinkListSubscribersParams;
use Onlyfansapi\TrialLinks\TrialLinkListSubscribersResponse;
use Onlyfansapi\TrialLinks\TrialLinkNewResponse;
use Onlyfansapi\TrialLinks\TrialLinkRetrieveCohortArpsParams;
use Onlyfansapi\TrialLinks\TrialLinkRetrieveCohortArpsParams\RevenueBasis;
use Onlyfansapi\TrialLinks\TrialLinkRetrieveParams;
use Onlyfansapi\TrialLinks\TrialLinkRetrieveStatsParams;

/**
 * APIs for managing Free Trial Links.
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class TrialLinksRawService implements TrialLinksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new free trial link for the account
     *
     * @param string $account The Account ID
     * @param array{
     *   duration: Duration|value-of<Duration>,
     *   offerExpiration: int,
     *   offerLimit: OfferLimit|value-of<OfferLimit>,
     *   name?: string|null,
     *   tags?: list<string>,
     * }|TrialLinkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $account,
        array|TrialLinkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrialLinkCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['api/%1$s/trial-links', $account],
            body: (object) $parsed,
            options: $options,
            convert: TrialLinkNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get individual Free Trial Link details and it's revenue data
     *
     * @param string $trialLinkID the ID of the trial link
     * @param array{account: string}|TrialLinkRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $trialLinkID,
        array|TrialLinkRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrialLinkRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/trial-links/%2$s', $account, $trialLinkID],
            options: $options,
            convert: TrialLinkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all free trial links for the account, including the details and statistics
     *
     * @param string $account The Account ID
     * @param array{
     *   limit: int,
     *   offset: int,
     *   field?: Field|value-of<Field>|null,
     *   sort?: Sort|value-of<Sort>|null,
     *   synchronous?: bool|null,
     * }|TrialLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $account,
        array|TrialLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrialLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/trial-links', $account],
            query: $parsed,
            options: $options,
            convert: TrialLinkListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a free trial link by its ID
     *
     * @param string $trialLinkID the ID of the trial link
     * @param array{account: string}|TrialLinkDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $trialLinkID,
        array|TrialLinkDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrialLinkDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/%1$s/trial-links/%2$s', $account, $trialLinkID],
            options: $options,
            convert: TrialLinkDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Only available if we already scraped subscribers and calculated revenue per fan
     *
     * @param string $trialLinkID Path param: The ID of the free trial link to get spenders for
     * @param array{
     *   account: string, limit?: int, minSpend?: float, offset?: int
     * }|TrialLinkListSpendersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkListSpendersResponse>
     *
     * @throws APIException
     */
    public function listSpenders(
        string $trialLinkID,
        array|TrialLinkListSpendersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrialLinkListSpendersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/trial-links/%2$s/spenders', $account, $trialLinkID],
            query: $parsed,
            options: $options,
            convert: TrialLinkListSpendersResponse::class,
        );
    }

    /**
     * @api
     *
     * Get list of subscribers who joined through a Free Trial Link
     *
     * @param string $trialLinkID path param: The ID of the trial link
     * @param array{
     *   account: string, limit: int, offset: int
     * }|TrialLinkListSubscribersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkListSubscribersResponse>
     *
     * @throws APIException
     */
    public function listSubscribers(
        string $trialLinkID,
        array|TrialLinkListSubscribersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrialLinkListSubscribersParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/trial-links/%2$s/subscribers', $account, $trialLinkID],
            query: $parsed,
            options: $options,
            convert: TrialLinkListSubscribersResponse::class,
        );
    }

    /**
     * @api
     *
     * Get per-link time-to-profit cohort ARPS windows for a specific Free Trial Link
     *
     * @param string $trialLinkID path param: The ID of the trial link
     * @param array{
     *   account: string,
     *   acquisitionEnd?: string,
     *   acquisitionStart?: string,
     *   revenueBasis?: RevenueBasis|value-of<RevenueBasis>,
     * }|TrialLinkRetrieveCohortArpsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function retrieveCohortArps(
        string $trialLinkID,
        array|TrialLinkRetrieveCohortArpsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrialLinkRetrieveCohortArpsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/trial-links/%2$s/cohort-arps', $account, $trialLinkID],
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
     * Get dashboard-style summary plus daily and monthly metrics for a specific Free Trial Link
     *
     * @param string $trialLinkID path param: The ID of the trial link
     * @param array{
     *   account: string, dateEnd?: string, dateStart?: string
     * }|TrialLinkRetrieveStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrialLinkGetStatsResponse>
     *
     * @throws APIException
     */
    public function retrieveStats(
        string $trialLinkID,
        array|TrialLinkRetrieveStatsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrialLinkRetrieveStatsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $account = $parsed['account'];
        unset($parsed['account']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/trial-links/%2$s/stats', $account, $trialLinkID],
            query: Util::array_transform_keys(
                $parsed,
                ['dateEnd' => 'date_end', 'dateStart' => 'date_start']
            ),
            options: $options,
            convert: TrialLinkGetStatsResponse::class,
        );
    }
}
