@extends('layouts.body')


@section('content')
<div class="main-content">
  <div id="jitsi-container">
                    
  </div>
    
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
            const email = participant.statsID; // Assuming 'statsID' is the property for the participant's email
            if (!attendance[email]) {
                attendance[email] = {
                    name: participant.displayName || participant.id,
                    email: participant.statsID, // Store the email as well
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
        const email = participant.statsID; // Assuming 'statsID' is the property for the participant's email
        const participantSessions = attendance[email] && attendance[email].sessions;
        if (participantSessions) {
            const currentSession = participantSessions[participantSessions.length - 1];
            if (currentSession && !currentSession.leftTime) {
                currentSession.leftTime = new Date().toISOString();
                currentSession.disconnectReason = participant.disconnectReason || "Unknown reason";
            }
        }
    });
    

    let hasJoinedMeeting = false;

    api.on('videoConferenceJoined', (participant) => {
        hasJoinedMeeting = true;
    });

    api.on('videoConferenceLeft', () => {
        if (hasJoinedMeeting) {
            // Convert the array to a CSV string
            const attendanceCSV = toCSV(attendance);
          
            // Trigger a download of the CSV file
            const blob = new Blob([attendanceCSV], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `attendance-${options.roomName}-${new Date().toISOString()}.csv`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
          
            // Redirect after the download is triggered
            window.location.href = '{{ route("lectureropencourse", ["lcId" => $lc->id]) }}';
          
            // Reset the attendance for the next call
            attendance = {};
            hasJoinedMeeting = false;
        }
      });

          // Helper function to escape commas and double quotes for CSV content
      function escapeCSV(value) {
          if (value == null) value = '';
          if (value.replace == null) return value;
          return `"${value.replace(/"/g, '""')}"`; // Handle quotes
      }

      function to12HourFormat(isoString) {
          if (!isoString) return '';
          const date = new Date(isoString);
          let hours = date.getHours();
          const minutes = date.getMinutes();
          const ampm = hours >= 12 ? 'PM' : 'AM';
          hours = hours % 12;
          hours = hours || 12; // the hour '0' should be '12'
          const minutesStr = minutes < 10 ? '0' + minutes : minutes;
          return `${hours}:${minutesStr} ${ampm}`;
      }

      function toCSV(attendance) {
          const csvRows = [];
          let maxSessions = 0;

          // First, find the maximum number of sessions any participant has
          const attendanceArray = Object.values(attendance).map(participant => {
              maxSessions = Math.max(maxSessions, participant.sessions.length);
              return {
                  name: participant.name,
                  email: participant.email,
                  sessions: participant.sessions
              };
          });
        
          // Create headers based on the maximum number of sessions
        const headers = ['Name', 'Email'];
        for (let i = 1; i <= maxSessions; i++) {
            headers.push(`Join Time ${i}`, `Leave Time ${i}`);
        }
        csvRows.push(headers.join(','));
      
        // Fill in the data rows
        attendanceArray.forEach(participant => {
            const row = [escapeCSV(participant.name), escapeCSV(participant.email)];
            participant.sessions.forEach((session, index) => {
                row.push(escapeCSV(to12HourFormat(session.joinTime)), escapeCSV(to12HourFormat(session.leftTime)));
            });
            // Fill in empty values if this participant has fewer sessions than the max
            for (let i = participant.sessions.length; i < maxSessions; i++) {
                row.push('', ''); // Empty values for join and leave times
            }
            csvRows.push(row.join(','));
        });
      
        return csvRows.join('\n');
      }


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




