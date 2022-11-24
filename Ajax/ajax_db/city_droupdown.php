<?php

require './connection/connection.php';

?>
<html>
    <head>
        <script>
           function getXMLHTTP (){
                var xmlhttp = false;
                try{
                    xmlhttp = new XMLHttpRequest();
                }
                catch(e){
                    try{
                        xmlhttp = new ActiveXObject ("Microsoft.XMLHTTP");
                    }
                    catch(e){
                        try{
                            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                        }
                        catch(e1){
                            xmlhttp = false;
                        }
                    }
                }
                return xmlhttp;
           }

           function getsubcat(strURL) {

            var req = getXMLHTTP();
            if(req){
                req.onreadystatechange = function (){

                    if(req.readyState == 4){
                        if(req.status == 200){
                            document.getElementById('subdiv').innerHTML=req.responseText;
                        }else{
                            alert("There was a Problem while using XMLHTTP:\n");
                        }
                    }

                }
                req.open("GET",strURL,true);
                req.send(null);
            }

           }

        </script>
    </head>
    <body>
        <h1>State City Ajax</h1>
        <form>
            State : <select name="state" onchange="getsubcat('ajax-get-city.php?state='+this.value)">
                <?php

                    $q = mysqli_query($connection, "select * from tbl_state");

                    echo "<option>Select State</option>";
                    while($data = mysqli_fetch_array($q)){

                        echo "<option value='{$data['stateid']}'>{$data['statename']}</option>";
        
                    }


                ?>
            </select>
            <br>

            <div id="subdiv">
                City : <select>
                    <option>Select</option>
                </select>
            </div>

        </form>
    </body>

</html>