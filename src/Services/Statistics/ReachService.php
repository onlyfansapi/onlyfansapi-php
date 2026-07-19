<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Statistics;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Statistics\ReachContract;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams\Filter;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams\Type;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ReachService implements ReachContract
{
    /**
     * @api
     */
    public ReachRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReachRawService($client);
    }

    /**
     * @api
     *
     * Get the number of profile visitors for a given period.
     *
     * @param string $account The Account ID
     * @param string $endDate the end date for the period
     * @param string $startDate the start date for the period
     * @param Filter|value-of<Filter>|null $filter Optionally, filter the results by `chart` or `topCountries`. See example responses.
     * @param int|null $limit Number of results to return
     * @param Type|value-of<Type>|null $type Filter all / users / guests
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getProfileVisitors(
        string $account,
        string $endDate,
        string $startDate,
        Filter|string|null $filter = null,
        ?int $limit = null,
        Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): UnionMember0|UnionMember1|UnionMember2 {
        $params = Util::removeNulls(
            [
                'endDate' => $endDate,
                'startDate' => $startDate,
                'filter' => $filter,
                'limit' => $limit,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getProfileVisitors($account, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
