<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>My Notes</h1>
		<h2>Note detail</h2>
			<p>Id: ${note.id}</p>
			<p>Title: ${note.title}</p>
			<p>Message:  ${note.text}</p>
			<p>Hidden:   ${note.hidden}</p>
        <hr>
        <em>Server: ${hostAddress} </em>
        <em>Container: ${hostName} </em>

    </body>
</html>
