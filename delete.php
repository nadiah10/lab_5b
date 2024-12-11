 // DELETE a user by matric
 public function deleteUser($matric)
 {
 $sql = "DELETE FROM users WHERE matric = ?";
 $stmt = $this->conn->prepare($sql);
 if ($stmt) {
 $stmt->bind_param("s", $matric);
 $result = $stmt->execute();
 if ($result) {
 return true;
 } else {
 return "Error: " . $stmt->error;
 }
 $stmt->close();
 } else {
 return "Error: " . $this->conn->error;
 }
 }
}
