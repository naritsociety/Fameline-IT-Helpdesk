<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Boss Fight Logs</title>
<script type="text/javascript">
function showDiv(divID)
{
	var div = document.getElementById(divID);
	div.style.display = "";
}
 
 
function hideDiv(divID)
{
	var div = document.getElementById(divID);
	div.style.display = "none";
}
 
function hideAllDivs()
{
	var bossList = document.getElementById("bossList");
	for (var i=0; i<=bossList.options.length -1; i++)
	{
		hideDiv(bossList.options[i].value);
	}
}
 
function toggle(showID)
{
	hideAllDivs();
	showDiv(showID);
 
}
</script>
</head>
<body onload="hideAllDivs();">
<table>
   <tbody>
      <tr style="background-position: bottom; background-repeat: repeat-x; background-image: url(http://static.wowstead.com/templates/northrend/goldline.gif)">
      <td class="divheadline" align="left" valign="top" width="40%" height="30">Boss</td>
      <td class="divheadline" align="left" valign="top" width="30%" height="30">Fight Log</td>
      <td class="divheadline" align="left" valign="top" width="30%" height="30">Video</td>
      </tr>
      <tr>
         <td align="left" valign="top" width="40%">
         <select id="bossList" onchange="toggle(this.options[this.options.selectedIndex].value)">
            <option>Select a Boss</option>
            <option value="bos01">Anub'Rekhan</option>
            <option value="bos02">Grand Widow Faerlina</option>
            <option value="bos03">Maexxna</option>
            <option value="bos04">Noth the Plaguebringer</option>
            <option value="bos05">Heigan the Unclean</option>
            <option value="bos06">Loatheb</option>
            <option value="bos07">Instructor Razuvious</option>
            <option value="bos08">Gothik the Harvester</option>
            <option value="bos09">The Four Horsemen</option>
            <option value="bos10">Patchwerk</option>
            <option value="bos11">Grobbulus</option>
            <option value="bos12">Gluth</option>
            <option value="bos13">Thaddius</option>
            <option value="bos14">Sapphiron</option>
            <option value="bos15">Kel'Thuzad</option>
         </select>
			</td>
         <td align="left" valign="top" width="30%">
<!-- Logs -->
         <div id="bos01" style="display: none;">Anub'Rekhan</b></div>
         <div id="bos02" style="display: none;">Grand Widow Faerlina</b></div>
         <div id="bos03" style="display: none;">Maexxna</b></div>
         <div id="bos04" style="display: none;">Noth the Plaguebringer</b></div>
         <div id="bos05" style="display: none;">Heigan the Unclean</b></div>
         <div id="bos06" style="display: none;">Loatheb</b></div>
         <div id="bos07" style="display: none;">Instructor Razuvious</b></div>
         <div id="bos08" style="display: none;">Gothik the Harvester</b></div>
         <div id="bos09" style="display: none;">The Four Horsemen</b></div>
         <div id="bos10" style="display: none;">Patchwerk</b></div>
         <div id="bos11" style="display: none;">Grobbulus</b></div>
         <div id="bos12" style="display: none;">Gluth</b></div>
         <div id="bos13" style="display: none;">Thaddius</b></div>
         <div id="bos14" style="display: none;">Sapphiron</b></div>
         <div id="bos15" style="display: none;">Kel'Thuzad</b></div>
         </td>
         <td align="left" valign="top" width="30%">
<!-- Video -->
         <div id="vid01" style="display: none;">Anub'Rekhan</b></div>
         <div id="vid02" style="display: none;">Grand Widow Faerlina</b></div>
         <div id="vid03" style="display: none;">Maexxna</b></div>
         <div id="vid04" style="display: none;">Noth the Plaguebringer</b></div>
         <div id="vid05" style="display: none;">Heigan the Unclean</b></div>
         <div id="vid06" style="display: none;">Loatheb</b></div>
         <div id="vid07" style="display: none;">Instructor Razuvious</b></div>
         <div id="vid08" style="display: none;">Gothik the Harvester</b></div>
         <div id="vid09" style="display: none;">The Four Horsemen</b></div>
         <div id="vid10" style="display: none;">Patchwerk</b></div>
         <div id="vid11" style="display: none;">Grobbulus</b></div>
         <div id="vid12" style="display: none;">Gluth</b></div>
         <div id="vid13" style="display: none;">Thaddius</b></div>
         <div id="vid14" style="display: none;">Sapphiron</b></div>
         <div id="vid15" style="display: none;">Kel'Thuzad</b></div>
         </td>
      </tr>
   </tbody>
</table>
</body>
</html>
