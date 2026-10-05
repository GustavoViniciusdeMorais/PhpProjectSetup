<?php

namespace Gustavomorais\Geobash\Services\Gateway;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

class BancoCentralApi
{
    private const BASE_URI = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/';

    private const DOLLAR_PERIOD_ENDPOINT = 'CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)';

    private string $dollarPeriodUri;

    public function __construct(
        // private ClientInterface $client = new Client(),
    ) {
        $this->dollarPeriodUri = self::BASE_URI . self::DOLLAR_PERIOD_ENDPOINT;
    }

    public function getDollarValue(string $startDate, string $endDate): string
    {
        // $response = $this->client->request('GET', $this->dollarPeriodUri, [
        //     'query' => [
        //         '@dataInicial' => "'{$startDate}'",
        //         '@dataFinalCotacao' => "'{$endDate}'",
        //         '$format' => 'json',
        //         '$top' => 1,
        //     ],
        // ]);

        // $body = json_decode($response->getBody()->getContents(), true);

        return (string) ($body['value'][0]['cotacaoVenda'] ?? '');
    }
}
