<%@ language="vbscript" %>
<html>
<body>

<center>
<font face="times new roman" size=5>
<br>
<br>
<br>
THANK YOU<br>
<br>
<br>
<font size=3>
Information Processed.<br>

<%
filename=server.mappath("/alpha/classified/") & "\main.htm"

set fso = server.createobject("scripting.filesystemobject")
set file = fso.opentextfile(filename, 8, true)

file.writeline "<br>"
file.writeline "Posted On Site : " & now & "<br>"
file.writeline "<br>"

file.writeline "<table width=60% cellspacing=0 cellpadding=0 border=0>"

file.writeline "<tr>"
file.writeline "<td width=35% align=right valign=top>"
file.writeline "<b>Company Name :</b>"
file.writeline "</td>"
file.writeline "<td width=5% align=middle>"
file.writeline "</td>"
file.writeline "<td align=left valign=top>"
file.writeline request.form("company")
file.writeline "</td>"
file.writeline "</tr>"

file.writeline "<tr>"
file.writeline "<td align=right valign=top>"
file.writeline "<b>Contact Name :</b>"
file.writeline "</td>"
file.writeline "<td>"
file.writeline "</td>"
file.writeline "<td align=left valign=top>"
file.writeline request.form("name")
file.writeline "</td>"
file.writeline "</tr>"

file.writeline "<tr>"
file.writeline "<td align=right valign=top>"
file.writeline "<b>Position In Company :</b>"
file.writeline "</td>"
file.writeline "<td>"
file.writeline "</td>"
file.writeline "<td align=left valign=top>"
file.writeline request.form("position")
file.writeline "</td>"
file.writeline "</tr>"

file.writeline "<tr>"
file.writeline "<td align=right valign=top>"
file.writeline "<b>Email Address :</b>"
file.writeline "</td>"
file.writeline "<td>"
file.writeline "</td>"
file.writeline "<td align=left valign=top>"
file.writeline request.form("email")
file.writeline "</td>"
file.writeline "</tr>"

file.writeline "<tr>"
file.writeline "<td align=right valign=top>"
file.writeline "<b>Contact Telephone Number :</b>"
file.writeline "</td>"
file.writeline "<td>"
file.writeline "</td>"
file.writeline "<td align=left valign=top>"
file.writeline request.form("phone")
file.writeline "</td>"
file.writeline "</tr>"

file.writeline "<tr>"
file.writeline "<td align=right valign=top>"
file.writeline "<b>Details :</b>"
file.writeline "</td>"
file.writeline "<td>"
file.writeline "</td>"
file.writeline "<td align=left valign=top>"
file.writeline request.form("info")
file.writeline "</td>"
file.writeline "</tr>"
file.writeline "</table>"
file.writeline

file.writeline "<br>"
file.writeline "<hr>"

file.close
set file=nothing
set fso=nothing

%>

</body>
</html>