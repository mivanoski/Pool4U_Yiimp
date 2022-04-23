<?php

function yaamp_get_algos()
{
    /* Toggle Site Algos Here */
    return array(
        "0x10",
        "a5a",
        "aergo",
        "allium",
        "argon2",
        "argon2d250",
        "argon2d4096",
        "argon2d-dyn",
        "astralhash",
        "balloon",
        "bastion",
        "bcd",
        "bitcore",
        "blake",
        "blake2s",
        "blakecoin",
        "bmw512",
        "c11",
        "curvehash",
        "decred",
        "dedal",
        "deep",
        "dmd-gr",
	    "equihash",
        "geek",
        "globalhash",
        "groestl",
        "hex",
        "hmq1725",
        "honeycomb",
        "hsr",
        "jeonghash",
        "jha",
        "keccak",
        "keccakc",
        "lbk3",
        "lbry",
        "luffa",
        "lyra2",
        "lyra2TDC",
        "lyra2v2",
        "lyra2v3",
        "lyra2vc0ban",
        "lyra2z",
        "lyra2z330",
        "m7m",
        "megabtx",
        "megamec",
        "minotaur",
        "minotaurx",
        "myr-gr",
        "neoscrypt",
        "nist5",
        "padihash",
        "pawelhash",
        "penta",
        "phi",
        "phi2",
        "pipe",
        "polytimos",
        "quark",
        "qubit",
        "rainforest",
        "renesis",
        "scrypt",
        "scryptn",
        "sha256",
        "sha256t",
        "sib",
        "skein",
        "skein2",
        "skunk",
        "sonoa",
        "timetravel",
        "tribus",
        "vanilla",
        "veltor",
        "velvet",
        "vitalium",
        "whirlpool",
        "x11",
        "x11evo",
        "x11k",
        "x11kvs",
        "x12",
        "x13",
        "x14",
        "x15",
        "x16r",
        "x16rt",
        "x16rv2",
        "x16s",
        "x17",
        "x18",
        "x20r",
        "x21s",
        "x22i",
        "x25x",
        "xevan",
        "yescrypt",
        "yescryptR16",
        "yescryptR32",
        "yescryptR8",
        "yespower",
        "yespowerIC",
        "yespowerIOTS",
        "yespowerLITB",
        "yespowerLTNCG",
        "yespowerR16",
        "yespowerRES",
        "yespowerSUGAR",
        "yespowerURX",
        "zr5"
    );
}

// Used for graphs and 24h profit
// GH/s for fast algos like sha256
function yaamp_algo_mBTC_factor($algo)
{
    switch ($algo) {
        case 'sha256':
        case 'sha256t':
        case 'sha256q':
        case 'blake':
        case 'blakecoin':
        case 'blake2s':
        case 'blake2b':
        case 'decred':
        case 'keccak':
        case 'keccakc':
        case 'lbry':
        case 'vanilla':
            return 1000;
        default:
            return 1;
    }
}

// mBTC coef per algo
function yaamp_get_algo_norm($algo)
{
    global $configAlgoNormCoef;
    if (isset($configAlgoNormCoef[$algo]))
	return (float) $configAlgoNormCoef[$algo];

	$a = array(
	        "0x10"          => 1.0,
        	"a5a"           => 1.0,
	        "aergo"         => 1.0,
	        "allium"        => 1.0,
        	"argon2"        => 1.0,
	        "argon2d250"    => 1.0,
        	"argon2d4096"   => 1.0,
	        "argon2d-dyn"   => 1.0,
        	"astralhash"    => 1.0,
	        "balloon"       => 1.0,
        	"bastion"       => 1.0,
	        "bcd"           => 1.0,
        	"bitcore"       => 1.0,
	        "blake"         => 1.0,
        	"blake2s"       => 1.0,
	        "blakecoin"     => 1.0,
        	"bmw512"        => 1.0,
	        "c11"           => 1.0,
        	"curvehash"     => 1.0,
	        "decred"        => 1.0,
        	"dedal"         => 1.0,
	        "deep"          => 1.0,
        	"dmd-gr"        => 1.0,
		    "equihash"      => 1.0,
	        "geek"          => 1.0,
        	"globalhash"    => 1.0,
	        "groestl"       => 1.0,
        	"hex"           => 1.0,
	        "hmq1725"       => 1.0,
        	"honeycomb"     => 1.0,
	        "hsr"           => 1.0,
        	"jeonghash"     => 1.0,
	        "jha"           => 1.0,
        	"keccak"        => 1.0,
	        "keccakc"       => 1.0,
        	"lbk3"          => 1.0,
	        "lbry"          => 1.0,
        	"luffa"         => 1.0,
	        "lyra2"         => 1.0,
        	"lyra2TDC"      => 1.0,
	        "lyra2v2"       => 1.0,
        	"lyra2v3"       => 1.0,
	        "lyra2vc0ban"   => 1.0,
        	"lyra2z"        => 1.0,
	        "lyra2z330"     => 1.0,
        	"m7m"           => 1.0,
	        "megabtx"       => 1.0,
        	"megamec"       => 1.0,
	        "minotaur"      => 1.0,
        	"minotaurx"     => 1.0,
	        "myr-gr"        => 1.0,
        	"neoscrypt"     => 1.0,
	        "nist5"         => 1.0,
        	"padihash"      => 1.0,
	        "pawelhash"     => 1.0,
        	"penta"         => 1.0,
	        "phi"           => 1.0,
        	"phi2"          => 1.0,
	        "pipe"          => 1.0,
        	"polytimos"     => 1.0,
	        "quark"         => 1.0,
        	"qubit"         => 1.0,
	        "rainforest"    => 1.0,
        	"renesis"       => 1.0,
	        "scrypt"        => 1.0,
        	"scryptn"       => 1.0,
	        "sha256"        => 1.0,
        	"sha256t"       => 1.0,
	        "sib"           => 1.0,
        	"skein"         => 1.0,
	        "skein2"        => 1.0,
        	"skunk"         => 1.0,
	        "sonoa"         => 1.0,
        	"timetravel"    => 1.0,
	        "tribus"        => 1.0,
        	"vanilla"       => 1.0,
	        "veltor"        => 1.0,
        	"velvet"        => 1.0,
	        "vitalium"      => 1.0,
        	"whirlpool"     => 1.0,
	        "x11"           => 1.0,
        	"x11evo"        => 1.0,
	        "x11k"          => 1.0,
        	"x11kvs"        => 1.0,
	        "x12"           => 1.0,
        	"x13"           => 1.0,
	        "x14"           => 1.0,
        	"x15"           => 1.0,
	        "x16r"          => 1.0,
        	"x16rt"         => 1.0,
	        "x16rv2"        => 1.0,
        	"x16s"          => 1.0,
	        "x17"           => 1.0,
        	"x18"           => 1.0,
	        "x20r"          => 1.0,
        	"x21s"          => 1.0,
	        "x22i"          => 1.0,
        	"x25x"          => 1.0,
	        "xevan"         => 1.0,
        	"yescrypt"      => 1.0,
	        "yescryptR16"   => 1.0,
        	"yescryptR32"   => 1.0,
	        "yescryptR8"    => 1.0,
        	"yespower"      => 1.0,
	        "yespowerIC"    => 1.0,
        	"yespowerIOTS"  => 1.0,
	        "yespowerLITB"  => 1.0,
        	"yespowerLTNCG" => 1.0,
	        "yespowerR16"   => 1.0,
        	"yespowerRES"   => 1.0,
	        "yespowerSUGAR" => 1.0,
        	"yespowerURX"   => 1.0,
	        "zr5"           => 1.0
    );

    if (!isset($a[$algo]))
        return 1.0;

    return $a[$algo];
}

function getAlgoColors($algo)
{
	$a = array(
	        "0x10"          => "#4702c7",
        	"a5a"           => "#4702c7",
	        "aergo"         => "#e0d0e0",
        	"allium"        => "#80a0d0",
	        "argon2"        => "#e0d0e0",
        	"argon2d250"    => "#e0d0e0",
	        "argon2d4096"   => "#e0d0e0",
        	"argon2d-dyn"   => "#e0d0e0",
	        "astralhash"    => "#e2d0d2",
        	"balloon"       => "#e0b0b0",
	        "bastion"       => "#e0b0b0",
        	"bcd"           => "#ffd880",
	        "bitcore"       => "#f790c0",
        	"blake"         => "#4702c7",
	        "blakecoin"     => "#4702c7",
        	"bmw512"        => "#0e3073",
	        "c11"           => "#a0a0d0",
        	"curvehash"     => "#d0a0a0",
	        "decred"        => "#4702c7",
        	"dedal"         => "#4702c7",
	        "deep"          => "#e0ffff",
	        "dmd-gr"        => "#a0c0f0",
	        "equihash"      => "#006994",
        	"geek"          => "#d0a0a0",
	        "globalhash"    => "#e2d0d2",
        	"groestl"       => "#d0a0a0",
	        "hex"           => "#c0f0c0",
        	"hmq1725"       => "#ffa0a0",
	        "honeycomb"     => "#c0f0c0",
        	"hsr"           => "#aa70ff",
	        "jeonghash"     => "#e2d0d2",
        	"jha"           => "#a0d0c0",
	        "keccak"        => "#c0f0c0",
        	"keccakc"       => "#c0f0c0",
	        "lbk3"          => "#809aef",
        	"lbry"          => "#b0d0e0",
	        "luffa"         => "#a0c0c0",
        	"lyra2"         => "#80a0f0",
	        "lyra2"         => "#80a0f0",
        	"lyra2TDC"      => "#80a0f0",
	        "lyra2v2"       => "#80c0f0",
        	"lyra2v3"       => "#80c0f0",
	        "lyra2vc0ban"   => "#80c0f0",
        	"lyra2z"        => "#80b0f0",
	        "lyra2z330"     => "#80b0f0",
        	"m7m"           => "#d0a0a0",
	        "megabtx"       => "#d0f0a0",
        	"megamec"       => "#d0f0a0",
	        "minotaur"      => "#d0f0a0",
        	"minotaurx"     => "#3b0202",
	        "myr-gr"        => "#a0c0f0",
        	"neoscrypt"     => "#a0d0f0",
	        "nist5"         => "#c0e0e0",
        	"padihash"      => "#e2d0d2",
	        "pawelhash"     => "#e2d0d2",
        	"penta"         => "#80c0c0",
	        "phi"           => "#a0a0e0",
        	"phi2"          => "#a0a0e0",
	        "pipe"          => "#a0a0e0",
        	"polytimos"     => "#dedefe",
	        "quark"         => "#c0c0c0",
        	"qubit"         => "#d0a0f0",
	        "rainforest"    => "#d0f0a0",
        	"renesis"       => "#f0b0a0",
	        "scrypt"        => "#c0c0e0",
        	"scryptn"       => "#d0d0d0",
	        "sha256"        => "#d0d0a0",
        	"sha256t"       => "#d0d0f0",
	        "sib"           => "#a0a0c0",
        	"skein"         => "#80a0a0",
	        "skein2"        => "#c8a060",
        	"skunk"         => "#dedefe",
	        "sonoa"         => "#c8a060",
        	"timetravel"    => "#f0b0d0",
	        "tribus"        => "#c0d0d0",
        	"vanilla"       => "#4702c7",
	        "velvet"        => "#aac0cc",
        	"vitalium"      => "#f0b0a0",
	        "whirlpool"     => "#d0e0e0",
        	"x11"           => "#f0f0a0",
	        "x11evo"        => "#c0f0c0",
        	"x11k"          => "#f0f0a0",
	        "x12"           => "#ffe090",
        	"x13"           => "#ffd880",
	        "x14"           => "#f0c080",
        	"x15"           => "#f0b080",
	        "x16r"          => "#f0b080",
        	"x16rt"         => "#f0b080",
	        "x16rv2"        => "#f0b080",
        	"x16s"          => "#f0b080",
	        "x17"           => "#f0b0a0",
        	"x18"           => "#f0b0a0",
	        "x20r"          => "#f0b0a0",
        	"x21s"          => "#f0b0a0",
	        "x22i"          => "#f0f0a0",
        	"x25x"          => "#f0f0a0",
	        "xevan"         => "#f0b0a0",
        	"yescrypt"      => "#e0d0e0",
	        "yescryptR16"   => "#e0d0e0",
        	"yescryptR32"   => "#e0d0e0",
	        "yescryptR8"    => "#e0d0e0",
        	"yespower"      => "#e2d0d2",
	        "yespowerIC"    => "#e2d0d2",
        	"yespowerIOTS"  => "#e2d0d2",
	        "yespowerLTNCG" => "#e2d0d2",
        	"yespowerR16"   => "#e2d0d2",
	        "yespowerRES"   => "#e2d0d2",
        	"yespowerSUGAR" => "#e2d0d2",
	        "yespowerURX"   => "#e2d0d2",
        	"zr5"           => "#d0b0d0",

        	'MN'		=> '#ffffff', // MasterNode Earnings
	        'PoS'		=> '#ffffff' // Stake
	);

    if (!isset($a[$algo]))
        return '#ffffff';

    return $a[$algo];
}

function getAlgoPort($algo)
{
	$a = array(
                "0x10"          => 8590,
                "a5a"           => 8040,
                "aergo"         => 8050,
                "allium"        => 8180,
                "argon2"        => 8320,
                "argon2d250"    => 8330,
                "argon2d4096"   => 8340,
                "argon2d-dyn"   => 8350,
                "astralhash"    => 8360,
                "balloon"       => 8810,
                "bastion"       => 8820,
                "bcd"           => 8830,
                "bitcore"       => 8840,
                "blake"         => 8850,
                "blake2s"       => 8860,
                "blakecoin"     => 8870,
                "bmw512"        => 8800,
                "c11"           => 8060,
                "curvehash"     => 8880,
                "decred"        => 8460,
                "dedal"         => 8470,
                "deep"          => 8480,
                "dmd-gr"        => 8490,
                "equihash"      => 8080,
                "geek"          => 8160,
                "globalhash"    => 8170,
                "hex"           => 8370,
                "hmq1725"       => 8100,
                "honeycomb"     => 8380,
                "hsr"           => 8390,
                "jeonghash"     => 8030,
                "jha"           => 8110,
                "keccak"        => 8440,
                "keccakc"       => 8450,
                "lbk3"          => 8540,
                "lbry"          => 8130,
                "luffa"         => 8550,
                "lyra2"         => 8560,
                "lyra2TDC"      => 8570,
                "lyra2v2"       => 8580,
                "lyra2v3"       => 8220,
                "lyra2vc0ban"   => 8240,
                "lyra2z"        => 8260,
                "lyra2z330"     => 8280,
                "m7m"           => 9000,
                "megabtx"       => 9010,
                "megamec"       => 9020,
                "minotaur"      => 8530,
                "minotaurx"     => 8520,
                "myr-gr"        => 9030,
                "neoscrypt"     => 8000,
                "nist5"         => 9040,
                "padihash"      => 9050,
                "pawelhash"     => 9060,
                "penta"         => 9070,
                "phi"           => 9080,
                "phi2"          => 9090,
                "pipe"          => 9220,
                "polytimos"     => 9230,
                "quark"         => 9240,
                "qubit"         => 9250,
                "rainforest"    => 9260,
                "renesis"       => 9270,
                "scrypt"        => 9280,
                "scryptn"       => 9290,
                "sha256"        => 9300,
                "sha256t"       => 9310,
                "sib"           => 9320,
                "skein"         => 9330,
                "skein2"        => 9340,
                "skunk"         => 9350,
                "sonoa"         => 9360,
                "timetravel"    => 8510,
                "tribus"        => 8120,
                "vanilla"       => 9370,
                "veltor"        => 9380,
                "velvet"        => 9390,
                "vitalium"      => 9400,
                "whirlpool"     => 9410,
                "x11"           => 8600,
                "x11evo"        => 8620,
                "x11k"          => 8630,
                "x12"           => 8640,
                "x13"           => 8650,
                "x14"           => 8660,
                "x15"           => 8670,
                "x16r"          => 8400,
                "x16rt"         => 8500,
                "x16rv2"        => 8300,
                "x16s"          => 8700,
                "x17"           => 8680,
                "x18"           => 8720,
                "x20r"          => 8730,
                "x21s"          => 8150,
                "x22i"          => 8020,
                "x25x"          => 8200,
                "xevan"         => 8740,
                "yescrypt"      => 9100,
                "yescryptR16"   => 9110,
                "yescryptR32"   => 9120,
                "yescryptR8"    => 9130,
                "yespower"      => 9140,
                "yespowerIC"    => 9150,
                "yespowerIOTS"  => 9160,
                "yespowerLTNCG" => 9170,
                "yespowerR16"   => 9180,
                "yespowerRES"   => 9190,
                "yespowerSUGAR" => 9200,
                "yespowerURX"   => 9210,
                "zr5"           => 8190,
    );

    global $configCustomPorts;
    if (isset($configCustomPorts[$algo]))
        return $configCustomPorts[$algo];

    if (!isset($a[$algo]))
        return 3033;

    return $a[$algo];
}

////////////////////////////////////////////////////////////////////////

function yaamp_fee($algo)
{
    $fee = controller()->memcache->get("yaamp_fee-$algo");
    if ($fee && is_numeric($fee))
        return (float) $fee;

    /*    $norm = yaamp_get_algo_norm($algo);
    if($norm == 0) $norm = 1;

    $hashrate = getdbosql('db_hashrate', "algo=:algo order by time desc", array(':algo'=>$algo));
    if(!$hashrate || !$hashrate->difficulty) return 1;

    $target = yaamp_hashrate_constant($algo);
    $interval = yaamp_hashrate_step();
    $delay = time()-$interval;

    $rate = controller()->memcache->get_database_scalar("yaamp_pool_rate_coinonly-$algo",
    "select sum(difficulty) * $target / $interval / 1000 from shares where valid and time>$delay and algo=:algo and jobid=0", array(':algo'=>$algo));

    //    $fee = round(log($hashrate->hashrate * $norm / 1000000 / $hashrate->difficulty + 1), 1) + YAAMP_FEES_MINING;
    //    $fee = round(log($rate * $norm / 2000000 / $hashrate->difficulty + 1), 1) + YAAMP_FEES_MINING;
    */
    $fee = YAAMP_FEES_MINING;

    // local fees config
    global $configFixedPoolFees;
    if (isset($configFixedPoolFees[$algo])) {
        $fee = (float) $configFixedPoolFees[$algo];
    }

    controller()->memcache->set("yaamp_fee-$algo", $fee);
    return $fee;
}

function yaamp_fee_solo($algo)
{
	$fee_solo = controller()->memcache->get("yaamp_fee_solo-$algo");
	if($fee_solo && is_numeric($fee_solo)) return (float) $fee_solo;

	$fee_solo = YAAMP_FEES_SOLO;

	// local solo fees config
	global $configFixedPoolFeesSolo;
	if (isset($configFixedPoolFeesSolo[$algo])) {
		$fee_solo = (float) $configFixedPoolFeesSolo[$algo];
	}

	controller()->memcache->set("yaamp_fee_solo-$algo", $fee_solo);
	return $fee_solo;
}

function take_yaamp_fee($v, $algo, $percent = -1)
{
    if ($percent == -1)
        $percent = yaamp_fee($algo);

    return $v - ($v * $percent / 100.0);
}

function yaamp_hashrate_constant($algo = null)
{
    return pow(2, 42); // 0x400 00000000
}

function yaamp_hashrate_step()
{
    return 300;
}

function yaamp_profitability($coin)
{
    if (!$coin->difficulty)
        return 0;

    $btcmhd = 20116.56761169 / $coin->difficulty * $coin->reward * $coin->price;
    if (!$coin->auxpow && $coin->rpcencoding == 'POW') {
        $listaux = getdbolist('db_coins', "enable and visible and auto_ready and auxpow and algo='$coin->algo'");
        foreach ($listaux as $aux) {
            if (!$aux->difficulty)
                continue;

            $btcmhdaux = 20116.56761169 / $aux->difficulty * $aux->reward * $aux->price;
            $btcmhd += $btcmhdaux;
        }
    }

    $algo_unit_factor = yaamp_algo_mBTC_factor($coin->algo);
    return $btcmhd * $algo_unit_factor;
}

function yaamp_convert_amount_user($coin, $amount, $user)
{
    $refcoin = getdbo('db_coins', $user->coinid);
    $value   = 0.;
    if (YAAMP_ALLOW_EXCHANGE) {
        if (!$refcoin)
            $refcoin = getdbosql('db_coins', "symbol='BTC'");
        if (!$refcoin || $refcoin->price <= 0)
            return 0;
        $value = $amount * $coin->price / $refcoin->price;
    } else if ($coin->price && $refcoin && $refcoin->price > 0.) {
        $value = $amount * $coin->price / $refcoin->price;
    } else if ($coin->id == $user->coinid) {
        $value = $amount;
    }
    return $value;
}

function yaamp_convert_earnings_user($user, $status)
{
    $refcoin = getdbo('db_coins', $user->coinid);
    $value   = 0.;
    if (YAAMP_ALLOW_EXCHANGE) {
        if (!$refcoin)
            $refcoin = getdbosql('db_coins', "symbol='BTC'");
        if (!$refcoin || $refcoin->price <= 0)
            return 0;
        $value = dboscalar("SELECT sum(amount*price) FROM earnings WHERE $status AND userid={$user->id}");
        $value = $value / $refcoin->price;
    } else if ($refcoin && $refcoin->price > 0.) {
        $value = dboscalar("SELECT sum(amount*price) FROM earnings WHERE $status AND userid={$user->id}");
        $value = $value / $refcoin->price;
    } else if ($user->coinid) {
        $value = dboscalar("SELECT sum(amount) FROM earnings WHERE $status AND userid={$user->id} AND coinid=" . $user->coinid);
    }
    return $value;
}

//////////////////////////////credits to Alexg for PHP code changes//////////////////////////////////////////

function yaamp_pool_rate($algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $target   = yaamp_hashrate_constant($algo);
    $interval = yaamp_hashrate_step();
    $delay    = time() - $interval;

    $rate = controller()->memcache->get_database_scalar("yaamp_pool_rate-$algo", "SELECT (sum(difficulty) * $target / $interval / 1000) FROM shares WHERE valid AND time>$delay AND algo=:algo", array(
        ':algo' => $algo
    ));

    return $rate;
}

function yaamp_pool_rate_bad($algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $rate = controller()->memcache->get("yaamp_pool_rate_bad-$algo");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $rate = dboscalar("SELECT sum(difficulty) FROM shares WHERE not valid AND time>$delay AND algo=:algo", array(
            ':algo' => $algo
        ));
        $rate = $rate * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_pool_rate_bad-$algo", $rate, $t);
    }

    return $rate;
}

function yaamp_pool_rate_rentable($algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $rate = controller()->memcache->get("yaamp_pool_rate_rentable-$algo");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $rate = dboscalar("SELECT sum(difficulty) FROM shares WHERE valid AND extranonce1 AND time>$delay AND algo=:algo", array(
            ':algo' => $algo
        ));
        $rate = $rate * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_pool_rate_rentable-$algo", $rate, $t);
    }

    return $rate;
}

function yaamp_user_rate($userid, $algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $rate = controller()->memcache->get("yaamp_user_rate-$userid-$algo");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $rate = dboscalar("SELECT sum(difficulty) FROM shares WHERE valid AND time>$delay AND userid=$userid AND algo=:algo", array(
            ':algo' => $algo
        ));
        $rate = $rate * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_user_rate-$userid-$algo", $rate, $t);
    }

    return $rate;
}

function yaamp_user_rate_bad($userid, $algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $rate = controller()->memcache->get("yaamp_user_rate_bad-$userid-$algo");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $diff = (double) controller()->memcache->get_database_scalar("yaamp_user_diff_avg-$userid-$algo", "SELECT avg(difficulty) FROM shares WHERE valid AND time>$delay AND userid=$userid AND algo=:algo", array(
            ':algo' => $algo
        ));

        $rate = dboscalar("SELECT count(id) FROM shares WHERE valid!=1 AND time>$delay AND userid=$userid AND algo=:algo", array(
            ':algo' => $algo
        ));
        $rate = $rate * $diff * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_user_rate_bad-$userid-$algo", $rate, $t);
    }

    return $rate;
}

function yaamp_worker_rate($workerid, $algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $rate = controller()->memcache->get("yaamp_worker_rate-$workerid-$algo");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $rate = dboscalar("SELECT sum(difficulty) FROM shares WHERE valid AND time>$delay AND workerid=" . $workerid);
        $rate = $rate * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_worker_rate-$workerid-$algo", $rate, $t);
    }

    return $rate;
}

function yaamp_worker_rate_bad($workerid, $algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $rate = controller()->memcache->get("yaamp_worker_rate_bad-$workerid-$algo");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $diff = (double) controller()->memcache->get_database_scalar("yaamp_worker_diff_avg-$workerid-$algo", "SELECT avg(difficulty) FROM shares WHERE valid AND time>$delay AND workerid=" . $workerid);

        $rate = dboscalar("SELECT count(id) FROM shares WHERE valid!=1 AND time>$delay AND workerid=" . $workerid);

        $rate = $rate * $diff * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_worker_rate_bad-$workerid-$algo", $rate, $t);
    }

    return empty($rate) ? 0 : $rate;
}

function yaamp_worker_shares_bad($workerid, $algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $interval = yaamp_hashrate_step();
    $delay    = time() - $interval;

    $rate = (int) controller()->memcache->get_database_scalar("yaamp_worker_shares_bad-$workerid-$algo", "SELECT count(id) FROM shares WHERE valid!=1 AND time>$delay AND workerid=" . $workerid);

    return $rate;
}

function yaamp_coin_rate($coinid)
{
    $coin = getdbo('db_coins', $coinid);
    if (!$coin || !$coin->enable)
        return 0;

    $rate = controller()->memcache->get("yaamp_coin_rate-$coinid");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($coin->algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $rate = dboscalar("SELECT sum(difficulty) FROM shares WHERE valid AND time>$delay AND coinid=$coinid");
        $rate = $rate * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_coin_rate-$coinid", $rate, $t);
    }

    return $rate;
}

function yaamp_rented_rate($algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $rate = controller()->memcache->get("yaamp_rented_rate-$algo");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $rate = dboscalar("SELECT sum(difficulty) FROM shares WHERE time>$delay AND algo=:algo AND jobid!=0 AND valid", array(
            ':algo' => $algo
        ));
        $rate = $rate * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_rented_rate-$algo", $rate, $t);
    }

    return $rate;
}

function yaamp_job_rate($jobid)
{
    $job = getdbo('db_jobs', $jobid);
    if (!$job)
        return 0;

    $rate = controller()->memcache->get("yaamp_job_rate-$jobid");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($job->algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $rate = dboscalar("SELECT sum(difficulty) FROM jobsubmits WHERE valid AND time>$delay AND jobid=" . $jobid);
        $rate = $rate * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_job_rate-$jobid", $rate, $t);
    }

    return $rate;
}

function yaamp_job_rate_bad($jobid)
{
    $job = getdbo('db_jobs', $jobid);
    if (!$job)
        return 0;

    $rate = controller()->memcache->get("yaamp_job_rate_bad-$jobid");
    if ($rate === false) {

        $target   = yaamp_hashrate_constant($job->algo);
        $interval = yaamp_hashrate_step();
        $delay    = time() - $interval;

        $diff = (double) controller()->memcache->get_database_scalar("yaamp_job_diff_avg-$jobid", "SELECT avg(difficulty) FROM jobsubmits WHERE valid AND time>$delay AND jobid=" . $jobid);

        $rate = dboscalar("SELECT count(id) FROM jobsubmits WHERE valid!=1 AND time>$delay AND jobid=" . $jobid);
        $rate = $rate * $diff * $target / $interval / 1000;
        $t    = 30;
        controller()->memcache->set("yaamp_job_rate_bad-$jobid", $rate, $t);
    }

    return $rate;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////

function yaamp_pool_rate_pow($algo = null)
{
    if (!$algo)
        $algo = user()->getState('yaamp-algo');

    $target   = yaamp_hashrate_constant($algo);
    $interval = yaamp_hashrate_step();
    $delay    = time() - $interval;

    $rate = controller()->memcache->get_database_scalar("yaamp_pool_rate_pow-$algo", "SELECT sum(shares.difficulty) * $target / $interval / 1000 FROM shares, coins
            WHERE shares.valid AND shares.time>$delay AND shares.algo=:algo AND
            shares.coinid=coins.id AND coins.rpcencoding='POW'", array(
        ':algo' => $algo
    ));

    return $rate;
}

/////////////////////////////////////////////////////////////////////////////////////////////

function yaamp_renter_account($renter)
{
    if (YAAMP_PRODUCTION)
        return "renter-prod-$renter->id";
    else
        return "renter-dev-$renter->id";
}

/////////////////////////////////////////////////////////////////////////////////////////////
