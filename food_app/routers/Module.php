<?php


   class Module {

      function itemName($par,$con){
         
         $sql = mysqli_query($con, "SELECT name FROM items where id =".$par);
         $row = mysqli_fetch_array($sql);
         return $row['name'];
      }

      function waiterName($par,$con){
         
         $sql = mysqli_query($con, "SELECT name FROM waiters where working is true and id =".$par);
         $row = mysqli_fetch_array($sql);
         return $row['name'];
      }
      

   }
?>