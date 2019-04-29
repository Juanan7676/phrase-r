<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />

		<style type="text/css">
			
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				/* margin:auto;
				width:500px; */
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#fff;
				color:#000;
                border: 1px solid #000;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#fff;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:140px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				left:155px;
				top:0px;
			}
			
		</style>

</head>

<body class="default"onload="javascript:changeRoute('Index > Training Module > Corpus Search > Advanced Search')" style="background:linear-gradient(to bottom, #ffffff 41%, #66ffff 126%);">

<script>
function changeRoute(msg)
{
	parent.document.getElementById("Route").innerHTML = '<b><font color=\"#d11414\">' + msg + "</font></b>";
}
function newWindow(name,w1,h1,s1) {
	remote = window.open("","remotewin","width="+w1+",height="+h1+",scrollbars="+s1);
	remote.location.href = name;
	if (remote.opener == null)
			remote.opener = window;
	remote.opener.name = "opener";
}
function selectDomain(name,sn) {
	document.getElementById("domain").innerHTML = 'Domain: <b> '+name+'</b>';
    document.getElementById("domv").value = sn;
    document.getElementById("subdomv").value = "";
    document.getElementById("subdomain").innerHTML = 'Subdomain: <b></b>';
    
    if (name=="Engineering,Manufact and Const Technologies")
    {
        document.getElementById("subselect").innerHTML = "<li><a href=\"javascript:change('Aerospace engineering','AEN')\">Aerospace engineering</a></li><li><a href=\"javascript:void(0)\">Energy and fuels ></a><ul style=\"left:173px\"><li><a href=\"javascript:change('Wind Energy','WE')\">Wind Energy</a></li></ul></li><li><a href=\"javascript:change('Marine Engineering','ME')\">Marine Engineering</a></li><li><a href=\"javascript:change('Ocean Engineering','OE')\">Ocean Engineering</a></li><li><a href=\"javascript:change('Robotics','RBT')\">Robotics</a></li><li><a href=\"javascript:change('Naval Engineering','NE')\">Naval Engineering</a></li>"
        //document.getElementById("subselect").style = "left:185px; min-width:150px";
    }
    if(name=="Maritime Navigation")
    {
        document.getElementById("subselect").innerHTML = "<li><a href=\"javascript:change('Maritime Policy and Management','MPM')\">Maritime Policy and Management</a></li><li><a href=\"javascript:change('Shipping and Ports','SHP')\">Shipping and Ports </a></li><li><a href=\"javascript:change('Navigation','NVG')\">Navigation</a></li><li><a href=\"javascript:change('Ship Transportation Science','STS')\">Ship Transportation Science</a></li>";
        console.log("test");
    }
    if (name=="Applied Sciences")
    {
        document.getElementById("subselect").innerHTML = "<li><a href=\"javascript:change('Astronomy and Astrophysics','AA')\">Astronomy and Astrophysics</a></li><li><a href=\"javascript:change('Marine and Fresh Water Biology','MFB')\">Marine and Fresh Water Biology</a></li><li><a href=\"javascript:change('Meteorology and Atmospheric Sciences','MAS')\">Meteorology and Atmospheric Sciences</a></li><li><a href=\"javascript:change('Oceanography','OCE')\">Oceanography</a></li><li><a href=\"javascript:change('Applied Physics','APH')\">Applied Physics</a></li>";
        //document.getElementById("subselect").style = "";
    }
    requestResults();
}
function change(name,sn) {
    document.getElementById("subdomain").innerHTML = 'Subdomain: <b> '+name+'</b>';
    document.getElementById("subdomv").value = sn;
    requestResults();
}
function changeSection(name) {
    document.getElementById("abstract").innerHTML = 'Abstract section: <b> '+name+'</b>';
    document.getElementById("abssecv").value = name;
    requestResults();
}
function requestResults() {
    var domain = document.getElementById("domv").value;
    var subdomain = document.getElementById("subdomv").value;
    var abs = document.getElementById("abssecv").value;
    
    if (subdomain == "") subdomain="ALL"
    
    var http = new XMLHttpRequest();
    var url = 'search_results_advanced.php';
    var params = 'domv='+domain+"&subdomv="+subdomain+"&abs="+abs;
    http.open('POST', url, true);

    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
            document.getElementById("resultados").innerHTML = this.responseText;
        }
    }
    http.send(params);
}
</script>

<form action="search_results_advanced.php" method="post">
<table height="480" width="100%" cellpadding="0" cellspacing="0">
<tr height="40">
<td colspan="3">
<div align="left"><b>Seach filters</b></div>
</td>
</tr>
<tr>
    <td width="25%">&nbsp;</td>
    <td width="25%"></td>
    <td width="50%"></td>
</tr>
<tr height="20"></tr>
<tr height="20">
	<td width="30%" align="left" id="domain">Domain: </td><input id="domv" type="hidden" name="domv"></input>
    <td width="70%" align="left">
    <div id="header" align="left">
    	<ul class="nav">
        	<li><a href="javascript:void(0)">Select...</a>
            	<ul>
                	<li><a href="javascript:void(0)">Scientific-Technical ></a>
                    <ul style="min-width:190px; left:158px">
                    	<li><a href="javascript:selectDomain('Engineering,Manufact and Const Technologies','ENG')">Engineering,Manufact and Const Technologies</a></li>
                        <li><a href="javascript:selectDomain('Maritime Navigation','MRN')">Maritime Navigation</a></li>
                        <li><a href="javascript:selectDomain('Applied Sciences','APS')">Applied Sciences</a></li>
                    </ul>
                    </li>
                    <li><a href="javascript:void(0)">Humanities</a></li>
                    <li><a href="javascript:void(0)">Social Sciences</a></li>
                    <li><a href="javascript:void(0)">Health Sciences</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </td>
</tr>
<tr height="20"><td>&nbsp;</td></tr>
<tr height="20">
    <td width="25%" align="left" id="subdomain">Subdomain: </td><input type="hidden" id="subdomv" name="subdomv"></input>
    <td width="25%" align="left">
        <div id="header" align="left">
            <ul class="nav">
                <li><a href="javascript:void(0)">Select...</a>
                    <ul id="subselect"></ul>
                </li>
            </ul>
        </div>
    </td>
</tr>
<tr height="20"><td>&nbsp;</td></tr>
<tr height="20">
    <td width="25%" align="left" id="abstract">Abstract section: </td><input type="hidden" id="abssecv" name="abssecv"></input>
    <td width="25%" align="left">
        <div id="header" align="left">
            <ul class="nav">
                <li><a href="javascript:void(0)">Select...</a>
                    <ul id="absselect">
                        <li><a href="javascript:changeSection('Introduction')">Introduction</a></li>
                        <li><a href="javascript:changeSection('Background')">Background</a></li>
                        <li><a href="javascript:changeSection('Aim')">Aim</a></li>
                        <li><a href="javascript:changeSection('Aim+Ref')">Aim+Ref</a></li>
                        <li><a href="javascript:changeSection('Aim+Methodology')">Aim+Methodology</a></li>
                        <li><a href="javascript:changeSection('Methodology')">Methodology</a></li>
                        <li><a href="javascript:changeSection('Methodology+Conclusion')">Methodology+Conclusion</a></li>
                        <li><a href="javascript:changeSection('Analysis')">Analysis</a></li>
                        <li><a href="javascript:changeSection('Conclusion')">Conclusion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </td>
</tr>
<tr height="300">
        <td colspan="3" width="100%">
            <div id="resultados" width="100%" height="100%">
        </td>
    </td>
</tr>
</table>
</form>
</body>
</html>
