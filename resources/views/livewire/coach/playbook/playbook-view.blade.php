<div class="playbook-players playbook-view">
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-theme" wire:click="back">Back</button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="playbookTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="module1-tab" data-bs-toggle="tab" data-bs-target="#module1-tab-pane" type="button" role="tab" aria-controls="module1-tab-pane" aria-selected="true">Discovery</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="module2-tab" data-bs-toggle="tab" data-bs-target="#module2-tab-pane" type="button" role="tab" aria-controls="module2-tab-pane" aria-selected="true">Focus</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="module3-tab" data-bs-toggle="tab" data-bs-target="#module3-tab-pane" type="button" role="tab" aria-controls="module3-tab-pane" aria-selected="true">Action</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="module4-tab" data-bs-toggle="tab" data-bs-target="#module4-tab-pane" type="button" role="tab" aria-controls="module4-tab-pane" aria-selected="true">Strategy</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="module5-tab" data-bs-toggle="tab" data-bs-target="#module5-tab-pane" type="button" role="tab" aria-controls="module5-tab-pane" aria-selected="true">Personal Plan</button>
                </li>
            </ul>
            <div class="tab-content" id="playbookTabContent">
                <div class="tab-pane module1 fade show active" id="module1-tab-pane" role="tabpanel" aria-labelledby="module1-tab" tabindex="0">
                    @if(isset($response['module1']))
                        @for($x=1; $x<=10; $x++)
                        <div class="playsheet">
                            <h2 class="title">Playsheet #{{$x}}</h2>
                            <p>
                                <strong>Home: </strong>
                                {{$response['module1']['playsheet'.$x]['home']}}
                            </p>
                            <p>
                                <strong>School: </strong>
                                {{$response['module1']['playsheet'.$x]['school']}}
                            </p>
                            <p>
                                <strong>Arts, music, athletics, etc.: </strong>
                                {{$response['module1']['playsheet'.$x]['activity']}}
                            </p>
                            <p>
                                <strong>Other (work, social settings, etc.): </strong>
                                {{$response['module1']['playsheet'.$x]['other']}}
                            </p>
                        </div>
                        @endfor
                        <div class="playsheet">
                            <h2 class="title">Playsheet #11</h2>
                            <p>
                                <strong>Date: </strong>
                                {{$response['module1']['playsheet11']['date']}}
                            </p>
                            <p>
                                <strong>What was my objective for this step?: </strong>
                                {{$response['module1']['playsheet11']['objective']}}
                            </p>
                            <p>
                                <strong>Did I meet my objective? If so, in what way(s)?: </strong>
                                {{$response['module1']['playsheet11']['requirement']}}
                            </p>
                            <p>
                                <strong>What is something I learned during this step?: </strong>
                                {{$response['module1']['playsheet11']['learning']}}
                            </p>
                            <p>
                                <strong>What is something I am still unclear about and need to work on in the next Module?: </strong>
                                {{$response['module1']['playsheet11']['work_need']}}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="tab-pane module2 fade" id="module2-tab-pane" role="tabpanel" aria-labelledby="module2-tab" tabindex="0">
                    @if(isset($response['module2']))
                        <div class="playsheet">
                            <h2 class="title">Playsheet #1</h2>
                            <p>
                                <strong>Characteristic: </strong>
                                {{$response['module2']['playsheet1']['characteristic']}}
                            </p>
                            <p>
                                <strong>What I want for the future and why: </strong>
                                {{$response['module2']['playsheet1']['expectation']}}
                            </p>
                        </div>
                        <div class="playsheet">
                            <h2 class="title">Playsheet #2</h2>
                            <p>
                                <strong>Draft #1: </strong>
                                {{$response['module2']['playsheet2']['draft1']}}
                            </p>
                            <p>
                                <strong>Draft #2: </strong>
                                {{$response['module2']['playsheet2']['draft2']}}
                            </p>
                        </div>
                        <div class="playsheet">
                            <h2 class="title">Playsheet #3</h2>
                            <p>
                                <strong>Draft #3: </strong>
                                {{$response['module2']['playsheet3']['draft3']}}
                            </p>
                            <p>
                                <strong>Final Vision Statement: </strong>
                                {{$response['module2']['playsheet3']['vision']}}
                            </p>
                        </div>
                        <div class="playsheet">
                            <h2 class="title">Playsheet #4</h2>
                            <p>
                                <strong>Final Purpose Statement: </strong>
                                {{$response['module2']['playsheet4']['purpose']}}
                            </p>
                            <p>
                                <strong>Final Vision Statement: </strong>
                                {{$response['module2']['playsheet4']['vision']}}
                            </p>
                        </div>
                        <div class="playsheet">
                            <h2 class="title">Playsheet #5</h2>
                            <p>
                                <strong>Date: </strong>
                                {{$response['module2']['playsheet5']['date']}}
                            </p>
                            <p>
                                <strong>What was my objective for this step?: </strong>
                                {{$response['module2']['playsheet5']['objective']}}
                            </p>
                            <p>
                                <strong>Did I meet my objective? If so, in what way(s)?: </strong>
                                {{$response['module2']['playsheet5']['requirement']}}
                            </p>
                            <p>
                                <strong>What is something I learned during this step?: </strong>
                                {{$response['module2']['playsheet5']['learning']}}
                            </p>
                            <p>
                                <strong>What is something I am still unclear about and need to work on in the next Module?: </strong>
                                {{$response['module2']['playsheet5']['work_need']}}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="tab-pane module3 fade" id="module3-tab-pane" role="tabpanel" aria-labelledby="module3-tab" tabindex="0">
                    @if(isset($response['module3']))
                        <div class="playsheet">
                            <h2 class="title">Playsheet #1</h2>
                            <p>
                                <strong>Home: </strong>
                                {{$response['module3']['playsheet1']['home']}}
                            </p>
                            <p>
                                <strong>School: </strong>
                                {{$response['module3']['playsheet1']['school']}}
                            </p>
                            <p>
                                <strong>Arts, music, athletics, etc.: </strong>
                                {{$response['module3']['playsheet1']['activity']}}
                            </p>
                            <p>
                                <strong>Other (work, social settings, etc.): </strong>
                                {{$response['module3']['playsheet1']['other']}}
                            </p>
                        </div>
                        <div class="playsheet">
                            <h2 class="title">Playsheet #2</h2>
                            <p>
                                <strong>Date: </strong>
                                {{$response['module3']['playsheet2']['date']}}
                            </p>
                            <p>
                                <strong>What was my objective for this step?: </strong>
                                {{$response['module3']['playsheet2']['objective']}}
                            </p>
                            <p>
                                <strong>Did I meet my objective? If so, in what way(s)?: </strong>
                                {{$response['module3']['playsheet2']['requirement']}}
                            </p>
                            <p>
                                <strong>What is something I learned during this step?: </strong>
                                {{$response['module3']['playsheet2']['learning']}}
                            </p>
                            <p>
                                <strong>What is something I am still unclear about and need to work on in the next Module?: </strong>
                                {{$response['module3']['playsheet2']['work_need']}}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="tab-pane module4 fade" id="module4-tab-pane" role="tabpanel" aria-labelledby="module4-tab" tabindex="0">
                    @if(isset($response['module4']))
                        @for($x=2; $x<=11; $x++)
                        <div class="playsheet">
                            <h2 class="title">Playsheet #{{$x}}</h2>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <strong>Area of life: </strong>{{$response['module4']['playsheet'.$x]['area']}}
                                </div>
                                <div class="col-6">
                                    <strong>Completion date: </strong>{{$response['module4']['playsheet'.$x]['date']}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Action #1: </strong>{{$response['module4']['playsheet'.$x]['action1']}}
                                </div>
                                <div class="col-4">
                                    <strong>Action #2: </strong>{{$response['module4']['playsheet'.$x]['action3']}}
                                </div>
                                <div class="col-4">
                                    <strong>Action #3: </strong>{{$response['module4']['playsheet'.$x]['action3']}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Obstacle #1: </strong>{{$response['module4']['playsheet'.$x]['obstacle1']}}
                                </div>
                                <div class="col-4">
                                    <strong>Obstacle #2: </strong>{{$response['module4']['playsheet'.$x]['obstacle2']}}
                                </div>
                                <div class="col-4">
                                    <strong>Obstacle #3: </strong>{{$response['module4']['playsheet'.$x]['obstacle3']}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Solution #1: </strong>{{$response['module4']['playsheet'.$x]['solution1']}}
                                </div>
                                <div class="col-4">
                                    <strong>Solution #2: </strong>{{$response['module4']['playsheet'.$x]['solution2']}}
                                </div>
                                <div class="col-4">
                                    <strong>Solution #3: </strong>{{$response['module4']['playsheet'.$x]['solution3']}}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <strong>Goal: </strong>{{$response['module4']['playsheet'.$x]['goal']}}
                                </div>
                                <div class="col-6">
                                    <strong>Reward (feeling): </strong>{{$response['module4']['playsheet'.$x]['reward']}}
                                </div>
                            </div>
                        </div>
                        @endfor
                        <div class="playsheet">
                            <h2 class="title">Playsheet #12</h2>
                            <p>
                                <strong>Date: </strong>
                                {{$response['module4']['playsheet12']['date']}}
                            </p>
                            <p>
                                <strong>What was my objective for this step?: </strong>
                                {{$response['module4']['playsheet12']['objective']}}
                            </p>
                            <p>
                                <strong>Did I meet my objective? If so, in what way(s)?: </strong>
                                {{$response['module4']['playsheet12']['requirement']}}
                            </p>
                            <p>
                                <strong>What is something I learned during this step?: </strong>
                                {{$response['module4']['playsheet12']['learning']}}
                            </p>
                            <p>
                                <strong>What is something I am still unclear about and need to work on in the next Module?: </strong>
                                {{$response['module4']['playsheet12']['work_need']}}
                            </p>
                        </div>
                    @endif
                </div>
                <div class="tab-pane module5 fade" id="module5-tab-pane" role="tabpanel" aria-labelledby="module5-tab" tabindex="0">
                    @if(isset($response['module5']))
                        <div class="playsheet">
                            <h2 class="title">Playsheet #1</h2>
                            <p>
                                <strong>Final Purpose Statement: </strong>
                                {{$response['module5']['playsheet1']['purpose']}}
                            </p>
                            <p>
                                <strong>Final Vision Statement: </strong>
                                {{$response['module5']['playsheet1']['vision']}}
                            </p>
                        </div>
                        @for($x=3; $x<=14; $x++)
                        <div class="playsheet">
                            <h2 class="title">Playsheet #{{$x}}</h2>
                            <div class="row mb-4">
                                <div class="col-6">
                                    <strong>Area of life: </strong>{{$response['module5']['playsheet'.$x]['area']}}
                                </div>
                                <div class="col-6">
                                    <strong>Completion date: </strong>{{$response['module5']['playsheet'.$x]['date']}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Action #1: </strong>{{$response['module5']['playsheet'.$x]['action1']}}
                                </div>
                                <div class="col-4">
                                    <strong>Action #2: </strong>{{$response['module5']['playsheet'.$x]['action3']}}
                                </div>
                                <div class="col-4">
                                    <strong>Action #3: </strong>{{$response['module5']['playsheet'.$x]['action3']}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Obstacle #1: </strong>{{$response['module5']['playsheet'.$x]['obstacle1']}}
                                </div>
                                <div class="col-4">
                                    <strong>Obstacle #2: </strong>{{$response['module5']['playsheet'.$x]['obstacle2']}}
                                </div>
                                <div class="col-4">
                                    <strong>Obstacle #3: </strong>{{$response['module5']['playsheet'.$x]['obstacle3']}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <strong>Solution #1: </strong>{{$response['module5']['playsheet'.$x]['solution1']}}
                                </div>
                                <div class="col-4">
                                    <strong>Solution #2: </strong>{{$response['module5']['playsheet'.$x]['solution2']}}
                                </div>
                                <div class="col-4">
                                    <strong>Solution #3: </strong>{{$response['module5']['playsheet'.$x]['solution3']}}
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-6">
                                    <strong>Goal: </strong>{{$response['module5']['playsheet'.$x]['goal']}}
                                </div>
                                <div class="col-6">
                                    <strong>Reward (feeling): </strong>{{$response['module5']['playsheet'.$x]['reward']}}
                                </div>
                            </div>
                        </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>