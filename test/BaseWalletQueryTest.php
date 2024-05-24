<?php

use PHPUnit\Framework\TestCase;
use BaseWalletQuery\BaseWalletQuery;

class BaseWalletQueryTest extends TestCase
{
    private $apiKey;
    private $walletAddress;
    private $baseWalletQuery;

    protected function setUp(): void
    {
        $this->apiKey = 'test-api-key';
        $this->walletAddress = 'test-wallet-address';

        $this->baseWalletQuery = $this->getMockBuilder(BaseWalletQuery::class)
            ->setConstructorArgs([
                [
                    'BASE_URL' => 'https://api.covalenthq.com',
                    'CHAIN' => 'base-testnet',
                    'API_KEY' => $this->apiKey,
                ]
            ])
            ->onlyMethods(['QueryWalletBalances'])
            ->getMock();
    }

    public function testGetWalletBalance()
    {
        // Define the expected balance
        $expectedBalance = 1000;

        // Set up the expectation for the QueryWalletBalances method
        $this->baseWalletQuery->expects($this->once())
            ->method('QueryWalletBalances')
            ->with($this->walletAddress)
            ->willReturn($expectedBalance);

        // Call the method and assert the result
        $balance = $this->baseWalletQuery->QueryWalletBalances($this->walletAddress);
        $this->assertEquals($expectedBalance, $balance);
    }
}

?>
