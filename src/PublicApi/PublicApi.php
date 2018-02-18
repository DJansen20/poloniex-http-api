<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\PublicApi;

use Poloniex\Common\Transport;
use Poloniex\Common\Request;
use Poloniex\Common\Response;

use Poloniex\PublicApi\Requests\ChartDataRequest;
use Poloniex\PublicApi\Requests\CurrenciesRequest;
use Poloniex\PublicApi\Requests\LoanOrderRequest;
use Poloniex\PublicApi\Requests\OrderbookRequest;
use Poloniex\PublicApi\Requests\TickerRequest;
use Poloniex\PublicApi\Requests\VolumeRequest;

use Poloniex\PublicApi\Responses\ChartDataResponse;
use Poloniex\PublicApi\Responses\CurrenciesResponse;
use Poloniex\PublicApi\Responses\LoanOrderResponse;
use Poloniex\PublicApi\Responses\OrderbookResponse;
use Poloniex\PublicApi\Responses\TickerResponse;
use Poloniex\PublicApi\Responses\VolumeResponse;

class PublicApi
{
    /**
     * @var Request $request
     */
    private $request;

    /**
     * @var Transport $transport
     */
    private $transport;

    /**
     * @var Response $response
     */
    private $response;

    /**
     * @return TickerResponse
     * @throws \Exception
     */
    public function getDailyTicker(): TickerResponse
    {
        $this->request = new TickerRequest();
        $json = $this->sendRequest();
        $this->response = new TickerResponse($json);

        return $this->response;
    }

    /**
     * @return VolumeResponse
     * @throws \Exception
     */
    public function getDailyVolume(): VolumeResponse
    {
        $this->request = new VolumeRequest();
        $json = $this->sendRequest();
        $this->response = new VolumeResponse($json);

        return $this->response;
    }

    /**
     * @param string $pair
     * @param int $depth
     * @return OrderbookResponse
     * @throws \Exception
     */
    public function getOrderBook(string $pair, int $depth = 10): OrderbookResponse
    {
        $this->request = new OrderbookRequest($pair, $depth);
        $json = $this->sendRequest();
        $this->response = new OrderbookResponse($json);

        return $this->response;
    }

    /**
     * @param string $pair
     * @param int $start
     * @param int $end
     * @param int $period
     * @return ChartDataResponse
     * @throws \Exception
     */
    public function getChartData(
        string $pair,
        int $start = 0,
        int $end = 9999999999,
        int $period = 86400
    ): ChartDataResponse {
        $this->request = new ChartDataRequest($pair, $start, $end, $period);
        $json = $this->sendRequest();
        $this->response = new ChartDataResponse($json);

        return $this->response;
    }

    /**
     * @return CurrenciesResponse
     * @throws \Exception
     */
    public function getCurrencies(): CurrenciesResponse
    {
        $this->request = new CurrenciesRequest();
        $json = $this->sendRequest();
        $this->response = new CurrenciesResponse($json);

        return $this->response;
    }

    /**
     * @param string $currency
     * @return LoanOrderResponse
     * @throws \Exception
     */
    public function getLoanData(string $currency): LoanOrderResponse
    {
        $this->request = new LoanOrderRequest($currency);
        $json = $this->sendRequest();
        $this->response = new LoanOrderResponse($json);

        return $this->response;
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function sendRequest(): string
    {
        if ($this->request === null) {
            throw new \Exception('No request set');
        }

        if (!$this->transport instanceof Transport) {
            $this->transport = new Transport();
        }

        return $this->transport->send($this->request);
    }
}
