<!DOCTYPE html>
<html>
<head><title> Subjects</title></head>
<body>
<div>
    <h1>Subjects</h1>
    <table border="1" >
        <tr>
            <td>ID</td>
            <td>Subject_name</td>
            <td>Credit_Hours</td>

        </tr>
        @foreach($subjects as $sbj)
            <tr>
                <td>{{$sbj['id']}}</td>
                <td>{{$sbj['Subject_name']}}</td>
                <td>{{$sbj['Credit_Hours']}}</td>

            </tr>
        @endforeach
    </table>
</div></body></html>

