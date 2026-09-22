<?php

declare(strict_types=1);

namespace OnlyFansAPI\Services\Statistics;

use OnlyFansAPI\Client;
use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Core\Util;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\ServiceContracts\Statistics\ReachRawContract;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams\Filter;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams\Type;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
final class ReachRawService implements ReachRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get the number of profile visitors for a given period.
     *
     * @param string $account The Account ID
     * @param array{
     *   endDate: string,
     *   startDate: string,
     *   filter?: Filter|value-of<Filter>|null,
     *   limit?: int|null,
     *   type?: Type|value-of<Type>|null,
     * }|ReachGetProfileVisitorsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UnionMember0|UnionMember1|UnionMember2>
     *
     * @throws APIException
     */
    public function getProfileVisitors(
        string $account,
        array|ReachGetProfileVisitorsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReachGetProfileVisitorsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['api/%1$s/statistics/reach/profile-visitors', $account],
            query: Util::array_transform_keys(
                $parsed,
                ['endDate' => 'end_date', 'startDate' => 'start_date']
            ),
            options: $options,
            convert: ReachGetProfileVisitorsResponse::class,
        );
    }
}
