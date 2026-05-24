<?php

namespace Tests\Services\Banking;

use Onlyfansapi\Banking\Details\DetailGetAccountCountryDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetBankDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetDac7FormDetailsResponse;
use Onlyfansapi\Banking\Details\DetailGetLegalAndTaxStatusResponse;
use Onlyfansapi\Banking\Details\DetailGetLegalFormDetailsResponse;
use Onlyfansapi\Client;
use Onlyfansapi\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DetailsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testRetrieveAccountCountryDetails(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->banking->details->retrieveAccountCountryDetails(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            DetailGetAccountCountryDetailsResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveBankDetails(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->banking->details->retrieveBankDetails(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DetailGetBankDetailsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveDac7FormDetails(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->banking->details->retrieveDac7FormDetails(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DetailGetDac7FormDetailsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveLegalAndTaxStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->banking->details->retrieveLegalAndTaxStatus(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DetailGetLegalAndTaxStatusResponse::class, $result);
    }

    #[Test]
    public function testRetrieveLegalFormDetails(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->banking->details->retrieveLegalFormDetails(
            'acct_XXXXXXXXXXXXXXX'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DetailGetLegalFormDetailsResponse::class, $result);
    }
}
