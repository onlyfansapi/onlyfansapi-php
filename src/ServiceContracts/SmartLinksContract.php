<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\SmartLinks\SmartLinkCreateParams\LinkType;
use Onlyfansapi\SmartLinks\SmartLinkDeleteResponse;
use Onlyfansapi\SmartLinks\SmartLinkGetResponse;
use Onlyfansapi\SmartLinks\SmartLinkGetStatsResponse;
use Onlyfansapi\SmartLinks\SmartLinkListClicksResponse;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsParams\ConversionType;
use Onlyfansapi\SmartLinks\SmartLinkListConversionsResponse;
use Onlyfansapi\SmartLinks\SmartLinkListFansParams\Sort;
use Onlyfansapi\SmartLinks\SmartLinkListFansResponse;
use Onlyfansapi\SmartLinks\SmartLinkListResponse;
use Onlyfansapi\SmartLinks\SmartLinkListSpendersResponse;
use Onlyfansapi\SmartLinks\SmartLinkNewResponse;
use Onlyfansapi\SmartLinks\SmartLinkRetrieveCohortArpsParams\RevenueBasis;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface SmartLinksContract
{
    /**
     * @api
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
    ): SmartLinkNewResponse;

    /**
     * @api
     *
     * @param string $smartLinkID The ID of the Smart Link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $smartLinkID,
        RequestOptions|array|null $requestOptions = null
    ): SmartLinkGetResponse;

    /**
     * @api
     *
     * @param string $accountIDs comma-separated account prefixed IDs to include
     * @param int $limit The number of Smart Links to return. Default `50`
     * @param string $metaPixelIDs comma-separated Meta Pixel IDs to include
     * @param string $name filter Smart Links by name
     * @param int $offset The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $accountIDs = null,
        ?int $limit = null,
        ?string $metaPixelIDs = null,
        ?string $name = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkListResponse;

    /**
     * @api
     *
     * @param string $smartLinkID The ID of the Smart Link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $smartLinkID,
        RequestOptions|array|null $requestOptions = null
    ): SmartLinkDeleteResponse;

    /**
     * @api
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
    ): SmartLinkListClicksResponse;

    /**
     * @api
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
    ): SmartLinkListConversionsResponse;

    /**
     * @api
     *
     * @param string $smartLinkID the ID of the smart link
     * @param bool $hasMessages Optional - Filter to fans with or without fan-sent messages
     * @param int $limit Rows per page. Default `100`
     * @param int $minMessagesSentByFan Optional minimum number of messages sent by fan
     * @param float $minRevenueNet Optional minimum net revenue
     * @param float $minTipsNet Optional minimum net tips
     * @param int $offset Offset for pagination. Default `0`
     * @param Sort|value-of<Sort> $sort Optional sort field. Default `-revenue_net`
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
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): SmartLinkListFansResponse;

    /**
     * @api
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
    ): SmartLinkListSpendersResponse;

    /**
     * @api
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
    ): mixed;

    /**
     * @api
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
    ): SmartLinkGetStatsResponse;
}
