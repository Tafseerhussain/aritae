<div class="coach-approval">
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-end">
            <button class="btn btn-theme" wire:click="back">Back</button>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="fs-4 fw-bold">Coach Details</h3>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 1: </strong>My friends and/or family have been coming to me for advice and guidance for years<br>
                    <strong>Answer: </strong>{{$participation->question1}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 2: </strong>I enjoy helping people feel loved, happy, and significant <br>
                    <strong>Answer: </strong>{{$participation->question2}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 3: </strong>I enjoy working with people and helping them feel successful<br>
                    <strong>Answer: </strong>{{$participation->question3}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 4: </strong>I feel a sense of satisfaction when I help others become better people <br>
                    <strong>Answer: </strong>{{$participation->question4}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 5: </strong>I am excited and passionate about life <br>
                    <strong>Answer: </strong>{{$participation->question5}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 6: </strong>I value honesty and integrity <br>
                    <strong>Answer: </strong>{{$participation->question6}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 7: </strong>I have leadership qualities that I could utilize to be an ARITAE Self-Leadership Coach<br>
                    <strong>Answer: </strong>{{$participation->question7}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 8: </strong>I have worked with people in the past helping them achieve and/or learn something<br>
                    <strong>Answer: </strong>{{$participation->question8}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 9: </strong>I love to laugh and be happy<br>
                    <strong>Answer: </strong>{{$participation->question9}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 10: </strong>I love to help others feel great about themselves<br>
                    <strong>Answer: </strong>{{$participation->question10}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 11: </strong>I have self-confidence<br>
                    <strong>Answer: </strong>{{$participation->question11}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 12: </strong>I am motivated to work on improving myself<br>
                    <strong>Answer: </strong>{{$participation->question12}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>Question 13: </strong>I have the desire/determination to become an ARITAE Self-Leadership Coach?<br>
                    <strong>Answer: </strong>{{$participation->question13}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <h4><strong>Add up your score:</strong></h4>
                        You have the heart, desire, and natural ability to become an ARITAE Coach. You should consider taking the ARITAE Self-Leadership Coach Training program and become an ARITAE Coach<br>
                    <strong>Score: </strong>{{$participation->question14_1}}<br>
                    <div class="divider"></div>
                        You have the potential to become an ARITAE Coach. We recommend that you take the ARITAE Self-Leadership Coach training program. It is also recommended you improve your personal attributes and coaching skills by listening to podcasts or reading literature that will improve your ability to work with young people.<br>
                    <strong>Score: </strong>{{$participation->question14_2}}<br>
                    <div class="divider"></div>
                        You have the potential to become an ARITAE Coach. We recommend that you take the ARITAE Self-Leadership Coach training program. It is also recommended you improve your personal attributes and coaching skills by listening to podcasts or reading literature that will improve your ability to work with young people.<br>
                    <strong>Score: </strong>{{$participation->question14_3}}<br>
                    <div class="divider"></div>
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    The number of training openings to become an ARITAE Self-Leadership Coach are limited. Please write, in as many words as you feel necessary, why you should be one of the people selected to become an ARITAE Coach.<br>
                    <strong>Response: </strong>{{$participation->question15}}
                </div>
            </div>
            <div class="row m-0">
                <div class="col-12 question-box">
                    <strong>
                        @if($participation->question16_1)
                        <i class="bi bi-check-square"></i>
                        @else
                        <i class="bi bi-square"></i>
                        @endif
                        Yes, I would like to be considered as one of the coaches selected for the ASLC program.
                    </strong><br>
                    <strong>
                        @if($participation->question16_2)
                        <i class="bi bi-check-square"></i>
                        @else
                        <i class="bi bi-square"></i>
                        @endif
                        If selected for the academy, I agree to a background check by ARITAE.
                    </strong><br><br>
                    <strong>Coach Name: </strong>{{$participation->name}}</br>
                    <strong>Email: </strong>{{$participation->email}}</br>
                    <strong>Phone: </strong>{{$participation->phone}}</br>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-12 d-flex justify-content-between content-align-center">
                    <button class="btn btn-danger text-white" wire:click="decline">Decline</button>
                    <button class="btn btn-theme" wire:click="approve">Approve</button>
                </div>
            </div>
        </div>
    </div>
</div>