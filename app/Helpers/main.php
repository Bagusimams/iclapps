<?php
    use App\Models\Inventory;
    use App\Models\Lecturer;
    use App\Models\LectureSchedule;
    use App\Models\Major;
    use App\Models\Room;
    use App\Models\School;
    use App\Models\SummerSchool;
    use App\Models\UniversityExchange;
    use App\Models\UniversityJoint;
    use App\Models\WinterSchool;

    function alert()
    {
        $type  = null;
        $color = null;
        $data  = null;

        if(session('alert'))
        {
            $alert = session('alert');
            $data  = session('data');

            switch ($alert) {
                case 'add':
                    $type = 'added';
                    $color = 'success';
                    break;

                case 'edit':
                    $type = 'edited';
                    $color = 'warning';
                    break;

                case 'delete':
                    $type = 'deleted';
                    $color = 'danger';
                    break;

                case 'error':
                    $type = 'created';
                    $color = 'danger';
                    break;

                case 'errorPass':
                    $type = 'pass';
                    $color = 'danger';
                    break;

                case 'errorGPA':
                    $type = 'gpa';
                    $color = 'danger';
                    break;

                case 'errorToefl':
                    $type = 'toefl';
                    $color = 'danger';
                    break;

                case 'notUser':
                    $type = 'notUser';
                    $color = 'danger';
                    break;

                case 'invalidCredential':
                    $type = 'invalidCredential';
                    $color = 'danger';
                    break;
            }
            session()->forget('alert');
            session()->forget('data');
        }

        return [$type, $color, $data];
    }

    function getPagination()
    {
        $pagination = [20 => '20', 30 => '30', 50 => '50', 'all' => 'All'];
        
        return $pagination;
    }

    function getSemApplied()
    {
        $sem = ['Spring' => 'Spring', 'Fall' => 'Fall', 'Short' => 'Short'];
        
        return $sem;
    }

    function getExcEng()
    {
        $types = ['EPRT' => 'EPRT', 'ITP Toefl' => 'ITP Toefl'];
        
        return $types;
    }

    function getJointEng()
    {
        $types = ['IBT Toefl' => 'IBT Toefl', 'IELTS' => 'IELTS'];
        
        return $types;
    }

    function getWinterEng()
    {
        $types = [];
        
        return $types;
    }

    function getSummerEng()
    {
        $types = [];
        
        return $types;
    }

    function getInventoriesAvailable()
    {
        $inventories = [null => 'Choose Inventory'];
        foreach (Inventory::where('showOnInvBookingMenu', 1)->get() as $data) {
            if($data->recentStock() > 0)
                $inventories = array_add($inventories, $data->id, $data->name . ' (' . $data->recentStock() . ')');
        }
        return $inventories;
    }

    function getRooms()
    {
        $rooms = [null => 'Choose Room'];
        foreach (Room::all() as $data) {
            $rooms = array_add($rooms, $data->id, $data->name);
        }
        return $rooms;
    }

    function getRoomsAvailableByDay($day, $start_time, $end_time)
    {
        $rooms = [null => 'Choose Room'];
        foreach (Room::where('isBooked', 0)->get() as $data) {
            $lecture = LectureSchedule::where('day', $day)
                                      ->whereRaw('((start_time <= "' . $start_time . '" AND end_time >= "' . $start_time . '") OR (start_time <= "' . $end_time . '" AND end_time >= "' . $end_time . '") OR (start_time >= "' . $start_time . '" AND start_time <= "' . $end_time . '"))')
                                      ->where('room_id', $data->id)
                                      ->get();

            if($lecture->count() == 0) $rooms = array_add($rooms, $data->id, $data->name);
        }
        return $rooms;
    }

    function getRoomsAvailableByDate($date, $start_time, $end_time)
    {
        $today = Carbon::createFromFormat('Y-m-d', $date);
        $day   = convertDay($today->dayOfWeek);

        $rooms = [null => 'Choose Room'];
        foreach (Room::where('isBooked', 0)->get() as $data) {
            $lecture = LectureSchedule::where('day', $day)
                                      ->whereRaw('((start_time <= "' . $start_time . '" AND end_time >= "' . $start_time . '") OR (start_time <= "' . $end_time . '" AND end_time >= "' . $end_time . '") OR (start_time >= "' . $start_time . '" AND start_time <= "' . $end_time . '"))')
                                      ->where('room_id', $data->id)
                                      ->get();

            if($lecture == null) $rooms = array_add($rooms, $data->id, $data->name);
        }
        return $rooms;
    }

    function getComplaintType()
    {
        return ['Facilities' => 'Facilities', 'Lecture' => 'Lecture'];
    }

    function getLecturers()
    {
        $lecturers = [null => 'Choose Lecturer'];
        foreach (Lecturer::all() as $data) {
            $lecturers = array_add($lecturers, $data->id, $data->name);
        }
        return $lecturers;
    }

    function convertDay($day)
    {   
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        
        return $days[$day];
    }

    function getDays()
    {
        $days = ['Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday'];

        return $days;
    }

    function getModeLectureSchedule()
    {
        $status = ['per' => 'Permanent', 'temp' => 'Temporary'];

        return $status;
    }

    function getSchools()
    {
        $schools = [null => 'Choose School'];
        foreach (School::all() as $data) {
            $schools = array_add($schools, $data->id, $data->name);
        }
        return $schools;
    }

    function getMajors($school_id)
    {
        $majors = [null => 'Choose Major'];
        foreach (Major::where('school_id', $school_id)->get() as $data) {
            $majors = array_add($majors, $data->id, $data->name);
        }
        return $majors;
    }

    function getUniversities()
    {
        $universities = [null => 'Choose University'];
        foreach (UniversityExchange::where('status', 1)->whereDate('start', '<=', date('Y-m-d'))->whereDate('end', '>=', date('Y-m-d'))->get() as $data) {
            $universities = array_add($universities, $data->id, $data->name);
        }
        return $universities;
    }

    function getJointUniversities()
    {
        $universities = [null => 'Choose University'];
        foreach (UniversityJoint::all() as $data) {
            $universities = array_add($universities, $data->id, $data->name);
        }
        return $universities;
    }

    function getSummerSchools()
    {
        $universities = [null => 'Choose University'];
        foreach (SummerSchool::all() as $data) {
            $universities = array_add($universities, $data->id, $data->name);
        }
        return $universities;
    }

    function getWinterSchools()
    {
        $universities = [null => 'Choose University'];
        foreach (WinterSchool::all() as $data) {
            $universities = array_add($universities, $data->id, $data->name);
        }
        return $universities;
    }

    function callGetGuzzle($url, $token = null)
    {
        if($token == null)
        {
            $header = [
                    // 'auth' => [
                    //     'icao', '!Ca0Telu2019'
                    // ],
                    // 'Secret' => config('app.secret')
                ];
        }
        else
        {
            $header = [
                    // 'auth' => [
                    //     'icao', '!Ca0Telu2019'
                    // ],
                    // 'Secret' => config('app.secret'),
                    'Authorization' => 'Bearer ' . $token                
                ];
        }

        $client = new \GuzzleHttp\Client([
                'headers' => $header
            ]);
        try {
            $response = $client->get(config('app.api_url') . $url);
            $response = json_decode($response->getBody()->getContents());
            
            return ["status" => "ok", "data" => $response];
        } 
        catch (\GuzzleHttp\Exception\RequestException $e) {
            return ["status" => "error", "data" => $e->getMessage(), "code" => $e->getCode()];
        }
    }

    function callPostGuzzle($url, $token = null, $data = null)
    {
        // dd(config('app.api_url') . $url);die;
        if($token == null)
        {
            $header = [
                    // 'Authorization' => [
                    //     'icao', '!Ca0Telu2019'
                    // ],
                    'Content-Type' => 'application/json',
                    // 'Secret' => config('app.secret')
                ];
        }
        else
        {
            $header = [
                    // 'Authorization' => [
                    //     'icao', '!Ca0Telu2019'
                    // ],
                    'Content-Type' => 'application/json',
                    // 'Secret' => config('app.secret'),
                    // 'Authorization' => 'Bearer ' . $token                
                ];
        }
        // dd(config('app.api_url') . $url);die;
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('POST', config('app.api_url') . $url, [
                'headers' => $header,
                'json' => $data
            ]);

            $response = json_decode($response->getBody()->getContents());
            // dd($response);die;
            return ["status" => "ok", "data" => $response];
        } 
        catch (\GuzzleHttp\Exception\RequestException $e) {
            return ["status" => "error", "data" => $e->getMessage(), "code" => $e->getCode()];
        }
    }

    function callPutGuzzle($url, $token = null, $data = null)
    {
        if($token == null)
        {
            $header = [
                    // 'auth' => [
                    //     'icao', '!Ca0Telu2019'
                    // ],
                    'Content-Type' => 'application/json',
                    // 'Secret' => config('app.secret')
                ];
        }
        else
        {
            $header = [
                    // 'auth' => [
                    //     'icao', '!Ca0Telu2019'
                    // ],
                    'Content-Type' => 'application/json',
                    // 'Secret' => config('app.secret'),
                    'Authorization' => 'Bearer ' . $token                
                ];
        }

        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('PUT', config('app.api_url') . $url, [
                'headers' => $header,
                'json' => $data
            ]);

            $response = json_decode($response->getBody()->getContents());
            
            return ["status" => "ok", "data" => $response->content];
        } 
        catch (\GuzzleHttp\Exception\RequestException $e) {
            return ["status" => "error", "data" => $e->getMessage(), "code" => $e->getCode()];
        }
    }

    function callDeleteGuzzle($url, $token = null, $data = null)
    {
        if($token == null)
        {
            $header = [
                    // 'auth' => [
                    //     'icao', '!Ca0Telu2019'
                    // ],
                    'Content-Type' => 'application/json',
                    // 'Secret' => config('app.secret')
                ];
        }
        else
        {
            $header = [
                    // 'auth' => [
                    //     'icao', '!Ca0Telu2019'
                    // ],
                    'Content-Type' => 'application/json',
                    // 'Secret' => config('app.secret'),
                    'Authorization' => 'Bearer ' . $token                
                ];
        }

        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->request('DELETE', config('app.api_url') . $url, [
                'headers' => $header,
                'json' => $data
            ]);

            $response = json_decode($response->getBody()->getContents());
            
            return ["status" => "ok", "data" => $response->content];
        } 
        catch (\GuzzleHttp\Exception\RequestException $e) {
            return ["status" => "error", "data" => $e->getMessage(), "code" => $e->getCode()];
        }
    }
?>