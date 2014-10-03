<!DOCTYPE html>
<html lang="en">
<head>

<!--Ajax manejador de pistas-->
<script>
function showHint(str) {
    if (str.length==0) {
        document.getElementById("txtHint").innerHTML="";
        return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","../views/gethint.php?q="+str,true);
    xmlhttp.send();
}
</script>


    <link rel="stylesheet" type="text/css" href="../assets/css/css.css">
        <title>
            Compilador de Java
        </title>
    <style>
        body{
            margin-left: 100px;
            margin-top: 50px;
        }
        
        .box{
            border:2px solid black;
            margin-right:20px;
            float:center;
        }

        #box-1 {
            width:670px;
            height:370px;

        }

        #box-2 {
            width:670px;
        }

        button, .button {
            display: inline-block;
            *display: inline;
            line-height: normal;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            margin: 5px 0;
            outline: none;
            color: white;
            vertical-align: middle;
            position: relative;
            background-color: #2e323e;
            border: 1px solid #23262f;
            padding: 0.25rem 0.8125rem;
            font-size: 0.875rem;
            padding: 0.25rem 0.8125rem;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <a href="../" class="button">Proyecto final</a>
    <div>
        <h1>Web compiler for Java</h1>
        <div>
            <div class="box" id="box-1">
                <form action="../controllers/compilaPrograma.php" method="post" accept-charset="utf-8">
                    <textarea name="source_code" id="source_code" rows="20" cols="80"></textarea>
                    <input type="text" onkeyup="showHint(this.value)" name="params" id="params" value="" placeholder="Datos de entrada" />
                    <input type="submit" value="Compilar">
                    </form>
                    <p>Suggestions: <span id="txtHint"></span></p>
            </div>
        </div>
        <div class="sub-content-wrapper">
            <h1>Salida</h1>
            <div class="box" id="box-2">
                <?php
                    if(isset($_SESSION['output'])){
                        $output = $_SESSION['output'];

                    }
                    else{
                      $output = null;
                    }
                    if (isset($_SESSION['error'])) {
                        $error = $_SESSION['error'];
                    } 
                    else{
                      $error = null;
                    }
                    
                    if($output != null){
                        foreach($output as &$value){
                            echo "<p>" . $value . "</p>";
                        }
                    }
                    if($error != null){
                        echo "<p>" . $error . "</p>";
                    }
                ?>
            </div>
        </div> 
    </div>
</body>
</html>