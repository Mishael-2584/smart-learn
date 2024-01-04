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
      interfaceConfigOverwrite: {
        
      },
      jwt: '{{$jwt}}'
    };
    
    
    
    options = Object.assign(options, {
        interfaceConfigOverwrite: {
            TOOLBAR_BUTTONS: [
                'microphone', 'camera', 'closedcaptions', 'desktop', 'fullscreen',
                'fodeviceselection', 'hangup', 'profile', 'chat', 'recording',
                'livestreaming', 'etherpad', 'sharedvideo', 'settings', 'raisehand',
                'videoquality', 'filmstrip', 'invite', 'feedback', 'stats', 'shortcuts',
                'tileview', 'videobackgroundblur', 'download', 'help', 'mute-everyone',
                'security', 'whiteboard', 'filmstrip'
            ],
          
        }
    });
    
    
    const api = new JitsiMeetExternalAPI(domain, options);
      

      let attendance = {};

    api.on('participantJoined', (participant) => {
        if (!participant.isLocal) {
            const email = participant.email; // Assuming 'email' is the property for the participant's email
            if (!attendance[email]) {
                attendance[email] = {
                    name: participant.displayName || participant.id,
                    email: email, // Store the email as well
                    sessions: []
                };
            }
            attendance[email].sessions.push({
                joinTime: new Date().toISOString(),
                leftTime: null
            });
        }
    });
    
    api.on('participantLeft', (participant) => {
        const email = participant.email; // Assuming 'email' is the property for the participant's email
        const participantSessions = attendance[email] && attendance[email].sessions;
        if (participantSessions) {
            const currentSession = participantSessions[participantSessions.length - 1];
            if (currentSession && !currentSession.leftTime) {
                currentSession.leftTime = new Date().toISOString();
                currentSession.disconnectReason = participant.disconnectReason || "Unknown reason";
            }
        }
    });
    
    // ... (rest of your code for videoConferenceJoined and videoConferenceLeft)
    
    // When compiling attendance data, this part remains the same

    let hasJoinedMeeting = false;

    api.on('videoConferenceJoined', () => {
        hasJoinedMeeting = true;
    });

    api.on('videoConferenceLeft', () => {

      if(hasJoinedMeeting) {
        
        // At the end of the call, compile the attendance data into a JSON file
        const attendanceArray = Object.values(attendance).map(participant => {
            return {
                name: participant.name,
                email: participant.email, // Including the email in the compiled data
                sessions: participant.sessions
            };
        });
        

        // Convert the array to a JSON string
        const attendanceJSON = JSON.stringify(attendanceArray, null, 2); // Pretty print the JSON

        // Trigger a download of the JSON file
        const blob = new Blob([attendanceJSON], { type: 'application/json' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = `attendance-${options.roomName}-${new Date().toISOString()}.json`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        // Redirect after the download is triggered
        window.location.href = '{{ route('lectureropencourse', ['lcId' => $lc->id]) }}';

        // Reset the attendance for the next call
        attendance = {};
        hasJoinedMeeting = false;


      }
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




