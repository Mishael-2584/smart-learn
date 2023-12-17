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
      // jwt: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6InZwYWFzLW1hZ2ljLWNvb2tpZS05YmNmM2EyOTQzYWU0ODNiYTMyMWYwN2I4ZGRjOTMyNC8xNzNlYzcifQ.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MDI1NjE0MzIuNTczODg5LCJleHAiOjE3MDI1NzIyMzIuNTczODg5LCJuYmYiOjE3MDI1NjE0MzIuNTczODg5LCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtOWJjZjNhMjk0M2FlNDgzYmEzMjFmMDdiOGRkYzkzMjQiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOiJ0cnVlIiwib3V0Ym91bmQtY2FsbCI6InRydWUiLCJzaXAtb3V0Ym91bmQtY2FsbCI6ImZhbHNlIiwidHJhbnNjcmlwdGlvbiI6InRydWUiLCJyZWNvcmRpbmciOiJ0cnVlIn0sInVzZXIiOnsiaGlkZGVuLWZyb24tcmVjb3JkZXIiOiJmYWxzZSIsIm1vZGVyYXRvciI6InRydWUiLCJuYW1lIjoiTWlzaGFlbCBHZWJyZSBXb3JhbmNoYSIsImlkIjoxLCJlbWFpbCI6Im0xc2hhM2x3M2xkb0BnbWFpbC5jb20ifSwicm9vbSI6eyJyZWdleCI6dHJ1ZX19LCJyb29tIjoiKiJ9.OM7rrPn6Skxw_tHTUhmzeDfcBN8Z6ZwBlCzbZIuWx1p77CV-c_B7stl-h2vbOTweNdPFViDFJ2zXbnMQAelyXYSo4eqSMnqXFLG0hNP6pv8w6sg1_N2GtCl4GmWb_5WT_RpbWwP1MffTddd70PS-C1Tu6S6sziP1u0YyHNdxo8J_tu1-y1jd4vpw7yTGZ05CTSJf2orctM5Hn8VCgx93_91Sy4X0bTm5OvW-67Iofd-dS_TGVpUwKuM0Ih329UoBY8wxG0vFzS3EgQEB1DKW0_3oXSxq3QucOfq3hz6RlMEw2VfbMXTdsP0aqc-m_yqk03Xrcv6TzjPiGQMu8wcgTA',
      jwt: '{{$jwt}}'
    };
    
    
    
    options = Object.assign(options, {
        // configOverwrite: {
        //     deploymentInfo: {
        //         userRolesBasedOnToken: true
        //     },
        //     startWithVideoMuted: true,
        //     startWithAudioMuted: true,
        //     enableUserRolesBasedOnToken: true,
            
        // },
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

    
    //     api.executeCommand('toggleLobby', false);
      @if($lc->departmentcourse != null)
          api.executeCommand('subject', '{{!! $lc->departmentcourse->course->title !!}}');
      @else 
          api.executeCommand('subject', '{{!! $lc->course->title !!}}');
      
      @endif
    
      api.addEventListener('videoConferenceLeft', () => {
          window.location.href = '{{ route('lectureropencourse', ['lcId' => $lc->id]) }}';
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




