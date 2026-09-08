<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\TrialLinksContract;
use OnlyFansAPI\Services\TrialLinks\TagsService;
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
 * APIs for managing Free Trial Links.
 *
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class TrialLinksService implements TrialLinksContract
{
    /**
     * @api
     */
    public TrialLinksRawService $raw;

    /**
     * @api
     */
    public TagsService $tags;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TrialLinksRawService($client);
        $this->tags = new TagsService($client);
    }

    /**
     * @api
     *
     * Create a new free trial link for the account
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
    ): TrialLinkNewResponse {
        $params = Util::removeNulls(
            [
                'duration' => $duration,
                'offerExpiration' => $offerExpiration,
                'offerLimit' => $offerLimit,
                'name' => $name,
                'tags' => $tags,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get individual Free Trial Link details and it's revenue data
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
    ): TrialLinkGetResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all free trial links for the account, including the details and statistics
     *
     * @param string $account The Account ID
     * @param string|null $endDate The end date for trial links. Keep empty to get all. Must not be greater than 255 characters.
     * @param Field|value-of<Field> $field Field to sort by. Default `create_date`.
     * @param int $limit The number of trial links to return. Default `10`. Must be at least 1. Must not be greater than 100.
     * @param int $offset The offset used for pagination. Default `0`. Must be at least 0.
     * @param Sort|value-of<Sort> $sort Sort direction. Default `desc`.
     * @param string|null $startDate The start date for trial links. Keep empty to get all. Must not be greater than 255 characters.
     * @param bool $synchronous wait for revenue calculation instead of processing it in the background
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $account,
        ?string $endDate = null,
        Field|string|null $field = null,
        ?int $limit = null,
        ?int $offset = null,
        Sort|string|null $sort = null,
        ?string $startDate = null,
        ?bool $synchronous = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrialLinkListResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'field' => $field,
                'limit' => $limit,
                'offset' => $offset,
                'sort' => $sort,
                'startDate' => $startDate,
                'synchronous' => $synchronous,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a free trial link by its ID
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
    ): TrialLinkDeleteResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Only available if we already scraped subscribers and calculated revenue per fan
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
    ): TrialLinkListSpendersResponse {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'limit' => $limit,
                'minSpend' => $minSpend,
                'offset' => $offset,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSpenders($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get list of subscribers who joined through a Free Trial Link
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
    ): TrialLinkListSubscribersResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'limit' => $limit, 'offset' => $offset]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listSubscribers($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get per-link time-to-profit cohort ARPS windows for a specific Free Trial Link
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
    ): mixed {
        $params = Util::removeNulls(
            [
                'account' => $account,
                'acquisitionEnd' => $acquisitionEnd,
                'acquisitionStart' => $acquisitionStart,
                'revenueBasis' => $revenueBasis,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveCohortArps($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get dashboard-style summary plus daily and monthly metrics for a specific Free Trial Link
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
    ): TrialLinkGetStatsResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'dateEnd' => $dateEnd, 'dateStart' => $dateStart]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStats($trialLinkID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
