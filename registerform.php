<!DOCTYPE html>
<html lang="en">
<form action="insert.php" method="post">
   <label for="matric"> Matric:</label>
   <input type="text" name="matric" id="matric" required><br>
   
   <label for="name"> Name:</label>
   <input type="text" name="name" id="name" required><br>

   <label for="password"> Password:</label>
   <input type="password" name="password" id="password" required><br>

   <label for="accessLevel">Role:</label>
   <select name="accessLevel" id="accessLevel" required>
   
   <option value="">Please select</option>
   <option value="lecturer">Lecturer</option>
   <option value="student">Student</option>
   </select><br>
   <input type="submit" name="submit" value=”Register">
  </form>
</html>
