<link rel="stylesheet" href="css/login.css">

<div class="container bodyContainer" id="bgCanvas">
    <div class="bg-layer">
        <div class="position-absolute header-main d-flex justify-content-center">
            <form method='post' class="hide-submit d-flex justify-content-center iconContainer align-items-center"
                id="buttonWrapper">
                <input type="hidden" name="action" value="setVoteType" />
                <label>
                    <input type="submit" name="voteType" value="visitor" />
                    <div>
                        User
                    </div>
                </label>
                <label>
                    <input type="submit" name="voteType" value="worker" />
                    <div>
                        Worker
                    </div>
                </label>
            </form>
        </div>
    </div>
</div>


<script src="js/loginBG.js"></script>
<script src="libraries/p5.min.js"></script>