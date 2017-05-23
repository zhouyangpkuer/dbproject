<!--powers.php
  An example to illustrate loops and arithmetic
-->

<html>
<head> <title> control-statement.php </title>
</head>
<body>
 <table border = "border">
   <caption> square table </caption>
   <tr>
     <th> Number </th>
     <th> Square </th>
   </tr>
 <?php
   $number=1;
   while($number <3)
   {
      $square =pow($number, 2);
      if($number%2 == 0){
         print("<tr align = 'center' bgcolor='ff0000'> 
              <td> $number </td><td> $square</td></tr>");
      }else{
         print("<tr align = 'center' bgcolor='0000ff'> 
              <td> $number </td><td> $square</td></tr>");
      }
      $number ++;
   }
   while($number <6):
      $square = pow($number, 2);
      if($number%2 == 0):
        print("<tr align = 'center' bgcolor='ff0000'> 
                <td> $number </td><td> $square</td></tr>");
      else :
        print("<tr align = 'center' bgcolor='0000ff'> 
                <td> $number </td><td> $square</td></tr>");
      endif;
      $number ++;
   endwhile;
   for($number = 6; $number <=10; $number++)
   {
      $square = pow($number, 2);
      if($number%2 == 0){
        print("<tr align = 'center' bgcolor='ff0000'> 
                <td> $number </td><td> $square</td></tr>");
      } else {
        print("<tr align = 'center' bgcolor='0000ff'> 

                <td> $number </td><td> $square</td></tr>");
      }
   }
?>
</table>
</body>
</html>
