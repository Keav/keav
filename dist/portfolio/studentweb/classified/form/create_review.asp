<%@ language="vbscript" %>
<html>
<body>

<center>
<font face=times new roman" size=5>
<br>
<br>
<br>
THANK YOU<br>
<br>
<br>
<font size=3>
Your form will be reviewed & if successful will be posted to the site within 48 hours.<br>

<br>
<br>

<%
company=request.form("company")
name=request.form("name")
position=request.form("position")
email=request.form("email")
phone=request.form("phone")
info=request.form("info")

filename=server.mappath("/alpha/classified/review/") & "\review.htm"

set fso = server.createobject("scripting.filesystemobject")
set file = fso.opentextfile(filename, 8, true)

file.writeline "<br>"

file.writeline "<form method='post' action='create_classified.asp'>"

file.writeline "<br>"
file.writeline "Form Submitted : " & now

file.writeline "<br>"
file.writeline "<br>"

file.writeline "<input type='text' name='company' size='40' maxlength='40' value='" & company & "'>"

file.writeline "<br>"

file.writeline "<input type='text' name='name' size='40' maxlength='40' value='" & name & "'>"

file.writeline "<br>"

file.writeline "<input type='text' name='position' size='40' maxlength='40' value='" & position & "'>"

file.writeline "<br>"

file.writeline "<input type='text' name='email' size='40' maxlength='40' value='" & email & "'>"

file.writeline "<br>"

file.writeline "<input type='text' name='phone' size='40' maxlength='40' value='" & phone & "'>"

file.writeline "<br>"

file.writeline "<textarea rows='4' name='info' cols='50' wrap='physical' maxlength='10'>"
file.writeline info
file.writeline "</textarea>"

file.writeline "<br>"
file.writeline "<br>"

file.writeline "Please indicate a pass or fail."
file.writeline "<br>"
file.writeline "<br>"
file.writeline "Passed <input type='checkbox' name='passed'> Failed <input type='checkbox' name='failed'>"

file.writeline "<br>"
file.writeline "<br>"

file.writeline "<input type='submit'>"

file.writeline "</form>"

file.writeline "<br>"
file.writeline "<hr>"

file.close
set file=nothing
set fso=nothing
%>

</body>
</html>