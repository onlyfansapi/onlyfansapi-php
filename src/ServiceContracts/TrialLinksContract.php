<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts;

use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\TrialLinks\TrialLinkCreateParams\Duration;
use OnlyFansAPI\TrialLinks\TrialLinkCreateParams\OfferLimit;
use OnlyFansAPI\TrialLinks\TrialLinkDeleteResponse;
use OnlyFansAPI\TrialLinks\TrialLinkGetResponse;
use OnlyFansAPI\TrialLinks\TrialLinkGetStatsResponse;
use OnlyFansAPI\TrialLinks\TrialLinkListParams\Field;
use OnlyFansAPI\TrialLinks\TrialLinkListParams\Sort;
use OnlyFansAPI\TrialLinks\TrialLinkListResponse;
use OnlyFansAPI\TrialLinks\TrialLinkListSpendersResponse;
use OnlyFansAPI\TrialLinks\TrialLinkListSubscribersResponse;
use OnlyFansAPI\TrialLinks\TrialLinkNewResponse;
use OnlyFansAPI\TrialLinks\TrialLinkRetrieveCohortArpsParams\RevenueBasis;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface TrialLinksContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param Duration|value-of<Duration> $duration The duration of the free trial **in days**. Must be **1**, **3**, **7**, **14**, **30** (1 month), **90** (3 months), **180** (6 months), or **360** (12 months).
     * @param int $offerExpiration The trial link expiration **in days (from now)**. Must either be **0** (to never expire), or a number between **1** and **30**.
     * @param OfferLimit|value-of<OfferLimit> $offerLimit How many people can use this offer. Must either be **0** (for no limit), or a number between **1**-**10**, **50**, or **100**.
     * @param string|null $name The name of the trail link (optional). Cannot be longer than 64 characters.
     * @param list<string> $tags array of tag names to add to the trial link
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $account,
        Duration|int $duration,
        int $offerExpiration,
        OfferLimit|int $offerLimit,
        ?string $name = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrialLinkNewResponse;

    /**
     * @api
     *
     * @param string $trialLinkID the ID of the trial link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $trialLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TrialLinkGetResponse;

    /**
     * @api
     *
     * @param string $account The Account ID
     * @param int $limit The number of trial links to return. Default `10`
     * @param int $offset The offset used for pagination. Default `0`
     * @param Field|value-of<Field>|null $field Sort the results by a field. Default `create_date`
     * @param Sort|value-of<Sort>|null $sort Sort the results. Default `desc`
     * @param bool|null $synchronous Wait for the revenue data to finish processing, instead of processing in the background. **Will result in longer response times, use with caution**. Default `false`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        int $limit,
        int $offset,
        Field|string|null $field = null,
        Sort|string|null $sort = null,
        ?bool $synchronous = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrialLinkListResponse;

    /**
     * @api
     *
     * @param string $trialLinkID the ID of the trial link
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $trialLinkID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): TrialLinkDeleteResponse;

    /**
     * @api
     *
     * @param string $trialLinkID Path param: The ID of the free trial link to get spenders for
     * @param string $account Path param: The Account ID
     * @param int $limit Query param: The number of spenders to return per page. Default `50`.
     * @param float $minSpend Query param: Minimal spend of a fan. Default `1`. Must be at least 1.
     * @param int $offset Query param: The offset used for pagination. Default `0`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSpenders(
        string $trialLinkID,
        string $account,
        ?int $limit = null,
        ?float $minSpend = null,
        ?int $offset = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrialLinkListSpendersResponse;

    /**
     * @api
     *
     * @param string $trialLinkID path param: The ID of the trial link
     * @param string $account Path param: The Account ID
     * @param int $limit Query param: The number of subscribers to return per page. Default `10`
     * @param int $offset Query param: The offset used for pagination. Default `0`
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listSubscribers(
        string $trialLinkID,
        string $account,
        int $limit,
        int $offset,
        RequestOptions|array|null $requestOptions = null,
    ): TrialLinkListSubscribersResponse;

    /**
     * @api
     *
     * @param string $trialLinkID path param: The ID of the trial link
     * @param string $account Path param: The Account ID
     * @param string $acquisitionEnd Query param: Optional acquisition range end date
     * @param string $acquisitionStart Query param: Optional acquisition range start date
     * @param RevenueBasis|value-of<RevenueBasis> $revenueBasis Query param: Revenue basis. Defaults to `net`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveCohortArps(
        string $trialLinkID,
        string $account,
        ?string $acquisitionEnd = null,
        ?string $acquisitionStart = null,
        RevenueBasis|string|null $revenueBasis = null,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $trialLinkID path param: The ID of the trial link
     * @param string $account Path param: The Account ID
     * @param string $dateEnd Query param: Optional stats range end date
     * @param string $dateStart Query param: Optional stats range start date
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStats(
        string $trialLinkID,
        string $account,
        ?string $dateEnd = null,
        ?string $dateStart = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrialLinkGetStatsResponse;
}
