<%
' connection string for the web joblist database

dim dbasepath
dim provider

dbasepath = "" & server.mappath("db/shoutdb.mdb") & ""
provider = "Microsoft.Jet.OLEDB.4.0"

%>