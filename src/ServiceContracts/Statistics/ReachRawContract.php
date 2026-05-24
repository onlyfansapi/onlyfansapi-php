<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Statistics;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsParams;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember0;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember1;
use Onlyfansapi\Statistics\Reach\ReachGetProfileVisitorsResponse\UnionMember2;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
