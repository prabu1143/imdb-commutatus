<?php
include('imdb.php');
include('pulldata.php');
 if(isset($_POST['submit'])) 
            { 
              $movieTitle = strip_tags(trim($_POST['movieSearch']));
              $searchValue='value="'.$movieTitle.'"';
            } else {
              $searchValue = '';
            }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>IMDB Movie Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <!-- Latest compiled and minified CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Movie Search</h1>
		<?php

		 ?>
		 <form class="form-horizontal" name="MovieForm"  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form">
            <div class="form-group">
              <div class="col-sm-12">
              <input type="text" id="movieSearch" name="movieSearch"  class="form-control"  placeholder="Type title here." <?php echo $searchValue;?>>
            </div>
            </div>
              <button type="submit" class="btn btn-default" name="submit"><i class="fa fa-search"></i> Search IMDB</button>
      </form>
        <?php
		 if(isset($_POST['submit'])) 
            { 
                echo '<h3>Results ...</h3>';
                if ( (isset($_POST['movieSearch'])) && (trim($_POST['movieSearch'])<>'') ) {
                  echo searchIMDB($movieTitle);
				  
                } else {
                  echo '<p>Please type a movie name.</p>';
				  }
				 		
               
            } 
			$movieTitle='2017';
			echo '<h3>Recent Movie List Here.. </h3>';
		 echo searchIMDB1($movieTitle); 

        ?>
    </div>

  </body>
</html>
