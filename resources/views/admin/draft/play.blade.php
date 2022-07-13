<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
  <link rel="stylesheet" href="{{ url('css/responsive.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel='stylesheet' href='https://rawgit.com/tempusdominus/bootstrap-4/master/build/css/tempusdominus-bootstrap-4.css'>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<section class="top">

</section>
<section class="top-heading Draft-room">
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Draft room</h1>
        </div>
    </div>
</div>
</section>

<section class="league-name-box">  
<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12">
            <h2>{{ $league[0]->leagueName }}</h2>
            <span><span class="round"></span> Teams</span>
            <span><span class="round">(0)</span> Rounds</span>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-12 text-right">
            <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModalshare">Share</button> -->
            <a href="{{ route('start-draft', ['draftId' => $draftId , 'leagueId' => $league[0]->id ]) }}">
              <button type="button" class="btn btn-outline-primary">Start</button>
            </a>
            
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="input-group date timepicker1" id="start_dt_1" data-target-input="nearest">
                <h3>Time per pick</h3>
                <input type="text" class="form-control datetimepicker-input datetimepicker" data-target="#start_dt_1" name="start_time[]" placeholder="00:00"/>
                <span class="input-group-addon" data-target="#start_dt_1" data-toggle="datetimepicker">
                <span class="fa fa-calendar"></span>
            </span>
            </div>
        </div>
    </div>
</div>
</section>





<section class="draft-board">
  <div class="container">
    <div class="row">

    <div class="col-lg-12">

@foreach($draft_list as $key => $orderDetails)

  <div class="draft-team-name">
    <p><?php $result = DB::table('teams')->where('id',$orderDetails->team_id)->get();
    
  echo  $result[0]->teamName;
  //;exit()
           ?></p>
  </div>
  @endforeach	

 

</div>
	  

        
        
	  
      <div class="col-lg-12">

        @foreach($draft_player as $key => $orderDetails)
          <div class="draft-box">
            <h4><?php
            $result = DB::table('players')->where('id',$orderDetails->playerId)->get();
            echo  $result[0]->playerName; ?></h4>
            <p><?php echo  $result[0]->position; ?> <span><?php echo  $result[0]->score; ?></span></p>
            
          </div>

        @endforeach	

      </div>
	  
	  
    </div>
  </div>
</section>



<!-- <section class="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="team-name">
                    <h4><img src="image/circle-img.png" alt=""> Team Name</h4>
                </div>
                <div class="selected-player">
                    <p>Selected Players (#)</p>
                    <h4 data-toggle="modal" data-target="#myModal"><img src="image/circle-img.png" alt=""> Player - 1 </h4>
                    <h4 data-toggle="modal" data-target="#myModal"><img src="image/circle-img.png" alt=""> Player - 2 </h4>
                    <h4 data-toggle="modal" data-target="#myModal"><img src="image/circle-img.png" alt=""> Player - 3 </h4>
                    <h4 data-toggle="modal" data-target="#myModal"><img src="image/circle-img.png" alt=""> Player - 4 </h4>
                    <h4 data-toggle="modal" data-target="#myModal"><img src="image/circle-img.png" alt=""> Player - 5 </h4>
                    <h4 data-toggle="modal" data-target="#myModal"><img src="image/circle-img.png" alt=""> Player - 6 </h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="team-name">
                    <h4><img src="image/circle-img.png" alt=""><img src="" alt=""> Team Name</h4>
                </div>
                <div class="selected-player">
                    <p>Selected Players (#)</p>
                    <h4><img src="image/circle-img.png" alt=""> Player - 1 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 2 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 3 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 4 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 5 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 6 </h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="team-name">
                    <h4><img src="image/circle-img.png" alt=""><img src="" alt=""> Team Name</h4>
                    <div class="input-group date timepicker1" id="start_dt_2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input datetimepicker" data-target="#start_dt_2" name="start_time[]" placeholder="00:00" />
                        <span class="input-group-addon" data-target="#start_dt_2" data-toggle="datetimepicker">
                        <span class="fa fa-calendar"></span>
                    </span>
                    </div>
                </div>
                <div class="selected-player">
                    <p>Selected Players (#)</p>
                    <h4><img src="image/circle-img.png" alt=""> Player - 1 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 2 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 3 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 4 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 5 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 6 </h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="team-name">
                    <h4><img src="image/circle-img.png" alt=""><img src="" alt=""> Team Name</h4>
                </div>
                <div class="selected-player">
                    <p>Selected Players (#)</p>
                    <h4><img src="image/circle-img.png" alt=""> Player - 1 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 2 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 3 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 4 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 5 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 6 </h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-12">
                <div class="team-name">
                    <h4><img src="image/circle-img.png" alt=""><img src="" alt=""> Team Name</h4>
                </div>
                <div class="selected-player">
                    <p>Selected Players (#)</p>
                    <h4><img src="image/circle-img.png" alt=""> Player - 1 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 2 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 3 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 4 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 5 </h4>
                    <h4><img src="image/circle-img.png" alt=""> Player - 6 </h4>
                </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
        </div>
    </div>
</section> -->

      <?php $result = DB::table('draft_league')->where('user_id', session('userId'))->where('draft_id',$draftId)->get();
      $choose_status =  $result[0]->choose_status;
      $active_status =  $result[0]->active_status;
      ?>  

<?php $result2 = DB::table('draft_league')->where('user_id', session('userId'))->where('league_id',$league[0]->id)->orderBy('id','asc')->limit(1)->get();
      if($choose_id =  $result2[0]->id)
      // // $choose_id =  $result2[0]->id;
      // echo $result2;
      ?>  

<section class="all-player" style="display:<?php if($choose_status == $active_status ){echo 'none';}else{echo 'block';} ?>">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="all-player-box">
                <ul>
                    <li>All Players</li>
                    <li>Player Watchlist</li>
                    <li>Waiver Request <span>(0)</span></li>
                </ul>
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Sr.No</th>
                          <th>Name</th>
                          <th>Rating</th>
                          <th>Position</th>
                          <th>Age</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; ?>
                        @foreach($players as $rows)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $rows->playerName }}</td>
                                <td>{{ $rows->score }}</td>
                                <td>{{ $rows->position }}</td>
                                <td>{{ $rows->age }}</td>
                                    @if($rows->active == 1)
                                        <td><button type="button" class="btn btn-outline-primary" disabled>Picked</button></td>
                                    @else
                                        <td>
                                            <a href="{{ route('addPlayerToDraft', ['leagueId' => $league[0]->id, 'playerId'=>$rows->id, 'draftId' => $draftId ]) }}">
                                                <button type="button" class="btn btn-outline-primary">Unpicked</button>
                                            </a>
                                        </td>
                                    @endif    
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="all-box">
                    <p></p>
                    <div class="selected-player">
                        <p>Goal Keepers</p>
                            {{--@forelse($goalkeeper as $goal)
                                <h4><img src="{{ url('image/circle-img.png') }}" alt="">{{ $goal->playerName }}</h4>
                                @empty
                                <h4>No Goalkeepers</h4>
                            @endforelse --}}
                       
                    </div>
                    <div class="selected-player">
                        <p>Midfielders</p>
                        {{--@forelse($midfielder as $mid)
                                <h4><img src="{{ url('image/circle-img.png') }}" alt="">{{ $mid->playerName }}</h4>
                                @empty
                                <h4>No Midfielders</h4>
                            @endforelse --}}
                    </div>
                    <div class="selected-player">
                        <p>Defenders</p>
                        {{--  @forelse($defender as $dev)
                                <h4><img src="{{ url('image/circle-img.png') }}" alt="">{{ $dev->playerName }}</h4>
                                @empty
                                <h4>No Defenders</h4>
                            @endforelse--}}
                    </div>
                    <div class="selected-player">
                        <p>Forward</p>
                        {{--    @forelse($forward as $for)
                                <h4><img src="{{ url('image/circle-img.png') }}" alt="">{{ $for->playerName }}</h4>
                                @empty
                                <h4>No Forwards</h4>
                            @endforelse--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  <!-- The Modal -->
  <div class="modal fade" id="myModalshare">
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
                <input onclick="copy()" class="copy-input" value="https://www.bugra.work" id="copyClipboard" readonly>
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
  <!-- The Modal -->
  <div class="modal fade dashboard-modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
           <img src="image/player-img.png" alt="">
           <h5>John</h5>
           <div class="other-detail">
            
                <ul>
                  <li>Role : <span>Owner</span></li>
                  <li>Position : <span>Goal Keepers</span></li>
                  <li>Weight : <span>50</span></li>
                </ul>
         
           </div>
        </div>
        
        
      </div>
    </div>
  </div>
  <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js'></script>
  <script src='https://cdn.jsdelivr.net/momentjs/2.18.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js'></script>
</body>
<script>
  (function( $ ) {
$.fn.timer = function( callback ) {
	callback = callback || function() {};
	return this.each(function() {
		var $timer = $( this ),
			$minutesEl = $timer.find( '.minutes' ),
			$secondsEl = $timer.find( '.seconds' ),
			interval = 1000,
			timer = null,
			start = 60,
			minutesText = $minutesEl.text(),
			minutes = ( minutesText[0] == '0' ) ? minutesText[1] : minutesText[0],
			m = Number( minutes );
			
			timer = setInterval(function() {
				start--;
				if( start == 0 ) {
					start = 60;
					
					$secondsEl.text( '00' );
					
					m--;
					
					if( m == 0 ) {
						clearInterval( timer );
						$minutesEl.text( '00' );
						callback();
						
					}
				} else {
				
					if( start >= 10 ) {
				
						$secondsEl.text( start.toString() );
				
					} else {
				
						$secondsEl.text( '0' + start.toString() );
					
				
					}
					if( minutes.length == 2 ) {
						$minutesEl.text( m.toString() );
					} else {
						if( m == 1 ) {
							$minutesEl.text( '00' );	
						} else {
							$minutesEl.text( '0' + m.toString() );
						}
					}
				
				}
			
			}, interval);
	
	});

};

$(function() {
	$( '.timer' ).timer(function() {
		document.getElementById( 'timer-beep' ).play();
	});

});
  
})( jQuery );
</script>
<script>
    $(document).ready(function() {
  var buttonAdd = $("#add-button");
  var buttonRemove = $("#remove-button");
  var className = ".dynamic-field";
  var count = 0;
  var field = "";
  var maxFields = 5;

  function initDT() {
    $('.timepicker1').datetimepicker({
      format: 'LT'
    });
  };
  
  function totalFields() {
    return $(className).length;
  }

  function addNewField() {
    count = totalFields() + 1;
    field = $("#dynamic-field-1").clone();
    field.attr("id", "dynamic-field-" + count);
    field.children("label").text("Field " + count);
    
    field.find("input").val("");
    field.find("#start_dt_1").attr("id", "start_dt_" + count);
    field.find("input[name^='start_time']").attr("data-target", "#start_dt_" + count);
    field.find("span[data-target^='#start']").attr("data-target", "#start_dt_" + count);

    field.find("#end_dt_1").val("");
    field.find("#end_dt_1").attr("id", "end_dt_" + count);
    field.find("input[name^='end_time']").attr("data-target", "#end_dt_" + count);
    field.find("span[data-target^='#end']").attr("data-target", "#end_dt_" + count);
  
    $(className + ":last").after($(field));

    initDT();
  }

  function removeLastField() {
    if (totalFields() > 1) {
      $(className + ":last").remove();
    }
  }

  function enableButtonRemove() {
    if (totalFields() === 2) {
      buttonRemove.removeAttr("disabled");
      buttonRemove.addClass("shadow-sm");
    }
  }

  function disableButtonRemove() {
    if (totalFields() === 1) {
      buttonRemove.attr("disabled", "disabled");
      buttonRemove.removeClass("shadow-sm");
    }
  }

  function disableButtonAdd() {
    if (totalFields() === maxFields) {
      buttonAdd.attr("disabled", "disabled");
      buttonAdd.removeClass("shadow-sm");
    }
  }

  function enableButtonAdd() {
    if (totalFields() === (maxFields - 1)) {
      buttonAdd.removeAttr("disabled");
      buttonAdd.addClass("shadow-sm");
    }
  }

  buttonAdd.click(function() {
    addNewField();
    enableButtonRemove();
    disableButtonAdd();
  });

  buttonRemove.click(function() {
    removeLastField();
    disableButtonRemove();
    enableButtonAdd();
  });
  
  initDT();
});
</script>


<script>
    $(document).ready(function() {
  var buttonAdd = $("#add-button");
  var buttonRemove = $("#remove-button");
  var className = ".dynamic-field";
  var count = 0;
  var field = "";
  var maxFields = 5;

  function initDT() {
    $('.timepicker1').datetimepicker({
      format: 'LT'
    });
  };
  
  function totalFields() {
    return $(className).length;
  }

  function addNewField() {
    count = totalFields() + 1;
    field = $("#dynamic-field-1").clone();
    field.attr("id", "dynamic-field-" + count);
    field.children("label").text("Field " + count);
    
    field.find("input").val("");
    field.find("#start_dt_2").attr("id", "start_dt_" + count);
    field.find("input[name^='start_time']").attr("data-target", "#start_dt_" + count);
    field.find("span[data-target^='#start']").attr("data-target", "#start_dt_" + count);

    field.find("#end_dt_1").val("");
    field.find("#end_dt_1").attr("id", "end_dt_" + count);
    field.find("input[name^='end_time']").attr("data-target", "#end_dt_" + count);
    field.find("span[data-target^='#end']").attr("data-target", "#end_dt_" + count);
  
    $(className + ":last").after($(field));

    initDT();
  }

  function removeLastField() {
    if (totalFields() > 1) {
      $(className + ":last").remove();
    }
  }

  function enableButtonRemove() {
    if (totalFields() === 2) {
      buttonRemove.removeAttr("disabled");
      buttonRemove.addClass("shadow-sm");
    }
  }

  function disableButtonRemove() {
    if (totalFields() === 1) {
      buttonRemove.attr("disabled", "disabled");
      buttonRemove.removeClass("shadow-sm");
    }
  }

  function disableButtonAdd() {
    if (totalFields() === maxFields) {
      buttonAdd.attr("disabled", "disabled");
      buttonAdd.removeClass("shadow-sm");
    }
  }

  function enableButtonAdd() {
    if (totalFields() === (maxFields - 1)) {
      buttonAdd.removeAttr("disabled");
      buttonAdd.addClass("shadow-sm");
    }
  }

  buttonAdd.click(function() {
    addNewField();
    enableButtonRemove();
    disableButtonAdd();
  });

  buttonRemove.click(function() {
    removeLastField();
    disableButtonRemove();
    enableButtonAdd();
  });
  
  initDT();
});
</script>
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
