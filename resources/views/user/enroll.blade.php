<!DOCTYPE html>
<html>
  <head><title>Add Subject</title></head>
  <body>
  <h1>Enroll in a course</h1>
<div>
    <form action="{{route('user.enroll')}}" method="post">
        @csrf
        <label for="Student_id">Student ID </label>
        <input type="Integer" name="Student_id" required>
        <label for="Subject_id">Subject ID </label>
        <input type="Integer" name="Subject_id" required>

        <input type ="submit" value="enroll" >
    </form>
</div></body></html>
