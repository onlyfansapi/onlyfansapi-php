<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\Fans\FanGetSubscriptionHistoryResponse;
use OnlyFansAPI\Fans\FanListActiveParams\Filter;
use OnlyFansAPI\Fans\FanListActiveParams\Type;
use OnlyFansAPI\Fans\FanListActiveResponse;
use OnlyFansAPI\Fans\FanListAllResponse;
use OnlyFansAPI\Fans\FanListExpiredResponse;
use OnlyFansAPI\Fans\FanListLatestResponse;
use OnlyFansAPI\Fans\FanListTopParams\By;
use OnlyFansAPI\Fans\FanListTopResponse;
use OnlyFansAPI\Fans\FanSetCustomNameResponse;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\FansContract;
use OnlyFansAPI\Services\Fans\NotesService;
use OnlyFansAPI\Services\Fans\SummaryService;

/**
 * APIs for managing OnlyFans fans (subscribers).
 *
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Fans\FanListActiveParams\Filter
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Fans\FanListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \OnlyFansAPI\Fans\FanListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class FansService implements FansContract
{
    /**
     * @api
     */
    public FansRawService $raw;

    /**
     * @api
     */
    public NotesService $notes;

    /**
     * @api
     */
    public SummaryService $summary;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FansRawService($client);
        $this->notes = new NotesService($client);
        $this->summary = new SummaryService($client);
    }

    /**
     * @api
     *
     * Get Subscription History for a given OnlyFans User ID. This can be useful, for example, when the user's subscribed to your account for the first time.
     *
     * @param string $userID the OnlyFans ID of the User
     * @param string $account The Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSubscriptionHistory(
        string $userID,
        string $account,
        RequestOptions|array|null $requestOptions = null,
    ): FanGetSubscriptionHistoryResponse {
        $params = Util::removeNulls(['account' => $account]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSubscriptionHistory($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of fans for an Account. Newest fans are first. Paginate by following `_pagination.next_page` until it is null (`data.hasMore` is the authoritative flag). Do NOT use the page's item count to detect the last page — OnlyFans occasionally returns fewer than `limit` items (e.g. 19 for limit=20) on a non-final page because it filters entries server-side; no fans are skipped. To track progress, GET `/{account}/me` returns data.subscribersCount (the current active-subscriber count) as a total.
     *
     * @param string $account The Account ID
     * @param Filter|FilterShape $filter
     * @param int $limit Number of fans to return (1-20). OnlyFans does not allow more than 20 per page. Must be at least 1. Must not be greater than 20.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $query search within fan name/username
     * @param Type|value-of<Type> $type filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listActive(
        string $account,
        Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListActiveResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'query' => $query,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listActive($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of fans for an Account. Newest fans are first. Paginate by following `_pagination.next_page` until it is null (`data.hasMore` is the authoritative flag). Do NOT use the page's item count to detect the last page — OnlyFans occasionally returns fewer than `limit` items (e.g. 19 for limit=20) on a non-final page because it filters entries server-side; no fans are skipped.
     *
     * @param string $account The Account ID
     * @param \OnlyFansAPI\Fans\FanListAllParams\Filter|FilterShape1 $filter
     * @param int $limit Number of fans to return (1-20). OnlyFans does not allow more than 20 per page. Must be at least 1. Must not be greater than 20.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $query search within fan name/username
     * @param \OnlyFansAPI\Fans\FanListAllParams\Type|value-of<\OnlyFansAPI\Fans\FanListAllParams\Type> $type filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        \OnlyFansAPI\Fans\FanListAllParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        \OnlyFansAPI\Fans\FanListAllParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListAllResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'query' => $query,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listAll($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list of expired fans for an Account. Newest fans are first. Paginate by following `_pagination.next_page` until it is null (`data.hasMore` is the authoritative flag). Do NOT use the page's item count to detect the last page — OnlyFans occasionally returns fewer than `limit` items (e.g. 19 for limit=20) on a non-final page because it filters entries server-side; no fans are skipped.
     *
     * @param string $account The Account ID
     * @param \OnlyFansAPI\Fans\FanListExpiredParams\Filter|FilterShape2 $filter
     * @param int $limit Number of fans to return (1-20). OnlyFans does not allow more than 20 per page. Must be at least 1. Must not be greater than 20.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $query search within fan name/username
     * @param \OnlyFansAPI\Fans\FanListExpiredParams\Type|value-of<\OnlyFansAPI\Fans\FanListExpiredParams\Type> $type filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        \OnlyFansAPI\Fans\FanListExpiredParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        \OnlyFansAPI\Fans\FanListExpiredParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListExpiredResponse {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'limit' => $limit,
                'offset' => $offset,
                'query' => $query,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listExpired($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a paginated list fans, filterable by total, only new subscribers, or only renewals. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param string|null $endDate End date for filtering (required with start_date). Must be a valid date. Must not be greater than 255 characters.
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 50.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $startDate Start date for filtering (required with end_date). Must be a valid date. Must not be greater than 255 characters.
     * @param \OnlyFansAPI\Fans\FanListLatestParams\Type|value-of<\OnlyFansAPI\Fans\FanListLatestParams\Type>|null $type filter by type: total, renew, or new
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listLatest(
        string $account,
        ?string $endDate = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $startDate = null,
        \OnlyFansAPI\Fans\FanListLatestParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListLatestResponse {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'limit' => $limit,
                'offset' => $offset,
                'startDate' => $startDate,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listLatest($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of top fans sorted by spending. Filterable by total, subscriptions, tips, messages, posts, or streams.
     *
     * @param string $account The Account ID
     * @param By|value-of<By>|null $by sort by: total (default), subscribes, tips, messages, post, streams
     * @param string|null $endDate End date for filtering (required with start_date). Must be a valid date. Must not be greater than 255 characters.
     * @param string|null $startDate Start date for filtering (required with end_date). Must be a valid date. Must not be greater than 255 characters.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTop(
        string $account,
        By|string|null $by = null,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): FanListTopResponse {
        $params = Util::removeNulls(
            ['by' => $by, 'endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTop($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Change the Fan's Custom Name shown in OnlyFans
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param string $account Path param: The Account ID
     * @param string $customName Body param: New Custom Name for a Fan. Send empty string (`""`) or `null` to clear out the custom name.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function setCustomName(
        string $fanID,
        string $account,
        string $customName,
        RequestOptions|array|null $requestOptions = null,
    ): FanSetCustomNameResponse {
        $params = Util::removeNulls(
            ['account' => $account, 'customName' => $customName]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->setCustomName($fanID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
