<?php
$algo = user()->getState('yaamp-algo');

JavascriptFile("/extensions/jqplot/jquery.jqplot.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.dateAxisRenderer.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.barRenderer.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.highlighter.js");
JavascriptFile("/extensions/jqplot/plugins/jqplot.cursor.js");
JavascriptFile('/yaamp/ui/js/auto_refresh.js');

$height = '240px';

$min_payout = floatval(YAAMP_PAYMENTS_MINI);
$min_sunday = $min_payout / 10;

$payout_freq = (YAAMP_PAYMENTS_FREQ / 3600) . " hours";
?>

<div id='resume_update_button' style='color: #ffffff; background-color: #41464b; border: 1px solid #7d7d7d;
    padding: 10px; margin-left: 20px; margin-right: 20px; margin-top: 15px; cursor: pointer; display: none;'
    onclick='auto_page_resume();' align=center>
    <b>Auto Refresh Is Paused - Click Here To Resume</b></div>

<table cellspacing=20 width=100%>
<tr><td valign=top width=50%>

<!--  -->

<div class="main-left-box">
<div class="main-left-title">Welcome!</div>
<div class="main-left-inner">

<center>
<ul>
<li><b><img alt="Pool4U Button Card" src="https://pool4u.net/images/pool4u_button.png" style="height: 123px; width: 300px;" /></b></li>
<li>&nbsp;</li>
<li><b>No registration</b> is required, we do payouts of the currency you are mining. Use your wallet address as username.</li>
<li>&nbsp;</li>
<li>Payouts are made automatically every <?=$payout_freq ?> for all balances above <b><?=$min_payout ?></b>, or <b><?=$min_sunday ?></b> on Sunday.</li>
<li>For some coins, there is an initial delay before the first payout, please wait at least 6 hours before asking for support.</li>
<li>Blocks are distributed proportionally among valid submitted shares.</li>
<br/>
</ul>
</div></div>
</center>
<br/>

<!-- Stratum Auto generation code, will automatically add coins when they are enabled and auto ready -->

<div class="main-left-box">
<div class="main-left-title">How to mine with pool4u.net</div>
<div class="main-left-inner">

<center><table>
	<thead>
		<tr>
			<th>Stratum Location</th>
			<th>Choose Coin</th>
			<th>Your Wallet Address</th>
			<th>Rig (opt.)</th>
                        <th>Solo Mine</th>
                        <th>Start Mining</th>
		</tr>
	</thead>

<tbody>
	<tr>
		<td>
			<select id="drop-stratum" colspan="2" style="min-width: 140px; border-style:solid; padding: 3px; font-family: monospace; border-radius: 5px;">

<!-- Add your stratum locations here -->
			<option value="stratum.">Europe</option>
			<!-- <option value="us.west.">USA</option>
			<option value="aus.">AUS Stratum</option>
			<option value="cad.">CAD Stratum</option>
			<option value="uk.">UK Stratum</option> -->
		</select>
	</td>

	<td>
			<select id="drop-coin" style="border-style:solid; padding: 3px; font-family: monospace; border-radius: 5px;">
        <?php
        $list = getdbolist('db_coins', "enable and visible and auto_ready order by algo asc");

        $algoheading="";
        $count=0;
        foreach($list as $coin)
        			{
        			$name = substr($coin->name, 0, 18);
        			$symbol = $coin->getOfficialSymbol();
                  $id = $coin->id;
                  $algo = $coin->algo;

        $port_count = getdbocount('db_stratums', "algo=:algo and symbol=:symbol", array(
        ':algo' => $algo,
        ':symbol' => $symbol
        ));

        $port_db = getdbosql('db_stratums', "algo=:algo and symbol=:symbol", array(
        ':algo' => $algo,
        ':symbol' => $symbol
        ));

        if ($port_count >= 1){$port = $port_db->port;}else{$port = '0.0.0.0';}
        if($count == 0){ echo "<option disabled=''>$algo";}elseif($algo != $algoheading){echo "<option disabled=''>$algo</option>";}
        echo "<option data-port='$port' data-algo='-a $algo' data-symbol='$symbol'>$name ($symbol)</option>";

        $count=$count+1;
        $algoheading=$algo;
        }
        ?>
			</select>
		</td>

		<td>

<!-- Change your demo wallet here -->
			<input id="text-wallet" type="text" size="35" placeholder="RF9D1R3Vt7CECzvb1SawieUC9cYmAY1qoj" style="border-style:solid; border-width: thin; padding: 3px; font-family: monospace; border-radius: 5px;">
		</td>

		<td>
			<input id="text-rig-name" type="text" size="10" placeholder="001" style="border-style:solid; border-width: thin; padding: 3px; font-family: monospace; border-radius: 5px;">
		</td>

	        <td>
			<select id="drop-solo" colspan="2" style="min-width: 80px; border-style:solid; padding: 3px; font-family: monospace; border-radius: 5px;">
			<option value="">No</option>
			<option value=",m=solo">Yes</option>
			</select>
		</td>

		<td>
			<input id="Generate!" type="button" value="Create String" onclick="generate()" style="border-style:solid; padding: 3px; font-family: monospace; border-radius: 5px;">
		</td>
	</tr>
	<tr>
			<td colspan="7"><p class="main-left-box" style="padding: 3px; color: #000000; background-color: #ffffff; font-family: monospace;" id="output">-a  -o stratum+tcp://pool4u.net:0000 -u . -p c=</p>
		</td>
	</tr>
</tbody></table>

<ul>
<li><b>Your WALLET ADDRESS must be valid for the coin you are mining !</b></li>
<li><b>DO NOT USE a BTC address here, the auto exchange is disabled on these stratums !</b></li>
<li>See the "pool4u.net Coins" area on the right for PORT numbers. You can mine any coin regardless if the coin is enabled or not for autoexchange. Payouts will only be made in that coin.</li>
<br>
</ul>
</div></div></center><br>

<!-- End new stratum generation code  -->



<div class="main-left-box">
<div class="main-left-title">Our recommended miners</div>
<div class="main-left-inner">
    <ul>
    
        <style>
            .hiddenField02 {
              display: none;
            }
          </style>
          
          <form action="#" method="post" id="recommendedminer" class="recommendedminer">
            <p>
              <select id="scripts" name="scripts" onChange="selectionChange()">
                <option value="Please select algorithm">Select Algo</option>

                <option value="SRBMiner-MULTI v0.9.3" data-donwload-href="https://github.com/doktor83/SRBMiner-Multi/releases/tag/0.9.3">minotaurx</option>
		<option value="ccminer v2.3.1" data-donwload-href="https://github.com/tpruvot/ccminer/releases/tag/2.3.1-tpruvot">neoscrypt</option>

                <option
                  value="ccminer v2.3.1"
                  data-donwload-href="https://github.com/tpruvot/ccminer/releases/tag/2.3.1-tpruvot"
                >
                  allium
                </option>
                <option
                  value="T-Rex v0.19.14"
                  data-donwload-href="https://github.com/trexminer/T-Rex/releases/tag/0.19.14"
                >
                  x21s
                </option>
                <option
                  value="T-Rex v0.19.14"
                  data-donwload-href="https://github.com/trexminer/T-Rex/releases/tag/0.19.14"
                >
                  x25x
                </option>
                <option
                  value="T-Rex v0.19.14"
                  data-donwload-href="https://github.com/trexminer/T-Rex/releases/tag/0.19.14"
                >
                  x16rt
                </option>
                <option
                  value="T-Rex v0.19.14"
                  data-donwload-href="https://github.com/trexminer/T-Rex/releases/tag/0.19.14"
                >
                  x16rv2
                </option>
                <option
                  value="T-Rex v0.19.14"
                  data-donwload-href="https://github.com/trexminer/T-Rex/releases/tag/0.19.14"
                >
                  x16
                </option>
                <option
                  value="T-Rex v0.19.14"
                  data-donwload-href="https://github.com/trexminer/T-Rex/releases/tag/0.19.14"
                >
                  tribus
                </option>
                <option
                  value="WildRig Multi"
                  data-donwload-href="https://github.com/andru-kun/wildrig-multi/releases"
                >
                  bmw512
                </option>
              </select>
          
              <input type="text" id="demo" readonly />
              <a href="" id="downloadLink" class="hiddenField02" target="_blank">
                Download here</a
              >
            </p>
          </form>
          
          <script>
            // get references to select list and display text box
            var sel = document.getElementById("scripts");
            var el = document.getElementById("display");
            var a = document.getElementById("downloadLink");
          
            function selectionChange() {
              document.getElementById("demo").value = sel.value;
              if (sel[sel.selectedIndex]?.dataset?.donwloadHref) {
                a.href = sel[sel.selectedIndex]?.dataset?.donwloadHref;
                a.classList.remove("hiddenField02");
              } else {
                a.href = "";
                a.classList.add("hiddenField02");
              }
          
              console.log(
                sel.selectedIndex,
                sel[sel.selectedIndex].dataset,
                sel[sel.selectedIndex]?.dataset?.donwloadHref
              );
            }
          </script>
          
    
    </ul>
</div></div><br>



<div class="main-left-box">
<div class="main-left-title">Useful links</div>
<div class="main-left-inner">

<ul>

<li><b>API</b> - <a href='/site/api'>http://<?=YAAMP_SITE_URL
?>/site/api</a></li>
<li><b>Difficulty</b> - <a href='/site/diff'>http://<?=YAAMP_SITE_URL
?>/site/diff</a></li>
<?php
if (YIIMP_PUBLIC_BENCHMARK):
?>
<li><b>Benchmarks</b> - <a href='/site/benchmarks'>http://<?=YAAMP_SITE_URL
?>/site/benchmarks</a></li>
<?php
endif;
?>

<?php
if (YAAMP_ALLOW_EXCHANGE):
?>
<li><b>Algo Switching</b> - <a href='/site/multialgo'>http://<?=YAAMP_SITE_URL
?>/site/multialgo</a></li>
<?php
endif;
?>

<br>

</ul>
</div></div><br>

<div class="main-left-box">
<div class="main-left-title">Support</div>
<div class="main-left-inner">

<ul class="social-icons">
    <li><a href="https://discord.gg/6uDrEh6yTM"><img src='/images/discord.png' /></a></li>
    <li><a href="http://www.twitter.com"><img src='/images/Twitter.png' /></a></li>
    <li><a href="mailto:support@pool4u.net"><img src='/images/email.png' /></a></li>
<!--    <li><a href="http://www.youtube.com"><img src='/images/telegram.png' /></a></li> -->
<!--    <li><a href="http://www.github.com"><img src='/images/Github.png' /></a></li> -->

</ul>

</div></div><br>
</td><td valign=top>
<!--  -->

<div id='pool_current_results'>
<br><br><br><br><br><br><br><br><br><br>
</div>

<div id='pool_history_results'>
<br><br><br><br><br><br><br><br><br><br>
</div>

</td></tr></table>

<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>

<script>

function page_refresh()
{
    pool_current_refresh();
    pool_history_refresh();
}

function select_algo(algo)
{
    window.location.href = '/site/algo?algo='+algo+'&r=/';
}

////////////////////////////////////////////////////

function pool_current_ready(data)
{
    $('#pool_current_results').html(data);
}

function pool_current_refresh()
{
    var url = "/site/current_results";
    $.get(url, '', pool_current_ready);
}

////////////////////////////////////////////////////

function pool_history_ready(data)
{
    $('#pool_history_results').html(data);
}

function pool_history_refresh()
{
    var url = "/site/history_results";
    $.get(url, '', pool_history_ready);
}

</script>

<script>
function getLastUpdated(){
    var stratum = document.getElementById('drop-stratum');
    var coin = document.getElementById('drop-coin');
    var solo = document.getElementById('drop-solo');
    var rigName = document.getElementById('text-rig-name').value;
    var result = '';

    result += coin.options[coin.selectedIndex].dataset.algo + ' -o stratum+tcp://';
    result += stratum.value + 'pool4u.net:';
    result += coin.options[coin.selectedIndex].dataset.port + ' -u ';
    result += document.getElementById('text-wallet').value;
    if (rigName) result += '.' + rigName;
    result += ' -p c=';
    result += coin.options[coin.selectedIndex].dataset.symbol + solo.value;
    return result;
}
function generate(){
      var result = getLastUpdated()
        document.getElementById('output').innerHTML = result;
}
generate();
</script>

