<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\Fans\FanGetSubscriptionHistoryResponse;
use Onlyfansapi\Fans\FanListActiveParams\Filter;
use Onlyfansapi\Fans\FanListActiveParams\Type;
use Onlyfansapi\Fans\FanListActiveResponse;
use Onlyfansapi\Fans\FanListAllResponse;
use Onlyfansapi\Fans\FanListExpiredResponse;
use Onlyfansapi\Fans\FanListLatestResponse;
use Onlyfansapi\Fans\FanListTopParams\By;
use Onlyfansapi\Fans\FanListTopResponse;
use Onlyfansapi\Fans\FanSetCustomNameResponse;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\FansContract;
use Onlyfansapi\Services\Fans\NotesService;
use Onlyfansapi\Services\Fans\SummaryService;

/**
 * APIs for managing OnlyFans fans (subscribers).
 *
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListActiveParams\Filter
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListAllParams\Filter as FilterShape1
 * @phpstan-import-type FilterShape from \Onlyfansapi\Fans\FanListExpiredParams\Filter as FilterShape2
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
     * Get a paginated list of fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param Filter|FilterShape $filter
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 20.
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
     * Get a paginated list of fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param \Onlyfansapi\Fans\FanListAllParams\Filter|FilterShape1 $filter
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 20.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $query search within fan name/username
     * @param \Onlyfansapi\Fans\FanListAllParams\Type|value-of<\Onlyfansapi\Fans\FanListAllParams\Type> $type filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAll(
        string $account,
        \Onlyfansapi\Fans\FanListAllParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        \Onlyfansapi\Fans\FanListAllParams\Type|string|null $type = null,
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
     * Get a paginated list of expired fans for an Account. Newest fans are first.
     *
     * @param string $account The Account ID
     * @param \Onlyfansapi\Fans\FanListExpiredParams\Filter|FilterShape2 $filter
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 20.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $query search within fan name/username
     * @param \Onlyfansapi\Fans\FanListExpiredParams\Type|value-of<\Onlyfansapi\Fans\FanListExpiredParams\Type> $type filter by fan type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listExpired(
        string $account,
        \Onlyfansapi\Fans\FanListExpiredParams\Filter|array|null $filter = null,
        ?int $limit = null,
        ?int $offset = null,
        ?string $query = null,
        \Onlyfansapi\Fans\FanListExpiredParams\Type|string|null $type = null,
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
     * @param string|null $endDate End date for filtering (required with start_date). This field is required when <code>start_date</code> is present.
     * @param int $limit Number of fans to return (1-50). Must be at least 1. Must not be greater than 100.
     * @param int $offset Number of fans to skip. Must be at least 0.
     * @param string|null $startDate Start date for filtering (required with end_date). This field is required when <code>end_date</code> is present.
     * @param \Onlyfansapi\Fans\FanListLatestParams\Type|value-of<\Onlyfansapi\Fans\FanListLatestParams\Type>|null $type filter by type: total, renew, or new
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
        \Onlyfansapi\Fans\FanListLatestParams\Type|string|null $type = null,
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
     * @param string|null $endDate End date for filtering (required with start_date). This field is required when <code>start_date</code> is present.
     * @param string|null $startDate Start date for filtering (required with end_date). This field is required when <code>end_date</code> is present.
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
