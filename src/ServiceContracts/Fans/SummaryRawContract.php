<?php

declare(strict_types=1);

namespace OnlyFansAPI\ServiceContracts\Fans;

use OnlyFansAPI\Core\Contracts\BaseResponse;
use OnlyFansAPI\Core\Exceptions\APIException;
use OnlyFansAPI\Fans\Summary\SummaryGenerateSummaryParams;
use OnlyFansAPI\Fans\Summary\SummaryGenerateSummaryResponse;
use OnlyFansAPI\Fans\Summary\SummaryGetSummaryParams;
use OnlyFansAPI\Fans\Summary\SummaryGetSummaryResponse;
use OnlyFansAPI\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \OnlyFansAPI\RequestOptions
 */
interface SummaryRawContract
{
    /**
     * @api
     *
     * @param string $fanID Path param: Fan's OnlyFans ID
     * @param array<string,mixed>|SummaryGenerateSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SummaryGenerateSummaryResponse>
     *
     * @throws APIException
     */
    public function generateSummary(
        string $fanID,
        array|SummaryGenerateSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fanID Fan's OnlyFans ID
     * @param array<string,mixed>|SummaryGetSummaryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SummaryGetSummaryResponse>
     *
     * @throws APIException
     */
    public function getSummary(
        string $fanID,
        array|SummaryGetSummaryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
