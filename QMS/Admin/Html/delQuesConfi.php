<?php
  include "session.php";
?>

<?php
    $id = $_GET['id'];
    echo $id;
    echo "
        <script>
            var result = confirm('Are you sure you want to delete this data?');
            if (result) {
                // If user confirms, redirect to the delete URL
                window.location.href = 'delQuesQuery.php?id=$id';
            }   
            else{
                window.location.href = 'getDelQzId.php?id=$id';
            }
        </script>
    ";
?>