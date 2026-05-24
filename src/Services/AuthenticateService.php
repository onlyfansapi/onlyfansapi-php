<?php

declare(strict_types=1);

namespace Onlyfansapi\Services;

use Onlyfansapi\Authenticate\AuthenticatePollStatusResponse;
use Onlyfansapi\Authenticate\AuthenticateStartParams\ProxyCountry;
use Onlyfansapi\Authenticate\AuthenticateStartResponse;
use Onlyfansapi\Authenticate\AuthenticateSubmit2faResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Exceptions\APIException;
use Onlyfansapi\Core\Util;
use Onlyfansapi\RequestOptions;
use Onlyfansapi\ServiceContracts\AuthenticateContract;

/**
 * @phpstan-import-type RequestOpts from \Onlyfansapi\RequestOptions
 */
final class AuthenticateService implements AuthenticateContract
{
    /**
     * @api
     */
    public AuthenticateRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AuthenticateRawService($client);
    }

    /**
     * @api
     *
     * Poll the status of the authentication process. Eg. if 2FA is required, we will ask you for the code using the `twoFactorPending = true` in the response body.
     *
     * @param string $attemptID The attempt ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function pollStatus(
        string $attemptID,
        RequestOptions|array|null $requestOptions = null
    ): AuthenticatePollStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->pollStatus($attemptID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Trigger account reauthentication without the need to submit email & password again.
     *
     * @param string $accountID The Account ID of the authentication process
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function reauthenticate(
        string $accountID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->reauthenticate($accountID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Start the authentication process for a new account. Our systems will bypass Captcha and also ask you for 2FA code if required. All credentials are stored securely using bcrypt and only used during login.
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
    ): AuthenticateStartResponse {
        $params = Util::removeNulls(
            [
                'email' => $email,
                'password' => $password,
                'proxyCountry' => $proxyCountry,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->start(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Submit the 2FA code for the authentication process.
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
    ): AuthenticateSubmit2faResponse {
        $params = Util::removeNulls(['code' => $code]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submit2fa($attemptID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
