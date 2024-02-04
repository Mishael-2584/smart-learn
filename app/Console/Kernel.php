<?php

namespace App\Console;

use App\Models\ClassroomStreamPost;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        var_dump(now()->format('Y-m-d H:i:s'));

        $schedule->call(function () {
            // Task logic within the schedule() call
            $quizzes = Quiz::where('deadline', '>=', now())
                ->whereNotNull('time_limit')
                ->whereNull('published_at') // Check if already published
                ->get();
       
            foreach ($quizzes as $quiz) {
                $start_time = Carbon::parse($quiz->start_time);      
                if ($start_time->isPast()) {
                    // Create stream post and mark as published
                    $post = ClassroomStreamPost::create([
                        'lecturer_course_id' => $quiz->lecturer_course->id,
                        'content' => 'Quiz available: ' . $quiz->title . '...',
                        'quiz_id' => $quiz->id,
                        'lecturer_id' => $quiz->lecturer_course->lecturer->id,
                        ]);

                    if($post){
                        // Optional: Send notifications, trigger other actions

                        $done = $quiz->update(['published_at' => now()]); // Mark as published
                        if($done){
                        var_dump('Success in updating quiz');
                        }
                        else{
                        var_dump('Failed to update quiz');
                        }
                    }
                    else{
                        var_dump('Failed to post');
                    }
                }  
            }
        })->everyMinute(); // Adjust frequency as needed
        
    }
    

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
