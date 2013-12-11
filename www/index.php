<html>

<?php
// open the appropriate translation file
define('LANGUAGE_ENV_VAR',"hr_language");
define("LANG_SPA","spa");
define("LANG_ENG","eng");

$config = array();
$config['language'] = LANG_ENG;
$envLang = getenv('hr_language');
if($envLang){
	$config['language'] = $envLang;
}

$file = 'locale/'.$config['language'].'/LC_MESSAGES/default.po';
$t = array();	// array of translation strings, keyed by string name
$po = file($file);
$current = null;
foreach ($po as $line) {
    if (substr($line,0,5) == 'msgid') {
        $current = trim(substr(trim(substr($line,5)),1,-1));
    }
    if (substr($line,0,6) == 'msgstr') {
        $t[$current] = trim(substr(trim(substr($line,6)),1,-1));
    }
}
?>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title><?=$t['title']?></title>

	<link href="http://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet" type="text/css">
	<link  href="http://fonts.googleapis.com/css?family=Crimson+Text:regular" rel="stylesheet" type="text/css" >

	<link href="css/heroreports-home.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="js/jquery-1.5.min.js"></script>
	<script type="text/javascript" src="js/openlayers/OpenLayers.js"></script>
	<script type="text/javascript" src="js/cloudmade.js"></script>
	<script type="text/javascript" src="js/heroreports-home.js"></script>

	<!-- google analytics -->
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-20452665-1']);
	  _gaq.push(['_setDomainName', '.heroreports.org']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>

</head>

<body>

<div id="hr-page">

<h1><?=$t['title']?></h1>

<h3><?=$t['summary']?></h3>

<div class="hr-live-cities">
	<h2><?=$t['partner_cities']?></h2>
	<ul>
		<li class="hr-odd"><a href="http://juarez.cronicasdeheroes.mx">Juárez, México</a></li>
		<li class="hr-even"><a href="http://www.heroreports.kz">Kazakhstan</a></li>
		<li class="hr-odd"><a href="http://mty.cronicasdeheroes.mx">Monterrey, México</a></li>
		<li class="hr-even"><a href="http://tj-sd.cronicasdeheroes.mx">Tijuana, México - San Diego, USA</a></li>
	</ul>
</div>

<div id="hr-map">
</div>

<div class="hr-prospective-cities">
	<h2><?=$t['prospective_cities']?></h2>
	<p><?=$t['prospective_involvement']?></p>
<!--	<ul>
		<li><a href="http://newyork.heroreports.org/">New York, USA</a></li>
		<li><a href="http://boston.heroreports.org/">Boston, USA</a></li>
		<li><a href="http://detroit.heroreports.org/">Detroit, USA</a></li>
	</ul> -->
</div>

<p class="hr-footer">
<a href="http://civic.mit.edu">MIT Center for Civic Media</a>
</p>

</div>

<script type="text/javascript">
$(createWorldHeroReportsMap);
</script>

</body>

</html>
