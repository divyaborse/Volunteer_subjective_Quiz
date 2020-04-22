
    <div class="container">
        <div class="jumbotron shadow border border-danger mt-3">
            <h4>Welcome, <?= $this->session->userdata('quiz_volunteer')['name'] ?></h4>
            <p class="lead">This is your dashboard, click below to start adding questions...</p>
            <hr class="my-4">
            <div class="d-flex justify-content-center">
                <div class="row text-center">
                    <a class="btn btn-outline-primary mb-2 mx-4" href="<?= base_url('volunteer/Dashboard/mcqQuestion') ?>" role="button">MCQ Questions</a>
                    <a class="btn btn-outline-primary mb-2 mx-4" href=" " role="button">Paragraph Questions</a>
                    <a class="btn btn-outline-primary mb-2 mx-4" href="<?= base_url('volunteer/Dashboard/subjective') ?>" role="button">Subjective Questions</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>