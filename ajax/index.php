<html>
    <head>
        <title>Dynamic Dependent Select Box using jQuery and Ajax</title>
    </head>
    <body>

        

            
            
            
            <form action="?" method="get">
            
            
            <label>Country :</label>


                <select name="country" class="country">

                    <option value="0">Select Country</option>
                    <?php
                    include('db.php');
                    $sql = mysqli_query($con, "SELECT * FROM country");

                    while ($row = mysqli_fetch_array($sql)) {
                        echo '<option value="' . $row['country_id'] . '">' . $row['country_name'] . '</option>';
                    }
                    ?>
                </select>





                <br/><br/>


                <label>City :</label>                        
                <select name="city" class="city">
                    <option value="0">Select city</option>
                </select>


                <br><br>

                <label>sector :</label>                        
                <select name="sector" class="sector">
                    <option value="0">Select Sector</option>
                </select>

                
                <br><br>

                <label>send :</label>   
                <input type="submit" value="send">
            </form> 
        
        
        <p>hola</p>
        
        
       
        
            


            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
            </script>


            <script type="text/javascript">
                $(document).ready(function ()
                {
                    $(".country").change(function ()
                    {
                        
                       // $(".sector").hide(); 
                        
                        var country_id = $(this).val();
                        var post_id = 'id=' + country_id;

                        $.ajax
                                ({
                                    type: "POST",
                                    url: "ajax.php",
                                    data: post_id,
                                    cache: false,
                                    success: function (cities)
                                    {
                                        $(".city").html(cities);
                                    }
                                });

                    });

                    $(".city").change(function ()
                    {
                        var city_id = $(this).val();
                        var post_id = 'id=' + city_id;

                        $.ajax
                                ({
                                    type: "POST",
                                    url: "ajaxc.php",
                                    data: post_id,
                                    cache: false,
                                    success: function (sector)
                                    {
                                        $(".sector").html(sector);
                                    }
                                });

                    });
                });
            </script>
    </body>
</html>