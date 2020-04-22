<div class="container">
    <?php

    if ($this->session->flashdata('Uploading Fail')) {
        echo '<div class="alert alert-danger font-weight-bold">' . $this->session->flashdata('Uploading Fail') . ' </div>';
    } elseif ($this->session->flashdata('Uploading Success')) {
        echo '<div class="alert alert-danger font-weight-bold">' . $this->session->flashdata('Uploading Success') . ' </div>';
    }

    ?>
    <h3>
        Add Quiz
    </h3>
    <div class="card border-info p-3 m-2 mb-3  main " style="background: #D0ECE7">
        <h5 class="p-2">Create Quiz</h5>
        <form action="<?= base_url('volunteer/Dashboard/setQuiz') ?>" method="POST" class="form-inline p-2">
            <div class="input-group col-md-3 mx-1">
                <select id="class" name="class" class="form-control">
                    <option selected disabled value="">Select a Class</option>

                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="input-group col-md-3 mx-1">
                <select id="sub" class="form-control" name="subject">
                    <option selected value="" disabled>Select one Subject</option>
                </select>
            </div>
            <div class="input-group col-md-3 mx-1">
                <select id="chapter" class="form-control" name="chapter">
                    <option selected disabled value="">Chapter Number</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                </select>
            </div>
            <button type="submit" class="btn bg-success m-2" style="font-weight:bold;color:white;">Submit</button>
        </form>
    </div>

    <?php
    if (isset($this->session->userdata('quiz_data')['q_id'])) {
        if ($this->session->userdata('quiz_data')['q_id']) {
    ?>
            <div class="card p-3 m-2" style="background: #D0ECE7;">
                <div class="card-header bg-white mx-2">
                    <div class="p-3 mx-3">Quiz <b class="px-2">#<?php echo $this->session->userdata('quiz_data')['q_id']; ?></b>
                        &nbsp; Class <b class="px-2">#<?php echo $this->session->userdata('quiz_data')['class']; ?></b>
                        &nbsp; Subject <b class="px-2">#<?php echo $this->session->userdata('quiz_data')['subject']; ?></b>
                        &nbsp; Chapter <b class="px-2">#<?php echo $this->session->userdata('quiz_data')['chapter']; ?></b>
                        <button class="float-right btn btn-outline-danger" data-toggle="modal" data-target="#customQuestionModal"><b>Add Custom Question</b></button></div>
                </div>
                <?php foreach ($already_quiz as $all_ques) {
                ?>

                    <div class="card-body border bg-white shadow m-2">
                        <div class=" align-middle m-4">
                            <form action="<?= base_url('volunteer/Dashboard/edit_question/' . $all_ques['id']) ?>" method="POST">
                                <div class="col-md-10">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Q. </div>
                                        </div>
                                        <input type="text" class="form-control" name="mcq_question" id="question" value="<?= $all_ques['question'] ?>" <?php if ($all_ques['type'] === 'Submitted') {
                                                                                                                                                            echo 'disabled';
                                                                                                                                                        } ?>>

                                    </div>
                                    <div class="m-1">
                                        <?php if ($all_ques['ques_link']) {
                                            echo '<img src="' . $all_ques['ques_link'] . '" class="img-fluid" alt="Question Image" srcset="">';
                                        } ?>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="input-group mb-2 col-md-8">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">A. </div>
                                            </div>
                                            <input type="text" class="form-control col-md-8" name="option_a" id="option_a" value="<?= $all_ques['option_a'] ?>" <?php if ($all_ques['type'] === 'Submitted') {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>>
                                        </div>
                                        <div class="input-group mb-2 col-md-8">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">B. </div>
                                            </div>
                                            <input type="text" class="form-control col-md-8" name="option_b" id="option_b" value="<?= $all_ques['option_b'] ?>" <?php if ($all_ques['type'] === 'Submitted') {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>>
                                        </div>
                                        <div class="input-group mb-2 col-md-8">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">C. </div>
                                            </div>
                                            <input type="text" class="form-control col-md-8" name="option_c" id="option_c" value="<?= $all_ques['option_c'] ?>" <?php if ($all_ques['type'] === 'Submitted') {
                                                                                                                                                                    echo 'disabled';
                                                                                                                                                                } ?>>
                                        </div>
                                        <div class="input-group mb-2 col-md-8">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">D. </div>
                                            </div>
                                            <input type="text" class="form-control col-md-8" name="option_d" id="option_d" value="<?= $all_ques['option_d'] ?>" <?php if ($all_ques['type'] === 'Submitted') {
                                                                                                                                                                    ech                                                                                                                         } ?>>
                                        </div>
                                    </div>
                                    <?php if ($all_ques['option_link']) {
                                        echo '<img src="' . $all_ques['option_link'] . '" class="img-fluid" alt="Question Image" srcset="">';
                                    } ?>
                                    <div class="font-weight-bold col-md-6 p-2">Correct Answer:
                                        <select id="solution" class="form-control " name="solution" <?php if ($all_ques['type'] === 'Submitted') {
                                                                                                        echo 'disabled';
                                                                                                    } ?>>
                                            <option selected value="<?= $all_ques['solution'] ?>">
                                                <b>Selected: <?= strtoupper($all_ques['solution']) ?> </b>
                                            </option>

                                            <option value="a">A</option>
                                            <option value="b">B</option>
                                            <option value="c">C</option>
                                            <option value="d">D</option>
                                        </select>
                                    </div>
                                    <?php if ($all_ques['type'] === 'Submitted') :
                                        echo '<button class="btn btn-success" disabled>Question Submitted</button>';
                                    else : ?>
                                        <a class="btn btn-success" href="<?= base_url('volunteer/Dashboard/approve_question/' . $all_ques['id']) ?>">Submit Question</a>
                                        <button type="submit" class="btn btn-outline-danger float-right m-1">
                                            Save Question
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>

            <div class="card border-danger m-3 p-3">
                <h3>
                    <center>Select Some options!!</center>
                </h3>
            </div>
    <?php }
    } ?>

    <!-- Custom Modal -->
    <div class="modal fade " id="customQuestionModal" tabindex="-1" role="dialog" aria-labelledby="customQuestionModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-success" id="customQuestionModalTitle">To Add Custom Question</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="ajax-contact" action="<?= base_url('volunteer/Dashboard/addquestion') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <label for="quizQuestion"><b> Question:</b></label>
                        <textarea required class="form-control" id="quizQuestion" name="mcq_question" placeholder="Enter your question here!!" aria-required="Eveter the Question" rows="3"></textarea>
                        <div class="m-1">
                            <label for="quizQImage">Add an image to question:</label>
                            <input id="quizQImage" class="btn btn-outline-info" name="question_image" type="file">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="optionsInput"><b>Options:</b></label>

                            <div class="input-group m-2">
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text" id="mcqOption">A</span>
                                    <input type="text" class="form-control col-md-10" id="optionsInputa" name="option_a" placeholder="Option A" aria-describedby="mcqOption">

                                </div>
                            </div>
                            <div class="input-group m-2">
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text" id="mcqOption">B</span>
                                    <input type="text" class="form-control col-md-10" id="optionsInputb" name="option_b" placeholder="Option B" aria-describedby="mcqOption">
                                </div>
                            </div>
                            <div class="input-group m-2">
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text" id="mcqOption">C</span>
                                    <input type="text" class="form-control col-md-10" id="optionsInputc" name="option_c" placeholder="Option C" aria-describedby="mcqOption">
                                </div>
                            </div>
                            <div class="input-group m-2">
                                <div class="input-group-prepend col-12">
                                    <span class="input-group-text" id="mcqOption">D</span>
                                    <input type="text" class="form-control col-md-10" id="optionsInputd" name="option_d" placeholder="Option D" aria-describedby="mcqOption">
                                </div>
                            </div>
                        </div>
                        <div class="custom-file">
                            <label for="quizQImage">Select a Question Image:</label>
                            <input id="quizQImage" class="btn btn-outline-info" name="option_image" type="file">
                        </div>

                        <label for="optionsInput"><b>Solution:</b></label>

                        <div class="input-group col-6 m-2">
                            <select id="solution" class="form-control" required name="solution">

                                <!-- To add selected     -->
                                <option selected disabled value="">Select an option</option>


                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>

                        <div class="input-group col-md-10 px-2 mx-3">
                            <div class="input-group-prepend col-12">
                                <span class="input-group-text" id="mcqOption">Solution Link</span>
                                <input type="url" class="form-control col-6" id="optionsInputd" name="solution_link" placeholder="Enter solution link if any" aria-describedby="mcqOption">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-lg" id="saveQuestion" type="submit">Save Question</button>

                        <a type="button" href=" " style="text-decoration: none;" class="btn btn-lg btn-outline-danger float-right" aria-label="Close">
                            <b>Finish Adding</b>

                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        var form = $('#ajax-contact');
        $(form).submit(function(event) {
            $("#saveQuestion").attr("disabled", true);
            event.preventDefault();
            // check for duplicate options
            if ($('#optionsInputa').val() == $('#optionsInputb').val() ||
                $('#optionsInputb').val() == $('#optionsInputc').val() ||
                $('#optionsInputc').val() == $('#optionsInputd').val() ||
                $('#optionsInputa').val() == $('#optionsInputc').val() ||
                $('#optionsInputa').val() == $('#optionsInputd').val() ||
                $('#optionsInputb').val() == $('#optionsInputd').val()
            ) {
                alert('No two same options allowed!!');
                $("#saveQuestion").attr("disabled", false)
                return false;
            }

            var formData = $(form).serialize();
            // Submit the form using AJAX.
            $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    // data: formData,
                    data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false, // The content type used when sending data to the server.
                    cache: false, // To unable request pages to be cached
                    processData: false,
                })
                .done(function(response) {
                    // Clear the form.
                    $('#quizQuestion').val('');
                    $('question_image').val('');
                    $('#optionsInputa').val('');
                    $('#optionsInputb').val('');
                    $('#optionsInputc').val('');
                    $('#optionsInputd').val('');
                    $('#option_image').val('');
                    $('#solution').val('');
                    swal({
                        icon: "success",
                        title: "Record added successfully!",
                        text: "Add next Question...",
                        type: "Success",
                        showConfirmButton: false,
                    })
                    $("#saveQuestion").attr("disabled", false)
                });
        });
    });
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>