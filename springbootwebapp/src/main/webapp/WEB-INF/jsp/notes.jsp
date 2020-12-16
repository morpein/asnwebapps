<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>My Notes</h1>
        <ul>
            <c:forEach var="row" items="${notes}">
                <li>
                    Id: <a href='${row.id}'>${row.id}</a> Title: ${row.title}
                    Message: ${row.text} Hidden: ${row.hidden}
                </li>
            </c:forEach>
        </ul>
        <form:form method="POST" modelAttribute="note">
            <form:input path="title" placename="Title"/>
            <form:input path="text" placename="Text"/> 
            <form:checkbox path="hidden"/>
            <input type="submit" name="Enviar"/>
        </form:form>
        <hr>
        <em>Server: ${hostAddress} </em>
        <em>Container: ${hostName} </em>

    </body>
</html>
