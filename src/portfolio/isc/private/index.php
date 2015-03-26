<?php
session_start();

if(isset($_POST['tick']) && $_POST['tick'] != null) {
    // Turn POSTDATA variable into SESSION variable.
   $_SESSION['tick'] = $_POST['tick'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<title>Imperial Space Corporation (I-S-C)</title>

<meta name="title" content="IMPERIAL SPACE CORPORATION" />

<!-- Site entirely constructed by Chris Keavey -->

<meta name="author" content="Chris Keavey" />

<link rel="stylesheet" href="../style.css" type="text/css" />

<?php
   if ($_SESSION['tick']==1) {
      echo "<base target=\"_blank\">";
   }
?>

</head>

<body style="text-align:center;">

<div style="width:1000px;text-align:center;margin:0 auto;">
<!--##############################-->
<!--#                            #-->
<!--#         Top Banner         #-->
<!--#                            #-->
<!--##############################-->



<table width="1000" border="0" cellpadding="0" cellspacing="0" class="main">
<tr>


<td class="logo">
<img src="../images/corp_logo.jpg" alt="I-S-C LOGO" /><br />
</td>
</tr>
</table>

<div style="z-index:100;width:1000px;height:22px;display:block;position:relative;margin:0 auto;font-family:verdana,arial,helvetica,sans-serif;font-size:10pt;font-weight:normal;color:#fff;">

<span style="float:left;margin:2px 0 0 0;">
<?php
echo date("l jS F Y H:i");
?>
</span>


<form action="" method="post" target="_self">
  <span style="float:right;margin:2px 0 0 0;">
    Open links in a new window
    <?php
      if ($_SESSION['tick']==1) { ?>
        <input type="hidden" value="0" name="tick">
        <input type="image" src="current.png" name="SUBMIT" value="this window">
      <?php } else { ?>
        <input type="hidden" value="1" name="tick">
        <input type="image" src="new.png" name="SUBMIT" value="new window">
     <?php } ?>
  </span>
</form>

</div>

<!--##############################-->
<!--#                            #-->
<!--#         Local Menu         #-->
<!--#                            #-->
<!--##############################-->

<br />
<br />

<table width="1000" border="0" cellpadding="0" cellspacing="0" class="main">    <!-- ###### Whole page table ###### -->
<tr>
<td valign="top">   <!-- ####### Sub Table for local menu ###### -->

<table width="170" class="menuheadback" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="menuheadback">
<p class="menuhead">
THE I-S-C</p>
</td>
</tr>
</table>

<table width="170" class="menuheadback" cellpadding="5" cellspacing="1">
<tr>
<td class="menuback" valign="top">
<p class="menu">
<br />
<a href="#" title="StructureAndPromo.pdf" target="_self">Corporation Structure</a><br />
PDF document showing the corporations organisational structure and promotion policy.<br />
<br />
<a href="#" title="VerbalComms.pdf" target="_self">Verbal Comms</a><br />
PDF document outlining our verbal communications policy.<br />
<br />
<a href="#" title="SectorStructureModel.pdf" target="_self">Sector Structure</a><br />
Sector Organisation Model<br />
<br />
<a href="#" title="Sector1.pdf" target="_self">Sector One</a><br />
Sector One Organisational Model<br />
<br />
</p>
</td>
</tr>
</table>

<br />

<table width="170" class="menuheadback" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="menuheadback">
<p class="menuhead">
Guides</p>
</td>
</tr>
</table>

<table width="170" class="menuheadback" cellpadding="5" cellspacing="1">
<tr>
<td class="menuback" valign="top">
<p class="menu">
<br />
<a href="skills.htm" target="_self">Learning Skills Guide</a><br />
An essential guide for new players about the learning skills.<br />
<br />
<a href="http://www.eve-tanking.com">Eve Tanking Guide</a><br />
This site is an essential read for everyone!<br />
<br />
Special note: Read the <a href="http://www.eve-tanking.com/articles/squadron.html">Squadron Effect</a> page.<br />
<br />
<a href="guide_gangwarp.htm" target="_self">Gang Warping Guide</a><br />
How to get that blob warping together.<br />
<br />
<a href="guide_instas.htm" target="_self">Creating Instas</a><br />
Advice for creating Instas / BM's (Bookmarks).<br />
<br />
<a href="abbreviations.htm" target="_self">Eve-Talk Abbreviations</a><br />
All the abbreviations used in Eve explained.<br />
</p>
</td>
</tr>
</table>

<br />

<table width="170" class="menuheadback" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="menuheadback">
<p class="menuhead">
Eve Characters</p>
</td>
</tr>
</table>

<table width="170" class="menuheadback" cellpadding="0" cellspacing="1">
<tr>
<td id="randomimage">
</td>
</tr>
</table>

<br />

<table width="170" class="menuheadback" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="menuheadback">
<p class="menuhead">
Contact</p>
</td>
</tr>
</table>

<table width="170" class="menuheadback" cellpadding="5" cellspacing="1">
<tr>
<td class="menuback" valign="top">
<p class="menu">
<br />
<a href="#nogo">Webmaster Email</a><br />
Email here regarding this site.<br />
</p>
</td>
</tr>
</table>

</td>      <!-- ####### End of Sub Table for local menu ###### -->


<!--##############################-->
<!--#                            #-->
<!--#    MAIN CENTER SECTION     #-->
<!--#                            #-->
<!--##############################-->


<td>
</td>


<td valign="top" class="main">    <!-- ####### Sub Table for center section ###### -->

<table>
<tr>
<td>
<div style="width:640px;">
<p class="mainhead">
THE I-S-C MANTRA<br />
</p>

<p class="mantra">
THE IMPERIAL SPACE CORPORATION PROMOTES THE POLICY, PRACTICE AND ADVOCACY OF
EXTENDING THE POWER AND DOMINATION OF THE CORPORATION ESPECIALLY BY DIRECT TERRITORIAL
ACQUISITIONS OR BY GAINING INDIRECT CONTROL OVER THE POLITICAL OR ECONOMIC LIFE OF A
FOREIGN NATION; BROADLY; THE EXTENSION OF POWER, AUTHORITY AND INFLUENCE OF I-S-C.<br />
</p>

<hr />
<br />

<embed
src="mediaplayer.swf"
width="352"
height="176"
allowscriptaccess="always"
allowfullscreen="false"
flashvars="width=352&height=176&file=isc_intro.m4v&backcolor=0x000000&frontcolor=0xFFFFFF&lightcolor=0xFFAA00&image=isc_intro.jpg"
/><br />

<br />
<hr />
<br />

<!--##############################-->

<p class="mainhead">
New I-S-C Killboard - May 2006<br />
</p>

<a href="../killboard/">
<img src="../images/killboard.jpg" alt="ISC Killboard" /><br />
I-S-C Killboard</a><br />

<br />
<hr />

<p class="mainhead">
EVE EYE CANDY<br />
</p>

<p class="normal">
Click to open large image in a new window.<br />
</p>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>

<td align="center" valign="top">
<a href="../images/minmattar_dreadnaughts.jpg" onclick="window.open(this.href, 'child', 'resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false"><img src="../images/tn_minmattar_dreadnaughts.jpg" alt="EvE Eye Candy" /></a>
</td>

<td align="center" valign="top">
<a href="../images/gallente_freighters_ii.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_gallente_freighters_ii.jpg" alt="EvE Eye Candy" /></a>
</td>

<td align="center" valign="top">
<a href="../images/gallente_freighters.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_gallente_freighters.jpg" alt="EvE Eye Candy" /></a>
</td>

<td align="center" valign="top">
<a href="../images/amarr_freighters_ii.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_amarr_freighters_ii.jpg" alt="EvE Eye Candy" /></a>
</td>

</tr>
<tr>
<td align="center" valign="top">
<p class="footnote">
Minmatar Dreadnaught<br />
</p>
</td>

<td align="center" valign="top">
<p class="footnote">
Gallente Freighter<br />
</p>
</td>

<td align="center" valign="top">
<p class="footnote">
Gallente Freighter<br />
</p>
</td>

<td align="center" valign="top">
<p class="footnote">
Amarr Freighter<br />
</p>
</td>
</tr>
</table>

<br />
<br />

<!--##############################-->

<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>

<td align="center" valign="top">
<a href="../images/caldari_freighters.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_caldari_freighters.jpg" alt="EvE Eye Candy" /></a>
</td>

<td align="center" valign="top">
<a href="../images/eve_rmr_gallente_mothership.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_eve_rmr_gallente_mothership.jpg" alt="EvE Eye Candy" /></a>
</td>

<td align="center" valign="top">
<a href="../images/eve_rmr_minmatar_mothership.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_eve_rmr_minmatar_mothership.jpg" alt="EvE Eye Candy" /></a>
</td>

<td align="center" valign="top">
<a href="../images/erebus.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_erebus.jpg" alt="EvE Eye Candy" /></a>
</td>
</tr>

<tr>
<td align="center" valign="top">
<p class="footnote">
Caldari Freighter<br />
</p>
</td>

<td align="center" valign="top">
<p class="footnote">
Gallente Mothership<br />
</p>
</td>

<td align="center" valign="top">
<p class="footnote">
Minmatar Mothership<br />
</p>
</td>

<td align="center" valign="top">
<p class="footnote">
Erebus<br />
</p>
</td>
</tr>
</table>

<br />
<hr />
<br />

<!--##############################-->

<p class="mainhead">
EVE SHIP CHARTS<br />
</p>

<p class="note">
Thanks to Malen for posting these charts in the forum.<br />
</p>

<table border="0" width="100%" cellpadding="0" cellspacing="0">
<tr>

<td align="center" valign="top">
<a href="../images/eve_chart-rmr.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_eve_chart-rmr.jpg" alt="EvE Eye Candy" /></a>
</td>

<td align="center" valign="top">
<a href="../images/eveshipsbig.jpg" onclick="window.open(this.href,'child','resizable=yes,scrollbars=yes,menubar=no,toolbar=no,directories=no,location=no,status=no'); return false">
<img src="../images/tn_eveshipsbig.jpg" alt="EvE Eye Candy" /></a>
</td>

</tr>

<tr>
<td align="center" valign="top">
<p class="footnote">
Huge RMR Ships<br />
</p>
</td>

<td align="center" valign="top">
<p class="footnote">
RMR Ships<br />
</p>
</td>

</tr>
</table>

<br />
<br />
<hr />
</div>
</td>
</tr>
</table>

<!--##############################-->

</td>      <!-- ####### End Of Sub Table For Center Section ###### -->


<td>
</td>

<!--##############################-->
<!--#                            #-->
<!--#    End Of Center Section   #-->
<!--#                            #-->
<!--##############################-->


<td valign="top">    <!-- ####### Sub Table For Gaming Menu ###### -->

<table width="170" class="menuheadback" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="menuheadback">
<p class="menuhead">
Forums</p>
</td>
</tr>
</table>

<table width="170" class="menuheadback" cellpadding="5" cellspacing="1">
<tr>
<td class="menuback" valign="top">
<p class="menu">
<br />
<a href="../bb/">I-S-C Forum</a><br />
The Imperial Space Corporations forum.<br />
<br />
<a href="../killboard/">I-S-C Killboard</a> NEW<br />
The Corporations very own Killboard!<br />
<br />
<a href="http://www.gentecplc.com/modules.php?name=Forums">Gentec`s Forum</a><br />
Gentec PLC`s forum.<br />
</p>
</td>
</tr>
</table>

<br />

<table width="170" class="menuheadback" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="menuheadback">
<p class="menuhead">
Affiliates</p>
</td>
</tr>
</table>

<table width="170" class="menuheadback" cellpadding="5" cellspacing="1">
<tr>
<td class="menuback" valign="top">
<p class="menu">
<br />
<a href="http://www.everecruitment.com">Eve Recruitment</a><br />
The I-S-C also operates as a recruitment agency. This is our sister site.<br />
<br />
<a href="http://www.gentecplc.com/">Gentec PLC</a><br />
Friends of I-S-C.<br />
<br />
</p>
</td>
</tr>
</table>

<br />

<table width="170" class="menuheadback" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="menuheadback">
<p class="menuhead">
External Information</p>
</td>
</tr>
</table>

<table width="170" class="menuheadback" cellpadding="5" cellspacing="1">
<tr>
<td class="menuback" valign="top">
<p class="menu">
<br />
<a href="http://www.eve-online.com">Eve-Online</a><br />
Official Eve-Online Site<br />
<br />
<a href="http://www.evegeek.com">Eve Geek</a><br />
Very useful information and tools here.<br />
</p>
</td>
</tr>
</table>

<br />

<table width="170" class="menuheadback" cellpadding="0" cellspacing="0">
<tr>
<td align="center" class="menuheadback">
<p class="menuhead">
Entertainment</p>
</td>
</tr>
</table>

<table width="170" class="menuheadback" cellpadding="5" cellspacing="1">
<tr>
<td class="menuback" valign="top">
<p class="menu">
<br />
<a href="../video/isc_intro.wmv" target="_self">Corp Promo Intro</a><br />
It`s a work in progress but this is Keav`s I-S-C Promotional video introduction.<br />
<br />
<a href="comic.htm" target="_self">I-S-C Comic Strips</a><br />
Stories of the I-S-C!<br />
<br />
<a href="http://myeve.eve-online.com/download/videos/Default.asp?a=download&amp;vid=144"> Eve Never Fades</a><br />
120mb Video<br />
CCP latest Official Eve movie.<br />
<br />
<a href="http://www.eve-files.com/media/0602/eve-advert.wmv">Kali Expansion Advert</a><br />
45mb Video<br />
I don't know if this is a genuine CCP production or just the creation of an extremely good player, well worth the download.<br />
<br />
<a href="http://www.eve-files.com/media/corp/fcon/Thank_You.wmv">Thank You</a><br />
34mb Video<br />
A players tribute to his corporation.<br />
<br />
<a href="http://www.mercenarycoalition.com/videos/dl.asp?m=31">Why We Do It</a><br />
66mb Video<br />
Hi quality &amp; I love the soundtrack.<br />
<br />
<a href="http://www.eve-files.com/media/04/evolution-trailer.wmv">Evolution Trailer</a><br />
26mb Video<br />
What is possible with CGI and co-operation from CCP. Love the pod kill bit :)<br />
<br />
<a href="http://eve.enlightenedfx.com/mov/TEASER.mov">Evolution Teaser</a><br />
30mb Video<br />
A follow on teaser for the above trailer. More CGI Eve :)<br />
<br />
<a href="http://www.mercenarycoalition.com/videos/mc_eggwarmer_ws.wmv">Outpost Being Born</a><br />
63mb Video<br />
Hi quality vid of an impressive set of mega corporation owned RMR ships &amp; a player owned outpost being born.<br />
<br />
<a href="http://www.eve-files.com/media/corp/ryanflint/academy.wmv">Academy of Decadence</a><br />
28mb video<br />
Good vid, lots of PvP action.<br />
<br />
<a href="http://www.eve-files.com/media/corp/verone/Ishukone_Transport.wmv">Ishukone Transport</a><br />
16mb Video<br />
Transport ships <b>CAN</b> be cool! Ishukone promotion vid.<br />
</p>
</td>
</tr>
</table>

</td>
</tr>
</table>

<!--##############################-->
<!--#                            #-->
<!--#     Footer / Copyright     #-->
<!--#                            #-->
<!--##############################-->

<p class="footnote">
All content Copyright &copy; 2006 Imperial Space Corporation.<br />
<br />
</p>

<!--##############################-->
<!--#                            #-->
<!--#         End Of Page        #-->
<!--#                            #-->
<!--##############################-->
</div>

<script type="text/javascript">
var ic = "4";
var side = [ic];
side[0] = "../images/minmatar_babe.jpg";
side[1] = "../images/caldari_babe.jpg";
side[2] = "../images/gallente_babe.jpg";
side[3] = "../images/amarr_dude.jpg";

function pickRandom(range) {
    'use strict';
    if (Math.random) {
        return Math.round(Math.random() * (range - 1));
    }
    var now = new Date();
    return (now.getTime() / 1000) % range;
}

var choice = pickRandom(ic);

/*global document, side, choice: false */
document.getElementById('randomimage').innerHTML = '<img src="' + side[choice] + '" alt="Image" />';
</script>

</body>
</html>

