<div class="footer">
    <div class="copyright">
        <p>Copyright © - <?php echo date('Y'); ?> Blood Donor Information Management System</p>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="logout">
                <div class="modal-body text-center text-danger">
                    <i class="fa fa-power-off fa-4x"></i>
                    <h4>End Session?</h4>
                    <br>
                    <button type="button" class="text-center btn btn-success" data-dismiss="modal">No</button>
                    <button type="submit" name="logout" class="text-center btn btn-danger">Yes, Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>