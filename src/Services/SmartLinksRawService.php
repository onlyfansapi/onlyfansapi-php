<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\SmartLinksRawContract;
use Onlyfansapi\SmartLinks\SmartLinkCreateParams;
use Onlyfansapi\SmartLinks\SmartLinkCreateParams\LinkType;
use Onlyfansapi\SmartLinks\SmartLinkDeleteResponse;
use Onlyfansapi\SmartLinks\SmartLinkGetResponse;
use Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse;
use Onlyfansapi\SmartLinks\SmartLinkListClicksParams;
use Onlyfansapi\SmartLinks\SmartLinkListClicksResponse;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsParams;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsParams\ConversionType;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse;
use Onlyfansapi\SmartLinks\SmartLinkListFansParams;
use Onlyfansapi\SmartLinks\SmartLinkListFansParams\Sort;
use Onlyfansapi\SmartLinks\SmartLinkListFansResponse;
use Onlyfansapi\SmartLinks\SmartLinkListParams;
use Onlyfansapi\SmartLinks\SmartLinkListResponse;
use Onlyfansapi\SmartLinks\SmartLinkListSpendersParams;
use Onlyfansapi\SmartLinks\SmartLinkListSpendersResponse;
use Onlyfansapi\SmartLinks\SmartLinkNewResponse;
use Onlyfansapi\SmartLinks\SmartLinkRetrieveCohortArpsParams;
use Onlyfansapi\SmartLinks\SmartLinkRetrieveCohortArpsParams\RevenueBasis;
use Onlyfansapi\SmartLinks\SmartLinkRetrieveStatsParams;

/**
 * APIs for managing Smart Links (Free Trial Links and Tracking Links with pooled inventory).
 *
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class SmartLinksRawService implements SmartLinksRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new Smart Link for the account. Smart Links are pooled Free Trial or Tracking links that rotate inventory automatically.
     *
     * @param array{
     *   accountID: string,
     *   linkType: LinkType|value-of<LinkType>,
     *   name: string,
     *   freeTrialDays?: int,
     * }|SmartLinkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SmartLinkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SmartLinkCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'api/smart-links',
            body: (object) $parsed,
            options: $options,
            convert: SmartLinkNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a specific Smart Link by its ID
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/smart-links/%1$s', $smartLinkID],
            options: $requestOptions,
            convert: SmartLinkGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all Smart Links
     *
     * @param array{
     *   accountIDs?: string,
     *   limit?: int,
     *   metaPixelIDs?: string,
     *   name?: string,
     *   offset?: int,
     * }|SmartLinkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SmartLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|SmartLinkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SmartLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'api/smart-links',
            query: Util::array_transform_keys(
                $parsed,
                ['accountIDs' => 'account_ids', 'metaPixelIDs' => 'meta_pixel_ids'],
            ),
            options: $options,
            convert: SmartLinkListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Smart Link by its ID
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['api/smart-links/%1$s', $smartLinkID],
            options: $requestOptions,
            convert: SmartLinkDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Query smart link clicks in a date range with optional bot/duplicate filtering
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array{
     *   dateEnd?: string,
     *   dateStart?: string,
     *   includeBots?: bool,
     *   includeDuplicates?: bool,
     *   limit?: int,
     *   offset?: int,
     * }|SmartLinkListClicksParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SmartLinkListClicksParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/smart-links/%1$s/clicks', $smartLinkID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'dateEnd' => 'date_end',
                    'dateStart' => 'date_start',
                    'includeBots' => 'include_bots',
                    'includeDuplicates' => 'include_duplicates',
                ],
            ),
            options: $options,
            convert: SmartLinkListClicksResponse::class,
        );
    }

    /**
     * @api
     *
     * Query smart link conversions in a date range with optional bot/duplicate and conversion type filtering
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array{
     *   conversionType?: ConversionType|value-of<ConversionType>,
     *   dateEnd?: string,
     *   dateStart?: string,
     *   includeBots?: bool,
     *   includeDuplicates?: bool,
     *   limit?: int,
     *   offset?: int,
     *   onlyfansUserID?: string,
     * }|SmartLinkListConversionsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SmartLinkListConversionsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/smart-links/%1$s/conversions', $smartLinkID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'conversionType' => 'conversion_type',
                    'dateEnd' => 'date_end',
                    'dateStart' => 'date_start',
                    'includeBots' => 'include_bots',
                    'includeDuplicates' => 'include_duplicates',
                    'onlyfansUserID' => 'onlyfans_user_id',
                ],
            ),
            options: $options,
            convert: SmartLinkListConversionsResponse::class,
        );
    }

    /**
     * @api
     *
     * Query attributed Smart Link fans with aggregate fan metrics and subscriber attribution metadata
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array{
     *   hasMessages?: bool,
     *   limit?: int,
     *   minMessagesSentByFan?: int,
     *   minRevenueNet?: float,
     *   minTipsNet?: float,
     *   offset?: int,
     *   sort?: value-of<Sort>,
     * }|SmartLinkListFansParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SmartLinkListFansParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/smart-links/%1$s/fans', $smartLinkID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'hasMessages' => 'has_messages',
                    'minMessagesSentByFan' => 'min_messages_sent_by_fan',
                    'minRevenueNet' => 'min_revenue_net',
                    'minTipsNet' => 'min_tips_net',
                ],
            ),
            options: $options,
            convert: SmartLinkListFansResponse::class,
        );
    }

    /**
     * @api
     *
     * Compatibility endpoint returning fans with attributed spend through a Smart Link
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array{
     *   limit?: int, minSpend?: float, offset?: int
     * }|SmartLinkListSpendersParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SmartLinkListSpendersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/smart-links/%1$s/spenders', $smartLinkID],
            query: $parsed,
            options: $options,
            convert: SmartLinkListSpendersResponse::class,
        );
    }

    /**
     * @api
     *
     * Get per-link time-to-profit cohort ARPS windows for a specific Smart Link
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array{
     *   acquisitionEnd?: string,
     *   acquisitionStart?: string,
     *   revenueBasis?: RevenueBasis|value-of<RevenueBasis>,
     * }|SmartLinkRetrieveCohortArpsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SmartLinkRetrieveCohortArpsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/smart-links/%1$s/cohort-arps', $smartLinkID],
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
     * Get dashboard-style summary plus daily and monthly metrics for a specific Smart Link on the current team
     *
     * @param string $smartLinkID the ID of the smart link
     * @param array{
     *   dateEnd?: string, dateStart?: string
     * }|SmartLinkRetrieveStatsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = SmartLinkRetrieveStatsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/smart-links/%1$s/stats', $smartLinkID],
            query: Util::array_transform_keys(
                $parsed,
                ['dateEnd' => 'date_end', 'dateStart' => 'date_start']
            ),
            options: $options,
            convert: SmartLinkGetStatsResponse::class,
        );
    }
}
