<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\SmartLinksContract;
use OnlyFansAPI\SmartLinks\SmartLinkCreateParams\LinkType;
use OnlyFansAPI\SmartLinks\SmartLinkDeleteResponse;
use OnlyFansAPI\SmartLinks\SmartLinkGetResponse;
use OnlyFansAPI\SmartLinks\SmartLinkGetStatsResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListClicksResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListConversionsParams\ConversionType;
use OnlyFansAPI\SmartLinks\SmartLinkListConversionsResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListFansParams\Sort;
use OnlyFansAPI\SmartLinks\SmartLinkListFansResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListParams\Filter;
use OnlyFansAPI\SmartLinks\SmartLinkListResponse;
use OnlyFansAPI\SmartLinks\SmartLinkListSpendersResponse;
use OnlyFansAPI\SmartLinks\SmartLinkNewResponse;
use OnlyFansAPI\SmartLinks\SmartLinkRetrieveCohortArpsParams\RevenueBasis;

/**
 * APIs for managing Smart Links (Free Trial Links and Tracking Links with pooled inventory).
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\SmartLinks\SmartLinkListParams\Filter
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class SmartLinksService implements SmartLinksContract
{
    /**
     * @api
     */
    public SmartLinksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SmartLinksRawService($client);
    }

    /**
     * @api
     *
     * Create a new Smart Link for the account. Smart Links are pooled Free Trial or Tracking links that rotate inventory automatically.
     *
     * @param string $accountID The prefixed ID of the account to create the Smart Link for
     * @param LinkType|value-of<LinkType> $linkType The type of Smart Link to create
     * @param string $name The name of the Smart Link
     * @param int $freeTrialDays The number of free trial days (required if `link_type` is `free_trial`). Must be between 1 and 360.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $accountID,
        LinkType|string $linkType,
        string $name,
        ?int $freeTrialDays = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkNewResponse {
        $params = Util::removeNulls(
            [
                'accountID' => $accountID,
                'linkType' => $linkType,
                'name' => $name,
                'freeTrialDays' => $freeTrialDays,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific Smart Link by its ID
     *
     * @param string $smartLinkID The ID of the Smart Link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $smartLinkID,
        RequestOptions|array|null $requestOptions = null
    ): SmartLinkGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($smartLinkID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all Smart Links
     *
     * @param string|null $accountIDs comma-separated account prefixed IDs to include
     * @param Filter|FilterShape $filter
     * @param int $limit The number of Smart Links to return. Default `50`. Must be at least 1. Must not be greater than 1000.
     * @param string|null $name Filter Smart Links by name. Must not be greater than 255 characters.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param string|null $pixelIDs comma-separated ad platform Pixel IDs to include
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $accountIDs = null,
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?string $name = null,
        ?int $offset = null,
        ?string $pixelIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkListResponse {
        $params = Util::removeNulls(
            [
                'accountIDs' => $accountIDs,
                'filter' => $filter,
                'limit' => $limit,
                'name' => $name,
                'offset' => $offset,
                'pixelIDs' => $pixelIDs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Smart Link by its ID
     *
     * @param string $smartLinkID The ID of the Smart Link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $smartLinkID,
        RequestOptions|array|null $requestOptions = null
    ): SmartLinkDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($smartLinkID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Query smart link clicks in a date range with optional bot/duplicate filtering
     *
     * @param string $smartLinkID the ID of the smart link
     * @param string $dateEnd Optional report range end date
     * @param string $dateStart Optional report range start date
     * @param bool $includeBots Include clicks marked as bots. Default `true`
     * @param bool $includeDuplicates Include duplicate clicks. Default `true`
     * @param int $limit Rows per page. Default `100`
     * @param int $offset Offset for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listClicks(
        string $smartLinkID,
        ?string $dateEnd = null,
        ?string $dateStart = null,
        ?bool $includeBots = null,
        ?bool $includeDuplicates = null,
        ?int $limit = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkListClicksResponse {
        $params = Util::removeNulls(
            [
                'dateEnd' => $dateEnd,
                'dateStart' => $dateStart,
                'includeBots' => $includeBots,
                'includeDuplicates' => $includeDuplicates,
                'limit' => $limit,
                'offset' => $offset,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listClicks($smartLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Query smart link conversions in a date range with optional bot/duplicate and conversion type filtering
     *
     * @param string $smartLinkID the ID of the smart link
     * @param ConversionType|value-of<ConversionType> $conversionType Optional conversion type filter
     * @param string $dateEnd Optional report range end date
     * @param string $dateStart Optional report range start date
     * @param bool $includeBots Include conversions from clicks marked as bots. Default `true`
     * @param bool $includeDuplicates Include conversions from duplicate clicks. Default `true`
     * @param int $limit Rows per page. Default `100`
     * @param int $offset Offset for pagination. Default `0`
     * @param string $onlyfansUserID Optional - Search for conversions by OnlyFans User ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listConversions(
        string $smartLinkID,
        ConversionType|string|null $conversionType = null,
        ?string $dateEnd = null,
        ?string $dateStart = null,
        ?bool $includeBots = null,
        ?bool $includeDuplicates = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $onlyfansUserID = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkListConversionsResponse {
        $params = Util::removeNulls(
            [
                'conversionType' => $conversionType,
                'dateEnd' => $dateEnd,
                'dateStart' => $dateStart,
                'includeBots' => $includeBots,
                'includeDuplicates' => $includeDuplicates,
                'limit' => $limit,
                'offset' => $offset,
                'onlyfansUserID' => $onlyfansUserID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listConversions($smartLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Query attributed Smart Link fans with aggregate fan metrics and subscriber attribution metadata
     *
     * @param string $smartLinkID the ID of the smart link
     * @param bool $hasMessages Optional - Filter to fans with or without fan-sent messages
     * @param int $limit Rows per page. Default `100`
     * @param int $minMessagesSentByFan Optional minimum number of messages sent by fan
     * @param float $minRevenueNet Optional minimum net revenue
     * @param float $minTipsNet Optional minimum net tips
     * @param int $offset Offset for pagination. Default `0`
     * @param bool $previouslySubscribed Optional - Filter to returning subscribers (fans previously subscribed before this subscription)
     * @param Sort|value-of<Sort> $sort Optional sort field. Default `-revenue_net`
     * @param bool $subscribedUsingPromo Optional - Filter to fans who subscribed via a promotion/offer
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listFans(
        string $smartLinkID,
        ?bool $hasMessages = null,
        ?int $limit = null,
        ?int $minMessagesSentByFan = null,
        ?float $minRevenueNet = null,
        ?float $minTipsNet = null,
        ?int $offset = null,
        ?bool $previouslySubscribed = null,
        Sort|string|null $sort = null,
        ?bool $subscribedUsingPromo = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkListFansResponse {
        $params = Util::removeNulls(
            [
                'hasMessages' => $hasMessages,
                'limit' => $limit,
                'minMessagesSentByFan' => $minMessagesSentByFan,
                'minRevenueNet' => $minRevenueNet,
                'minTipsNet' => $minTipsNet,
                'offset' => $offset,
                'previouslySubscribed' => $previouslySubscribed,
                'sort' => $sort,
                'subscribedUsingPromo' => $subscribedUsingPromo,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listFans($smartLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Compatibility endpoint returning fans with attributed spend through a Smart Link
     *
     * @param string $smartLinkID the ID of the smart link
     * @param int $limit The number of spenders to return per page. Default `50`
     * @param float $minSpend Minimal spend of a fan. Default `1`
     * @param int $offset The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSpenders(
        string $smartLinkID,
        ?int $limit = null,
        ?float $minSpend = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkListSpendersResponse {
        $params = Util::removeNulls(
            ['limit' => $limit, 'minSpend' => $minSpend, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSpenders($smartLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get per-link time-to-profit cohort ARPS windows for a specific Smart Link
     *
     * @param string $smartLinkID the ID of the smart link
     * @param string $acquisitionEnd Optional acquisition range end date
     * @param string $acquisitionStart Optional acquisition range start date
     * @param RevenueBasis|value-of<RevenueBasis> $revenueBasis Revenue basis. Defaults to `net`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveCohortArps(
        string $smartLinkID,
        ?string $acquisitionEnd = null,
        ?string $acquisitionStart = null,
        RevenueBasis|string|null $revenueBasis = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'acquisitionEnd' => $acquisitionEnd,
                'acquisitionStart' => $acquisitionStart,
                'revenueBasis' => $revenueBasis,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveCohortArps($smartLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get dashboard-style summary plus daily and monthly metrics for a specific Smart Link on the current team
     *
     * @param string $smartLinkID the ID of the smart link
     * @param string $dateEnd Optional stats range end date
     * @param string $dateStart Optional stats range start date
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStats(
        string $smartLinkID,
        ?string $dateEnd = null,
        ?string $dateStart = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkGetStatsResponse {
        $params = Util::removeNulls(
            ['dateEnd' => $dateEnd, 'dateStart' => $dateStart]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStats($smartLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
