<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\LecturerCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Lcobucci\JWT\Configuration;
// use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;




class JitsiController extends Controller
{
    //

    public function meeting($id)
    {
        $lc = LecturerCourse::where('id', $id)->get()->first();

        $url = $lc->meet_url;
        $parse = parse_url($url);

        $baseUrl = $parse['scheme'] . '://' . $parse['host'];
        $pathParts = explode('/', $parse['path']);
        $meetingRoomName = end($pathParts);

       

        


        return view('lecturer.jitsi', compact('lc', 'baseUrl', 'meetingRoomName'));
    }

    public function generatetoken($id)
    {
        $lc = LecturerCourse::where('id', $id)->get()->first();
        $url = $lc->meet_url;
        $parse = parse_url($url);

        $baseUrl = $parse['scheme'] . '://' . $parse['host'];
        $pathParts = explode('/', $parse['path']);
        $meetingRoomName = end($pathParts);

        
        
        


        // $privateKeyPath = env('JWT_PRIVATE_KEY_PATH');
        // $publicKeyPath = env('JWT_PUBLIC_KEY_PATH');

        

        

        $priKeypath = public_path('keys/jitsi.pk');
        $pubKeypath = public_path('keys/jitsi.pub');

        $privateKey = InMemory::file($priKeypath);
        $publicKey = InMemory::file($pubKeypath);

        

        

        

        // Create a new configuration with RSA SHA-256 signer and your private key
        $config = Configuration::forAsymmetricSigner(
            new Sha256(),
            $privateKey, // Replace with the path to your private key
            $publicKey // Replace with the path to your public key (if needed for validation)
        );
      
        // Set the time claims

        

        // Create a DateTimeImmutable object for 'now' in UTC.
        $now = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));

        // Modify 'nbf' to be 1 hour ahead of 'now'.
        $iat = $now;
        $nbf = $now;
        // Modify 'exp' to be 2 hours ahead of 'nbf', which is 3 hours ahead of 'now'.
        $expire = $nbf->modify('+3 hours');

        // Create the token with the specified claims
        $token = $config->builder()
            ->permittedFor('jitsi') // aud claim
            ->issuedBy('chat') // iss claim
            ->issuedAt($iat) // iat claim
            ->expiresAt($expire) // exp claim
            ->canOnlyBeUsedAfter($nbf) // nbf claim
            ->relatedTo('vpaas-magic-cookie-9bcf3a2943ae483ba321f07b8ddc9324') // sub claim
            ->withClaim('context', [ // Custom claim for context
                'features' => [
                    'livestreaming' => 'true',
                    'outbound-call' => 'true',
                    'sip-outbound-call' => 'false',
                    'transcription' => 'true',
                    'recording' => 'true',
                    'whiteboard' => 'true',
                    'lobby' => 'true',
                ],
                'user' => [
                    'hidden-from-recorder' => 'false',
                    'moderator' => 'true',
                    'name' => $lc->lecturer->name, // Directly use the property
                    'id' => $lc->lecturer->id, // Directly use the property
                    'email' => $lc->lecturer->email, // Directly use the property
                ],
                'room' => [
                    'regex' => true,
                ],
            ])
            ->withClaim('room', '*') // Custom claim for room
            ->withHeader('kid', 'vpaas-magic-cookie-9bcf3a2943ae483ba321f07b8ddc9324/173ec7') // Key ID header
            ->getToken($config->signer(), $config->signingKey()); // Get the token

            $jwt = $token->toString(); 

            

            if($lc->departmentcourse){
                $meetingRoomName = $lc->departmentcourse->course->course_code;
                
                return view('lecturer.jitsi', compact('lc', 'baseUrl', 'meetingRoomName', 'jwt'));
            }
            else{
                $meetingRoomName = $lc->course->title;
                return view('lecturer.jitsi', compact('lc', 'baseUrl', 'meetingRoomName', 'jwt'));
            }
            
            

    }


    public function jitsimeetingstudent($eid) {

        $e = Enrollment::where('id', $eid)->get()->first();
        $url = $e->lecturercourse->meet_url;
        $parse = parse_url($url);

        $baseUrl = $parse['scheme'] . '://' . $parse['host'];
        $pathParts = explode('/', $parse['path']);
        // $meetingRoomName = end($pathParts);

        $displayName = $e->student->name;


        // $privateKeyPath = env('JWT_PRIVATE_KEY_PATH');
        // $publicKeyPath = env('JWT_PUBLIC_KEY_PATH');


        

        

        $priKeypath = public_path('keys/jitsi.pk');
        $pubKeypath = public_path('keys/jitsi.pub');

        $privateKey = InMemory::file($priKeypath);
        $publicKey = InMemory::file($pubKeypath);

        

        

        

        // Create a new configuration with RSA SHA-256 signer and your private key
        $config = Configuration::forAsymmetricSigner(
            new Sha256(),
            $privateKey, // Replace with the path to your private key
            $publicKey // Replace with the path to your public key (if needed for validation)
        );
      
        // Set the time claims

        

        // Create a DateTimeImmutable object for 'now' in UTC.
        $now = new \DateTimeImmutable('now', new \DateTimeZone('UTC'));

        // Modify 'nbf' to be 1 hour ahead of 'now'.
        $iat = $now;
        $nbf = $now;
        // Modify 'exp' to be 2 hours ahead of 'nbf', which is 3 hours ahead of 'now'.
        $expire = $nbf->modify('+3 hours');

        // Create the token with the specified claims
        $token = $config->builder()
            ->permittedFor('jitsi') // aud claim
            ->issuedBy('chat') // iss claim
            ->issuedAt($iat) // iat claim
            ->expiresAt($expire) // exp claim
            ->canOnlyBeUsedAfter($nbf) // nbf claim
            ->relatedTo('vpaas-magic-cookie-9bcf3a2943ae483ba321f07b8ddc9324') // sub claim
            ->withClaim('context', [ // Custom claim for context
                'features' => [
                    'livestreaming' => 'true',
                    'outbound-call' => 'true',
                    'sip-outbound-call' => 'false',
                    'transcription' => 'true',
                    'recording' => 'true',
                    'lobby' => 'true',           
                ],
                'user' => [
                    'hidden-from-recorder' => 'false',
                    'moderator' => 'false',
                    'name' => $e->student->name, // Directly use the property
                    'id' => $e->student->id, // Directly use the property
                    'email' => $e->student->email, // Directly use the property
                ],
                'room' => [
                    'regex' => true,
                ],
            ])
            ->withClaim('room', '*') // Custom claim for room
            ->withHeader('kid', 'vpaas-magic-cookie-9bcf3a2943ae483ba321f07b8ddc9324/173ec7') // Key ID header
            ->getToken($config->signer(), $config->signingKey()); // Get the token

            $jwt = $token->toString(); 

            if($e->lecturercourse->departmentcourse){
                $meetingRoomName = $e->lecturercourse->departmentcourse->course->course_code;
                
                return view('student.jitsi', compact('e', 'displayName', 'meetingRoomName', 'jwt'));
            }
            else{
                $meetingRoomName = $e->lecturercourse->course->title;
                return view('student.jitsi', compact('e', 'displayName', 'meetingRoomName', 'jwt'));
            }
            
            


    }

    
}
