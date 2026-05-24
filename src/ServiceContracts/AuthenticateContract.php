<?php

declare(strict_types=1);

namespace Onlyfansapi\ServiceContracts;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse;
use Onlyfansapi\Authenticate\AuthenticateStartParams\ProxyCountry;
use Onlyfansapi\Authenticate\AuthenticateStartResponse;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faResponse;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
interface AuthenticateContract
{
    /**
     * @api
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pollStatus(
        string $attemptID,
        RequestOptions|array|null $requestOptions = null
    ): AuthenticatePollStatusResponse;

    /**
     * @api
     *
     * @param string $accountID The Account ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function reauthenticate(
        string $accountID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $email The email address of the OnlyFans account
     * @param string $password The password of the OnlyFans account
     * @param ProxyCountry|value-of<ProxyCountry> $proxyCountry The country of the proxy server you want to use. Eg. "us" for United States
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function start(
        string $email,
        string $password,
        ProxyCountry|string $proxyCountry,
        RequestOptions|array|null $requestOptions = null,
    ): AuthenticateStartResponse;

    /**
     * @api
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param string $code The 2FA code you received on your phone
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit2fa(
        string $attemptID,
        string $code,
        RequestOptions|array|null $requestOptions = null,
    ): AuthenticateSubmit2faResponse;
}
