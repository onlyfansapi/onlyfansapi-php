<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\TrialLinks\TrialLinkCreateParams\Duration;
use Onlyfansapi\TrialLinks\TrialLinkCreateParams\OfferLimit;
use Onlyfansapi\TrialLinks\TrialLinkDeleteResponse;
use Onlyfansapi\TrialLinks\TrialLinkListParams\Field;
use Onlyfansapi\TrialLinks\TrialLinkListParams\Sort;
use Onlyfansapi\TrialLinks\TrialLinkListResponse;
use Onlyfansapi\TrialLinks\TrialLinkListSpendersResponse;
use Onlyfansapi\TrialLinks\TrialLinkListSubscribersResponse;
use Onlyfansapi\TrialLinks\TrialLinkNewResponse;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
}
