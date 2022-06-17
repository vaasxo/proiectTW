<?php


namespace controllers;

require_once __DIR__ . '/../core/Application.php';

use core\Application;
use core\Controller;
use core\Middlewares\AuthMiddleware;
use core\Request;
use core\Response;
use models\WorkoutForm;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['generateWorkout']));

    }
    public function generateWorkout(Request $request,Response $response){
        $workoutForm=new WorkoutForm();
        if($request->isPost()){
            $workoutForm->loadData($request->getBody());
            if($workoutForm->validate()){
                Application::$app->userWorkoutClass->remove();
                $this->getWorkouts($request->getBody());
                $response->redirect('/available-workouts');
                return 'ok';
            }
        }
        $this->setLayout('header');
        return Controller::render('Workout-Generator',[
            'model'=> $workoutForm
        ]);
    }

    public function getWorkouts($preferences)
    {
        $activity=0;
        $types=[];
        $durationMin=0;
        $durationMax=100;
        switch ($preferences['activity']){
            case 'Very Sedentary':
                $activity=[1,2];
                break;
            case 'Sedentary':
                $activity=[2];
                break;
            case 'Somewhat Active':
                $activity=[2,3];
                break;
            case 'Active':
                $activity=[3,4];
                break;
            case 'Very Active':
                $activity=[4,5];
        }
        foreach($preferences['type'] as $type){
            switch ($type){
                case 'Abdominal Workout':
                case 'Chest Workout':
                case 'Back Workout':
                case 'Arm Workout':
                    array_push($types,'Upper Body');
                    break;
                case 'Leg Workout':
                    array_push($types,'Lower Body');
                    break;
                case 'Cardio Workout':
                    array_push($types,'Total Body','Lower Body','Upper Body','Core');
                    break;
                case 'Core Workout':
                    array_push($types,'Core');
            }
        }
        switch($preferences['duration']){
            case 'Approximately 10 minutes':
                $durationMin=5;
                $durationMax=14;
                break;
            case 'Approximately 20 minutes':
                $durationMin=15;
                $durationMax=24;
                break;
            case 'Approximately 30 minutes':
                $durationMin=25;
                $durationMax=45;
                break;
            case 'Approximately 60 minutes':
                $durationMin=46;
                $durationMax=100;
                $activity=[3,4,5];
        }
        Application::$app->workoutClass->findWorkouts($activity,$types,$durationMin,$durationMax);

    }


}