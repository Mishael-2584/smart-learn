@extends('layouts.body')


@section('content')
<div class="main-content">
  <div id="jitsi-container">
                    
  </div>
    {{-- <div class="section">
        
    </div> --}}
    
</div> 
    
@endsection



@section('scripts')
<script src="https://kit.fontawesome.com/201e2d289f.js" crossorigin="anonymous"></script>
<script src="{{ asset("codiepie/js/scripts.js") }}"></script>
<script src="{{ asset("codiepie/js/custom.js") }}"></script> 
<script src="https://8x8.vc/vpaas-magic-cookie-9bcf3a2943ae483ba321f07b8ddc9324/external_api.js"></script>

<script>
      const domain = '8x8.vc';
      let options = {
      roomName: 'vpaas-magic-cookie-9bcf3a2943ae483ba321f07b8ddc9324/{{$meetingRoomName}}',
      parentNode: document.querySelector('#jitsi-container'),
      configOverwrite: {
        startWithVideoMuted: true,
        startWithAudioMuted: true,
        enableUserRolesBasedOnToken: true,
        toggleLobby: true,
        deploymentInfo: {
            userRolesBasedOnToken: true
        },
       
      },
      userInfo: {
        displayName: '{{$displayName}}', // Set the display name for the participant
      },
      
     jwt: '{{$jwt}}' 
    };
    
    
    
    const api = new JitsiMeetExternalAPI(domain, options);

    
    
      api.addEventListener('videoConferenceLeft', () => {
          window.location.href = '{{ route('studentopencourse', ['eId' => $e->id]) }}';
      });


</script>

<style>
    #jitsi-container {
      height: 700px;
      overflow: auto;
    }

    /* Add some margin or padding to the container */
    #jitsi-container {
      margin: 40px;
    }

    .jitsi-frame {
      width: 100%;
      height: 100%;
      position: relative;
    }
    .logo {
      position: absolute;
      bottom: 20px;
      left: 20px;
      max-width: 100px;
    }

    /* Use media queries to adjust the height of the container based on screen size */
    @media screen and (max-width: 768px) {
      .jitsi-container {
        height: 400px;
      }
    }
</style>
    
@endsection




