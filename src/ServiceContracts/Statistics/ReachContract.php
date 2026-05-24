<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Statistics;

use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsParams\Filter;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsParams\Type;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface ReachContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param string $endDate the end date for the period
     * @param string $startDate The start date for the period
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
    ): UnionMember0|UnionMember1|UnionMember2;
}
