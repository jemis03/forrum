<!-- Modal --><div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header popupheader">
                <h5 class="modal-title" id="signupmodalLabel">Register to this website</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/forrum/extra/_handlesignup.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="signupfname">First name</label>
                        <input type="text" class="form-control" id="signupfname" name="signupfname" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="signuplname">Last name</label>
                        <input type="text" class="form-control" id="signuplname" name="signuplname" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="signupdateofbirth">Date of birth </label>
                        <input type="date" class="form-control" name="signupdateofbirth" id="signupdateofbirth" required>
                    </div>
                    <div class="form-group mgender">
                        <label for="signupgender">Gender :</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="signupmgender" name="signupgender" value="Male" class="custom-control-input" required>
                            <label class="custom-control-label pl-4" for="signupmgender">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="signupfgender" name="signupgender" value="Female" class="custom-control-input" required>
                            <label class="custom-control-label pl-4" for="signupfgender">Female</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="signupemail">Email address</label>
                        <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="signuppassword">Password</label>
                        <input type="password" class="form-control" id="signuppassword" name="signuppassword" required>
                    </div>
                    <div class="form-group">
                        <label for="signupcpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcpassword" name="signupcpassword" required>
                    </div>
                    <div class="form-group">
                        <label for="signupquestion">This field is required for the <b>forget password</b> in future:<br>Please select any question and type thier answer.</label>
                        <select name="signupquestion" id="signupquestion" class="form-control">
                        <option value="What is your favourite game?">What is your favourite game?</option>
                        <option value="What is your favourite car?">What is your favourite car?</option>
                        <option value="who is your favourite person?">who is your favourite person?</option>
                        <option value="which is your favourite color?">which is your favourite color?</option>
                        <option value="which is your favourite place in one word?">which is your favourite place in one word?</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="signupquesanswer" name="signupquesanswer" aria-describedby="emailHelp" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
</div>