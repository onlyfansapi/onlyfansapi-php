<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts\Fans;

use Onlyfansapi\Core\Contracts\BaseResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Fans\Summary\SummaryGenerateSummaryParams;
use Onlyfansapi\Fans\Summary\SummaryGenerateSummaryResponse;
use Onlyfansapi\Fans\Summary\SummaryGetSummaryParams;
use Onlyfansapi\Fans\Summary\SummaryGetSummaryResponse;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
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
