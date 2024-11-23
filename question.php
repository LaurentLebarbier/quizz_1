<?php
  $host = 'localhost';
  $dbname = 'quizz';
  $username = 'laurent';
  $password = '12345';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les questions
  $sql = "SELECT * FROM questions";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>

<!DOCTYPE html>
<html>
<head>Afficher la table users</head>
<body>
 <h1>Liste des questions</h1>
 <table>
   <thead>
     <tr>
       <th>ID</th>
       <th>Question_Name</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['id']); ?></td>
       <td><?php echo htmlspecialchars($row['question_name']); ?></td>
       <td><?php echo htmlspecialchars($row['reponses_1']); ?></td>
       <td><?php echo htmlspecialchars($row['reponses_2']); ?></td>
       <td><?php echo htmlspecialchars($row['reponses_3']); ?></td>
       <td><?php echo htmlspecialchars($row['reponses_4']); ?></td>
       <td><?php echo htmlspecialchars($row['reponse_bonne']); ?></td>
       <td><?php echo htmlspecialchars($row['points']); ?></td>





     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>
</body>
</html>