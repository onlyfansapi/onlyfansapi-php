<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Statistics;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\RequestOptions;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsParams;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1;
use OnlyFansAPI\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface ReachRawContract
{
    /**
     * @api
     *
     * @param string $account The Account ID
     * @param array<string,mixed>|ReachGetProfileVisitorsParams $params
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
    ): BaseResponse;
}
