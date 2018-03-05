<?php
    $backgroundImage = "img/sea.jpg";
    
    // API call goes here
    if(isset($_GET['keyword'])){
        $orientation = "horizontal";
        $keyword = $_GET['keyword'];
        include 'api/pixabayAPI.php';
        if(!empty($_GET['category'])){
            $keyword = $_GET['category'];
        }
        echo "You searched for " . $keyword;
        if(isset($_GET['layout'])){
            $orientation = $_GET['layout'];
        }
        $imageURLs = getImageURLs($keyword, $orientation);
        #print_r($imageURLs);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    function checkCategory($category){
        if($category == $_GET['category']){
            echo " selected";
        }
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        
        <style>
            @import url("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
            @import url("css/styles.css");
            body {
                
                background-image: url(<?=$backgroundImage?>);
                background-size: 100% 100%;
                background-attachment: fixed;
            }
            #carouselExampleIndicators {
                width: 500px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <?php
            if (!isset($_GET['keyword'])) {
              echo "<h2> You must type a keyword or select a category </h2>";
            }  
        ?>
        
        
        <form method="GET">
            <input type="text" size="20" name="keyword" placeholder="Keyword to search for" value="<?=$_GET['keyword']?>"/>
            <div id = 'elementsDiv'>
                <input type="radio" name="layout" value="horizontal" id="hlayout"
                    <?php
                        if($_GET['layout'] == "horizontal"){
                            echo "checked";
                        }
                    
                    ?>
                >
                <label for="hlayout"> Horizontal </label>
                <br />
                <input type="radio" name="layout" value="vertical" id="vlayout" <?=($_GET['layout']=="vertical")?"checked":""?>>
                <label for="vlayout"> Vertical </label>
            </div>
            <br />
            <select id = "category" name="category">
                <option value=""> Select One </option>
                <option value="Sea" <?=checkCategory('sea')?>> Sea </option>
                <option value="Forest" <?=checkCategory('Forest')?>> Forest </option>
                <option value="sky" <?=checkCategory('Sky')?>> Sky </option>
            </select>
            <br /> <br />
            <input type="submit" value="Submit"/>
        </form>
        
        <br/> <br />
        <?php
            if(isset($_GET['keyword'])){
            
        ?>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width:300px">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=$imageURLs[1]?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=$imageURLs[2]?>" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=$imageURLs[3]?>" alt="Fourth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=$imageURLs[4]?>" alt="Fifth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=$imageURLs[5]?>" alt="Sixth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?=$imageURLs[6]?>" alt="Seventh slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                
            </div>
        
        
        
        <?php
            }
        ?>
       
        
        
        <br/> <br />
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>


    