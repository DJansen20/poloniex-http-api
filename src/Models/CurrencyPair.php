<?php
/**
 * @package Poloniex HTTP API client
 * @author Danny Jansen <danny.jansen93@gmail.com>
 * @license: MIT
 */

namespace Poloniex\Models;

class CurrencyPair
{
    /**
     * BTC trading pairs
     */
    const BTC_ETH = 'BTC_ETH';
    const BTC_XRP = 'BTC XRP';
    const BTC_LTC = 'BTC_LTC';
    const BTC_XMR = 'BTC_XMR';
    const BTC_LSK = 'BTC_LSK';
    const BTC_ETC = 'BTC_ETC';
    const BTC_STR = 'BTC_STR';
    const BTC_XRM = 'BTX_XRM';
    const BTC_BCH = 'BTC_BCH';
    const BTC_ZEC = 'BTC_ZEC';
    const BTC_SC = 'BTC_SC';
    const BTC_BTS = 'BTC_BTS';
    const BTC_DOGE = 'BTC_DOGE';
    const BTC_DASH = 'BTC_DASH';
    const BTC_ZRX = 'BTC_ZRX';
    const BTC_OMG = 'BTC_OMG';
    const BTC_STRAT = 'BTC_STRAT';
    const BTC_NXT = 'BTC_NXT';
    const BTC_DGB = 'BTC_DGB';
    const BTC_VTC = 'BTC_VTC';
    const BTC_GAME = 'BTC_GAME';
    const BTC_DCR = 'BTC_DCR';
    const BTC_GNT = 'BTC_GNT';
    const BTC_REP = 'BTC_REP';
    const BTC_BCN = 'BTC_BCN';
    const BTC_PPC = 'BTC_PPC';
    const BTC_EMC2 = 'BTC_EMC2';
    const BTC_FCT = 'BTC_FCT';
    const BTC_SYS = 'BTC_SYS';
    const BTC_MAID = 'BTC_MAID';
    const BTC_STEEM = 'BTC_STEEM';
    const BTC_CVC = 'BTC_CVC';
    const BTC_ARDR = 'BTC_ARDR';
    const BTC_VIA = 'BTC_VIA';
    const BTC_VRC = 'BTC_VRC';
    const BTC_EXP = 'BTC_EXP';
    const BTC_GAS = 'BTC_GAS';
    const BTC_LBC = 'BTC_LBC';
    const BTC_BURST = 'BTC_BURST';
    const BTC_PASC = 'BTC_PASC';
    const BTC_STORJ = 'BTC_STORJ';
    const BTC_XCP = 'BTC_XCP';
    const BTC_GNO = 'BTC_GNO';
    const BTC_CLAM = 'BTC_CLAM';
    const BTC_NAV = 'BTC_NAV';
    const BTC_AMP = 'BTC_AMP';
    const BTC_POT = 'BTC_POT';
    const BTC_OMNI = 'BTC_OMNI';
    const BTC_BLK = 'BTC_BLK';
    const BTC_XVC = 'BTC_XVC';
    const BTC_RADS = 'BTC_RADS';
    const BTC_NXC = 'BTC_NXC';
    const BTC_XPM = 'BTC_XPM';
    const BTC_GRC = 'BTC_GRC';
    const BTC_FLO = 'BTC_FLO';
    const BTC_BELA = 'BTC_BELA';
    const BTC_BTM = 'BTC_BTM';
    const BTC_RIC = 'BTC_RIC';
    const BTC_PINK = 'BTC_PINK';
    const BTC_BCY = 'BTC_BCY';
    const BTC_SBD = 'BTC_SBD';
    const BTC_XBC = 'BTC_XBC';
    const BTC_NEOS = 'BTC_NEOS';
    const BTC_FLDC = 'BTC_FLDC';
    const BTC_HUC = 'BTC_HUC';
    const BTC_NMC = 'BTC_NMC';
    const BTC_BTCD = 'BTC_BTCD';

    /**
     * ETH trading pairs
     */
    const ETH_LSK = 'ETH_LSK';
    const ETH_ETC = 'ETH_ETC';
    const ETH_BCH = 'ETH_BCH';
    const ETH_OMG = 'ETH_OMG';
    const ETH_ZRX = 'ETH_ZRX';
    const ETH_ZEC = 'ETH_ZEC';
    const ETH_REP = 'ETH_REP';
    const ETH_GNT = 'ETH_GNT';
    const ETH_CVC = 'ETH_CVC';
    const ETH_GNO = 'ETH_GNO';
    const ETH_GAS = 'ETH_GAS';
    const ETH_STEEM = 'ETH_STEEM';

    /**
     * XMR trading pairs
     */
    const XMR_LTC = 'XMR_LTC';
    const XMR_ZEC = 'XMR_ZEC';
    const XMR_DASH = 'XMR_DASH';
    const XMR_NXT = 'XMR_NXT';
    const XMR_BCN = 'XMR_BCN';
    const XMR_BLK = 'XMR_BLK';
    const XMR_MAID = 'XMR_MAID';
    const XMR_BTCD = 'XMR_BTCD';

    /**
     * USDT trading pairs
     */
    const USDT_BTC = 'USDT_BTC';
    const USDT_XRP = 'USDT_XRP';
    const USDT_ETH = 'USDT_ETH';
    const USDT_LTC = 'USDT_LTC';
    const USDT_BCH = 'USDT_BCH';
    const USDT_STR = 'USDT_STR';
    const USDT_NXT = 'USDT_NXT';
    const USDT_ETC = 'USDT_ETC';
    const USDT_XMR = 'USDT_XMR';
    const USDT_ZEC = 'USDT_ZEC';
    const USDT_DASH = 'USDT_DASH';
    const USDT_REP = 'USDT_REP';
}
