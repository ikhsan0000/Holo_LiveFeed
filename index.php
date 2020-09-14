<?php
  $curl = curl_init();
  $API_KEY = 'AIzaSyCtCBItVJEK0xFLkX6t_CWbyQ01Ti9RSRo';
  $url = 'https://www.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&id=UCFTLzh12_nrtzqBPsTCqenA&id=UCQ0UDLQCjY0rmuxCDE38FGg&id=UCdn5BQ06XqgXoAxIhbqw5Rg&key=AIzaSyCtCBItVJEK0xFLkX6t_CWbyQ01Ti9RSRo';
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  $result = curl_exec($curl);
  curl_close($curl);

  $result = json_decode($result,true);
  $details = $result['items'];  
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;1,100&display=swap" rel="stylesheet"> 
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css">

    <title>Holo_LiveFeed</title>

    <!-- API KEY: AIzaSyCtCBItVJEK0xFLkX6t_CWbyQ01Ti9RSRo -->
  </head>

  <body>

    
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <div class="container mt-2 mb-2">
            <a class="navbar-brand" href="#">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-broadcast" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.05 3.05a7 7 0 0 0 0 9.9.5.5 0 0 1-.707.707 8 8 0 0 1 0-11.314.5.5 0 0 1 .707.707zm2.122 2.122a4 4 0 0 0 0 5.656.5.5 0 0 1-.708.708 5 5 0 0 1 0-7.072.5.5 0 0 1 .708.708zm5.656-.708a.5.5 0 0 1 .708 0 5 5 0 0 1 0 7.072.5.5 0 1 1-.708-.708 4 4 0 0 0 0-5.656.5.5 0 0 1 0-.708zm2.122-2.12a.5.5 0 0 1 .707 0 8 8 0 0 1 0 11.313.5.5 0 0 1-.707-.707 7 7 0 0 0 0-9.9.5.5 0 0 1 0-.707z"/>
                    <path d="M10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                </svg>  &nbsp;Holo_LiveFeed
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                  Generations
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#">Gen 0</a></li>
                    <li><a class="dropdown-item" href="#">Gen 1</a></li>
                    <li><a class="dropdown-item" href="#">Gen 2</a></li>
                    <li><a class="dropdown-item" href="#">Gamers</a></li>
                    <li><a class="dropdown-item" href="#">Gen 3</a></li>
                    <li><a class="dropdown-item" href="#">Gen 4</a></li>
                    <li><a class="dropdown-item" href="#">Gen 5</a></li>
                    <li><a class="dropdown-item" href="#">Holo CN</a></li>
                    <li><a class="dropdown-item" href="#">Holo ID</a></li>
                    <li><a class="dropdown-item" href="#">Holostars</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section class="text-center container-flex " id="title">
        <h1 class="display-1 ">WELCOME</h1>
      </section>

      <section class="gen-even">
        <div class="container-xxl display-6 pt-5 gen-even">
          <div class="title-line">
            Gen Zero
          </div>
        </div>
        <div class="container-xxl mt-5">
            <div class="row">
                <?php foreach($details as $member) :
                        $ch_ID      = $member['id'];
                        $profilepic = $member['snippet']['thumbnails']['medium']['url'];
                        $chName     = $member['snippet']['title'];
                        $subCount   = $member['statistics']['subscriberCount']; 
                ?>
                <div class="col-sm-3">
                    <div class="card member-even mb-5">
                        <img class="profile mt-5" src="<?=$profilepic ?>">
                        <div class="card-body">
                          <div class="container text-center">
                            <p class="card-title"><?= $chName ?> </p>
                            <p class="card-text">Subscriber: <?= $subCount ?></p>
                            <div class="g-ytsubscribe" data-channelid="<?=$ch_ID; ?>" data-layout="default" data-count="hidden"></div>                        
                          </div>
                        </div>
                    </div>
                  </div>
                <?php endforeach;?>
            </div>
        </div>
      </section>


      <section class="gen-odd">
        <div class="container-xxl display-6 pt-5 gen-odd">
          <div class="title-line">
              Gen One
          </div>
        </div>
        <div class="container-xxl mt-5">
            <div class="row">
            <?php for($i = 0; $i<5 ; $i++): ?>
                <div class="col-sm-3">
                    <div class="card member-odd mb-5">
                        <img class="profile mt-4" src="profile-icon.png">
                        <div class="card-body">
                            <p class="card-title text-center">Name </p>
                            <p class="card-text">Subscriber: 20000000 </p>
                            <div> <a href="#" class="btn btn-danger">Subscribe</a> </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
      </section>

      <section class="gen-even">
        <div class="container-xxl display-6 pt-5 gen-even">
        <div class="title-line">
            Gen Zero
        </div>
        </div>
        <div class="container-xxl mt-5">
            <div class="row">
            <?php for($i = 0; $i<5 ; $i++): ?>
                <div class="col-sm-3">
                    <div class="card member-even mb-5">
                        <img class="profile mt-4" src="profile-icon.png">
                        <div class="card-body">
                            <p class="card-title text-center">Name </p>
                            <p class="card-text">Subscriber: 20000000 </p>
                            <div> <a href="#" class="btn btn-danger">Subscribe</a> </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
      </section>


    
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
    <script type="text/javascript" src="script.js"></script>
  </body>

</html>