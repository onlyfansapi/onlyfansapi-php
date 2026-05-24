<?php

declare(strict_types=1);

namespace Onlyfansapi\Services\Statistics;

use Onlyfansapi\Client;
use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\Statistics\ReachRawContract;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsParams;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsParams\Filter;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsParams\Type;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
