
  <link rel="stylesheet" href="{{ asset('flipclock.css') }}">
              <script src="{{ asset('js/jquery.min.js') }}"></script>       
              <script src="{{ asset('flipclock.js') }}" ></script>
              <div class="clock" style="margin:2em;"></div>
                <script>
                  var clock;
    
    $(document).ready(function() {

      clock = $('.clock').FlipClock(300, {
            clockFace: 'MinuteCounter',
            countdown: true,
            callbacks: {
              stop: function() {
                //$('#questionbody').display=noneS;
                document.getElementById('timer').style.display="none";
                document.getElementById('conf').style.display="none";
                document.getElementById('questionbody').style.display="none";
                document.getElementById('pussy').style.display="block";
                document.getElementById('timeout').style.display="block";
              }
            }
        });

      });
                </script>