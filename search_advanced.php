<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
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
function change(name) {
	document.getElementById("domain").innerHTML = 'Domain: <b> '+name+'</b>';
}
</script>

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
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#434343;
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
<table height="480" width="100%" cellpadding="0" cellspacing="0">
<tr height="40">
<td colspan="2">
<div align="center"><b>Select domain and subdomain</b></div>
</td>
</tr>
<tr height="40"></tr>
<tr height="20">
	<td width="30%" align="left" id="domain">Domain: </td>
    <td width="70%" align="left">
    <div id="header" align="left">
    	<ul class="nav">
        	<li><a href="javascript:void(0)">Select...</a>
            	<ul>
                	<li><a href="javascript:void(0)">Scientific-Technical ></a>
                    <ul style="min-width:190px">
                    	<li><a href="javascript:void(0)">Engineering,Manufact and Const Technologies ></a>
                        	<ul style="left:185px; min-width:150px">
                            	<li><a href="javascript:change('Aerospace engineering')">Aerospace engineering</a></li>
                                <li><a href="javascript:void(0)">Energy and fuels ></a>
                                	<ul style="left:150px">
                                    	<li><a href="javascript:change('Wind Energy')">Wind Energy</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:change('Marine Engineering Technology')">Maritime Engineering Technology</a></li>
                                <li><a href="javascript:change('Ocean Engineering')">Ocean Engineering</a></li>
                                <li><a href="javascript:change('Robotics')">Robotics</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Marine navigation ></a>
                        	<ul style="left:185px; min-width:150px">
                            	<li><a href="javascript:void(0)">Shipping ></a>
                                	<ul style="left:150px">
                                    	<li><a href="javascript:change('Maritime Policy and Management')">Maritime Policy and Management</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Shipping and Port ></a>
                                	<ul style="left:150px">
                                    	<li><a href="javascript:change('Navigation and Port')">Navigation and Port</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:change('Navigation')">Navigation</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Applied Sciences ></a>
                        	<ul>
                            	<li><a href="javascript:change('Transportation Science and Technology')">Transportation Science and Technology</a></li>
                                <li><a href="javascript:void(0)">Marine and Fresh Water Biology ></a>
                                	<ul style="left:140px">
                                    	<li><a href="javascript:change('Marine Pollution')">Marine Pollution</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Meteorology and Atmospheric Sciences ></a>
                                	<ul style="left:140px">
                                    	<li><a href="javascript:change('Weather and Forecasting')">Weather and Forecasting</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Oceanography ></a>
                                	<ul style="left:140px">
                                    	<li><a href="javascript:change('Marine Science')">Marine Science</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Applied Physics ></a>
                                	<ul style="left:140px;top:-50px;">
                                    	<li><a href="javascript:change('Advanced Materials')">Advanced Materials</a></li>
                                        <li><a href="javascript:change('Robotics')">Robotics</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    </li>
                    <li><a href="javascript:void(0)">Humanities</a></li>
                    <li><a href="javascript:void(0)">Social Sciences</a></li>
                </ul>
            </li>
        </ul>
    </div>
    </td>
</tr>
<tr height="380"></tr>
</table>
</body>
</html>
