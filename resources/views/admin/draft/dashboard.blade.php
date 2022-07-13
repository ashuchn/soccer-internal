<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Fantasy League</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="top">

</section>
<section class="top-heading">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Public Leagues ( # )</h1>
        </div>
    </div>
</div>
</section>

<section class="league-name">  
<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <h2>{{ $league[0]->name }}</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum nec ex eget consequat. Donec ut aliquam justo.
        </p>
    </div>
    <div class="col-sm-3">
        <div class="media">
            <h3>{{ $teamCount }}</h3>
            <div class="media-body">
              <h5 class="mt-0">Total</h5>
              <span>Teams</span>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="media">
            <h3>##</h3>
            <div class="media-body">
              <h5 class="mt-0">Total</h5>
              <span>Rounds</span>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="media">
            <h3>##</h3>
            <div class="media-body">
              <h5 class="mt-0">Time</h5>
              <span>Per Pick</span>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="media">
            <h3>##</h3>
            <div class="media-body">
              <h5 class="mt-0">Draft</h5>
              <span>Deadline</span>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary"><a href="{{ route('playDraft', ['leagueId' => $league[0]->id, 'draftId' => $draftId[0]]) }}">Play in the League</a></button>
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Share to a friend</button>
    </div>
  </div>
</div>
</section>
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title text-center">Copy Link</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
            <div class="clipboard">
                <input onclick="copy()" class="copy-input" value='http://127.0.0.1:8000/draft-dashboard/league/<?php echo $league[0]->id ?>' id="copyClipboard" readonly>
                <button class="copy-btn" id="copyButton" onclick="copy()"><i class="fa fa-clipboard" aria-hidden="true"></i>
                </button>
            </div>
            <div id="copied-success" class="copied">
                <span>Copied!</span>
            </div>
        </div>
        
        
      </div>
    </div>
  </div>

</body>
<script>
    function copy() {
  var copyText = document.getElementById("copyClipboard");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
  
  $('#copied-success').fadeIn(800);
  $('#copied-success').fadeOut(800);
}
</script>
</html>
