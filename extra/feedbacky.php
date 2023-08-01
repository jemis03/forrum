<!-- Modal -->
<div class="modal fade" id="feedbackmodaly" tabindex="-1" role="dialog" aria-labelledby="feedbackmodalyLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header popupheader">
                <h5 class="modal-title" id="feedbackmodalyLabel">Register to this website</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forrum/extra/handlefeedback.php" method="post">

                <div class="modal-body feedbacky-modal-body" id="feedbacky-modal-body">
                    <div class="container">

                        <div class="row">
                            <div class="form-group">
                                <p class="info-rating">Please move curser on star and tap one click on star for
                                    selecting your rating for this website</p>
                            </div>






                            <div class="form-group form-rating">
                                <div class="rateyo star-padding" id="rating" data-rateyo-rating="4"
                                    data-rateyo-num-stars="5" data-rateyo-score="3">
                                </div>

                                <span class="result rating-padding"></span>
                                <!-- <br> -->
                                <input type="hidden" name="rating">
                            </div>
                            <!-- <br> -->




                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>