<div class="container ">
<div class="table-responsive">

    <table class="table mt-3">
        <thead>
            <tr style="background: #dbdbdb;text-align:center">
                <th scope="col">#</th>
                <th scope="col">Question</th>
                <th scope="col">Options</th>
                <th scope="col">Solution</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($reported_ques)) :
                foreach ($reported_ques as $ques) {
            ?>
                    <tr>
                        <th scope="row">1</th>
                        <td style="width:30%;"><?= $ques['question'] ?></td>
                        <td style="width:30%;">
                            <?= 'A. ' . $ques['option_a'] . '<br>' .
                                'B. ' . $ques['option_b'] . '<br>' .
                                'C. ' . $ques['option_c'] . '<br>' .
                                'D. ' . $ques['option_d']                                
                            ?>
                        </td>
                        <td><?= 'Corrected: '.$ques['option_' . $ques['solution']] ?></td>
                        <td style="width:15%;text-align:center;">  <a href="<?= base_url('volunteer/Dashboard/editReportQuestion/' . $ques['id']) ?>" class="btn btn-info m-1">Edit <i class="fas fa-edit"></i></a></td>
                    </tr>
            <?php }
            endif; ?>
        </tbody>
    </table>
</div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>