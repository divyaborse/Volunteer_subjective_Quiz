<style>

    .approve-btn{
        background: #8566aa;
        color:white; 
        border:1px solid transparent;
        font-size: 0.9rem;
    }
    .approve-btn:hover{
        background: white;
        border:1px solid #8566aa;
        color:#8566aa;
    }
    .table td,.table th{
        vertical-align: middle;
    }
    body{
        font-family: 'roboto',sans-serif;
        font-weight: 300;
    }
</style>
<div class="container-fluid">
    <div class="p-2">
        <h2 style="background:#f7f7f7;border-radius:6px;padding:1rem"><center>Questions Added</center></h2>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr style="background: #dbdbdb;">
                        <th style="width: auto;">#</th>
                        <th style="width: auto;">Question</th>
                        <th style="width: auto;">Options</th>
                        <th style="width: auto;" class="text-center">Edit / Delete</th>
                        <th style="width: auto;" class="text-center">Approve</th>
                        <th style="width: auto;">Quiz Question Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $updated_ques = $this->mq->prof_view_question('Updated Question');
                    if (!empty($updated_ques)) :
                        $count = 0;
                        foreach ($updated_ques as $questions) {
                    ?>
                            <tr>
                                <th scope="row"><?= ++$count ?></th>
                                <td style="width:30 !important;"><?= $questions['question'] ?></td>
                                <td style="width:15% !important;"><?= '<b>A.</b> ' . $questions['option_a'] . '<br>' .
                                        '<b>B.</b> ' . $questions['option_b'] . '<br>' .
                                        '<b>C.</b> ' . $questions['option_c'] . '<br>' .
                                        '<b>D.</b> ' . $questions['option_d'] . '<br>' .
                                        '<span style="background:#f7f7f7;border-radius:4px;padding:0.5rem;margin-top:0.5rem">Correct Solution: <b>' . strtoupper($questions['solution']) . '</b></span>'
                                    ?></td>
                                <td style="text-align: center;">
                                    <!-- <a disabled class="btn btn-outline-info m-1">Updated Question</a> -->
                                    <a href="<?= base_url('volunteer/Dashboard/editQuestion/' . $questions['id']) ?>" class="btn btn-outline-info m-1" style="font-size:0.9rem;">Updated Question</a>
                                    <a onclick='javascript:confirmationDelete($(this));return false;' href="<?= base_url('volunteer/Dashboard/prof_delete_question/' . $questions['id']) ?>" class="btn  m-1"><i style="color:red;" class="fas fa-trash-alt"></i></a>
                                </td>
                                <td style="text-align: center;">
                                    <div class=" m-2">
                                        <a onclick='javascript:confirmationApprove($(this));return false;' href="<?= base_url('volunteer/Dashboard/prof_approve_question/' . $questions['id']) ?>" class="btn btn approve-btn">Approve Question</a>
                                    </div>
                                </td>
                                <td> <?=
                                            'Added by: <b>' . $this->mq->return_intern_name($questions['user_id']) . '</b><br>' .
                                                'Class: <b>' . $questions['class'] . '</b><br>' .
                                                'Subject: <b>' . $questions['subject'] . '</b><br>' .
                                                'Chapter: <b>' . $questions['chapter'] . '</b><br>'
                                        ?>
                                </td>

                            </tr>
                        <?php }
                    endif;
                    if (!empty($prof_question)) :
                        if (!isset($count)) {
                            $count = 0;
                        }
                        foreach ($prof_question as $questions) {
                            // print_r($questions);
                            // echo '<br>';
                        ?>
                            <tr>
                                <th scope="row"><?= ++$count ?></th>
                                <td  style="width:30% !important;"><?= $questions['question'] ?></td>
                                <td  style="width:15% !important;"><?= '<b>A.</b> ' . $questions['option_a'] . '<br>' .
                                        '<b>B.</b> ' . $questions['option_b'] . '<br>' .
                                        '<b>C.</b> ' . $questions['option_c'] . '<br>' .
                                        '<b>D.</b> ' . $questions['option_d'] . '<br>' .
                                        '<span style="background:#f7f7f7;border-radius:4px;padding:0.5rem;margin-top:0.5rem">Correct Solution: <b>' . strtoupper($questions['solution']) . '</b></span>'
                                    ?></td>
                                <td style="text-align: center;">
                                    <a href="<?= base_url('volunteer/Dashboard/editQuestion/' . $questions['id']) ?>" class="btn  m-1" style="color:#8566aa;">Edit <i class="fas fa-edit"></i></a>
                                    <a onclick='javascript:confirmationDelete($(this));return false;' href="<?= base_url('volunteer/Dashboard/prof_delete_question/' . $questions['id']) ?>" class="btn  m-1"><i style="color:red;" class="fas fa-trash-alt"></i></a>
                                </td>
                                <td style="text-align: center;">
                                    <div class=" m-2">
                                        <a onclick='javascript:confirmationApprove($(this));return false;' href="<?= base_url('volunteer/Dashboard/prof_approve_question/' . $questions['id']) ?>" class="btn approve-btn">Approve Question</a>
                                    </div>
                                </td>
                                <td>  <?=
                                            '<b> Added by:</b ' . $this->mq->return_intern_name($questions['user_id']) .'<br>' .
                                                '<b> Class:</b> ' . $questions['class'] . '<br>' .
                                                '<b> Subject:</b> ' . $questions['subject'] . '<br>' .
                                                '<b> Chapter:</b> ' . $questions['chapter'] . '<br>'
                                        ?>
                                </td>

                            </tr>
                    <?php } else :
                        echo "No Question Added yet!!";
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<script>
    function confirmationDelete(anchor) {
        var conf = confirm('Are you sure want to delete this record?');
        if (conf)
            window.location = anchor.attr("href");
    };
    function confirmationApprove(anchor) {
        var conf = confirm('Are you sure want to approve this record?');
        if (conf)
            window.location = anchor.attr("href");
    };
</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>